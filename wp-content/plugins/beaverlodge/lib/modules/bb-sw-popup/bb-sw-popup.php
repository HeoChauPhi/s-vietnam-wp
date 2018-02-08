<?php
/*
Plugin Name: Popup Plugin
Plugin URI: http://www.fotoplugins.com
Description: Create a subscription popup lightbox
Version: 1.0.0
Author: Jon Mather
Author URI: http://simplewebsiteinaday.com.au
*/

define( 'SW_POPUP_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_POPUP_MODULE_URL', plugins_url( '/', __FILE__ ) );

function sw_popup_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-popup-module.php';
    }
}
add_action( 'init', 'sw_popup_module' );

