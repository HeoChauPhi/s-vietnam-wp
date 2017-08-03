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
}
add_action('admin_init', 'zoho_admin_scripts');

function zoho_admin_styles() {
  wp_register_style('jqueryui-css', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array(), '1.12.1', 'all');
  wp_enqueue_style('jqueryui-css');
}
add_action('admin_init', 'zoho_admin_styles');

include_once('zoho-crm.admin.php');

// Admin settings.
if(is_admin()) {
  $settings = new ZohoCRMSettingsPage();
}

include_once('zoho-crm.functions.php');
include_once('zoho-crm.import.php');

if (class_exists('Timber')) {
  add_filter('timber_context', 'zohocrm_twig_data');
}

add_action('init', 'zohocrm_insert_content');
add_action('init', 'zohocrm_remove_content');