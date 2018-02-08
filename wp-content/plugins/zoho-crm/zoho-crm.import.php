<?php

$zohocrm_author_token  = strrev($zohocrm_options['author_token']);
$zohodocs_author_token  = strrev($zohocrm_options['docs_author_token']);

//global $zohocrm_url_request;
$GLOBALS['zohocrm_url_request'] = 'https://crm.zoho.com/crm/private/json/Products/getRecordById?authtoken=' . $zohocrm_author_token . '&scope=crmapi&idlist=';
$GLOBALS['zohodocs_url_request'] = 'https://apidocs.zoho.com/files/v1/folders?authtoken=' . $zohodocs_author_token . '&scope=docsapi';
$GLOBALS['zohodocs_delete_folder_url'] = 'https://apidocs.zoho.com/files/v1/folders/delete?authtoken=' . $zohodocs_author_token . '&scope=docsapi&folderid=';
$GLOBALS['zohodocs_create_folder_url'] = 'https://apidocs.zoho.com/files/v1/folders/create?authtoken=' . $zohodocs_author_token . '&scope=docsapi&foldername=';

function zohocrm_insert_content() {
  if( isset($_POST['zohocrm_type']) ) {
    $zohocrm_type = $_POST['zohocrm_type'];
  }

  if( isset($_POST['zohocrm_productids']) ) {

    // Data Analysis from ZohoCRM
    $zohocrm_data = [];
    $zohocrm_productids = $_POST['zohocrm_productids'];

    $zohocrm_productids_array = preg_split('/\r\n|[\r\n]/', $zohocrm_productids);
    $zohocrm_productids_string = join(';', $zohocrm_productids_array);

    $content_request = file_get_contents($GLOBALS['zohocrm_url_request'] . $zohocrm_productids_string);
    $content_request_array = json_decode($content_request)->response->result->Products->row;

    if ($content_request_array) {
      if (is_array($content_request_array)) {
        foreach ($content_request_array as $items) {
          $content_request_item = $items->FL;
          $content_replace_item = zohocrm_replace_data($content_request_item);
          array_push($zohocrm_data, $content_replace_item);
        }
      } else {
        $content_request_item = $content_request_array->FL;
        $content_replace_item = zohocrm_replace_data($content_request_item);
        array_push($zohocrm_data, $content_replace_item);
      }
    }

    //print_r($zohocrm_data);

    switch ($zohocrm_type) {
      case 'hotel':
        $zohocrm_data_return = [];
        foreach($zohocrm_data as $value){
          if ( $value['product_category'] === 'Hotel' ) {
            $zohocrm_data_return[$value['product_name']][] = $value;
          }
        }
        break;

      default:
        $zohocrm_data_return = $zohocrm_data;
        break;
    }

    //print_r($zohocrm_data_return);

    // Import into website
    if (!empty($zohocrm_data_return) && !empty($zohocrm_type)) {
      $zohocrm_importid = [];
      $zohocrm_updateid = [];

      foreach ($zohocrm_data_return as $key => $item) {
        switch ($zohocrm_type) {
          case 'hotel':
            // Import Rooms type
            $room_id_arr = [];
            //$hotel_address = [];

            foreach ($item as $key_value => $value) {
              // Check if more than one room, then skip only one and delete all rooms.
              $hotel_breakfast_included = 0;
              if ( !empty($value['hotel_breakfast_included']) && ($value['hotel_breakfast_included'] == 'true') ) {
                $hotel_breakfast_included = 1;
              }

              $args_room = array(
                'numberposts' => -1,
                'post_type'   => 'room',
                'meta_key'    => 'productid',
                'meta_value'  => $value['productid']
              );

              $rooms = Timber::get_posts( $args_room );

              $room = array_shift($rooms);

              foreach ($rooms as $post_item) {
                wp_delete_post( $post_item->ID, true );
              }

              // Create or Update room by ID (productid)
              if (empty($room)) {
                // Create post object
                $my_post = array(
                  'ID'            => '',
                  'post_title'    => $value['hotel_room_type'],
                  'post_status'   => 'publish',
                  'post_type'     => 'room'
                );

                // Insert the post into the database
                $post_id = wp_insert_post($my_post);
                array_push($zohocrm_importid, $value['productid']);
                update_field('productid', $value['productid'], $post_id);
                update_field('product_code', $value['product_code'], $post_id);
                update_field('unit_price', $value['unit_price'], $post_id);
                update_field('hotel_price_public', $value['hotel_price_public'], $post_id);
                update_field('tax', $value['tax'], $post_id);
                update_field('custom_exchange_rate', $value['custom_exchange_rate'], $post_id);
                update_field('benefit', $value['benefit'], $post_id);
                update_field('extra_bed_sale_price', $value['extra_bed_sale_price'], $post_id);
                update_field('weekend_surcharge', $value['weekend_surcharge'], $post_id);
                update_field('asian_customer_nett_price', $value['asian_customer_nett_price'], $post_id);
                update_field('westerner_customer_nett_price', $value['westerner_customer_nett_price'], $post_id);
                update_field('holidays_surcharge', $value['holidays_surcharge'], $post_id);
                update_field('high_season_difference_price', $value['high_season_difference_price'], $post_id);
                update_field('low_season_difference_price', $value['low_season_difference_price'], $post_id);
                update_field('roh_price', $value['roh_price'], $post_id);
                update_field('hotel_breakfast_included', $hotel_breakfast_included, $post_id);
                update_field('hotel_capacity_adult', $value['hotel_capacity_adult'], $post_id);
                update_field('hotel_capacity_child', $value['hotel_capacity_child'], $post_id);
                update_field('in_hotel', $value['product_name'], $post_id);
                update_field('qty_in_stock', $value['qty_in_stock'], $post_id);
                update_field('low_season', $value['low_season'], $post_id);
                update_field('high_season', $value['high_season'], $post_id);
                update_field('holidays', $value['holidays'], $post_id);
                update_field('room_facilities_services', $value['room_facilities_services'], $post_id);

                array_push($room_id_arr, $post_id);
              } else {
                // Update post object
                $post_id = $room->ID;
                array_push($zohocrm_updateid, $value['productid']);
                update_field('title', $value['hotel_room_type'], $post_id);
                update_field('productid', $value['productid'], $post_id);
                update_field('product_code', $value['product_code'], $post_id);
                update_field('unit_price', $value['unit_price'], $post_id);
                update_field('hotel_price_public', $value['hotel_price_public'], $post_id);
                update_field('tax', $value['tax'], $post_id);
                update_field('custom_exchange_rate', $value['custom_exchange_rate'], $post_id);
                update_field('benefit', $value['benefit'], $post_id);
                update_field('extra_bed_sale_price', $value['extra_bed_sale_price'], $post_id);
                update_field('weekend_surcharge', $value['weekend_surcharge'], $post_id);
                update_field('asian_customer_nett_price', $value['asian_customer_nett_price'], $post_id);
                update_field('westerner_customer_nett_price', $value['westerner_customer_nett_price'], $post_id);
                update_field('holidays_surcharge', $value['holidays_surcharge'], $post_id);
                update_field('high_season_difference_price', $value['high_season_difference_price'], $post_id);
                update_field('low_season_difference_price', $value['low_season_difference_price'], $post_id);
                update_field('roh_price', $value['roh_price'], $post_id);
                update_field('hotel_breakfast_included', $hotel_breakfast_included, $post_id);
                update_field('hotel_capacity_adult', $value['hotel_capacity_adult'], $post_id);
                update_field('hotel_capacity_child', $value['hotel_capacity_child'], $post_id);
                update_field('in_hotel', $value['product_name'], $post_id);
                update_field('qty_in_stock', $value['qty_in_stock'], $post_id);
                update_field('low_season', $value['low_season'], $post_id);
                update_field('high_season', $value['high_season'], $post_id);
                update_field('holidays', $value['holidays'], $post_id);
                update_field('room_facilities_services', $value['room_facilities_services'], $post_id);

                array_push($room_id_arr, $post_id);
              }

              /*if (!in_array($value['address'], $hotel_address)) {
                array_push($hotel_address, $value['address']);
              }*/

              /*end($item);
              if ($key_value === key($item)) {
                $hotel_address = $value['productid']
              }*/
            }
            //array_unique($hotel_address);

            // Import Hotels type
            if ( !empty($item) ) {
              $hotel_default_value = $item[0];

              $hotel_address = $hotel_default_value['address'];
              $address_coordinates = $hotel_default_value['address_coordinates'];
              $hotel_star = $hotel_default_value['hotel_star'];
              $hotel_hotline = $hotel_default_value['hotline'];
              $hotel_website = $hotel_default_value['hotel_website'];
              $hotel_reservation_name = $hotel_default_value['hotel_reservation_name'];
              $hotel_email = $hotel_default_value['email'];
              $hotel_description = $hotel_default_value['description'];
              $hotel_cancellation_policy = $hotel_default_value['cancellation_policy'];
              $hotel_child_policy = $hotel_default_value['hotel_child_policy'];
              $hotel_promotion = $hotel_default_value['hotel_promotion'];
              $hotel_remarks = $hotel_default_value['hotel_remarks'];
              $hotel_internet_access_services = $hotel_default_value['internet_access_services'];
              $hotel_relax_services = $hotel_default_value['relax_services'];
              $hotel_dining_drinking_snacking_services = $hotel_default_value['dining_drinking_snacking_services'];
              $hotel_conveniences_services = $hotel_default_value['services_conveniences_services'];
              $hotel_kids_services = $hotel_default_value['kids_services'];
              $hotel_getting_around_services = $hotel_default_value['getting_around_services'];
            }

            $data_key_title = get_page_by_title($key, OBJECT, $zohocrm_type);
            if ( empty($data_key_title) ) {
              $args_data = array(
                'ID'            => '',
                'post_title'    => $key,
                'post_status'   => 'publish',
                'post_type'     => $zohocrm_type
              );

              $data_key_id = wp_insert_post($args_data);
              update_field('address', $hotel_address, $data_key_id);
              update_field('address_coordinates', $address_coordinates, $data_key_id);
              update_field('hotel_star', $hotel_star, $data_key_id);
              update_field('hotline', $hotel_hotline, $data_key_id);
              update_field('hotel_website', $hotel_website, $data_key_id);
              update_field('hotel_reservation_name', $hotel_reservation_name, $data_key_id);
              update_field('email', $hotel_email, $data_key_id);
              update_field('description', $hotel_description, $data_key_id);
              update_field('cancellation_policy', $hotel_cancellation_policy, $data_key_id);
              update_field('hotel_child_policy', $hotel_child_policy, $data_key_id);
              update_field('hotel_promotion', $hotel_promotion, $data_key_id);
              update_field('hotel_remarks', $hotel_remarks, $data_key_id);
              update_field('internet_access_services', $hotel_internet_access_services, $data_key_id);
              update_field('relax_services', $hotel_relax_services, $data_key_id);
              update_field('dining_drinking_snacking_services', $hotel_dining_drinking_snacking_services, $data_key_id);
              update_field('conveniences_services', $hotel_conveniences_services, $data_key_id);
              update_field('kids_services', $hotel_kids_services, $data_key_id);
              update_field('getting_around_services', $hotel_getting_around_services, $data_key_id);
              update_field('room_type', $room_id_arr, $data_key_id);
              //update_field( 'hotel_address', $hotel_address, $data_key_id );
            } else {
              $hotel_id = $data_key_title->ID;

              // Update rooms
              $current_rooms = get_field('room_type', $hotel_id);
              if ( !empty($current_rooms) ) {
                foreach ($current_rooms as $current_room) {
                  array_push($room_id_arr, $current_room->ID);
                }
                array_unique($room_id_arr);
              }


              update_field('address', $hotel_address, $hotel_id);
              update_field('address_coordinates', $address_coordinates, $hotel_id);
              update_field('hotel_star', $hotel_star, $hotel_id);
              update_field('hotline', $hotel_hotline, $hotel_id);
              update_field('hotel_website', $hotel_website, $hotel_id);
              update_field('hotel_reservation_name', $hotel_reservation_name, $hotel_id);
              update_field('email', $hotel_email, $hotel_id);
              update_field('description', $hotel_description, $hotel_id);
              update_field('cancellation_policy', $hotel_cancellation_policy, $hotel_id);
              update_field('hotel_child_policy', $hotel_child_policy, $hotel_id);
              update_field('hotel_promotion', $hotel_promotion, $hotel_id);
              update_field('hotel_remarks', $hotel_remarks, $hotel_id);
              update_field('internet_access_services', $hotel_internet_access_services, $hotel_id);
              update_field('relax_services', $hotel_relax_services, $hotel_id);
              update_field('dining_drinking_snacking_services', $hotel_dining_drinking_snacking_services, $hotel_id);
              update_field('conveniences_services', $hotel_conveniences_services, $hotel_id);
              update_field('kids_services', $hotel_kids_services, $hotel_id);
              update_field('getting_around_services', $hotel_getting_around_services, $hotel_id);
              update_field('room_type', $room_id_arr, $hotel_id);

              // Update Hotel Address
              /*$current_address = get_field('hotel_address', $hotel_id);
              if ( !empty($current_address) ) {
                foreach ($current_address as $current_add) {
                  if (!in_array($current_add, $hotel_address)) {
                    array_push($hotel_address, $current_add);
                  }
                }
                array_unique($hotel_address);
              }*/
              //delete_field( 'hotel_address', $hotel_id );
              //update_field( 'hotel_address', $hotel_address, $hotel_id );
            }
            break;

          case 'tour':
            // Check if more than one tour, then skip only one and delete all rooms.
            $args_tour = array(
              'numberposts' => -1,
              'post_type'   => 'tour',
              'meta_key'    => 'productid',
              'meta_value'  => $item['productid']
            );

            $custom_tours = Timber::get_posts( $args_tour );

            $custom_tour = array_shift($custom_tours);

            foreach ($custom_tours as $post_tour) {
              wp_delete_post( $post_tour->ID, true );
            }

            $departure_day = [];
            if ( $item['tour_departure_day'] ) {
              $departure_day = explode(';', $item['tour_departure_day']);
            }

            $tour_guild = 0;
            if ( !empty($item['tour_guild']) && ($item['tour_guild'] == 'true') ) {
              $tour_guild = 1;
            }

            $schedules_informations = [];
            if ( $item['schedules_informations'] ) {
              $schedule_arr = explode('|all|', $item['schedules_informations']);
              foreach ($schedule_arr as $schedule) {
                $schedule_value = [];
                $schedule_item = explode('|&|', $schedule);
                if (!empty($schedule_item[0])) {
                  $schedule_title = $schedule_item[0];
                  $schedule_desc = $schedule_item[1];
                  $schedule_hotel = $schedule_item[2];
                  $schedule_meals = $schedule_item[3];

                  $schedule_hotel_arr = explode(';', $schedule_hotel);
                  $hotel_ids = [];
                  $hotel_names = '';
                  foreach ($schedule_hotel_arr as $hotel) {
                    $hotel_title = get_page_by_title(trim($hotel), OBJECT, 'hotel');

                    if ( !empty($hotel_title) ) {
                      $hotel_id = $hotel_title->ID;

                      array_push($hotel_ids, $hotel_id);
                    } else {
                      $hotel_names = $hotel_names . '|&|' . $hotel;
                    }
                  }

                  $schedule_value = array(
                    'tour_schedule_name' => $schedule_title,
                    'tour_schedule_description' => $schedule_desc,
                    'tour_schedule_hotel' => $hotel_ids,
                    'tour_schedule_meals' => explode(', ', $schedule_meals),
                    'tour_schedule_hotel_not_yet' => $hotel_names
                  );

                  array_push($schedules_informations, $schedule_value);
                }
              }
            }

            // Tour Ffeatures
            $tour_features = [];
            if ( $item['tour_features'] ) {
              $tour_feature_arr = explode(';', $item['tour_features']);
              foreach ($tour_feature_arr as $type) {
                $type_slug = str_replace(' ', '_', vn_convert_to_en($type));
                if ( $type_slug && !term_exists($type_slug, 'tour_feature') ) {
                  wp_insert_term(
                    $type, // the term
                    'tour_feature', // the taxonomy
                    array(
                      'description' => '',
                      'slug'        => $type_slug
                    )
                  );
                }
                $term = term_exists($type_slug, 'tour_feature');
                array_push($tour_features, $term['term_id']);
              }
            }

            // Destination Taxonomy
            $destination_taxonomy = [];
            if ( $item['destination_taxonomy'] ) {
              $destination_taxonomy_arr = explode(';', $item['destination_taxonomy']);

              foreach ($destination_taxonomy_arr as $type) {
                $type_str = trim($type);
                $type_arr = explode('-', $type_str);

                if ( $type_arr[0] ) {
                  $type_parent  = trim($type_arr[0]);
                }
                if ( $type_arr[1] ) {
                  $type_child1  = trim($type_arr[1]);
                }
                if ( $type_arr[2] ) {
                  $type_child2  = trim($type_arr[2]);
                }

                if ( $type_parent ) {
                  $type_parent_slug = str_replace(' ', '_', vn_convert_to_en($type_parent));
                }
                if ( $type_child1 ) {
                  $type_child1_slug = str_replace(' ', '_', vn_convert_to_en($type_child1));
                }
                if ( $type_child2 ) {
                  $type_child2_slug = str_replace(' ', '_', vn_convert_to_en($type_child2));
                }

                if ( $type_parent && !term_exists($type_parent_slug, 'destination_taxonomy') ) {
                  wp_insert_term(
                    $type_parent, // the term
                    'destination_taxonomy', // the taxonomy
                    array(
                      'description' => '',
                      'slug'        => $type_parent_slug
                    )
                  );

                  // child lvl 1
                  $term_parent_arr = term_exists($type_parent_slug, 'destination_taxonomy');
                  if ( $type_child1 && !term_exists($type_child1_slug, 'destination_taxonomy') ) {
                    wp_insert_term(
                      $type_child1, // the term
                      'destination_taxonomy', // the taxonomy
                      array(
                        'description' => '',
                        'slug'        => $type_child1_slug,
                        'parent'      => $term_parent_arr['term_id']
                      )
                    );

                    // child lvl 2
                    $term_child1_arr = term_exists($type_child1_slug, 'destination_taxonomy');
                    if ( $type_child2 && !term_exists($type_child2_slug, 'destination_taxonomy') ) {
                      wp_insert_term(
                        $type_child2, // the term
                        'destination_taxonomy', // the taxonomy
                        array(
                          'description' => '',
                          'slug'        => $type_child2_slug,
                          'parent'      => $term_child1_arr['term_id']
                        )
                      );
                    }

                    // All child lvl 2
                    foreach ($type_arr as $key => $term) {
                      $term = trim($term);
                      $term_en = vn_convert_to_en($term);
                      $term_slug = str_replace(' ', '_', $term_en);
                      $term_exists = term_exists($term_slug, 'destination_taxonomy');
                      
                      if ( $key > 2 && !$term_exists ) {
                        wp_insert_term(
                          $term, // the term
                          'destination_taxonomy', // the taxonomy
                          array(
                            'description' => '',
                            'slug'        => $term_slug,
                            'parent'      => $term_child1_arr['term_id']
                          )
                        );
                      }
                    }
                  }
                } else {
                  $term_parent_arr = term_exists($type_parent_slug, 'destination_taxonomy');
                  if ( $type_child1 && !term_exists($type_child1_slug, 'destination_taxonomy') ) {
                    wp_insert_term(
                      $type_child1, // the term
                      'destination_taxonomy', // the taxonomy
                      array(
                        'description' => '',
                        'slug'        => $type_child1_slug,
                        'parent'      => $term_parent_arr['term_id']
                      )
                    );

                    // child 2
                    $term_child1_arr = term_exists($type_child1_slug, 'destination_taxonomy');
                    if ( $type_child2 && !term_exists($type_child2_slug, 'destination_taxonomy') ) {
                      wp_insert_term(
                        $type_child2, // the term
                        'destination_taxonomy', // the taxonomy
                        array(
                          'description' => '',
                          'slug'        => $type_child2_slug,
                          'parent'      => $term_child1_arr['term_id']
                        )
                      );
                    }

                    // All child lvl 2
                    foreach ($type_arr as $key => $term) {
                      $term = trim($term);
                      $term_en = vn_convert_to_en($term);
                      $term_slug = str_replace(' ', '_', $term_en);
                      $term_exists = term_exists($term_slug, 'destination_taxonomy');
                      
                      if ( $key > 2 && !$term_exists ) {
                        wp_insert_term(
                          $term, // the term
                          'destination_taxonomy', // the taxonomy
                          array(
                            'description' => '',
                            'slug'        => $term_slug,
                            'parent'      => $term_child1_arr['term_id']
                          )
                        );
                      }
                    }
                  } else {
                    $term_child1_arr = term_exists($type_child1_slug, 'destination_taxonomy');
                    if ( $type_child2 && !term_exists($type_child2_slug, 'destination_taxonomy') ) {
                      wp_insert_term(
                        $type_child2, // the term
                        'destination_taxonomy', // the taxonomy
                        array(
                          'description' => '',
                          'slug'        => $type_child2_slug,
                          'parent'      => $term_child1_arr['term_id']
                        )
                      );
                    }

                    // All child lvl 2
                    foreach ($type_arr as $key => $term) {
                      $term = trim($term);
                      $term_en = vn_convert_to_en($term);
                      $term_slug = str_replace(' ', '_', $term_en);
                      $term_exists = term_exists($term_slug, 'destination_taxonomy');
                      
                      if ( $key > 2 && !$term_exists ) {
                        wp_insert_term(
                          $term, // the term
                          'destination_taxonomy', // the taxonomy
                          array(
                            'description' => '',
                            'slug'        => $term_slug,
                            'parent'      => $term_child1_arr['term_id']
                          )
                        );
                      }
                    }
                  }
                }

                foreach ($type_arr as $term) {
                  $term = trim($term);
                  $term = vn_convert_to_en($term);
                  $term_slug = str_replace(' ', '_', $term);
                  $term_exists = term_exists($term_slug, 'destination_taxonomy');
                  if ( $term_exists ) {
                    array_push($destination_taxonomy, $term_exists['term_id']);
                  }
                }
              }

              $destination_taxonomy = array_unique($destination_taxonomy);
              $destination_taxonomy = array_filter($destination_taxonomy);
            }

            // Tour Tags
            $tour_tag = [];
            if ( $item['tour_tags'] ) {
              $tour_tag_arr = explode(';', $item['tour_tags']);
              foreach ($tour_tag_arr as $tag) {
                $tag_slug = str_replace(' ', '_', strtolower(vn_convert_to_en($tag)));
                if ( $tag_slug && !term_exists($tag_slug, 'tour_tag') ) {
                  wp_insert_term(
                    trim($tag), // the term
                    'tour_tag', // the taxonomy
                    array(
                      'description' => '',
                      'slug'        => $tag_slug
                    )
                  );
                }
                //$term = get_term_by('name', $tag, 'tour_tag');
                $term = term_exists($tag_slug, 'tour_tag');
                $term_obj = get_term_by('id', $term['term_id'], 'tour_tag');
                array_push($tour_tag, $term_obj->name);
              }
            }

            // Create or Update room by ID (productid)
            if (empty($custom_tour)) {
              // Create post object
              $my_post = array(
                'ID'            => '',
                'post_title'    => $item['product_name'],
                'post_status'   => 'publish',
                'post_type'     => 'tour'
              );

              // Insert the post into the database
              $post_id = wp_insert_post($my_post);
              array_push($zohocrm_importid, $item['productid']);
              wp_set_post_terms( $post_id, $tour_features, 'tour_feature' );
              wp_set_post_terms( $post_id, $destination_taxonomy, 'destination_taxonomy' );
              wp_set_post_terms( $post_id, $tour_tag, 'tour_tag' );
              update_field('productid', $item['productid'], $post_id);
              update_field('tour_code', $item['product_code'], $post_id);
              update_field('tour_destination', $item['tour_destination'], $post_id);
              update_field('tour_description', $item['description'], $post_id);
              update_field('number_of_day', $item['tour_number_of_day'], $post_id);
              update_field('number_of_night', $item['tour_number_of_night'], $post_id);
              update_field('departure_day', $departure_day, $post_id);
              update_field('tour_type', $item['tour_type'], $post_id);
              update_field('tour_price', $item['unit_price'], $post_id);
              update_field('custom_exchange', $item['custom_exchange_rate'], $post_id);
              update_field('tour_weekend_surcharge', $item['weekend_surcharge'], $post_id);
              update_field('child_price_less_5_years', $item['child_price_less_5_years'], $post_id);
              update_field('child_price_6_to_11_years', $item['child_price_6_to_11_years'], $post_id);
              update_field('child_price_more_11_years', $item['child_price_more_11_years'], $post_id);
              update_field('tour_surcharge', $item['surcharge'], $post_id);
              update_field('holidays_surcharge', $item['holidays_surcharge'], $post_id);
              update_field('holidays', $item['holidays'], $post_id);
              update_field('tour_include', $item['tour_include'], $post_id);
              update_field('tour_exclude', $item['tour_exclude'], $post_id);
              update_field('tour_attention', $item['tour_attention'], $post_id);
              update_field('tour_special_request', $item['tour_special_request'], $post_id);
              update_field('tour_guild', $tour_guild, $post_id);
              update_field('tour_schedules', $schedules_informations, $post_id);
            } else {
              // Update post object
              $post_id = $custom_tour->ID;
              array_push($zohocrm_updateid, $item['productid']);
              wp_set_post_terms( $post_id, $tour_features, 'tour_feature' );
              wp_set_post_terms( $post_id, $destination_taxonomy, 'destination_taxonomy' );
              wp_set_post_terms( $post_id, $tour_tag, 'tour_tag' );
              update_field('productid', $item['productid'], $post_id);
              update_field('tour_code', $item['product_code'], $post_id);
              update_field('tour_destination', $item['tour_destination'], $post_id);
              update_field('tour_description', $item['description'], $post_id);
              update_field('number_of_day', $item['tour_number_of_day'], $post_id);
              update_field('number_of_night', $item['tour_number_of_night'], $post_id);
              update_field('departure_day', $departure_day, $post_id);
              update_field('tour_type', $item['tour_type'], $post_id);
              update_field('tour_price', $item['unit_price'], $post_id);
              update_field('custom_exchange', $item['custom_exchange_rate'], $post_id);
              update_field('tour_weekend_surcharge', $item['weekend_surcharge'], $post_id);
              update_field('child_price_less_5_years', $item['child_price_less_5_years'], $post_id);
              update_field('child_price_6_to_11_years', $item['child_price_6_to_11_years'], $post_id);
              update_field('child_price_more_11_years', $item['child_price_more_11_years'], $post_id);
              update_field('tour_surcharge', $item['surcharge'], $post_id);
              update_field('holidays_surcharge', $item['holidays_surcharge'], $post_id);
              update_field('holidays', $item['holidays'], $post_id);
              update_field('tour_include', $item['tour_include'], $post_id);
              update_field('tour_exclude', $item['tour_exclude'], $post_id);
              update_field('tour_attention', $item['tour_attention'], $post_id);
              update_field('tour_special_request', $item['tour_special_request'], $post_id);
              update_field('tour_guild', $tour_guild, $post_id);
              update_field('tour_schedules', $schedules_informations, $post_id);
            }
            break;

          default:
            // Check if more than one room, then skip only one and delete all rooms.
            $args_custom_post = array(
              'numberposts' => -1,
              'post_type'   => $zohocrm_type,
              'meta_key'    => 'productid',
              'meta_value'  => $item['productid']
            );

            $custom_posts = Timber::get_posts( $args_custom_post );

            $custom_post = array_shift($custom_posts);

            foreach ($custom_posts as $post_item) {
              wp_delete_post( $post_item->ID, true );
            }

            // Create or Update room by ID (productid)
            if (empty($custom_post)) {
              // Create post object
              $my_post = array(
                'ID'            => '',
                'post_title'    => $item['product_name'],
                'post_status'   => 'publish',
                'post_type'     => $zohocrm_type
              );

              // Insert the post into the database
              $post_id = wp_insert_post($my_post);
              array_push($zohocrm_importid, $item['productid']);
              update_field('productid', $item['productid'], $post_id);
            } else {
              // Update post object
              $post_id = $custom_post->ID;
              array_push($zohocrm_updateid, $item['productid']);
              update_field('productid', $item['productid'], $post_id);
            }
            break;
        }
      }

      if (count($zohocrm_importid) >= 1) {
        $zohocrm_import_success = __('Imported ', 'zoho_crm') . count($zohocrm_importid) . ' ' . $zohocrm_type . 's';
      }

      if (count($zohocrm_updateid) >= 1) {
        $zohocrm_update_success = __('Updated ', 'zoho_crm') . count($zohocrm_updateid) . ' ' . $zohocrm_type . 's';
      }

      $GLOBALS['zohocrm_success'] = '<div>' . $zohocrm_import_success . '</div><div>' . $zohocrm_update_success . '</div>';
    }
  }
}

function zohocrm_remove_content() {
  if( isset($_POST['zohocrm_posttype']) ) {
    $zohocrm_posttype = $_POST['zohocrm_posttype'];
    $post_type_rmv = [$zohocrm_posttype];

    switch ($zohocrm_posttype) {
      case 'hotel':
        array_push($post_type_rmv, 'room');
        break;

      default:
        # code...
        break;
    }

    $post_rm = new WP_Query(array(
      'post_type' => $post_type_rmv,
      'posts_per_page' => -1
    ));

    $post_id = [];
    if($post_rm->have_posts() ) {
      while($post_rm->have_posts() ) {
        $post_rm->the_post();
        array_push($post_id, $post_rm->post->ID);
        wp_delete_post( $post_rm->post->ID, true );
      }
    }
    $GLOBALS['zohocrm_success'] = '<div>' . __('Removed ', 'zoho_crm') . count($post_id) . ' ' . str_replace('|', ' and ', $_POST['zohocrm_posttype']) . '</div>';
  }
}

/* 2283310000000284079;2283310000000284078;2283310000000284077

2283310000000284079
2283310000000284078
2283310000000284077
2283310000000284076
2283310000000284075
2283310000000284074
2283310000000284073
2283310000000284072
2283310000000284071
2283310000000284070
2283310000000284069
2283310000000284068
2283310000000284067
2283310000000283078

$behan_url = file_get_contents('http://www.behance.net/v2/projects/55273731?api_key=mDCusDZUt6o15jY0YCsIsmzfIDJu3zh5');
$behan_json = json_decode($behan_url);
print_r($behan_json);
die();*/
