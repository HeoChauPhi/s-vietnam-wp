<?php
/*
Plugin Name: Animate Text
Plugin URI: http://www.fotoplugins.com
Description: Add animated text to your site
Version: 1.0.0
Author: Jon Mather
Author URI: http://simplewebsiteinaday.com.au
*/


define( 'SW_ANIMETEXT_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_ANIMETEXT_URL', plugins_url( '/', __FILE__ ) );

function sw_animetext_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-animate-text-module.php';
    }
}
add_action( 'init', 'sw_animetext_module' );