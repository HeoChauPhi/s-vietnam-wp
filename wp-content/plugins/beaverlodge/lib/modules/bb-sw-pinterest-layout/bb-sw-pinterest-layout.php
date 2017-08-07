<?php

/**
 * Plugin Name: SW Pinterest Layout
 * Plugin URI: http://www.beaverlodgehq.com
 * Description: Add a pinterest style layout.
 * Version: 1.0.0
 * Author: Jon Mather
 * Author URI: http://www.simplewebsiteinaday.com.au
 */

define( 'SW_PINTEREST_LAYOUT_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_PINTEREST_LAYOUT_MODULE_URL', plugins_url( '/', __FILE__ ) );

function sw_pinterest_layout_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-pinterest-layout-module.php';
    }
}
add_action( 'init', 'sw_pinterest_layout_module' );

function bl_masonry_script() {
    wp_enqueue_script( 'jquery-masonry' );
}
add_action( 'wp_enqueue_scripts', 'bl_masonry_script' );