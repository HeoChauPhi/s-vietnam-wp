<?php
/*
Plugin Name: SW Social Share
Plugin URI: http://www.fotoplugins.com
Description: Add a animated counter to your site
Version: 1.0.1
Author: Jon Mather
Author URI: http://simplewebsiteinaday.com.au
*/


define( 'SW_SOCIALSHARE_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_SOCIALSHARE_URL', plugins_url( '/', __FILE__ ) );

function sw_socialshare_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-socialshare-module.php';
    }
}
add_action( 'init', 'sw_socialshare_module' );