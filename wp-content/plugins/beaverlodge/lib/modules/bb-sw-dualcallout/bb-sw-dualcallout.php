<?php
/**
 * Plugin Name: SW Callout
 * Plugin URI: http://www.beaverlodgehq.com
 * Description: A double button callout in Beaver Builder.
 * Version: 1.0.0
 * Author: Jon Mather
 * Author URI: http://www.simplewebsiteinaday.com.au
 */

define( 'SW_DUALCALLOUT_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_DUALCALLOUT_MODULE_URL', plugins_url( '/', __FILE__ ) );

function sw_dualcallout_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-dualcallout-module.php';
    }
}
add_action( 'init', 'sw_dualcallout_module' );