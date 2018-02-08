<?php
/*
 * Plugin Name: Advanced Custom Fields: Default Image
 * Plugin URI: http://ffw.com/
 * Description: Add-On plugin for Advanced Custom Fields (ACF) that adds a 'Nav Menu' Field type.
 * Version: 1.0.0
 * Author: FFW
 * Author URI: http://ffw.com
 * License: GPL2 or later
 */

add_action('acf/render_field_settings/type=image', 'add_default_value_to_image_field');
function add_default_value_to_image_field($field) {
  acf_render_field_setting( $field, array(
    'label'           => 'Default Image',
    'instructions'    => 'Appears when creating a new post',
    'type'            => 'image',
    'name'            => 'default_value',
  ));
}