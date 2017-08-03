<?php

add_action( 'admin_menu', 'bl_beaverlodge_add_admin_menu' );
add_action( 'admin_init', 'bl_beaverlodge_settings_init' );

function bl_beaverlodge_add_admin_menu(  ) {
    
    $labels = get_option( 'bl_options' );
    $field_logo = 'label_logo';
    
    $logo = $labels[$field_logo];
    $picture = plugins_url( 'lib/images/beaver.png', __FILE__ );
    if ( $logo != '' )  {
        $icon = $logo;
    } else {
        $icon = $picture;
    }
    $field_name = 'label_name';
    
    $name = $labels[$field_name];
    $beaver = 'Beaverlodge Settings';
    if ( $name != '' )  {
        $brand = $name;
    } else {
        $brand = $beaver;
    }

    $options = get_option( 'bl_beaverlodge_settings' );
    
    add_menu_page( $brand, $brand, 'manage_options', 'beaverlodge_modules', 'bl_beaverlodge_options_page', $icon );
    
    add_submenu_page( 'beaverlodge_modules', 'Help', 'Help', 'manage_options', 'beaverlodge_help', 'bl_beaverlodge_help' );
    
//    add_submenu_page( 'beaverlodge_modules', 'License', 'License', 'manage_options', 'beaverlodge_license', 'bl_beaverlodge_license' );
    
    if ($options['bl_gmap'] == '2') {
        add_submenu_page( 'beaverlodge_modules', 'gMap', 'gMap', 'manage_options', 'beaverlodge_gmap', 'bl_gmap_options_page' );
    }

}



function bl_beaverlodge_settings_init(  ) { 

	register_setting( 'beaverLodge', 'bl_beaverlodge_settings' );
    
    add_settings_section(
		'bl_beaverlodge_beaverLodge_section', 
		__( 'Choose your modules', 'fl_builder' ), 
		'bl_beaverlodge_settings_section_callback', 
		'beaverLodge'
	);	 	

	add_settings_field( 
		'bl_404_page', 
		__( '404 Error Page', 'fl-builder' ), 
		'bl_404_page_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);   	

	add_settings_field( 
		'bl_animate_text', 
		__( 'Animated Text Module', 'fl-builder' ), 
		'bl_animate_text_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);     	

	add_settings_field( 
		'bl_bar_chart', 
		__( 'Bar Chart Module', 'fl-builder' ), 
		'bl_bar_chart_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);       	

	add_settings_field( 
		'bl_breadcrumb', 
		__( 'Breadcrumbs Module', 'fl-builder' ), 
		'bl_breadcrumb_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);  	
    
    if(class_exists('Caldera_Forms')) {
        add_settings_field( 
            'bl_caldera', 
            __( 'Caldera Forms Module', 'fl-builder' ), 
            'bl_caldera_render', 
            'beaverLodge', 
            'bl_beaverlodge_beaverLodge_section' 
        );
    }
    
    if (class_exists('WPCF7_ContactForm')) { 
        add_settings_field( 
            'bl_cf7', 
            __( 'ContactForm7 Module', 'fl-builder' ), 
            'bl_cf7_render', 
            'beaverLodge', 
            'bl_beaverlodge_beaverLodge_section' 
        );  	
    }
    
	add_settings_field( 
		'bl_countdown', 
		__( 'Countdown Module', 'fl-builder' ), 
		'bl_countdown_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);  	

	add_settings_field( 
		'bl_viewer', 
		__( 'Document Viewer Module', 'fl-builder' ), 
		'bl_viewer_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);

	add_settings_field( 
		'bl_dual_callout', 
		__( 'Dual Callout Module', 'fl_builder' ), 
		'bl_dual_callout_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);

	add_settings_field( 
		'bl_ecommerce_menu', 
		__( 'eCommerce Menu Module', 'fl_builder' ), 
		'bl_ecommerce_menu_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);

	add_settings_field( 
		'bl_facebook', 
		__( 'Facebook Module', 'fl_builder' ), 
		'bl_facebook_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);

	add_settings_field( 
		'bl_flip', 
		__( 'Flip Card Module', 'fl_builder' ), 
		'bl_flip_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);

	add_settings_field( 
		'bl_footer', 
		__( 'Footer Module', 'fl_builder' ), 
		'bl_footer_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);

	add_settings_field( 
		'bl_gmap', 
		__( 'gMap Module', 'fl_builder' ), 
		'bl_gmap_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);

	add_settings_field( 
		'bl_heading', 
		__( 'Heading Module', 'fl_builder' ), 
		'bl_heading_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);

	add_settings_field( 
		'bl_hero_header', 
		__( 'Hero Header Module', 'fl_builder' ), 
		'bl_hero_header_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);

	add_settings_field( 
		'bl_hover_card', 
		__( 'Hover Card Module', 'fl_builder' ), 
		'bl_hover_card_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);

	add_settings_field( 
		'bl_hover_effects', 
		__( 'Hover Effects Module', 'fl_builder' ), 
		'bl_hover_effects_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);

	add_settings_field( 
		'bl_instagram', 
		__( 'Instagram Module', 'fl_builder' ), 
		'bl_instagram_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);

	add_settings_field( 
		'bl_list', 
		__( 'Lists Module', 'fl_builder' ), 
		'bl_list_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);

	add_settings_field( 
		'bl_login', 
		__( 'Login Module', 'fl_builder' ), 
		'bl_login_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);

	add_settings_field( 
		'bl_masonry', 
		__( 'Masonry Module', 'fl_builder' ), 
		'bl_masonry_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);

	add_settings_field( 
		'bl_news_ticker', 
		__( 'News Ticker Module', 'fl_builder' ), 
		'bl_news_ticker_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);   

	add_settings_field( 
		'bl_next_page', 
		__( 'Next Page Module', 'fl_builder' ), 
		'bl_next_page_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);     	

	add_settings_field( 
		'bl_bootstrap_modal', 
		__( 'onClick Modal Module', 'fl-builder' ), 
		'bl_bootstrap_modal_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	); 

	add_settings_field( 
		'bl_pinterest', 
		__( 'Pinterest Layout Module', 'fl_builder' ), 
		'bl_pinterest_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);

	add_settings_field( 
		'bl_password', 
		__( 'Password Reset Module', 'fl_builder' ), 
		'bl_password_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);

	add_settings_field( 
		'bl_popup', 
		__( 'Popup Module', 'fl_builder' ), 
		'bl_popup_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);

	add_settings_field( 
		'bl_portfolio', 
		__( 'Portfolio Module', 'fl_builder' ), 
		'bl_portfolio_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);

	add_settings_field( 
		'bl_resizer', 
		__( 'Resizer Module', 'fl_builder' ), 
		'bl_resizer_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);

	add_settings_field( 
		'bl_social', 
		__( 'Social Share Module', 'fl_builder' ), 
		'bl_social_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);


	add_settings_field( 
		'bl_tables', 
		__( 'Table Module', 'fl_builder' ), 
		'bl_tables_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);


	add_settings_field( 
		'bl_toolbar_cta', 
		__( 'Toolbar Call To Action Module', 'fl_builder' ), 
		'bl_toolbar_cta_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);


	add_settings_field( 
		'bl_tooltips', 
		__( 'Tooltips Module', 'fl_builder' ), 
		'bl_tooltips_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);


	add_settings_field( 
		'bl_turbotabs', 
		__( 'Turbotabs Module', 'fl_builder' ), 
		'bl_turbotabs_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);


	add_settings_field( 
		'bl_vert_timeline', 
		__( 'Vertical Timeline Module', 'fl_builder' ), 
		'bl_vert_timeline_render', 
		'beaverLodge', 
		'bl_beaverlodge_beaverLodge_section' 
	);

    if ( class_exists( 'woocommerce' ) ) {
        add_settings_field( 
            'bl_woo_featured', 
            __( 'WooCommerce Featured Module', 'fl_builder' ), 
            'bl_woo_featured_render', 
            'beaverLodge', 
            'bl_beaverlodge_beaverLodge_section' 
        );


        add_settings_field( 
            'bl_woo_recent', 
            __( 'WooCommerce Recent Module', 'fl_builder' ), 
            'bl_woo_recent_render', 
            'beaverLodge', 
            'bl_beaverlodge_beaverLodge_section' 
        );


        add_settings_field( 
            'bl_woo_sale', 
            __( 'WooCommerce Sale Module', 'fl_builder' ), 
            'bl_woo_sale_render', 
            'beaverLodge', 
            'bl_beaverlodge_beaverLodge_section' 
        );
    }

        add_settings_field( 
            'bl_bootstrap_scripts', 
            __( 'Bootstrap Scripts', 'fl_builder' ), 
            'bl_bootstrap_scripts_render', 
            'beaverLodge', 
            'bl_beaverlodge_beaverLodge_section' 
        );
    
      
    
}

function bl_404_page_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?><hr>
    <div>
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_404_page]'>
                <option value='1' <?php selected( $options['bl_404_page'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_404_page'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/404.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>A 404 page is when someone lands on a page that doesnt exist on the site, by enabling this module, it gives you the ability to create a template called 404 in the Page Builder so you can stlye and design that page however you like.</p>
        </div>
    </div>

<?php

}


function bl_animate_text_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?><hr>
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_animate_text]'>
                <option value='1' <?php selected( $options['bl_animate_text'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_animate_text'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/animated.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>The animated text module allows you to add text to the site that looks like it is being typed on the screen for the viewer. A great way to draw attention to an element on a page.</p>
        </div>
    </div>

<?php

}


function bl_bar_chart_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?><hr>
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_bar_chart]'>
                <option value='1' <?php selected( $options['bl_bar_chart'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_bar_chart'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/chart.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>The bar chart module is a easy way to display some basic data within your site. With a real intuitive design, adding data has never been easier with this great module.</p>
        </div>
    </div>

<?php

}


function bl_bootstrap_modal_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?><hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_bootstrap_modal]'>
                <option value='1' <?php selected( $options['bl_bootstrap_modal'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_bootstrap_modal'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/modal.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>A modal window is a pop up box that hovers over the page until the viewer dismisses it. A great way to put the latest product, contact form, newsletter signups or a range of content.</p>
        </div>
    </div>

<?php

}


function bl_bootstrap_scripts_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?><hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_bootstrap_scripts]'>
                <option value='1' <?php selected( $options['bl_bootstrap_scripts'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_bootstrap_scripts'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/modal.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>If you find you onClick Modal windows are not working, try enabling Bootstrap.</p>
        </div>
    </div>

<?php

}


function bl_caldera_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_caldera]'>
                <option value='1' <?php selected( $options['bl_caldera'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_caldera'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/contact.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>Caldera Forms is one of the most advanced free contact form plugins available for WordPress. With this module you can add and style your form simply and easily.</p>
        </div>
    </div>

<?php

}


function bl_cf7_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_cf7]'>
                <option value='1' <?php selected( $options['bl_cf7'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_cf7'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/contact.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>ContactFomrm7 is one of the most popular free contact form plugins available for WordPress. With this module you can add and style your form simply and easily.</p>
        </div>
    </div>

<?php

}


function bl_countdown_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_countdown]'>
                <option value='1' <?php selected( $options['bl_countdown'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_countdown'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/countdown.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>The countdown module allows you to adds a stylish countdown clock to your site that will count down to a specific date and time.</p>
        </div>
    </div>

<?php

}


function bl_dual_callout_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	
	<hr>
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_dual_callout]'>
                <option value='1' <?php selected( $options['bl_dual_callout'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_dual_callout'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/dualcallout.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>With the dual callout you get the ability to add two buttons with hero text, header, icon or image, then style how you like.</p>
        </div>
    </div>

<?php

}


function bl_ecommerce_menu_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_ecommerce_menu]'>
                <option value='1' <?php selected( $options['bl_ecommerce_menu'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_ecommerce_menu'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/ecommercemenu.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>The eCommerce menu module is a great option for e-commerce sites, and for other sites looking to display items and products. It uses some nice animations to create a very attractive item display.</p>
        </div>
    </div>

<?php

}


function bl_facebook_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_facebook]'>
                <option value='1' <?php selected( $options['bl_facebook'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_facebook'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/facebook.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>Designed to work with Facebook Business Pages, this module allow you can create awesome galleries from your Facebook pages photo albums.</p>
        </div>
    </div>

<?php

}


function bl_flip_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_flip]'>
                <option value='1' <?php selected( $options['bl_flip'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_flip'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/flip.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>Easily add content that flips on click or hover to reveal more on the back of the card. You can use images and text over the top of a solid colour or image background.</p>
        </div>
    </div>

<?php

}


function bl_footer_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_footer]'>
                <option value='1' <?php selected( $options['bl_footer'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_footer'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/footer.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>A simple footer module that allows you to enter a custom copyright and also features a link to have a scroll to the top with a smooth transition.</p>
        </div>
    </div>

<?php

}


function bl_gmap_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_gmap]'>
                <option value='1' <?php selected( $options['bl_gmap'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_gmap'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/gmap.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>gMap is the ultimate module to create and manage Google Maps. Based on an advanced managment system, the gMap module allows you to finely manipulate yours markers and style the colour scheme for any site.</p>
        </div>
    </div>

<?php

}


function bl_heading_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_heading]'>
                <option value='1' <?php selected( $options['bl_heading'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_heading'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/heading.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>Add and style simple heading to your site the features the ability to add borders on either side, above and blow your heading.</p>
        </div>
    </div>

<?php

}


function bl_hero_header_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_hero_header]'>
                <option value='1' <?php selected( $options['bl_hero_header'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_hero_header'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/hero_header.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>The hero header allows you to place your page or post title full width across the page with your featured image as the background. It also has a breadcrumbs menu and links to the meta fields.</p>
        </div>
    </div>

<?php

}


function bl_hover_card_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_hover_card]'>
                <option value='1' <?php selected( $options['bl_hover_card'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_hover_card'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/hover_card.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>Add a grid of panels that have a revealing hover effect that works with posts, WooCommerce, custom content and the included Team Member custom post type.</p>
        </div>
    </div>

<?php

}


function bl_hover_effects_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_hover_effects]'>
                <option value='1' <?php selected( $options['bl_hover_effects'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_hover_effects'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/hover_effects.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>Add a grid of panels that have a range of amazing hover effect that work with either posts or custom content, and features over 20 different effects.</p>
        </div>
    </div>

<?php

}


function bl_instagram_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_instagram]'>
                <option value='1' <?php selected( $options['bl_instagram'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_instagram'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/instagram.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>With this module, you can create an awesome gallery from your Instagram feed.</p>
        </div>
    </div>

<?php

}


function bl_login_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_login]'>
                <option value='1' <?php selected( $options['bl_login'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_login'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/login.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>Design your own login page using any combination of modules and layouts. The perfect way to ensure your branding is consistent across your entire site.</p>
            <p style="font-weight: bold; font-style: italics; background-color: #BF0C43; font-size: 0.8em; color: #ffffff;padding: 10px; text-align: center;">**** WARNING ****<br />Enabling this plugin bypasses your standard login page, please ensure you understand how to use this feature before enabling</p>
        </div>
    </div>

<?php

}


function bl_masonry_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_masonry]'>
                <option value='1' <?php selected( $options['bl_masonry'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_masonry'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/masonry.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>Using the included Gallery post type create a beautiful, responsive, gallery layout with a masonry, grid or horizontal scrolling layout. Featues the ability to link to pages as well as the included lightbox feature.</p>
        </div>
    </div>

<?php

}


function bl_news_ticker_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_news_ticker]'>
                <option value='1' <?php selected( $options['bl_news_ticker'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_news_ticker'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/news_ticker.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>The News Ticker module scrolls the list of posts infinitely. It is highly customizable, flexible with lot of features and works in all browsers.</p>
        </div>
    </div>

<?php

}


function bl_next_page_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_next_page]'>
                <option value='1' <?php selected( $options['bl_next_page'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_next_page'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/next.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>The Next Page module adds in a backend page that will allow you to create links to pages using next and previous buttons. It also allows you to skip pages that you do not want people to navigate to. Then you can add to the front end with our module and style the buttons however you like.</p>
        </div>
    </div>

<?php

}


function bl_password_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_password]'>
                <option value='1' <?php selected( $options['bl_password'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_password'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/reset.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>Add a password reset module to any page you want.</p>
        </div>
    </div>

<?php

}


function bl_pinterest_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_pinterest]'>
                <option value='1' <?php selected( $options['bl_pinterest'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_pinterest'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/pinterest.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>Add a masonry post layout as seen on Pinterest. Works with the posts, WooCommerce and the included Team Member and Portfolio post types.</p>
        </div>
    </div>

<?php

}


function bl_popup_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_popup]'>
                <option value='1' <?php selected( $options['bl_popup'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_popup'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/modal.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>Another modal module, this one has the popup appear automatically. Choose to have it appear on page load, after a predetermined time, or after a chosen scroll amount.</p>
        </div>
    </div>

<?php

}


function bl_portfolio_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_portfolio]'>
                <option value='1' <?php selected( $options['bl_portfolio'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_portfolio'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/portfolio.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>Add your portfolio of work to our included Portfolio post type, and then use this module to display the images with links to the post. Also allows your visitors to filter by the category menu.</p>
        </div>
    </div>

<?php

}


function bl_resizer_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_resizer]'>
                <option value='1' <?php selected( $options['bl_resizer'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_resizer'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/resizer.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>Page Builder forms can look small on large screens or cover your content on smaller screens. With this module it gives you the ability to style the Page Builder forms to create a better work experience when designing your site.</p>
        </div>
    </div>

<?php

}


function bl_tables_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_tables]'>
                <option value='1' <?php selected( $options['bl_tables'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_tables'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/table.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>Creating a responsive table design is notoriously difficult, especially without knowing code. This amazing module will allow you to create a semantic table that has two responsive modes, stacking or scrolling, and also features a filter option.</p>
        </div>
    </div>

<?php

}



function bl_toolbar_cta_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_toolbar_cta]'>
                <option value='1' <?php selected( $options['bl_toolbar_cta'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_toolbar_cta'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/toolbar.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>Got a special promotion you want to showcase at the top of your site? Perhaps you want to have a call link at the bottom of your page when people are visting your site from a mobile? Then the toolbar call to action is the perfect solution for a quick snippet and link to showcase your content.</p>
        </div>
    </div>

<?php

}



function bl_tooltips_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_tooltips]'>
                <option value='1' <?php selected( $options['bl_tooltips'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_tooltips'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/tooltips.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>Style and create a unique hover effect over text or an image. Tooltips is a great way for you to reveal more information to your viewers and engage them with a unique interacion experience.</p>
        </div>
    </div>

<?php

}



function bl_turbotabs_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_turbotabs]'>
                <option value='1' <?php selected( $options['bl_turbotabs'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_turbotabs'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/turbotabs.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>TurboTabs is responsive tabs module with plenty of options. Tab transforms into an accordion on smaller devices, and contains loads of styling options. Add background iamges, icons and loads more to the content however you like.</p>
        </div>
    </div>

<?php

}



function bl_vert_timeline_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_vert_timeline]'>
                <option value='1' <?php selected( $options['bl_vert_timeline'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_vert_timeline'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/vertical.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>This is a simple timeline with alternating colors for the labels. An icon font is used for the icons in the timeline waypoints and it is fully responsive for smaller screens. The perfect way to display either blog posts or a schedule of events.</p>
        </div>
    </div>

<?php

}



function bl_viewer_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_viewer]'>
                <option value='1' <?php selected( $options['bl_viewer'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_viewer'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/viewer.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>Document harnesses the power of Google to embed your own documents on your site, making it easy for your visitors to read without needing to download or use any third party software. Supports Excel, Word, PDF, Text, and PowerPoint.</p>
        </div>
    </div>

<?php

}



function bl_woo_featured_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_woo_featured]'>
                <option value='1' <?php selected( $options['bl_woo_featured'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_woo_featured'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/woo.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>A simple way to display and style your featured WooCommerce products.</p>
        </div>
    </div>

<?php

}



function bl_woo_recent_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_woo_recent]'>
                <option value='1' <?php selected( $options['bl_woo_recent'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_woo_recent'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/woo.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>A simple way to display and style your featured WooCommerce products.</p>
        </div>
    </div>

<?php

}



function bl_woo_sale_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_woo_sale]'>
                <option value='1' <?php selected( $options['bl_woo_sale'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_woo_sale'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/woo.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>A simple way to display and style your on sale WooCommerce products.</p>
        </div>
    </div>

<?php

}



function bl_social_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_social]'>
                <option value='1' <?php selected( $options['bl_social'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_social'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/share.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>Add social sharing icons to your site that allow you to manipulate the image and content that displays for social media platforms. Supports Facebook, Twitter, Google+, LinkedIn and Pinterest</p>
        </div>
    </div>

<?php
}



function bl_list_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_list]'>
                <option value='1' <?php selected( $options['bl_list'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_list'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/list.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>Add custom unordered lists to your site and use custom icons as the bullets to style however you like.</p>
        </div>
    </div>

<?php

}



function bl_breadcrumb_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	<hr>
	
	<div style="">
        <div style="width: 150px; float: left">
            <select name='bl_beaverlodge_settings[bl_breadcrumb]'>
                <option value='1' <?php selected( $options['bl_breadcrumb'], 1 ); ?>>Disabled</option>
                <option value='2' <?php selected( $options['bl_breadcrumb'], 2 ); ?>>Enabled</option>
            </select>
        </div>
        <div style="width: 200px; float: left; text-align: center;">
            <?php echo '<img src="' . plugins_url( 'lib/images/breadcrumbs.png', __FILE__ ) . '" height="100px" style=""> '; ?>
        </div>
        <div style="width: 400px; float: left;">
            <p>Add a custom breadcrumb navigation to your site and have full control of how it is styled and designed.</p>
        </div>
    </div>

<?php

}



function bl_activate_render(  ) { 

	$options = get_option( 'bl_beaverlodge_settings' );
	?>
	
	<div style="">
        <div style="width: 150px; float: left">
            <input type='checkbox' name='bl_beaverlodge_settings[bl_activate]' <?php checked( $options['bl_activate'], 1 ); ?> value='1'>
        </div>
        <div style="width: 200px; float: left;">
            <?php submit_button(); ?>
        </div>
        <div style="width: 400px; float: left;">
        </div>
    </div>

<?php

}




function bl_beaverlodge_settings_section_callback(  ) { 
   
    echo __( '<p>With over 30 modules to choose from, designing a website has never been this easy.</p>', 'fl-builder' );
   submit_button();

}


function bl_beaverlodge_options_page(  ) { 
	?>

	<form action='options.php' method='post'>

		<h1>Modules & Settings</h1>
                <?php
                
                settings_fields( 'beaverLodge' );
                do_settings_sections( 'beaverLodge' );

                submit_button();

                ?>
		
	</form>

	<?php
    
}

function beaverlodge_modules_page() {
    

    
}



function bl_beaverlodge_help() {
    
    echo '<h1>Help Content</h1>';
    ?>
    <br />
    <h2>404 Error Page</h2>
    <p>Once you have enabled the 404 Error Page in order to use you will need to create a Template and call it 404.</p> 
    <p>You can design that template however you like and if anyones visits a broken link, they will be greeted with your custom 404 page.</p>
    <br /><hr>
    <h2>Login Module</h2>
    <p>You need to be aware that enabling the Login Module can break your site if you do not finish the setup before logging out.</p>
    <p>This module creates a page called Login (if it doesnt, just create a page ensuring the slug is login) to which you can style however you like.</p>
    <p>The biggest thing you need to ensure is to add the Login Module otherwise you will not be able to login.</p>
    <?php
    
}

function bl_gmap_settings_init(  ) { 

	register_setting( 'bl_gmap', 'bl_gmap_settings' );

	add_settings_section(
		'bl_gmap_pluginPage_section', 
		__( 'Snazzy Map Code', 'fl-builder' ), 
		'bl_gmap_settings_section_callback', 
		'bl_gmap'
	);

	add_settings_field( 
		'bl_gmap_textarea_field_0', 
		__( 'Paste Code Here', 'fl-builder' ), 
		'bl_gmap_textarea_field_0_render', 
		'bl_gmap', 
		'bl_gmap_pluginPage_section' 
	);


}
add_action( 'admin_init', 'bl_gmap_settings_init' );

function bl_gmap_textarea_field_0_render(  ) { 

	$options = get_option( 'bl_gmap_settings' );
	?>
	<textarea cols='100' rows='30' name='bl_gmap_settings[bl_gmap_textarea_field_0]'><?php echo $options['bl_gmap_textarea_field_0']; ?></textarea>
	<?php

}


function bl_gmap_settings_section_callback(  ) { 

	echo __( '<a href="https://snazzymaps.com/" target="_blank">Visit Snazzy Maps here</a>', 'fl-builder' );
    submit_button();
}


function bl_gmap_options_page(  ) { 

	?>
	<form action='options.php' method='post'>
		
		<h2>gMap Styling</h2>
		
		<?php
		settings_fields( 'bl_gmap' );
		do_settings_sections( 'bl_gmap' );
		submit_button();
		?>
		
	</form>
	<?php

}
