<?php

/*
Plugin Name: SW BB Resizer
Plugin URI: http://fotoplugins.com
Description: Add resizer support to Beaver Builder forms 
Version: 1.1.4
Author: Jon Mather
Author URI: http://simplewebsiteinaday.com.au
*/


add_action( 'admin_menu', 'sw_bb_resizer_add_admin_menu' );
add_action( 'admin_init', 'sw_bb_resizer_settings_init' );


function sw_bb_resizer_add_admin_menu(  ) { 

	add_submenu_page( 'beaverlodge_modules', 'Resizer Form', 'Resizer Form', 'manage_options', 'beaverlodge_resizer', 'sw_bb_resizer_options_page' );

}


function sw_bb_resizer_settings_init(  ) { 

	register_setting( 'beaverSettings', 'sw_bb_resizer_settings' );

	add_settings_section(
		'sw_bb_resizer_beaverSettings_section', 
		__( 'Use this to style the forms in Beaver Builder', 'wordpress' ), 
		'sw_bb_resizer_settings_section_callback', 
		'beaverSettings'
	);

	add_settings_field( 
		'sw_bb_resizer_select_field_0', 
		__( 'Background Opacity', 'wordpress' ), 
		'sw_bb_resizer_select_field_0_render', 
		'beaverSettings', 
		'sw_bb_resizer_beaverSettings_section' 
	);

	add_settings_field( 
		'sw_bb_resizer_text_field_1', 
		__( 'Font Size', 'wordpress' ), 
		'sw_bb_resizer_text_field_1_render', 
		'beaverSettings', 
		'sw_bb_resizer_beaverSettings_section' 
	);

	add_settings_field( 
		'sw_bb_resizer_text_field_2', 
		__( 'Font Color', 'wordpress' ), 
		'sw_bb_resizer_text_field_2_render', 
		'beaverSettings', 
		'sw_bb_resizer_beaverSettings_section' 
	);


	add_settings_field( 
		'sw_bb_resizer_text_field_3', 
		__( 'Form Height', 'wordpress' ), 
		'sw_bb_resizer_text_field_3_render', 
		'beaverSettings', 
		'sw_bb_resizer_beaverSettings_section' 
	);
    
    add_settings_field( 
		'sw_bb_resizer_text_field_4', 
		__( 'Form Width', 'wordpress' ), 
		'sw_bb_resizer_text_field_4_render', 
		'beaverSettings', 
		'sw_bb_resizer_beaverSettings_section' 
	);


}



function sw_bb_resizer_select_field_0_render(  ) { 

	$options = get_option( 'sw_bb_resizer_settings' );
	?>
	<select name='sw_bb_resizer_settings[sw_bb_resizer_select_field_0]'>
		<option value='1' <?php selected( $options['sw_bb_resizer_select_field_0'], 1 ); ?>>100%</option>
		<option value='0.95' <?php selected( $options['sw_bb_resizer_select_field_0'], 0.95 ); ?>>95%</option>
		<option value='0.9' <?php selected( $options['sw_bb_resizer_select_field_0'], 0.9 ); ?>>90%</option>
		<option value='0.8' <?php selected( $options['sw_bb_resizer_select_field_0'], 0.8 ); ?>>80%</option>
		<option value='0.7' <?php selected( $options['sw_bb_resizer_select_field_0'], 0.7 ); ?>>70%</option>
		<option value='0.5' <?php selected( $options['sw_bb_resizer_select_field_0'], 0.5 ); ?>>50%</option>
		<option value='0.3' <?php selected( $options['sw_bb_resizer_select_field_0'], 0.3 ); ?>>30%</option>
		<option value='0.1' <?php selected( $options['sw_bb_resizer_select_field_0'], 0.1 ); ?>>10%</option>
		<option value='0' <?php selected( $options['sw_bb_resizer_select_field_0'], 0 ); ?>>0%</option>
	</select>

<?php

}
function sw_bb_resizer_text_field_1_render(  ) { 

	$options = get_option( 'sw_bb_resizer_settings' );
	?>
	<input type='text' name='sw_bb_resizer_settings[sw_bb_resizer_text_field_1]' value='<?php echo $options['sw_bb_resizer_text_field_1']; ?>' placeholder='18px'>
	<?php

}


function sw_bb_resizer_text_field_2_render(  ) { 

	$options = get_option( 'sw_bb_resizer_settings' );
	?>
	<input type='text' name='sw_bb_resizer_settings[sw_bb_resizer_text_field_2]' value='<?php echo $options['sw_bb_resizer_text_field_2']; ?>' placeholder='black'>
	<?php

}

function sw_bb_resizer_text_field_3_render(  ) { 

	$options = get_option( 'sw_bb_resizer_settings' );
	?>
	<input type='text' name='sw_bb_resizer_settings[sw_bb_resizer_text_field_3]' value='<?php echo $options['sw_bb_resizer_text_field_3']; ?>' placeholder='80vh'>

<?php

}

function sw_bb_resizer_text_field_4_render(  ) { 

	$options = get_option( 'sw_bb_resizer_settings' );
	?>
	<input type='text' name='sw_bb_resizer_settings[sw_bb_resizer_text_field_4]' value='<?php echo $options['sw_bb_resizer_text_field_4']; ?>' placeholder='80%'>
	<?php

}




function sw_bb_resizer_settings_section_callback(  ) { 

	//echo __( 'This section description', 'wordpress' );

}


function sw_bb_resizer_options_page(  ) { 

	?>

	<form action='options.php' method='post'>

		<h2>SW BB Resizer</h2>
		<div style="float: left;">
		<?php
		settings_fields( 'beaverSettings' );
		do_settings_sections( 'beaverSettings' );
    
		submit_button();
    
		?>
		</div><div style="float: left; margin-left: 20px;">
        <?php
    $bground = 'rgba(255,255,255,' .sw_resizer_background(). ')';
        $color = sw_resizer_color();
        $font = sw_resizer_font();
        ?>
        <div style="background-image: url(<?php echo plugins_url( 'beaver.png', __FILE__ ); ?>);background-repeat: no-repeat; background-position: center; background-size: 25%;width: 500px; height: 400px; position: absolute;"></div>
        <div style="background-color: <?php echo $bground; ?>; position:relative;width: 500px; height: 400px;color: <?php echo $color; ?>;    box-shadow: rgba(0,0,0,0.5) 0 4px 30px;
    -moz-box-shadow: rgba(0,0,0,0.5) 0 4px 30px;
    -webkit-box-shadow: rgba(0,0,0,0.5) 0 4px 30px;
}">
            <p style="font-size: <?php echo $font; ?>; padding: 10px; border-bottom: solid 1px grey;">Form Preview</p>
            <p style="font-size: <?php echo $font; ?>; border-bottom: 1px solid grey; padding: 10px;"><span style="border-left: 1px solid grey;border-top: 1px solid grey;border-right: 1px solid grey;padding: 0 20px; margin-right: 20px;">Tab</span>Another Tab</p>
            <p style="font-size: <?php echo $font; ?>; font-weight: 700; border-bottom: 1px solid grey; padding: 0 10px; width: 50%;">Heading</p>
            <p style="font-size: <?php echo $font; ?>; padding: 0 10px; width: 50%;">Setting</p>

        </div></div>
	</form>

	<?php
    
}

function sw_resizer_background() {
    $options = get_option( 'sw_bb_resizer_settings' );
    $background = $options['sw_bb_resizer_select_field_0'];
    
    return $background;
}

function sw_resizer_font() {
    $options = get_option( 'sw_bb_resizer_settings' );
    $background = $options['sw_bb_resizer_text_field_1'];
    
    return $background;
}
function sw_resizer_color() {
    $options = get_option( 'sw_bb_resizer_settings' );
    $background = $options['sw_bb_resizer_text_field_2'];
    
    return $background;
}
function sw_resizer_height() {
    $options = get_option( 'sw_bb_resizer_settings' );
    $height = $options['sw_bb_resizer_text_field_3'];
    
    return $height;
}
function sw_resizer_width() {
    $options = get_option( 'sw_bb_resizer_settings' );
    $width = $options['sw_bb_resizer_text_field_4'];
    
    return $width;
}

// loads the css from customizer into the head
function sw_bb_resizer_css() {
    ?>
        <style>
            <?php 
                $swresbg = sw_resizer_background();
                $swresfont = sw_resizer_font();
                $swrescolor = sw_resizer_color();
                $swrescolor = sw_resizer_color();
               $height = sw_resizer_height();
               $width = sw_resizer_width();
            ?>
            
            	.fl-builder-settings-fields.fl-nanoscroller.has-scrollbar {
                    height: <?php echo $height; ?>;
                }
            
                .fl-builder-lightbox .fl-lightbox {
                    width: <?php echo $width; ?>;
                }
            
                .fl-builder-settings-tab, .fl-builder-rich-text-settings .fl-builder-settings-section {
                    width: 100%;
                }

                .fl-lightbox-header {
                    background: rgba(255, 255, 255, <?php echo $swresbg; ?>);
                }
                .fl-lightbox {
                    background: rgba(255,255,255, <?php echo $swresbg; ?>);
                }

                .fl-form-table th {
                    background: rgba(255,255,255,0) !important;
                }

                .fl-builder-settings-tabs {
                    background: rgba(255,255,255, <?php echo $swresbg; ?>);
                }

                .fl-lightbox *:not(i), .fl-field-description, input.text, .fl-help-tooltip-icon, .fl-builder-field-actions i {
                    color: <?php echo $swrescolor; ?> !important;
                    font-size: <?php echo $swresfont; ?> !important;
                }
            
/*
            .fl-builder-settings-section {
                float: left;
                margin: 20px;
            }
*/
            
            .fl-builder-html-settings .fl-builder-settings-section,
			.fl-template-selector .fl-builder-settings-section {
                float: none;
                margin: none
            }
            
            table.fl-form-table {
                width: 495px;
            }
            
            table.fl-form-table,
            div#fl-builder-settings-section-content_select {
                width: 90%;
            }

            
        </style>
<?php
}

add_action( 'wp_head', 'sw_bb_resizer_css' );