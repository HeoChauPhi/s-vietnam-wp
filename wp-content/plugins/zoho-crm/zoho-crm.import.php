<?php

$zohocrm_options = get_option('zoho_crm_board_settings');
$zohocrm_author_token  = strrev($zohocrm_options['author_token']);

//global $zohocrm_url_request;
$GLOBALS['zohocrm_url_request'] = 'https://crm.zoho.com/crm/private/json/Products/getRecordById?authtoken=' . $zohocrm_author_token . '&scope=crmapi&idlist=';

function zohocrm_insert_content() {
  if( isset($_POST['zohocrm_type']) ) {
    $zohocrm_type = $_POST['zohocrm_type'];
  }

  if( isset($_POST['zohocrm_productids']) ) {
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

    $zohocrm_data_return = [];
    foreach($zohocrm_data as $value){
      $zohocrm_data_return[$value['product_name']][] = $value;
    }

    if (!empty($zohocrm_data_return) && !empty($zohocrm_type)) {
      $zohocrm_importid = [];
      $zohocrm_updateid = [];

      foreach ($zohocrm_data_return as $key => $item) {

        foreach ($item as $key_value => $value) {
          switch ($zohocrm_type) {
            case 'hotel':
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

              if (empty($room)) {
                // Create post object
                $my_post = array(
                  'ID'            => '',
                  'post_title'    => $value['room_type'],
                  'post_status'   => 'publish',
                  'post_type'     => 'room'
                );
                
                // Insert the post into the database
                $post_id = wp_insert_post($my_post);
                array_push($zohocrm_importid, $value['productid']);
                update_field('productid', $value['productid'], $post_id);
                update_field('unit_price', $value['unit_price'], $post_id);
                update_field('sales_start_date', $value['sales_start_date'], $post_id);
                update_field('sales_end_date', $value['sales_end_date'], $post_id);
              } else {
                $post_id = $post->ID;
                array_push($zohocrm_updateid, $value['productid']);
                update_field('productid', $value['productid'], $post_id);
                update_field('unit_price', $value['unit_price'], $post_id);
                update_field('sales_start_date', $value['sales_start_date'], $post_id);
                update_field('sales_end_date', $value['sales_end_date'], $post_id);
              }

              $rooms_id = [];
              $id_imported = array_merge($zohocrm_updateid, $zohocrm_importid);

              $args_room_id = array(
                'numberposts' => -1,
                'post_type'   => 'room',
                'meta_key'    => 'productid',
                'meta_value'  => $id_imported
              );

              $all_rooms_imported = Timber::get_posts( $args_room_id );

              foreach ($all_rooms_imported as $room) {
                array_push($rooms_id, $room->ID);
              }

              $hotel = get_page_by_title($key, OBJECT, 'hotel');

              if(!empty($hotel)) {
                $hotel_id = $hotel->ID;

                $rooms_relationship = get_field('room_type', $hotel_id);

                foreach ($rooms_relationship as $room) {
                  if (!in_array($room->ID, $rooms_id)) {
                    array_push($rooms_id, $room->ID);
                  }
                }

                update_field('room_type', $rooms_id, $hotel_id);
              } else {
                $args_hotel = array(
                  'ID'            => '',
                  'post_title'    => $key,
                  'post_status'   => 'publish',
                  'post_type'     => $zohocrm_type
                );

                $hotel_id = wp_insert_post($args_hotel);
                update_field('room_type', $rooms_id, $hotel_id);
              }

              break;
            
            default:
              echo __('select Hotel', 'zoho_crm');
              break;
          }
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
    $zohocrm_posttype = explode('|', $_POST['zohocrm_posttype']);
  }

  $post_rm = new WP_Query(array(
    'post_type' => $zohocrm_posttype,
    'posts_per_page' => -1
  ));

  if($post_rm->have_posts() ) {
    while($post_rm->have_posts() ) {
      $post_rm->the_post();
      wp_delete_post( $post_rm->post->ID, true );
    }
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