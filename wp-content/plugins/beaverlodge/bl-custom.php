<?php 

add_action( 'admin_menu', 'sw_beaverlodge_add_admin_menu' );
add_action( 'admin_init', 'sw_beaverlodge_settings_init' );


function sw_beaverlodge_add_admin_menu(  ) { 
    
    if ( file_exists( FL_BUILDER_DIR . 'includes/admin-settings-branding.php' ) ) {
        $options = get_option( 'sw_beaverlodge_settings' );
        $branding = $options['sw_beaverlodge_text_field_6'] . ' Modules Settings';
        if ($branding == ' Modules Settings') {
            $branding =  'BeaverLodgeHQ Settings';
        }
    } else {
        $branding =  'BeaverLodgeHQ Settings';
    }

	add_options_page( 'Beaver Lodge HQ', $branding, 'manage_options', 'sw_beaverlodge', 'sw_beaverlodge_options_page' );

}


function sw_beaverlodge_settings_init(  ) { 

	register_setting( 'beaverLodge', 'sw_beaverlodge_settings' );

	if ( file_exists( FL_BUILDER_DIR . 'includes/admin-settings-branding.php' ) ) {
        if (is_admin()) {
            add_settings_field( 
                'sw_beaverlodge_text_field_6', 
                __( 'White Label', 'fl_builder' ), 
                'sw_beaverlodge_text_field_6_render', 
                'beaverLodge', 
                'sw_beaverlodge_beaverLodge_section' 
            );    
        }
    }
    
    add_settings_section(
		'sw_beaverlodge_beaverLodge_section', 
		__( 'Custom Settings', 'fl_builder' ), 
		'sw_beaverlodge_settings_section_callback', 
		'beaverLodge'
	);	

	add_settings_field( 
		'sw_select_gallery', 
		__( 'SW Gallery CPT', 'fl-builder' ), 
		'sw_select_gallery_render', 
		'beaverLodge', 
		'sw_beaverlodge_beaverLodge_section' 
	);   	

	add_settings_field( 
		'sw_select_team', 
		__( 'Team CPT', 'fl-builder' ), 
		'sw_select_team_render', 
		'beaverLodge', 
		'sw_beaverlodge_beaverLodge_section' 
	);     	

	add_settings_field( 
		'sw_select_portfolio', 
		__( 'Portfolio CPT', 'fl-builder' ), 
		'sw_select_portfolio_render', 
		'beaverLodge', 
		'sw_beaverlodge_beaverLodge_section' 
	);     	

	add_settings_field( 
		'sw_select_resizer', 
		__( 'SW Resizer', 'fl-builder' ), 
		'sw_select_resizer_render', 
		'beaverLodge', 
		'sw_beaverlodge_beaverLodge_section' 
	);   	

	add_settings_field( 
		'sw_select_login', 
		__( 'Custom Login', 'fl-builder' ), 
		'sw_select_login_render', 
		'beaverLodge', 
		'sw_beaverlodge_beaverLodge_section' 
	);    	

	add_settings_field( 
		'sw_select_nextpage', 
		__( 'Enable Next Page', 'fl-builder' ), 
		'sw_select_nextpage_render', 
		'beaverLodge', 
		'sw_beaverlodge_beaverLodge_section' 
	);  	

	add_settings_field( 
		'sw_select_bootstrap', 
		__( 'Enqueue Bootstrap', 'fl-builder' ), 
		'sw_select_bootstrap_render', 
		'beaverLodge', 
		'sw_beaverlodge_beaverLodge_section' 
	);

	add_settings_field( 
		'sw_beaverlodge_text_field_5', 
		__( 'Custom Map Style Code', 'fl_builder' ), 
		'sw_beaverlodge_text_field_5_render', 
		'beaverLodge', 
		'sw_beaverlodge_beaverLodge_section' 
	);

    if ( file_exists( FL_BUILDER_DIR . 'includes/admin-settings-branding.php' ) ) {
	add_settings_field( 
		'sw_beaverlodge_text_field_8', 
		__( 'Topbar FadeIn', 'fl_builder' ), 
		'sw_beaverlodge_text_field_8_render', 
		'beaverLodge', 
		'sw_beaverlodge_beaverLodge_section' 
	);
    }

}


// gallery cpt
function sw_beaverlodge_text_field_1_render(  ) { 

	$options = get_option( 'sw_beaverlodge_settings' );
    if($options['sw_beaverlodge_text_field_1']==1) { $checked = 'checked'; } else { $checked = ''; }
	?>
	<input type='checkbox' name='sw_settings[sw_beaverlodge_text_field_1]' <?php echo $checked; ?> value='1'>
	<?php

}

function sw_beaverlodge_text_field_9_render(  ) { 

	$options = get_option( 'sw_beaverlodge_settings' );
	?>
    <input type='checkbox' name='sw_settings[sw_beaverlodge_text_field_9]' <?php checked( $options['sw_beaverlodge_text_field_9'], 1 ); ?> value='1'>
	<?php

}


function sw_beaverlodge_text_field_2_render(  ) { 

	$options = get_option( 'sw_beaverlodge_settings' );
	?>
    <input type='checkbox' name='sw_settings[sw_beaverlodge_text_field_2]' <?php checked( $options['sw_beaverlodge_text_field_2'], 1 ); ?> value='1'>
	<?php

}




function sw_beaverlodge_text_field_4_render(  ) { 

	$options = get_option( 'sw_beaverlodge_settings' );
	?>
	 
	<?php

}






function sw_beaverlodge_text_field_7_render(  ) { 

	$options = get_option( 'sw_beaverlodge_settings' );
	?>
    <input type='checkbox' name='sw_settings[sw_beaverlodge_text_field_7]' <?php checked( $options['sw_beaverlodge_text_field_7'], 1 ); ?> value='1'>
	<?php

}










function sw_beaverlodge_text_field_8_render(  ) { 

	$options = get_option( 'sw_beaverlodge_settings' );
	?>
	<input type='text' name='sw_beaverlodge_settings[sw_beaverlodge_text_field_8]' value='<?php echo $options['sw_beaverlodge_text_field_8']; ?>' >px
	<?php

}





function sw_beaverlodge_text_field_5_render(  ) { 

	$options = get_option( 'sw_beaverlodge_settings' );
	?>
<p>Visit <a href="https://snazzymaps.com/" target="_blank">Snazzy Maps</a> for custom styles</p>
	<textarea cols='40' rows='20' name='sw_beaverlodge_settings[sw_beaverlodge_text_field_5]'><?php echo $options['sw_beaverlodge_text_field_5']; ?></textarea>
	<?php

}



function sw_beaverlodge_text_field_6_render(  ) { 

    $options = get_option( 'sw_beaverlodge_settings' );
    ?>
    <input type='text' name='sw_beaverlodge_settings[sw_beaverlodge_text_field_6]' value='<?php echo $options['sw_beaverlodge_text_field_6']; ?>' >
    <?php

}

function sw_select_gallery_render(  ) { 

	$options = get_option( 'sw_beaverlodge_settings' );
	?>
	<select name='sw_beaverlodge_settings[sw_select_gallery]'>
		<option value='1' <?php selected( $options['sw_select_gallery'], 1 ); ?>>Enabled</option>
		<option value='2' <?php selected( $options['sw_select_gallery'], 2 ); ?>>Disabled</option>
	</select>

<?php

}


function sw_select_team_render(  ) { 

	$options = get_option( 'sw_beaverlodge_settings' );
	?>
	<select name='sw_beaverlodge_settings[sw_select_team]'>
		<option value='1' <?php selected( $options['sw_select_team'], 1 ); ?>>Enabled</option>
		<option value='2' <?php selected( $options['sw_select_team'], 2 ); ?>>Disabled</option>
	</select>

<?php

}


function sw_select_portfolio_render(  ) { 

	$options = get_option( 'sw_beaverlodge_settings' );
	?>
	<select name='sw_beaverlodge_settings[sw_select_portfolio]'>
		<option value='1' <?php selected( $options['sw_select_portfolio'], 1 ); ?>>Enabled</option>
		<option value='2' <?php selected( $options['sw_select_portfolio'], 2 ); ?>>Disabled</option>
	</select>

<?php

}


function sw_select_resizer_render(  ) { 

	$options = get_option( 'sw_beaverlodge_settings' );
	?>
	<select name='sw_beaverlodge_settings[sw_select_resizer]'>
		<option value='1' <?php selected( $options['sw_select_resizer'], 1 ); ?>>Enabled</option>
		<option value='2' <?php selected( $options['sw_select_resizer'], 2 ); ?>>Disabled</option>
	</select>

<?php

}


function sw_select_login_render(  ) { 

	$options = get_option( 'sw_beaverlodge_settings' );
	?>
	<select name='sw_beaverlodge_settings[sw_select_login]'>
		<option value='1' <?php selected( $options['sw_select_login'], 1 ); ?>>Disabled</option>
		<option value='2' <?php selected( $options['sw_select_login'], 2 ); ?>>Enabled</option>
	</select>

<?php

}


function sw_select_nextpage_render(  ) { 

	$options = get_option( 'sw_beaverlodge_settings' );
	?>
	<select name='sw_beaverlodge_settings[sw_select_nextpage]'>
		<option value='1' <?php selected( $options['sw_select_nextpage'], 1 ); ?>>Disabled</option>
		<option value='2' <?php selected( $options['sw_select_nextpage'], 2 ); ?>>Enabled</option>
	</select>

<?php

}


function sw_select_bootstrap_render(  ) { 

	$options = get_option( 'sw_beaverlodge_settings' );
	?>
	<select name='sw_beaverlodge_settings[sw_select_bootstrap]'>
		<option value='1' <?php selected( $options['sw_select_bootstrap'], 1 ); ?>>Disabled</option>
		<option value='2' <?php selected( $options['sw_select_bootstrap'], 2 ); ?>>Enabled</option>
	</select>
    <p><em>Enable if the OnClick PopUp isnt working</em></p>

<?php

}

function sw_beaverlodge_settings_section_callback(  ) { 
    if ( file_exists( FL_BUILDER_DIR . 'includes/admin-settings-branding.php' ) ) {
        echo __( '', 'fl-builder' ); 
    } else {        
        echo __( '<a href="https://www.wpbeaverbuilder.com/?fla=283">Upgrade to unlock features</a>', 'fl-builder' );
    }
}


function sw_beaverlodge_options_page(  ) { 
    if ( file_exists( FL_BUILDER_DIR . 'includes/admin-settings-branding.php' ) ) {
        $options = get_option( 'sw_beaverlodge_settings' );
        $branding = $options['sw_beaverlodge_text_field_6'] . ' Modules';
        if ($branding == ' Modules') {
            $branding =  'BeaverLodgeHQ Modules';
        }
    } else {
        $branding =  'BeaverLodgeHQ Modules';
    }    
	?>

	<form action='options.php' method='post'>

		<h1 style="color:#0085ba;"><?php echo $branding; ?></h1>
	
		<?php
		settings_fields( 'beaverLodge' );
		do_settings_sections( 'beaverLodge' );
    
		submit_button();
    
		?>
		
	</form>

	<?php
    
}