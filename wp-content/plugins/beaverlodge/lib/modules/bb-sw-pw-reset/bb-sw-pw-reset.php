<?php
/**
 * Plugin Name: SW Password Reset
 * Plugin URI: http://www.beaverlodgehq.com
 * Description: A password reset from for Beaver Builder.
 * Version: 1.0.0
 * Author: Jon Mather
 * Author URI: http://www.simplewebsiteinaday.com.au
 */

define( 'SW_PASSWORD_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_PASSWORD_MODULE_URL', plugins_url( '/', __FILE__ ) );

function sw_password_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-pw-reset-module.php';
    }
}
add_action( 'init', 'sw_password_module' );