<?php
/*
Plugin Name: Instagram Module
Plugin URI: http://www.fotoplugins.com
Description: Add Instagram feed to Beaver Builder
Version: 1.0.1
Author: Jon Mather
Author URI: http://simplewebsiteinaday.com.au
*/

define( 'SW_INSTAGRAM_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_INSTAGRAM_MODULE_URL', plugins_url( '/', __FILE__ ) );

function sw_instagram_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-instagram-module.php';
    }
}
add_action( 'init', 'sw_instagram_module' );

function sw_readme_field($name, $value, $field) {
    $gif = plugins_url('/img/insta.gif', __FILE__);
        ?>
<ul>
    <li>Login to Instagram</li>
    <li>visit <a href="https://instagram.com/developer/" target="_blank" style="color: #b20022;"><strong style="color: #b20022;">instagram.com/developer</strong></a></li>
    <li>Register Your Application</li>
    <li>Register a New Client</li>
    <li>Unique Name</li>
    <li>Description</li>
    <li>Add URL - this is important and must match thesite</li><li>Valid redirect URls - important, just match the site domain</li>
    <li>Email Address</li>
    <li>Click on Security Tab at top</li>
    <li>UnCheck Disable implicit OAuth</li>
    <li>Register</li>
    <li>Dont close as we will need this info after</li>
    <li>visit this site <a href="http://www.pinceladasdaweb.com.br/instagram/access-token/" target="_blank" style="color: #b20022;"><strong style="color: #b20022;">pinceladasdaweb.com.br/instagram/access-token</strong></a></li>
    <li>click Get Token</li>
    <li>That is the User ID and access Token you need</li>
</ul>
<a href="https://youtu.be/dIuV3S9Ahxc" target="_blank">View Video</a>

<?php
    }
add_action('fl_builder_control_insta-readme', 'sw_readme_field', 1, 3);