<?php
function array_orderby() {
  $args = func_get_args();
  $data = array_shift($args);
  foreach ($args as $n => $field) {
    if (is_string($field)) {
      $tmp = array();
      foreach ($data as $key => $row)
        $tmp[$key] = $row[$field];
      $args[$n] = $tmp;
    }
  }
  $args[] = &$data;
  call_user_func_array('array_multisort', $args);
  return array_pop($args);
}

function vn_convert_to_en($str) {
  $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
  $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
  $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
  $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
  $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
  $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
  $str = preg_replace("/(đ)/", "d", $str);
  $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
  $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
  $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
  $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
  $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
  $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
  $str = preg_replace("/(Đ)/", "D", $str);
  //$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
  return $str;
}

function zohocrm_replace_data($data) {
  $content_replace = [];

  foreach ($data as $value) {
    $key_replace = str_replace(' ', '_', $value->val);
    $key_convert = vn_convert_to_en($key_replace);
    $key_lower = strtolower($key_convert);

    $content_replace[$key_lower] = $value->content;
  }
  return $content_replace;
}

function get_key_arrobj($arrobj, $valueid, $string) {
  foreach ($arrobj as $key => $value) {
    if ($value->$valueid == $string) {
      return $key;
    }
  }
}

function get_products_categories() {
  if ( null !== get_option('zoho_crm_board_settings') ) {
    $zoho_crm_options = get_option('zoho_crm_board_settings');
    $zoho_crm_author_token  = strrev($zoho_crm_options['author_token']);
  } else {
    $zoho_crm_author_token  = '';
  }

  $zoho_crm_api_url = 'https://crm.zoho.com/crm/private/json/Products/getFields?authtoken=' . $zoho_crm_author_token . '&scope=crmapi';
  $zoho_crm_request = file_get_contents($zoho_crm_api_url);
  $zoho_crm_data_fields = json_decode($zoho_crm_request);

  $zoho_crm_data_products = $zoho_crm_data_fields->Products->section;
  $zoho_crm_data_product_info = $zoho_crm_data_products[get_key_arrobj($zoho_crm_data_products, 'name', 'Product Information')]->FL;
  $zoho_crm_data_product_types_arr = $zoho_crm_data_product_info[get_key_arrobj($zoho_crm_data_product_info, 'label', 'Product Category')];
  $zoho_crm_data_product_types = $zoho_crm_data_product_types_arr->val;

  array_shift($zoho_crm_data_product_types);

  $products_type = [];
  foreach ($zoho_crm_data_product_types as $value) {
    $value_en = vn_convert_to_en($value);
    $value_en = strtolower($value_en);
    $value_en = str_replace(" ", "_", $value_en);
    $products_type[$value_en] = $value;
  }

  return $products_type;
}

function get_zoho_posttype() {
  $zohocrm_posttype_arr = [];

  if ( null !== get_option('zoho_crm_board_settings') ) {
    $zoho_crm_options = get_option('zoho_crm_board_settings');
    $zohocrm_posttype = $zoho_crm_options['products_categories'];
  } else {
    $zohocrm_posttype  = '';
  }

  if (!empty($zohocrm_posttype) && $zohocrm_posttype != null) {
    $zohocrm_posttype_active = explode('|', $zohocrm_posttype);
    foreach ($zohocrm_posttype_active as $posttype) {
      $posttype_arr = explode('=', $posttype);
      $zohocrm_posttype_arr[$posttype_arr[0]] = $posttype_arr[1];
    }
  }

  return $zohocrm_posttype_arr;
}

add_action( 'wp_ajax_zohocrmGetProductsCategories', 'zohocrm_zohocrmGetProductsCategories' );
function zohocrm_zohocrmGetProductsCategories() {
  global $wpdb; // this is how you get access to the database

  if ( null !== get_option('zoho_crm_board_settings') ) {
    $zohocrm_options = get_option('zoho_crm_board_settings');
    $products_categories = $zohocrm_options['products_categories'];
  } else {
    $products_categories  = '';
  }

  $zohocrm_product_active_arr = [];
  if ( !empty($products_categories) && $products_categories != '' ) {
    $zohocrm_product_active = explode('|', $products_categories);
    foreach ($zohocrm_product_active as $type) {
      $type_arr = explode('=', $type);
      $zohocrm_product_active_arr[$type_arr[0]] = $type_arr[1];
    }
  }

  $content = '';

  if (!empty($zohocrm_product_active_arr) && $zohocrm_product_active_arr != '' ) {
    $zohocrm_product_categories = array_diff(get_products_categories(), $zohocrm_product_active_arr);
  } else {
    $zohocrm_product_categories = get_products_categories();
  }

  foreach ($zohocrm_product_categories as $key => $type) {
    $content .= '<li data-value="' . $key . '" class="ui-state-default">' . $type . '</li>';
  }

  $result = json_encode(array(
    'markup' => $content
  ));
  echo $result;

  wp_die(); // this is required to terminate immediately and return a proper response
}

add_action( 'wp_ajax_getzohodocs', 'zohocrm_getzohodocs' );
function zohocrm_getzohodocs() {
  global $wpdb; // this is how you get access to the database

  $zohocrm_options = get_option('zoho_crm_board_settings');
  $zohodocs_author_token  = strrev($zohocrm_options['docs_author_token']);
  $zohodocs_url_request = 'https://apidocs.zoho.com/files/v1/folders?authtoken=' . $zohodocs_author_token . '&scope=docsapi';
  $zohodocs_delete_folder_url = 'https://apidocs.zoho.com/files/v1/folders/delete?authtoken=' . $zohodocs_author_token . '&scope=docsapi&folderid=';
  $zohodocs_create_folder_url = 'https://apidocs.zoho.com/files/v1/folders/create?authtoken=' . $zohodocs_author_token . '&scope=docsapi&foldername=';

  $content = '<div class="zohodocs-action"><a href="#" class="zohodocs-select-all">' . __('select all', 'zoho_crm') . '</a>';
  $content .= '   <a href="#" class="zohodocs-deselect-all">' . __('deselect all', 'zoho_crm') . '</a></div>';
  $content .= '<select multiple id="zohodocs_folders" name="zohodocs_folders">';

  $zohodocs_request = file_get_contents($zohodocs_url_request);
  $zohodocs_data = json_decode($zohodocs_request);

  foreach ($zohodocs_data as $key => $value) {
    if ( is_array($value) ) {
      $folder_base = $value[0];
      $folder_name = $folder_base->FOLDER_NAME;
      $folder_id = $folder_base->FOLDER_ID;

      $folder_name_en = vn_convert_to_en($folder_name);
      $folder_name_en = strtolower($folder_name_en);
      $folder_name_en = str_replace(" ", "_", $folder_name_en);

      //$content .= '<option value="' . $folder_id . '">' . $folder_name . '</option>';
      $content .= '<optgroup label="' . $folder_name . '" data-name="' . $folder_name_en . '">';

      // Sub1 Folders
      $sub_url_request = 'https://apidocs.zoho.com/files/v1/folders?authtoken=' . $zohodocs_author_token . '&scope=docsapi&folderid=' . $folder_id;
      $sub_request = file_get_contents($sub_url_request);
      $sub_data = json_decode($sub_request);

      $sub_folder = $sub_data->FOLDER;
      //print_r($sub_data);

      foreach ($sub_folder as $sub_key => $sub_value) {
        $sub_folder_id = $sub_value->FOLDERID;
        $sub_folder_name = $sub_value->FOLDERNAME;

        $content .= '<option value="' . $sub_folder_id . '">' . $sub_folder_name . '</option>';
      }

      $content .= '</optgroup>';
    }
  }

  $content .= '</select>';

  $result = json_encode(array(
    'markup' => $content
  ));
  echo $result;

  wp_die(); // this is required to terminate immediately and return a proper response
}

add_action( 'wp_ajax_importzohodocstopost', 'zohocrm_importzohodocstopost' );
function zohocrm_importzohodocstopost() {
  global $wpdb; // this is how you get access to the database
  $values = $_REQUEST;

  $zohocrm_options = get_option('zoho_crm_board_settings');
  $zohodocs_author_token  = strrev($zohocrm_options['docs_author_token']);
  $zohodocs_url_api = 'https://apidocs.zoho.com/files/v1/folders?authtoken=' . $zohodocs_author_token . '&scope=docsapi&folderid=';
  $zohodocs_value = $values['zohodocs_value'];
  //print_r($zohodocs_value);
  if ( empty($zohodocs_value) || $zohodocs_value == '' ) {
    $zohodocs_meassage = '<p style="color: red;">' . __('Import Fail', 'zoho_crm') . '!</p>';
  } else {
    $zohodocs_value_return = [];
    $zohodocs_value_arr = explode(' | ', $zohodocs_value);

    foreach ($zohodocs_value_arr as $item) {
      $item = substr($item, 1);
      $item = substr($item, 0, -1);
      $item_arr = explode(' = ', $item);

      array_push($zohodocs_value_return, array(
        'folder_type'   => $item_arr[0],
        'folder_id'     => $item_arr[1],
        'folder_name'   => $item_arr[2]
      ));
    }

    $test_request             = [];
    $zohodocs_docs_success    = [];
    $zohodocs_docs_fail       = [];
    foreach ($zohodocs_value_return as $post) {
      $data_key_title = get_page_by_title($post['folder_name'], OBJECT, $post['folder_type']);

      if (!empty($data_key_title)) {
        $zohodocs_folder_url = $zohodocs_url_api . $post['folder_id'];
        $zohodocs_folder_request = file_get_contents($zohodocs_folder_url);
        $zohodocs_folder_data = json_decode($zohodocs_folder_request);

        $post_id = $data_key_title->ID;
        $post_gallery = "post_gallery";
        update_field( $post_gallery, array(), $post_id );

        //array_push($test_request, $zohodocs_folder_data);
        $zohodocs_files = $zohodocs_folder_data->FILES;
        $zohodocs_folders = $zohodocs_folder_data->FOLDER;

        if ( null !== $zohodocs_files ) {
          $files_arr = [];
          foreach ($zohodocs_files as $files) {
            $file_url = 'https://docs.zoho.com/docs/prv/' . $files->DOCID;
            $files_arr[]['image_link'] = $file_url;
          }
          update_field( $post_gallery, $files_arr, $post_id );
        }

        if ( null !== $zohodocs_folders ) {
          switch ($post['folder_type']) {
            case 'tour':
              $sub_folder_url = $zohodocs_url_api . $zohodocs_folders[0]->FOLDERID;
              $sub_folder_request = file_get_contents($sub_folder_url);
              $sub_folder_data = json_decode($sub_folder_request);
              $sub_files = $sub_folder_data->FILES;

              $base_url = 'https://docs.zoho.com/docs/prv/';
              $schedules_arr = [];

              foreach ($sub_files as $item) {
                $img_info = [];

                $img_id = $item->DOCID;
                $img = $item->DOCNAME;
                $img_arr = explode('.', $img);
                $img_name = $img_arr[0];
                $img_name_arr = explode('-', $img_name);

                $schedules_count = $img_name_arr[1];
                $img_info['schedule_count'] = $schedules_count;
                $img_info['tour_schedule_image'] = $base_url . $img_id;
                $schedules_arr[$img_name] = $img_info;
              }

              /*$hotel_schedule_arr = [];
              foreach ($sub_files as $item) {
                //$img_arr[$item->DOCNAME] = $item->DOCID;
                $img_info = [];

                $img_id = $item->DOCID;
                $img = $item->DOCNAME;
                $img_arr = explode('.', $img);
                $img_name = $img_arr[0];
                $img_name_arr = explode('-', $img_name);

                $img_type = $img_name_arr[0];

                switch ($img_type) {
                  case 'schedule':
                    $schedules_count = $img_name_arr[1];

                    $img_info['schedule_count'] = $schedules_count;
                    $img_info['tour_schedule_image'] = $base_url . $img_id;

                    //array_push($schedules_arr, $img_info);
                    $schedules_arr[$img_name] = $img_info;
                    break;

                  case 'hotel':
                    $hotel_schedule_count = $img_name_arr[1];
                    $hotel_schedule = $img_name_arr[2] . '-' . $img_name_arr[3];

                    $img_info['schedule_name'] = $hotel_schedule;
                    $img_info['hotel_schedule_count'] = $hotel_schedule_count;
                    $img_info['hotel_schedule_name'] = $img_name;
                    $img_info['hotel_'.$hotel_schedule_count.'_image'] = $base_url . $img_id;

                    array_push($hotel_schedule_arr, $img_info);
                    break;

                  default:
                    echo __('not type!', 'pdj_theme');
                    break;
                }
              }

              $hotel_schedule_replace = array_orderby($hotel_schedule_arr, 'hotel_schedule_count', SORT_ASC);

              foreach ($hotel_schedule_replace as $key => $value) {
                $schedule_key = $value['schedule_name'];
                $schedule_image_key = 'hotel_' . $value['hotel_schedule_count'] . '_image';
                $schedules_arr[$schedule_key][$schedule_image_key] = $value[$schedule_image_key];
              }*/

              $schedules_replace = array_orderby($schedules_arr, 'schedule_count', SORT_ASC);
              $a = array_values($schedules_replace);

              foreach ($a as $key => $value) {
                update_row('tour_schedules', $key + 1, $value, $post_id);
              }

              break;

            case 'hotel':
              foreach ($zohodocs_folders as $folders) {
                $sub_folder_title = get_page_by_title($folders->FOLDERNAME, OBJECT, 'room');

                if ( !empty($sub_folder_title) ) {
                  $sub_folder_url = $zohodocs_url_api . $folders->FOLDERID;
                  $sub_folder_request = file_get_contents($sub_folder_url);
                  $sub_folder_data = json_decode($sub_folder_request);

                  update_field( $post_gallery, array(), $sub_folder_title->ID );
                  $sub_files = $sub_folder_data->FILES;

                  if ( null !== $sub_files ) {
                    $sub_files_arr = [];
                    foreach ($sub_files as $sub_file) {
                      $sub_file_url = 'https://docs.zoho.com/docs/prv/' . $sub_file->DOCID;
                      $sub_files_arr[]['image_link'] = $sub_file_url;
                    }
                    update_field( $post_gallery, $sub_files_arr, $sub_folder_title->ID );
                  }
                }
              }
              break;

            default:
              # code...
              break;
          }
        }

        array_push($zohodocs_docs_success, $post['folder_name']);
      } else {
        array_push($zohodocs_docs_fail, $post['folder_name']);
      }
    }
    if ( $zohodocs_docs_success ) {
      $zohodocs_meassage = '<div style="color: #41a901">' . __('Import Success:', 'zoho_crm') . '<ul style="margin: 0;">';
      foreach ($zohodocs_docs_success as $value) {
        $zohodocs_meassage .= '<li>' . $value . '</li>';
      }
      $zohodocs_meassage .= '</ul></div>';
    } 
    if ( $zohodocs_docs_fail ) {
      $zohodocs_meassage .= '<div style="color: red">' . __('Import Fail:', 'zoho_crm') . '<ul style="margin: 0;">';
      foreach ($zohodocs_docs_fail as $value) {
        $zohodocs_meassage .= '<li>' . $value . '</li>';
      }
      $zohodocs_meassage .= '</ul></div>';
    }
    //$zohodocs_meassage = '<p style="color: ' . $zohodocs_meassage_color . ';">' . $zohodocs_meassage_inport . '!</p>';
  }

  $result = json_encode(array(
    'test_request' => $zohodocs_value_return,
    'meassage' => $zohodocs_meassage
  ));
  echo $result;

  wp_die(); // this is required to terminate immediately and return a proper response
}
