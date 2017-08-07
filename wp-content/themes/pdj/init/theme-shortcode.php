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
    $context['terms'] = Timber::get_terms('tour_type');
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