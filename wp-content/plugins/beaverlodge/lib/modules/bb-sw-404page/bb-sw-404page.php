<?php

/**
 * Plugin Name: 404 Page
 * Plugin URI: http://www.beaverlodgehq.com
 * Description: Edit your 404 Page with Beaver Builder.
 * Version: 1.0.0
 * Author: Jon Mather
 * Author URI: http://www.simplewebsiteinaday.com.au
 */

function do_template_redirect()
{
    if(is_404()){
        header("HTTP/1.0 200 OK");
        include plugin_dir_path(__FILE__)."/custom404.php" ;
        die();
    }
}
add_action('template_redirect', 'do_template_redirect' );

function the_slug_exists($post_name) {
    global $wpdb;
    if($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A')) {
        return true;
    } else {
        return false;
    }
}