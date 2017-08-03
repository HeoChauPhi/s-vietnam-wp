<?php

/**
 * Plugin Name: SW Vertical Timeline
 * Plugin URI: http://www.beaverlodgehq.com
 * Description: A vertical timeline for Beaver Builder
 * Version: 1.0.2
 * Author: Jon Mather
 * Author URI: http://www.simplewebsiteinaday.com.au
 */

define( 'SW_VERT_TIMELINE_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_VERT_TIMELINE_MODULE_URL', plugins_url( '/', __FILE__ ) );

function sw_vert_timeline_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-vert-timeline-module.php';
    }
}
add_action( 'init', 'sw_vert_timeline_module' );

    function sw_register_vertical_meta_boxes( $meta_boxes ) {
        $prefix = 'sw_';

       // gallery meta box
        $meta_boxes[] = array(
            'id'       => 'icon',
            'title'    => 'FontAwesome Icon',
            'pages'    => array('post'),
            'context'  => 'side',
            'priority' => 'high',

            'fields' => array(            

                array(
                    'name'  => 'eg: fa-anchor',
                    'id'    => $prefix . 'icon',
                    'type'  => 'text',
                ),


            )
        );

        return $meta_boxes;
    }

    add_filter( 'rwmb_meta_boxes', 'sw_register_vertical_meta_boxes' );

function sw_vert_opacity($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
 
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}