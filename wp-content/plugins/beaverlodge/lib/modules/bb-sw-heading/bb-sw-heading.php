<?php
/**
 * Plugin Name: SW Heading
 * Plugin URI: http://www.beaverlodgehq.com
 * Description: A heading with custom borders in Beaver Builder.
 * Version: 1.0.0
 * Author: Jon Mather
 * Author URI: http://www.simplewebsiteinaday.com.au
 */

define( 'SW_HEADING_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_HEADING_MODULE_URL', plugins_url( '/', __FILE__ ) );

function sw_heading_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-heading-module.php';
    }
}
add_action( 'init', 'sw_heading_module' );