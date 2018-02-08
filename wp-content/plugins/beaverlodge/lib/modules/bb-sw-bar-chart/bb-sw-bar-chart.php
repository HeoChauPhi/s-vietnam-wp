<?php
/**
 * Plugin Name: SW Bar Chart
 * Plugin URI: http://www.beaverlodgehq.com
 * Description: A module to add url snapshots in Beaver Builder.
 * Version: 1.0.0
 * Author: Jon Mather
 * Author URI: http://www.simplewebsiteinaday.com.au
 */

define( 'SW_BARCHART_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_BARCHART_MODULE_URL', plugins_url( '/', __FILE__ ) );

function sw_barchart_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-bar-chart-module.php';
    }
}
add_action( 'init', 'sw_barchart_module' );