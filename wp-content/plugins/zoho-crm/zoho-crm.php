<?php
/**
 * Plugin Name: Zoho CRM.
 * Plugin URI: http://crm.zoho.com/
 * Description: Zoho CRM
 * Version: 1.0
 * Author: HeoChauA
 * Author URI: http://s-vietnam.vn/
 * License: GPLv2
 */

// Add admin script
function zoho_admin_scripts() {
  wp_register_script('jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array(), '1.12.1', false);
  wp_enqueue_script('jquery-ui');

  /*wp_localize_script( 'jquery-ajax', 'zohoAjax', array( 'ajaxurl' => admin_url('admin-ajax.php' )));
  wp_enqueue_script('jquery-ajax');*/

  wp_register_script('jquery-quicksearch', plugin_dir_url( __FILE__ ) . 'access/js/jquery.quicksearch.js', array(), '1.0.1', false);
  wp_enqueue_script('jquery-quicksearch');

  wp_register_script('jquery-multiselect', plugin_dir_url( __FILE__ ) . 'access/js/jquery.multi-select.js', array(), '0.9.12', false);
  wp_enqueue_script('jquery-multiselect');
}
add_action('admin_init', 'zoho_admin_scripts');

function zoho_login_scripts() {
  wp_enqueue_script( 'jquery-login', plugin_dir_url( __FILE__ ) . 'access/js/jquery-login.js', false );
}
add_action( 'login_enqueue_scripts', 'zoho_login_scripts' );

function zoho_admin_styles() {
  $user_role = get_userdata(get_current_user_id())->roles;

  wp_register_style('jqueryui-css', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array(), '1.12.1', 'all');
  wp_enqueue_style('jqueryui-css');

  wp_register_style('lib-multiselect', plugin_dir_url( __FILE__ ) . 'access/css/libs/multi-select.css');
  wp_enqueue_style('lib-multiselect');

  if ( in_array('subscriber', $user_role) ) {
    wp_register_style('user_profile', plugin_dir_url( __FILE__ ) . 'access/css/user-profile.css');
    wp_enqueue_style('user_profile');
  }

  wp_register_style('zoho_style', plugin_dir_url( __FILE__ ) . 'access/css/styles.css');
  wp_enqueue_style('zoho_style');
}
add_action('admin_init', 'zoho_admin_styles');

function zoho_login_styles() {
  wp_enqueue_style( 'styles-login', plugin_dir_url( __FILE__ ) . 'access/css/styles-login.css' );
}
add_action( 'login_enqueue_scripts', 'zoho_login_styles' );

// Admin Functions
include_once('zoho-crm.functions.php');

// Admin settings.
include_once('zoho-crm.admin.php');

if(is_admin()) {
  $settings = new ZohoCRMSettingsPage();
}

$zohocrm_options = get_option('zoho_crm_board_settings');

// Create zoho Post Type
include_once('init/zoho-crm.posttype.php');

// Import Content
include_once('zoho-crm.import.php');

add_action('init', 'zohocrm_insert_content');
add_action('init', 'zohocrm_remove_content');

// Zoho Lead - User Wordpress
include_once('init/zoho-lead.user.php');

// Return twwig variables
function zohocrm_twig_data($data){
  $zohocrm_options = get_option('zoho_crm_board_settings');
  $zohocrm_author_token  = $zohocrm_options['author_token'];

  $data['zohocrm_author_token'] = strrev($zohocrm_author_token);

  return $data;
}

if (class_exists('Timber')) {
  add_filter('timber_context', 'zohocrm_twig_data');
}

// Zoho Shortcode
include_once('init/zoho-crm.shortcode.php');