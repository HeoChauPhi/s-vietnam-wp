<?php
add_shortcode('share_buttons', 'share_buttons_render');
function share_buttons_render($attrs) {
  extract(shortcode_atts (array(
    'facebook'  => '',
    'twitter'   => '',
    'linkedin'  => ''
  ), $attrs));

  ob_start();
    $context                = Timber::get_context();
    $context['permalink']   = urlencode(get_the_permalink());
    $context['title']       = urlencode(get_the_title());
    $context['facebook']    = $facebook;
    $context['twitter']     = $twitter;
    $context['linkedin']    = $linkedin;
    try {
    Timber::render( array( 'social-detail.twig'), $context );
    } catch (Exception $e) {
      echo __('Could not find a twig file for Shortcode Name: social-detail.twig', 'pdj_theme');
    }
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
  wp_reset_postdata();
}

// --> Disable term format shortcode
add_shortcode( 'customtax', 'create_customtax' );
function create_customtax($attrs) {
  extract(shortcode_atts (array(
    'tax_name' => ''
  ), $attrs));
  ob_start();
    taxvalue($tax = $tax_name); // This function in theme-init.php
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}

// View List
add_shortcode( 'view_list', 'pdj_view_list' );
function pdj_view_list($attrs) {
  extract(shortcode_atts (array(
    'name'        => '',
    'post_type'   => '',
    'per_page'    => -1,
    'cat_slug'      => '',
    'custom_fields' => '',
    'use_pagination' => '',
    'pagination_type' => '',
    'current_paged' => '',
    'filter_select' => 1,
    'show_popup_file' => '',
  ), $attrs));

  ob_start();
    global $paged;
    global $post;
    if (!isset($paged) || !$paged){
      $paged = $current_paged;
    }

    $filter_array = array();
    $meta_query = array('relation' => 'OR',);

    if($custom_fields){
      $fields = explode("+", $custom_fields);
      foreach ($fields as $item) {
        $item_exp = explode('//value//', $item);
        $item_slug_exp = explode('//slug//', $item_exp[0]);
        $item_slug = $item_slug_exp[1];
        //$item_vals = str_replace(" ", "", $item_exp[1]);
        $item_val = $item_exp[1];

        $filter_array['key'] = $item_slug;
        $filter_array['value'] = $item_exp[1];
        $filter_array['compare'] = '=';
        array_push($meta_query, $filter_array);
      }
    }

    $tax_filter = array();
    $tax_query = array('relation' => 'AND',);

    $taxonomy_objects = get_object_taxonomies( $post_type );
    if (!empty($taxonomy_objects[0])){
      $taxonomy_name = $taxonomy_objects[0];
    } else {
      $taxonomy_name = '';
    }

    if ($cat_slug) {
      $cat_exp = explode(',', $cat_slug);
      $cat_items = array();
      foreach ($cat_exp as $cat_item) {
        $item_str = str_replace(' ', '', $cat_item);
        array_push($cat_items, $item_str);
      }
      $tax_filter = array(
        'taxonomy' => $taxonomy_name,
        'field' => 'slug',
        'terms' => $cat_items
      );
      array_push($tax_query, $tax_filter);
    }

    $context = Timber::get_context();
    if($custom_fields) {
      $args = array(
        'post_type'       => $post_type,
        'posts_per_page'  => $per_page,
        'tax_query'       => $tax_query,
        'post_status'     => 'publish',
        'paged'           => $paged,
        'meta_query'      => $meta_query,
      );
    } else {
      $args = array(
        'post_type'       => $post_type,
        'posts_per_page'  => $per_page,
        'tax_query'       => $tax_query,
        'post_status'     => 'publish',
        'paged'           => $paged,
      );
    }

    query_posts($args);
    $posts = Timber::get_posts($args);
    $context['posts'] = $posts;

    $args_pagi = array(
      'base' => get_pagenum_link(1) . '%_%',
      'format' => 'page/%#%',
    );

    switch ($name) {
      case 'media-press-releases':
        $context['filter_item'] = Timber::get_posts(array(
          'post_type'       => $post_type,
          'posts_per_page'  => -1,
          'post_status'          => 'publish',
        ));
        $context['filter_select'] = $filter_select;
        break;
    }

    $context['pager_base_url'] = get_pagenum_link(1);
    $context['pagination_type'] = $pagination_type;
    $context['use_pagination'] = $use_pagination;
    $context['show_popup_file'] = $show_popup_file;
    $context['pagination'] = Timber::get_pagination($args_pagi);

    try {
    Timber::render( array( 'view-' . $name . '.twig', 'views.twig'), $context );
    } catch (Exception $e) {
      echo __('Could not find a twig file for Shortcode Name: ', 'pdj_theme') . $name;
    }

    $content = ob_get_contents();
  ob_end_clean();
  return $content;
  wp_reset_postdata();
}

// --> Mega menu view list post
add_shortcode( 'mega_menu_post', 'create_mega_menu_post' );
function create_mega_menu_post($attrs) {
  extract(shortcode_atts (array(
    'post_type'       => '',
  ), $attrs));
  ob_start();

    $context = Timber::get_context();

    $args = array(
      'post_type'   => $post_type,
      'posts_per_page'  => 10,
      'post_status'     => 'publish',
    );

    $posts = Timber::get_posts($args);
    if ( $post_type == 'tour' ) {
      $context['terms'] = Timber::get_terms('tour_feature');
    } else {
      $context['terms'] = Timber::get_terms('hotel_area');
    }
    
    $context['posts'] = $posts;

    try {
    Timber::render( array( 'mega-menu-post.twig'), $context );
    } catch (Exception $e) {
      echo __('Could not find a mega-menu-post.twig file for Shortcode.', 'pdj_theme');
    }
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}

// Shortcode List page
add_shortcode( 'template_list_page', 'pdj_create_template_list_page' );
function pdj_create_template_list_page($attrs) {
  extract(shortcode_atts (array(
    'post_type'     => '',
    'per_page'      => -1,
    'offset'        => '',
    'current_paged' => 1,
    'sort_layout'   => ''
  ), $attrs));
  ob_start();
    global $paged;
    if (!isset($paged) || !$paged){
      $paged = $current_paged;
    }

    $context = Timber::get_context();

    $args = array(
      'post_type'       => $post_type,
      'posts_per_page'  => $per_page,
      'post_status'     => 'publish',
      'orderby'         => 'title',
      'order'           => 'ASC',
      'offset'          => $offset,
      'paged'           => $paged
    );

    query_posts($args);
    $posts = Timber::get_posts($args);

    /*if ( $post_type == 'hotel' ) {
      foreach ($posts as $post) {
        $room_prices = [];
        $rooms = get_field('room_type', $post->ID);
        //print_r($rooms);

        foreach ($rooms as $room) {
          $room_price = get_field('hotel_price_public', $room->ID);
          array_push($room_prices, array(
            'room_id' => $room->ID,
            'room_price' => $room_price
          ));
        }

        usort($room_prices, function($a, $b) {
          return (int) $a['room_price'] - (int) $b['room_price'];
        });

        $post->room_id_min = $room_prices[0]['room_id'];
        $post->room_price_min = $room_prices[0]['room_price'];
      }
    }*/

    $context['page_post_type'] = $post_type;
    $context['posts'] = $posts;

    $context['pagination']    = Timber::get_pagination($args_pagination['size'] = 999999999);
    $context['current_paged'] = $context['pagination']['current'];
    $context['per_page']      = $per_page;
    $context['sort_layout']   = $sort_layout;

    try {
    Timber::render( array( 'shortcode-list-page.twig'), $context );
    } catch (Exception $e) {
      echo __('Could not find a shortcode-list-page.twig file for Shortcode.', 'pdj_theme');
    }
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}

// Shortcode List page Item
add_shortcode( 'template_list_page_item', 'pdj_create_template_list_page_item' );
function pdj_create_template_list_page_item($attrs) {
  extract(shortcode_atts (array(
    'post_type'     => '',
    'per_page'      => -1,
    'offset'        => '',
    'sort_layout'   => '',
    'sort_by_price' => '',
    'tour_date'     => ''
  ), $attrs));
  ob_start();
    //echo $tour_date;

    global $paged;
    if (!isset($paged) || !$paged){
      $paged = 1;
    }

    $context = Timber::get_context();

    $args = array(
      'post_type'       => $post_type,
      'posts_per_page'  => $per_page,
      'post_status'     => 'publish',
      'offset'          => $offset,
      'paged'           => $paged,
      'meta_query'      => array(
        'relation' => 'AND',
      ),
    );

    if ( $post_type == 'tour' ) {
      $sort_price_key = 'tour_price';
    } elseif ( $post_type == 'hotel' ) {
      $sort_price_key = 'hotel_price_min';
    }

    if ( $tour_date ) {
      $date = strtotime($tour_date);
      $day_of_date = date('l', $date);

      $args['meta_query'][] = array(
        'key'   => 'departure_day',
        'value'     => $day_of_date,
        'compare'   => 'REGEXP',
      );
    }

    if ($sort_by_price == 'lth') {
      $meta_query = array(
        'key' => $sort_price_key,
        'compare'   => 'EXISTS',
      );

      $orderby = array(
        'sort_price_clause' => 'ASC',
      );

      $args['meta_query']['sort_price_clause'] = $meta_query;
      $args['orderby'] = $orderby;
      
    } else if ($sort_by_price == 'htl') {
      $meta_query = array(
        'key' => $sort_price_key,
        'compare'   => 'EXISTS',
      );

      $orderby = array(
        'sort_price_clause' => 'DESC',
      );

      $args['meta_query']['sort_price_clause'] = $meta_query;
      $args['orderby'] = $orderby;

    } else {
      $args['orderby'] = 'title';
      $args['order'] = 'ASC';
    }

    //print_r($args);
    query_posts($args);
    $posts                        = Timber::get_posts($args);
    $context['posts']             = $posts;
    $context['sort_layout']       = $sort_layout;
    $pagination                   = Timber::get_pagination();
    $context['pagination_total']  = $pagination['total'];

    try {
    Timber::render( array( 'shortcode-list-page-item.twig'), $context );
    } catch (Exception $e) {
      echo __('Could not find a shortcode-list-page-item.twig file for Shortcode.', 'pdj_theme');
    }
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}

// Shortcode Tour Price
add_shortcode( 'price_update', 'pdj_create_price_update' );
function pdj_create_price_update($attrs) {
  extract(shortcode_atts (array(
    'post_id'         => '',
    'date_include'    => ''
  ), $attrs));
  ob_start();
    $date = strtotime($date_include);
    $day_of_date = date('l', $date);

    $context = Timber::get_context();
    $context['date_include'] = date('d/m/Y', $date);
    $context['day_of_date'] = $day_of_date;
    $context['post_id'] = $post_id;

    $posts = new TimberPost($post_id);
    $context['post'] = $posts;

    try {
    Timber::render( array( 'shortcode-price-update.twig'), $context );
    } catch (Exception $e) {
      echo __('Could not find a shortcode-price-update.twig file for Shortcode.', 'pdj_theme');
    }
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}

// Shortcode Tour Hotels
add_shortcode( 'hotel_update', 'pdj_create_hotel_update' );
function pdj_create_hotel_update($attrs) {
  extract(shortcode_atts (array(
    'hotel_id'         => '',
    'date_include'    => ''
  ), $attrs));
  ob_start();

    $date = strtotime($date_include);
    $date_include = date('d/m/Y', $date);

    if ( empty($hotel_id) ) {
      $hotel_id = -1;
    }

    $hotel_return = [];
    $hotel_id_arr = explode(';', $hotel_id);
    $hotel_id_arr = array_filter($hotel_id_arr);
    $hotel_id_arr = array_unique($hotel_id_arr);

    foreach ($hotel_id_arr as $hotel) {
      $sale_date = [];

      $roh_price = get_field('roh_price', $hotel);

      $low_season   = get_field('low_season', $hotel);
      $high_season  = get_field('high_season', $hotel);
      $holidays     = get_field('holidays', $hotel);
      array_push($sale_date, $low_season, $high_season, $holidays);

      $short_hotel_dates = array_filter($sale_date);
      $hotel_dates_we = [];

      foreach ($short_hotel_dates as $item) {
        if ( stripos($item, 'WE') != false ) {
          array_push($hotel_dates_we, $item);
        }
      }

      $hotel_dates = array_diff($short_hotel_dates, $hotel_dates_we);
      $hotel_dates = implode(';', $hotel_dates);
      $hotel_dates = date_range_by_string($hotel_dates);

      if ( in_array($date_include, $hotel_dates) ) {
        array_push($hotel_return, $hotel . '=' . number_format($roh_price));
      } else {
        array_push($hotel_return, $hotel . '=');
      }
    }

    echo implode('|', $hotel_return);

    /*$date = strtotime($date_include);
    $day_of_date = date('l', $date);

    $context = Timber::get_context();
    $context['date_include'] = date('d/m/Y', $date);
    $context['day_of_date'] = $day_of_date;
    $context['post_id'] = $post_id;

    $posts = new TimberPost($post_id);*/

  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}