<?php

/**
 * Plugin Name: SW Woo Recent
 * Plugin URI: http://www.beaverlodgehq.com
 * Description: Add WooCommerce Recent Items to Beaver Builder.
 * Version: 1.0.0
 * Author: Jon Mather
 * Author URI: http://www.simplewebsiteinaday.com.au
 */

define( 'SW_WOORECENT_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_WOORECENT_MODULE_URL', plugins_url( '/', __FILE__ ) );

function sw_woo_recent_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-woorecent-module.php';
    }
}
add_action( 'init', 'sw_woo_recent_module' );