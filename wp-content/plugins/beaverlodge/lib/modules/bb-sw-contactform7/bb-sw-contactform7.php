<?php
/**
 * Plugin Name: SW ContactForm7
 * Plugin URI: http://www.beaverlodgehq.com
 * Description: Add ContactForm7 Forms to Beaver Builder.
 * Version: 1.0.1
 * Author: Jon Mather
 * Author URI: http://www.simplewebsiteinaday.com.au
 */

define( 'SW_CF7_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_CF7_MODULE_URL', plugins_url( '/', __FILE__ ) );
define('WPCF7_LOAD_CSS', false);

function sw_cf7_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-contactform7-module.php';
    }
}
add_action( 'init', 'sw_cf7_module' );