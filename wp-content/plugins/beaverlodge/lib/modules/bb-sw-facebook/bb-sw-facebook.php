<?php
/*
 * Plugin Name: Facebook Module
 * Plugin URI: http://www.fotoplugins.com
 * Description: Add Facebook feed to Beaver Builder
 * Version: 1.0.0
 * Author: Jon Mather
 * Author URI: http://simplewebsiteinaday.com.au
*/

define( 'SW_FACEBOOK_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_FACEBOOK_MODULE_URL', plugins_url( '/', __FILE__ ) );

function sw_facebook_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-facebook-module.php';
    }
}
add_action( 'init', 'sw_facebook_module' );