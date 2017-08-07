<?php

class SWPopupClass extends FLBuilderModule {

    public function __construct()
    {

        parent::__construct(array(
            'name'          => __( 'Popup Window', 'fl-builder' ),
            'description'   => __( 'Add popup content form to your site!', 'fl-builder' ),
            'category'      => BRANDING,
            'dir'           => SW_POPUP_MODULE_DIR . '/',
            'url'           => SW_POPUP_MODULE_URL . '/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));

        $this->add_css('subscribe-better-css', $this->url . 'css/subscribe-better.css');
        $this->add_js('jquery-subscribe-better-js', $this->url . '/js/jquery.subscribe-better.js', array(), '', true);        
        
    }    
    

}

FLBuilder::register_module( 'SWPopupClass', array(
    
    
    

    'content-tab'       => array(
        'title'         => __('Content Settings', 'fl-builder'),
        
        'sections'      => array(
            
            'selection'       => array(
                'title'         => __('Content Selection', 'fl-builder'), 
                'fields'        => array( // Section Fields
                    
                    'content'     => array(
                        'type'          => 'select',
                        'label'         => __('Content', 'fl-builder'),
                        'default'       => 'mailchimp',
                        'options'       => array (
                                'mailchimp'     => 'MailChimp',
                                'html'          => 'HTML',
                            ),
                    ), // end content
                )
            ), // end selection section
            
            'effect'       => array(
                'title'         => __('Form Settings', 'fl-builder'), 
                'fields'        => array( // Section Fields
                    
                    'trigger'     => array(
                        'type'          => 'select',
                        'label'         => __('Trigger', 'fl-builder'),
                        'default'       => 'onload',
                        'options'       => array(
                            'atendpage'    => 'Attend Page',
                            'onload'        => 'On Load',
                            'onidle'        => 'On Idle',
                        ),
                        'help'          => 'Choose your trigger when form displays<br />Available triggers are "atendpage" which will display when the user scrolls to the bottom of the page, "onload" which will display once the page is loaded, and "onidle" which will display after you\'ve scrolled. The default value is “atendpage”.',
                    ), // end trigger
                    
                    
                    'mc_animation'     => array(
                        'type'          => 'select',
                        'label'         => __('Animation', 'fl-builder'),
                        'default'       => 'fade',
                        'options'       => array(
                            'fade'    => 'Fade In',
                            'flyInLeft'        => 'Fly In Left',
                            'flyInRight'        => 'Fly In Right',
                            'flyInUp'        => 'Fly In Up',
                            'flyInDown'        => 'Fly In Down',
                        ),
                        'help'          => 'You can define the entrance modal animation here. Available options are “fade”, “flyInLeft”, “flyInRight”, “flyInUp” and “flyInDown”. The default value is “fade”.',
                    ), // end animation
                    
                    'delay'     => array(
                        'type'          => 'text',
                        'label'         => __('Delay', 'fl-builder'),
                        'default'       => '0',
                        'maxlength'       => '4',
                        'size'       => '5',
                        'description'       => 'ms',
                        'help'          => 'With the delay option, you can set the time between the trigger and the appearance of the modal window. This works on all triggers. The value should be in milliseconds for example, 3000 for 3 seconds. The default value is 0.',
                    ), // end animation
                    
                )
            ), // end effect
        
        )
    ), // end content-tab
    
    

    'mailchimp-tab'       => array(
        'title'         => __('MailChimp', 'fl-builder'),
        
        'sections'      => array(
            
            'mailchimp'       => array(
                'title'         => __('MailChimp Form', 'fl-builder'), 
                'fields'        => array( // Section Fields
                    
                    'url'     => array(
                        'type'          => 'text',
                        'label'         => __('URL', 'fl_builder'),
                        'help'          => 'Enter your forms signup URL<br /><em>Not the shorturl</em>',
                    ),
                    
                    'image'     => array(
                        'type'          => 'photo',
                        'label'         => __('Image', 'fl_builder'),
                        'help'          => 'Choose your featured image',
                        'placeholder'   => __( 'http://www.example.com/my-photo.jpg', 'fl-builder'), 
                    ),
                    
                )
            ), // end mailchimp
            
            'mailchimp-header'       => array(
                'title'         => __('MailChimp Heading', 'fl-builder'), 
                'fields'        => array( // Section Fields
                                        
                    'heading'     => array(
                        'type'          => 'editor',
                        'media_buttons' => false,
                        'rows'          => 16,
                        'help'          => 'Choose you attention grabbing headline',
                    ),
                    
                )
            ), // end mailchimp header
        
            'mailchimp-subtitle'       => array(
                'title'         => __('MailChimp Subtitle', 'fl-builder'), 
                'fields'        => array( // Section Fields
                                        
                    'subtitle'     => array(
                        'type'          => 'editor',
                        'media_buttons' => false,
                        'rows'          => 16,
                        'help'          => 'Choose your subject\s subtitle',
                    ),
                )
            ), // end mailchimp subtitle
        

    )
    ), // end mailchimp-tab

    'html-tab'       => array(
        'title'         => __('HTML', 'fl-builder'),
        
        'sections'      => array(
            
            'html-content'       => array(
                'title'         => __('HTML Form', 'fl-builder'), 
                'fields'        => array( // Section Fields
                    
                    'html'     => array(
                        'type'          => 'editor',
                        'media_buttons' => false,
                        'rows'          => 16,
				        'help' => 'Enter in your html to display in the popup',	
                    ),
                    
                )
            ), // end html
        
        )
    ), // end html
    
    'style-tab'       => array(
        'title'         => __('Style', 'fl-builder'),
        
        'sections'      => array(
            
            'html-content'       => array(
                'title'         => __('Form Styling', 'fl-builder'), 
                'fields'        => array( // Section Fields
                    
                    'mc_header_color'     => array(
                        'type'          => 'color',
                        'label'         => __('Heading Color', 'fl-builder'),
                        'default'       => '565656',
                        'show_reset'    => true,
                    ), // end mc-header
                    
                    'mc_header_fontsize'     => array(
                        'type'          => 'text',
                        'label'         => __('Header Font', 'fl-builder'),
                        'default'       => '',
                        'maxlength'     => '2',
                        'size'          => '3',
                        'placeholder'   => '10',
                        'description'   => 'px',
                    ), // end mc-header-fontsize
                    
                    'header_font'          => array(
						'type'          => 'font',
						'default'		=> array(
							'family'		=> 'Default',
							'weight'		=> 300
						),
						'label'         => __('Header Font', 'fl-builder'),
						'preview'         => array(
							'type'            => 'font',
							'selector'        => '.sb-heading p'
						)					
					), // end header_font
                     
                    'mc_sub_color'     => array(
                        'type'          => 'color',
                        'label'         => __('Subtitle Color', 'fl-builder'),
                        'default'       => '565656',
                        'show_reset'    => true,
                    ), // end mc-sub
                    
                    'mc_sub_fontsize'     => array(
                        'type'          => 'text',
                        'label'         => __('Subtitle Font', 'fl-builder'),
                        'default'       => '',
                        'maxlength'     => '2',
                        'size'          => '3',
                        'placeholder'   => '10',
                        'description'   => 'px',
                    ), // end mc-sub-fontsize
                    
                    'sub_font'          => array(
						'type'          => 'font',
						'default'		=> array(
							'family'		=> 'Default',
							'weight'		=> 300
						),
						'label'         => __('Subtitle Font', 'fl-builder'),
						'preview'         => array(
							'type'            => 'font',
							'selector'        => '.sb-subtitle p'
						)					
					), // end sub_font
                    
                    'mc_button_color'     => array(
                        'type'          => 'color',
                        'label'         => __('Button Color', 'fl-builder'),
                        'default'       => '428bca',
                        'show_reset'    => true,
                    ), // end mc-button
                    
                    'mc_button_hover_color'     => array(
                        'type'          => 'color',
                        'label'         => __('Button Hover Color', 'fl-builder'),
                        'default'       => '2d6ca2',
                        'show_reset'    => true,
                    ), // end mc-hover-button
                    
                    'mc_button_font_color'     => array(
                        'type'          => 'color',
                        'label'         => __('Button Font Color', 'fl-builder'),
                        'default'       => 'ffffff',
                        'show_reset'    => true,
                    ), // end mc-button-color
                    
                    'mc_button_hover_font_color'     => array(
                        'type'          => 'color',
                        'label'         => __('Button Hover Font Color', 'fl-builder'),
                        'default'       => 'ffffff',
                        'show_reset'    => true,
                    ), // end mc-button-color-hover
                    
                    'mc_overlay_color'     => array(
                        'type'          => 'color',
                        'label'         => __('Background Overlay Color', 'fl-builder'),
                        'default'       => '000000',
                        'show_reset'    => true,
                    ), // end mc_overlay_color
                    
                    
                    'mc_overlay_opacity'     => array(
                        'type'          => 'text',
                        'label'         => __('Background Overlay Opacity', 'fl-builder'),
                        'default'       => '0.8',
                        'maxlength'     => '4',
                        'size'          => '5',
                        'placeholder'   => '0.8',
                        'description'   => '0 - 1',
                    ), // end mc_overlay_opacity
                    
                )
            ), // end html
        
        )
    ), // end html-tab

));
                        