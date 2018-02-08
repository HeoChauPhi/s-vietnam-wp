<?php
   /*
   Plugin Name: jClocksGMT - World Clocks for Wordpress
   Plugin URI: http://kingkode.com/jclocksgmt-wp
   Description: Analog and digital clock(s) plugin based on GMT offsets.
   Version: 1.0.2
   Author: KingKode
   Author URI: http://kingkode.com/
   License: GPL2
      __   _             __             __   
     / /__(_)___  ____ _/ /______  ____/ /__ 
    / //_/ / __ \/ __ `/ //_/ __ \/ __  / _ \
   / ,< / / / / / /_/ / ,< / /_/ / /_/ /  __/
  /_/|_/_/_/ /_/\__, /_/|_|\____/\__,_/\___/ 
               /____/                        
*/


   // Check to see if assets are needed and include them if so
   function pw_import_scripts() {
    wp_register_script('jquery.rotate', plugin_dir_url( __FILE__ ) . 'js/jquery.rotate.js', array('jquery'), '1.0.0', TRUE);
    wp_enqueue_script('jquery.rotate');

    wp_register_script('jclocksgmt', plugin_dir_url( __FILE__ ) . 'js/jClocksGMT.js', array('jquery'), '1.0.0', TRUE);
    wp_enqueue_script('jclocksgmt');

    wp_register_script('jquery.rotate', plugin_dir_url( __FILE__ ) . 'js/jquery.rotate.js', array('jquery'), '1.0.0', TRUE);
    wp_enqueue_script('jquery.rotate');
   }
   add_action('wp_print_scripts', 'pw_import_scripts');

   function pw_import_styles() {
    wp_register_style('jclocksgmt', plugin_dir_url( __FILE__ ) . 'css/jClocksGMT.css');
    wp_enqueue_style('jclocksgmt');
   }
   add_action('wp_enqueue_scripts', 'pw_import_styles');

   add_shortcode('jclocksgmt', 'wps_jclocksgmt');

   function wps_jclocksgmt($atts) {

      $atts = shortcode_atts( array(
            'title' => 'Greenwich, England',
            'offset' => '0',
            'dst' => true,
            'digital' => true,
            'analog' => true,
            'timeformat' => 'hh:mm A',
            'date' => false,
            'dateformat' => 'MM/DD/YYYY',
            'angleSec' => 0,
            'angleMin' => 0,
            'angleHour' => 0,
            'skin' => 1,
            'imgpath' => plugin_dir_url( __FILE__ )
         ), $atts, 'jclocksgmt' );

      $uid = uniqid();

      $markup = '<' . 'div id="clock_' . $uid . '" class="jclockgmt" '.'>' . '<' . '/div' . '>';

      $initalize = '<' . 'script' . '>jQuery(document).ready(function(){jQuery("#clock_' . $uid . '").jClocksGMT(' .  json_encode($atts) . ');' . '});<' . '/script' . '>';

      return  $markup . $initalize;
   }

?>