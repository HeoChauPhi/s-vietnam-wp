<?php

/**
 * Plugin Name: SW Woo Sale Items
 * Plugin URI: http://www.beaverlodgehq.com
 * Description: Add WooCommerce Recent Items to Beaver Builder.
 * Version: 1.0.0
 * Author: Jon Mather
 * Author URI: http://www.simplewebsiteinaday.com.au
 */

define( 'SW_WOOSALE_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_WOOSALE_MODULE_URL', plugins_url( '/', __FILE__ ) );

function sw_woo_sale_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-woosale-module.php';
    }
}
add_action( 'init', 'sw_woo_sale_module' );