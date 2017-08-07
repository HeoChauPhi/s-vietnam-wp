<?php
/**
 * Plugin Name: SW News Ticker
 * Plugin URI: http://www.beaverlodgehq.com
 * Description: A animated news ticker in Beaver Builder.
 * Version: 1.0.0
 * Author: Jon Mather
 * Author URI: http://www.simplewebsiteinaday.com.au
 */

define( 'SW_NEWS_TICKER_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_NEWS_TICKER_MODULE_URL', plugins_url( '/', __FILE__ ) );

function sw_news_ticker_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-news-ticker-module.php';
    }
}
add_action( 'init', 'sw_news_ticker_module' );