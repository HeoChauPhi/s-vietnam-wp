<?php
/*
Plugin Name: Hover Tooltip
Plugin URI: http://fotoplugins.com
Description: Add a animated hover tooltip using the title and excerpt content 
Version: 1.1.0
Author: Jon Mather
Author URI: http://simplewebsiteinaday.com.au
*/

define( 'SW_TOOLTIP_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_TOOLTIP_MODULE_URL', plugins_url( '/', __FILE__ ) );

function sw_tooltip_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-tooltip-module.php';
    }
}
add_action( 'init', 'sw_tooltip_module' );

/***************************
* enqueues stylesheet
***************************/
function add_sw_tooltip_stylesheets() {
    wp_register_style( 'zebra_tooltip_css', plugins_url( 'zebra_tooltips.css', __FILE__ ) );
    wp_register_script( 'zebra_tooltip_js', plugins_url( 'zebra_tooltips.js', __FILE__ ), array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'add_sw_tooltip_stylesheets' );


/***************************
* creates shortcode
***************************/
function sw_bb_tooltip( $atts , $content = null ) {
wp_enqueue_script( 'zebra_tooltip_js' );
wp_enqueue_style( 'zebra_tooltip_css' );
	$sw_tooltip_variable = shortcode_atts(
		array(
			'tip' => 'This is a tooltip',
			'url' => '#',
            'color' => '#fff',
            'background'    => '#000',
            'position'  => 'above',
            'align' => 'center',
		), $atts );

return '<a href="'.$atts['url'].'" class="sw-tooltips" title="'.$atts['tip'].'" data-color="'.$atts['color'].'" data-background="'.$atts['background'].'"><strong>'.$content.'</strong></a>';

}
add_shortcode( 'tooltip', 'sw_bb_tooltip' );

function sw_footer_script() {
    
?>

    <script>
        jQuery('a.sw-tooltips').each(function(){
            var $this = jQuery(this);
            jQuery.Zebra_Tooltips( $this, {
                    background_color: $this.data('background'),
                    color: $this.data('color')
            });
        });
    </script>

<?php

}

add_action( 'wp_footer', 'sw_footer_script' );