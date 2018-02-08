<?php

/**
 * Plugin Name: SW Gallery
 * Plugin URI: http://www.fotoplugins.com
 * Description: Gallery module for the Beaver Builder Plugin.
 * Version: 1.0.5
 * Author: Jon Mather
 * Author URI: http://www.simplewebsiteinaday.com.au
 */



define( 'SW_MASONRY_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_MASONRY_URL', plugins_url( '/', __FILE__ ) );

function sw_masonry_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-masonry.php';
    }
}
add_action( 'init', 'sw_masonry_module' );