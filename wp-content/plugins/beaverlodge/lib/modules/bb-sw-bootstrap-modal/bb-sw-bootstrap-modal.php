<?php
/**
 * Plugin Name: BeaverBuilder Bootstrap Modal
 * Plugin URI: http://www.beaverlodgehq.com
 * Description: Add a modal popup to the Beaver Builder plugin.
 * Version: 1.0.0
 * Author: Jon Mather
 * Author URI: http://www.simplewebsiteinaday.com.au
 */

define( 'SW_MODAL_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_MODAL_MODULE_URL', plugins_url( '/', __FILE__ ) );

function sw_bootstrap_modal_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-bootstrap-modal-module.php';
    }
}
add_action( 'init', 'sw_bootstrap_modal_module' );