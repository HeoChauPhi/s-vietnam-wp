<?php
$zohocrm_posttype = $zohocrm_options['products_categories'];

if (!empty($zohocrm_posttype) && $zohocrm_posttype != null) {

  $zohocrm_posttype_arr = [];
  $zohocrm_posttype_active = explode('|', $zohocrm_posttype);
  foreach ($zohocrm_posttype_active as $posttype) {
    $posttype_arr = explode('=', $posttype);
    $zohocrm_posttype_arr[$posttype_arr[0]] = $posttype_arr[1];
  }

  foreach ($zohocrm_posttype_arr as $key => $post_type) {
    // Create Post type
    switch ($key) {
      case 'hotel':
        // Hotel
        add_action('init', function() use ($key, $post_type) {
          register_post_type( $key, array(
            'labels' => array(
              'name' => __( $post_type, 'zoho_crm' ),
              'singular_name' => __( $post_type, 'zoho_crm' )
            ),
            'public' => true,
            'has_archive' => false,
            'menu_position' => 28,
            'rewrite' => array('slug' => $key),
            'supports' => array( 'title' ),
          ));
        });
        // Rooms
        add_action('init', function() {
          register_post_type( 'room', array(
            'labels' => array(
              'name' => __( 'Rooms', 'zoho_crm' ),
              'singular_name' => __( 'Room', 'zoho_crm' )
            ),
            'public' => true,
            'has_archive' => false,
            'menu_position' => 30,
            'rewrite' => array('slug' => 'room'),
            'supports' => array( 'title' ),
          ));
        });
        break;

      case 'tour':
        add_action('init', function() use ($key, $post_type) {
          register_post_type( 'tour', array(
            'labels' => array(
              'name' => __( 'Tours', 'zoho_crm' ),
              'singular_name' => __( 'Tour', 'zoho_crm' )
            ),
            'public' => true,
            'has_archive' => false,
            'menu_position' => 28,
            'rewrite' => array('slug' => 'tour'),
            'supports' => array( 'title' ),
          ));
        });
        add_action( 'init', function() use ($key, $post_type) {
          register_taxonomy('tour_feature', array('tour'), array(
            'labels'                   => array(
              'name'          => __('Tour Features', 'pdj_theme'),
              'singular'      => __('Tour Feature', 'pdj_theme'),
              'menu_name'     => __('Tour Feature', 'pdj_theme')
            ),
            'hierarchical'              => true,
            'public'                    => true,
            'show_ui'                   => true,
            'show_in_menu'              => true,
            'show_admin_column'         => true,
            'show_in_nav_menus'         => true,
            'show_tagcloud'             => true,
          ));
          register_taxonomy('destination_taxonomy', array('tour'), array(
            'labels'                   => array(
              'name'          => __('Destination Taxonomies', 'pdj_theme'),
              'singular'      => __('Destination Taxonomy', 'pdj_theme'),
              'menu_name'     => __('Destination Taxonomy', 'pdj_theme')
            ),
            'hierarchical'              => true,
            'public'                    => true,
            'show_ui'                   => true,
            'show_in_menu'              => true,
            'show_admin_column'         => true,
            'show_in_nav_menus'         => true,
            'show_tagcloud'             => true,
          ));
          register_taxonomy('tour_tag', array('tour'), array(
            'labels'                   => array(
              'name'          => __('Tour Tags', 'pdj_theme'),
              'singular'      => __('Tour Tags', 'pdj_theme'),
              'menu_name'     => __('Tour Tags', 'pdj_theme')
            ),
            'hierarchical'              => false,
            'public'                    => true,
            'show_ui'                   => true,
            'show_in_menu'              => true,
            'show_admin_column'         => true,
            'show_in_nav_menus'         => true,
            'show_tagcloud'             => true,
          ));
        }, 0 );
        break;

      default:
        add_action('init', function() use ($key, $post_type) {
          register_post_type( $key, array(
            'labels' => array(
              'name' => __( $post_type, 'zoho_crm' ),
              'singular_name' => __( $post_type, 'zoho_crm' )
            ),
            'public' => true,
            'has_archive' => false,
            'menu_position' => 28,
            'rewrite' => array('slug' => $key),
            'supports' => array( 'title' ),
          ));
        });
        break;
    }
  }
}

/*function get_custom_post_type_template($single_template) {
    global $wp_query, $post;

     if ( $post->post_type == 'khach_san' ) {
          $single_template = plugin_dir_path( __FILE__ ) . '/post-type-template.php';
     }
     return $single_template;
}
add_filter( 'single_template', 'get_custom_post_type_template', 99 );*/
