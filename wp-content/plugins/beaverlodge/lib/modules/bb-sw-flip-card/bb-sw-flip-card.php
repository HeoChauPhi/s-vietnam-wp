<?php

/**
 * Plugin Name: SW Flip Card
 * Plugin URI: http://www.beaverlodgehq.com
 * Description: Add a animated flip card layout.
 * Version: 1.0.2
 * Author: Jon Mather
 * Author URI: http://www.simplewebsiteinaday.com.au
 */

define( 'SW_FLIP_CARD_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_FLIP_CARD_MODULE_URL', plugins_url( '/', __FILE__ ) );

function sw_flip_card_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-flip-card-module.php';
    }
}
add_action( 'init', 'sw_flip_card_module' );
