<?php
/*
 *  Author: Framework | @Framework
 *  URL: wordfly.com | @wordfly
 *  Custom functions, support, custom post types and more.
 */
@ini_set( 'upload_max_size' , '64M' );

/*ini_set('log_errors','On');
ini_set('display_errors','On');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);*/

// Theme setting
require_once('init/theme-init.php');
require_once('init/theme-shortcode.php');
require_once('init/options/option.php');

/* Custom for theme */
//echo get_stylesheet_directory_uri();

if(!is_admin()) {
  // Add scripts
  function ct_libs_scripts() {
    wp_register_script('moment', ('//cdnjs.cloudflare.com/ajax/libs/moment.js/2.16.0/moment.min.js'), false, '2.16.0'); 
    wp_enqueue_script('moment');

    wp_register_script('lib-mousewheel', get_stylesheet_directory_uri() . '/dist/js/libs/jquery.mousewheel.js', array('jquery'), FALSE, '3.1.12', TRUE);
    wp_enqueue_script('lib-mousewheel');

    wp_register_script('lib-slick', get_stylesheet_directory_uri() . '/dist/js/libs/slick.js', array('jquery'), FALSE, '0.7.0', TRUE);
    wp_enqueue_script('lib-slick');

    wp_register_script('lib-matchHeight', get_stylesheet_directory_uri() . '/dist/js/libs/jquery.matchHeight-min.js', array('jquery'), FALSE, '0.7.0', TRUE);
    wp_enqueue_script('lib-matchHeight');

    wp_register_script('lib-youtubebackground', get_stylesheet_directory_uri() . '/dist/js/libs/jquery.youtubebackground.js', array('jquery'), FALSE, '1.0.5', TRUE);
    wp_enqueue_script('lib-youtubebackground');

    wp_register_script('lib-fancybox', get_stylesheet_directory_uri() . '/dist/js/libs/jquery.fancybox.pack.js', array('jquery'),  FALSE, '2.1.5', TRUE);
    wp_enqueue_script('lib-fancybox');

    wp_register_script('lib-daterangepicker', get_stylesheet_directory_uri() . '/dist/js/libs/jquery.daterangepicker.js', array('jquery'),  FALSE, '0.15.0', TRUE);
    wp_enqueue_script('lib-daterangepicker');

    wp_register_script('lib-select2', get_stylesheet_directory_uri() . '/dist/js/libs/select2.min.js', array('jquery'),  FALSE, '4.0.3', TRUE);
    wp_enqueue_script('lib-select2');

    wp_register_script('script', get_stylesheet_directory_uri() . '/dist/js/script.js', FALSE, '1.0.0', TRUE);
    wp_localize_script( 'script', 'paginationAjax', array( 'ajaxurl' => admin_url('admin-ajax.php' )));
    wp_enqueue_script('script');
    wp_register_script('jquery-ui', ('//code.jquery.com/ui/1.12.1/jquery-ui.js'), false, '1.12.1'); 
    wp_enqueue_script('jquery-ui');  
  }
  add_action('wp_print_scripts', 'ct_libs_scripts');

  // Add stylesheet
  function ct_styles() {
    $styles = get_stylesheet_directory_uri() . '/dist/css/styles.css';
    wp_register_style('theme-style', $styles, array(), '1.0', 'all');
    wp_enqueue_style('theme-style');
  }
  add_action('wp_enqueue_scripts', 'ct_styles');
}

// Add admin script
function ct_admin_scripts() {
  wp_register_script('lib-moment', get_stylesheet_directory_uri() . '/dist/js/admin-libs/moment.js', array('jquery'), '2.13.0');
  wp_enqueue_script('lib-moment');

  wp_register_script('lib-datetimepicker', get_stylesheet_directory_uri() . '/dist/js/admin-libs/bootstrap-datetimepicker.min.js', array('jquery'), '4.17.37');
  wp_enqueue_script('lib-datetimepicker');

  wp_register_script('admin-script', get_stylesheet_directory_uri() . '/dist/js/admin-script.js', array('jquery'), '1.0.0');
  wp_enqueue_script('admin-script');
}
add_action('admin_init', 'ct_admin_scripts');

// Add admin script
function ct_admin_styles() {
  wp_register_style('admin-style', get_stylesheet_directory_uri() . '/dist/css/admin.css', array(), '1.0', 'all');
  wp_enqueue_style('admin-style');
}
add_action('admin_init', 'ct_admin_styles');

// JS for reset ACF field
//add_action( 'admin_print_scripts-post-new.php', 'ct_reset_acf_admin_script', 11 );
function ct_reset_acf_admin_script() {
  global $post_type;
  // Post type = "post" or "page" you can load script wheater it is post or page , if page then change 'post' to 'page' in below condition

  if( ('tour' == $post_type) )
  wp_enqueue_script( 'reset-acf-admin-script', get_stylesheet_directory_uri() . '/dist/js/acf-default.js' );
}

/*
 *
 * Add custom post type
 *
 */
function ct_create_custom_post_types() {
  // Tours
  register_post_type( 'tour', array(
    'labels' => array(
      'name' => __( 'Tours', 'pdj_theme' ),
      'singular_name' => __( 'Tour', 'pdj_theme' )
    ),
    'public' => true,
    'has_archive' => false,
    'menu_position' => 28,
    'rewrite' => array('slug' => 'tour'),
    'supports' => array( 'title', 'thumbnail' ),
  ));
  // Hotel
  register_post_type( 'hotel', array(
    'labels' => array(
      'name' => __( 'Hotels', 'pdj_theme' ),
      'singular_name' => __( 'Hotel', 'pdj_theme' )
    ),
    'public' => true,
    'has_archive' => false,
    'menu_position' => 29,
    'rewrite' => array('slug' => 'hotel'),
    'supports' => array( 'title' ),
  ));
  // Rooms
  register_post_type( 'room', array(
    'labels' => array(
      'name' => __( 'Rooms', 'pdj_theme' ),
      'singular_name' => __( 'Room', 'pdj_theme' )
    ),
    'public' => true,
    'has_archive' => false,
    'menu_position' => 30,
    'rewrite' => array('slug' => 'room'),
    'supports' => array( 'title', 'editor' ),
  ));
  // Fly Ticket
  register_post_type( 'fly_ticket', array(
    'labels' => array(
      'name' => __( 'Fly Tickets', 'pdj_theme' ),
      'singular_name' => __( 'Fly Ticket', 'pdj_theme' )
    ),
    'public' => true,
    'has_archive' => false,
    'menu_position' => 31,
    'rewrite' => array('slug' => 'fly_ticket'),
    'supports' => array( 'title', 'editor' ),
  ));
}
add_action( 'init', 'ct_create_custom_post_types' );

/*
 *
 * Custom Taxonomy
 *
 */
function ct_create_custom_taxonomy() {
  // Tour Service Taxonomy
  $labels_tour_service = array(
    'name'          => __('Tour Services', 'pdj_theme'),
    'singular'      => __('Tour Service', 'pdj_theme'),
    'menu_name'     => __('Tour Service', 'pdj_theme')
  );
  $args_tour_service = array(
    'labels'                    => $labels_tour_service,
    'hierarchical'              => true,
    'public'                    => true,
    'show_ui'                   => true,
    'show_in_menu'              => true,
    'show_admin_column'         => true,
    'show_in_nav_menus'         => true,
    'show_tagcloud'             => true,
    'show_in_quick_edit'        => false,
    'capabilities'              => array (
      'assign_terms' => 'manage_options',
    ),
  );
  register_taxonomy('tour_service', array('tour'), $args_tour_service);

  // Tour Type Taxonomy
  $labels_tour_type = array(
    'name'          => __('Tour Types', 'pdj_theme'),
    'singular'      => __('Tour Type', 'pdj_theme'),
    'menu_name'     => __('Tour Type', 'pdj_theme')
  );
  $args_tour_type = array(
    'labels'                    => $labels_tour_type,
    'hierarchical'              => true,
    'public'                    => true,
    'show_ui'                   => true,
    'show_in_menu'              => true,
    'show_admin_column'         => true,
    'show_in_nav_menus'         => true,
    'show_tagcloud'             => true,
  );
  register_taxonomy('tour_type', array('tour'), $args_tour_type);
}
add_action( 'init', 'ct_create_custom_taxonomy', 0 );

// Remove Add New Categories Link
function ct_css_for_admin() {
  global $pagenow;
  if(is_admin()){ ?>
    <style type="text/css">
      #tour_service-adder {
        display: none !important;
      }
    </style>
    <script type="text/javascript">
      (function($) {
        $(document).ready(function(){
          $("#tour_service-adder").remove();
        });
      })(jQuery);
    </script>
  <?php
  }
}
add_action('admin_head','ct_css_for_admin');

/*
 *
 *
 * Custom for theme
 *
 */
// Remove Editor Field for Landing page
function ct_remove_editor() {
  remove_post_type_support('page', 'editor');
}
add_action('admin_init', 'ct_remove_editor');

// Add google API Key
add_action('acf/init', function() {
  $theme_options = get_option('pdj_board_settings');
  $google_api_key = $theme_options['pdj_google_api_key'];
  acf_update_setting('google_api_key', $google_api_key);
});
