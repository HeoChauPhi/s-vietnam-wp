<?php

/*
Plugin Name: Footer Module
Plugin URI: http://fotoplugins.com
Description: Add a footer to your page in Beaver Builder
Version: 1.0.1
Author: Jon Mather
Author URI: http://simplewebsiteinaday.com.au
*/

define( 'SW_TOOLBAR_CTA_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_TOOLBAR_CTA_MODULE_URL', plugins_url( '/', __FILE__ ) );

function sw_toolbar_cta_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-toolbar-cta-module.php';
    }
}
add_action( 'init', 'sw_toolbar_cta_module' );