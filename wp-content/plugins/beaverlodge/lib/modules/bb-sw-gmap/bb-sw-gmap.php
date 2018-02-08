<?php
/**
 * Plugin Name: SW GMap
 * Plugin URI: http://www.beaverlodgehq.com
 * Description: A indepth Google Map for the Beaver Builder plugin.
 * Version: 1.0.2
 * Author: Jon Mather
 * Author URI: http://www.simplewebsiteinaday.com.au
 */

define( 'SW_GMAP_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_GMAP_URL', plugins_url( '/', __FILE__ ) );

function sw_gmap_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-gmap-module.php';
    }
}
add_action( 'init', 'sw_gmap_module' );

function zestsms_geocomplete_field( $name, $value, $field, $settings ) {
	$location_name = $name . '_location'; ?>
	<div class="zestsms-geocomplete">
		<input type="text" class="geocomplete-address" name="<?php echo $name; ?>" value="<?php echo $value; ?>" placeholder="Enter a location" size="50" />
		<div class="geo-details">
			<input type="hidden" class="geocomplete-location" data-geo="location" name="<?php echo $location_name; ?>" value="<?php echo $settings->{$location_name}; ?>" />
		</div>
	</div>
<?php }
add_action( 'fl_builder_control_geocomplete', 'zestsms_geocomplete_field', 1, 4 );
function zestsms_geocomplete_field_assets() {
	if( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
		wp_enqueue_script(
			'geocomplete',
			SW_GMAP_URL . 'js/jquery.geocomplete.min.js',
			array('jquery'),
			'1.6.5',
			true
		);
		wp_enqueue_script(
			'zestsms-geocomplete',
			SW_GMAP_URL . 'js/zestsms-geocomplete.js',
			array('jquery', 'geocomplete'),
			'1.0',
			true
		);
		wp_enqueue_style(
			'zestsms-geocomplete',
			SW_GMAP_URL . 'css/zestsms-geocomplete.css'
		);
	}
}
add_action( 'wp_enqueue_scripts', 'zestsms_geocomplete_field_assets' );