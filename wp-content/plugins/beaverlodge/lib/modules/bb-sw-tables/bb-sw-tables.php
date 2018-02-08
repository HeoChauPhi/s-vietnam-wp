<?php

/*
Plugin Name: Table Module
Plugin URI: http://fotoplugins.com
Description: Add tables to your page in Beaver Builder
Version: 1.0.6
Author: Jon Mather
Author URI: http://simplewebsiteinaday.com.au
*/

define( 'SW_TABLE_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_TABLE_MODULE_URL', plugins_url( '/', __FILE__ ) );

function sw_table_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-tables-module.php';
    }
}
add_action( 'init', 'sw_table_module' );