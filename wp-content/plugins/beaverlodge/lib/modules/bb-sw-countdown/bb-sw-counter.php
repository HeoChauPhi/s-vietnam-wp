<?php
/**
* Plugin Name: SW Counter
* Plugin URI: http://www.fotoplugins.com
* Description: Add a animated counter to your site
* Version: 1.0.0
* Author: Jon Mather
* Author URI: http://simplewebsiteinaday.com.au
*/


define( 'SW_COUNTER_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_COUNTER_URL', plugins_url( '/', __FILE__ ) );

function sw_counter_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-counter-module.php';
    }
}
add_action( 'init', 'sw_counter_module' );
