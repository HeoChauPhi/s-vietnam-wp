<?php
/**
 * Plugin Name: SW Caldera Module
 * Plugin URI: http://www.beaverlodgehq.com
 * Description: Add Caldera Forms to Beaver Builder.
 * Version: 1.0.1
 * Author: Jon Mather
 * Author URI: http://www.simplewebsiteinaday.com.au
 */

define( 'SW_CALDERA_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_CALDERA_MODULE_URL', plugins_url( '/', __FILE__ ) );

function sw_caldera_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-caldera-module.php';
    }
}
add_action( 'init', 'sw_caldera_module' );