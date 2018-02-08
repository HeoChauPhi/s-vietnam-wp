<?php

/**
 * Plugin Name: Portfolio Plugin
 * Plugin URI: http://www.beaverlodgehq.com
 * Description: A Portfolio plugin for using with the Beaver Builder plugin.
 * Version: 1.0.0
 * Author: Jon Mather
 * Author URI: http://www.simplewebsiteinaday.com.au
 */

define( 'SW_PORTFOLIO_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_PORTFOLIO_URL', plugins_url( '/', __FILE__ ) );

function sw_portfolio_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-portfolio-module.php';
    }
}
add_action( 'init', 'sw_portfolio_module' );