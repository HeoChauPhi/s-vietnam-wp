<?php
require_once dirname(__FILE__) . '/function-options.php';

if ( file_exists(  dirname(__FILE__)  . '/cmb2/init.php' ) ) {
  require_once  dirname(__FILE__)  . '/cmb2/init.php';
} elseif ( file_exists(  dirname(__FILE__)  . '/CMB2/init.php' ) ) {
  require_once  dirname(__FILE__)  . '/CMB2/init.php';
}
require_once dirname(__FILE__) . '/option-theme/theme-options.php';
require_once dirname(__FILE__) . '/option-page/options-page.php';
//require_once dirname(__FILE__) . '/option-post/options-post.php';

// Admin settings.
if(is_admin()) {
  $settings = new PDJSettingsPage();
}

// Add admin script
function ct_options_admin_scripts() {
  wp_register_script('options-script', get_stylesheet_directory_uri() . '/init/options/access/js/options-script.js', array('jquery'), '1.0.0', true);
  wp_localize_script( 'options-script', 'fieldsAjax', array( 'ajaxurl' => admin_url('admin-ajax.php' )));
  wp_enqueue_script('options-script');
}
add_action('admin_init', 'ct_options_admin_scripts');

// Add admin script
function ct_options_admin_styles() {
  wp_register_style('options-style', get_stylesheet_directory_uri() . '/init/options/access/css/options-style.css', array(), '1.0', 'all');
  wp_enqueue_style('options-style');
}
add_action('admin_init', 'ct_options_admin_styles');
