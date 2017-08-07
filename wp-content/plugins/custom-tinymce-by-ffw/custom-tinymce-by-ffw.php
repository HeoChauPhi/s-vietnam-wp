<?php
/**
 * Plugin Name: TinyMCE Button By FFW Team
 * Plugin URI: http://ffw.com/
 * Description: TinyMCE Button By FFW Team
 * Version: 1.0
 * Author: FFW
 * Author URI: http://ffw.com/
 * License: GPLv2
 */

/**
 *
 * Add Hook Action Custom MCE Button
 *
 */
add_action('admin_head', 'pdj_social_mce_button');
add_action('admin_head', 'pdj_readmore_mce_button');


/**
 *
 * Social Button
 *
 */
// Filter Functions with Hooks
function pdj_social_mce_button() {
  // Check if user have permission
  if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
    return;
  }
  // Check if WYSIWYG is enabled
  if ( 'true' == get_user_option( 'rich_editing' ) ) {
    add_filter( 'mce_external_plugins', 'pdj_social_tinymce_plugin' );
    add_filter( 'mce_buttons', 'pdj_social_register_mce_button' );
  }
}

// Function for new button
function pdj_social_tinymce_plugin( $plugin_array ) {
  $plugin_array['pdj_social_mce_button'] = plugin_dir_url( __FILE__ ) . 'js/social-button.js';
  return $plugin_array;
}

// Register new button in the editor
function pdj_social_register_mce_button( $buttons ) {
  array_push( $buttons, 'pdj_social_mce_button' );
  return $buttons;
}

/**
 *
 * Reas More Button
 *
 */
// Filter Functions with Hooks
function pdj_readmore_mce_button() {
  // Check if user have permission
  if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
    return;
  }
  // Check if WYSIWYG is enabled
  if ( 'true' == get_user_option( 'rich_editing' ) ) {
    add_filter( 'mce_external_plugins', 'pdj_readmore_tinymce_plugin' );
    add_filter( 'mce_buttons', 'pdj_readmore_register_mce_button' );
  }
}

// Function for new button
function pdj_readmore_tinymce_plugin( $plugin_array ) {
  $plugin_array['pdj_readmore_mce_button'] = plugin_dir_url( __FILE__ ) . 'js/readmore-button.js';
  return $plugin_array;
}

// Register new button in the editor
function pdj_readmore_register_mce_button( $buttons ) {
  array_push( $buttons, 'pdj_readmore_mce_button' );
  return $buttons;
}