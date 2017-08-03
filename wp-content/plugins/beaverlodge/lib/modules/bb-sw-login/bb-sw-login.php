<?php
/**
 * Plugin Name: SW Login
 * Plugin URI: http://www.beaverlodgehq.com
 * Description: A login page for Beaver Builder.
 * Version: 1.0.0
 * Author: Jon Mather
 * Author URI: http://www.simplewebsiteinaday.com.au
 */

define( 'SW_LOGIN_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_LOGIN_MODULE_URL', plugins_url( '/', __FILE__ ) );

function sw_login_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-login-module.php';
    }
}
add_action( 'init', 'sw_login_module' );


function add_lost_password_link() {
    return '<a class="sw-pw-reset" href="#">Lost Password?</a>';
}
add_action( 'login_form_bottom', 'add_lost_password_link' );