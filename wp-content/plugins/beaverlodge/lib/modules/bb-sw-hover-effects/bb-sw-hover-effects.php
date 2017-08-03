<?php
/*
 * Plugin Name: Hover Effects
 * Plugin URI: http://demosites.carassiusproductions.com.au/test/hover-card
 * Description: Add a animated hover card content 
 * Version: 1.0
 * Author: Jon Mather
 * Author URI: http://simplewebsiteinaday.com.au
*/

define( 'SW_HOVEREFFECTS_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_HOVEREFFECTS_MODULE_URL', plugins_url( '/', __FILE__ ) );

function sw_hover_effects_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-hover-effects-module.php';
    }
}
add_action( 'init', 'sw_hover_effects_module' );