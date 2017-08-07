<?php
/**
 * Plugin Name: eCommerce Category Menu
 * Plugin URI: http://www.beaverlodgehq.com
 * Description: A sliding woo menu for the Beaver Builder plugin.
 * Version: 1.0.0
 * Author: Jon Mather
 * Author URI: http://www.simplewebsiteinaday.com.au
 */

define( 'WOO_CAT_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'WOO_CAT_MODULE_URL', plugins_url( '/', __FILE__ ) );

function sw_woo_cats_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-ecommerce-menu-module.php';
    }
}
add_action( 'init', 'sw_woo_cats_module' );