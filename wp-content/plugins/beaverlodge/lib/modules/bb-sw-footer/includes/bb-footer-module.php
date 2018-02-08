<?php

class SWFooterClass extends FLBuilderModule {

    public function __construct()
    {
       
        parent::__construct(array(
            'name'          => __( 'Footer Module', 'fl-builder' ),
            'description'   => __( 'Add a footer to your site!', 'fl-builder' ),
            'category'      => BRANDING,
            'dir'           => SW_FOOTER_MODULE_DIR . '/',
            'url'           => SW_FOOTER_MODULE_URL . '/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
        
         $this->add_js('scroll.js', $this->url . 'js/scroll.js', array(), '', true);
    }    
    

}

FLBuilder::register_module( 'SWFooterClass', array(

    'content'       => array(
        'title'         => __('Content', 'fl-builder'),
        'sections'      => array(
            'general'       => array(
                'title'         => __('Content Selection', 'fl-builder'), 
                'fields'        => array( // Section Fields
                    'copyright'     => array(
                        'type'          => 'select',
                        'label'         => __('Choose Copyright', 'fl-builder'),
                        'default'       => 'default',
                        'options'       => array(
                            'default'      => __('Default', 'fl-builder'),
                            'custom'      => __('Custom', 'fl-builder')
                        ),
                        'toggle'        => array(
                            'default'      => array(
                                'fields'        => array(),
                                'sections'        => array(),
                            ),
                            'custom'      => array(
                                'fields'        => array('customcopyright'),
                                'sections'        => array(),
                            ),
                        )
                    ),
                    
                    'customcopyright'   => array(
                        'type'          => 'textarea',
                        'label'         => __('Choose Custom Footer', 'fl-builder'),
                        'default'    	=> '',
                    ),
                    
                    'showscroll'     => array(
                        'type'          => 'select',
                        'label'         => __('Show Scroll To Top?', 'fl-builder'),
                        'default'       => 'yes',
                        'options'       => array(
                            'yes'      => __('Yes', 'fl-builder'),
                            'no'      => __('No', 'fl-builder')
                        ),
                        'toggle'        => array(
                            'yes'      => array(
                                'fields'        => array('scrollicon'),
                                'sections'        => array(),
                            ),
                            'no'      => array(
                                'fields'        => array(),
                                'sections'        => array(),
                            ),
                        )
                    ),
                    
                    'scrollicon'     => array(
                        'type'          => 'icon',
                        'label'         => __('Scroll To Top Icon', 'fl-builder'),
                        'default'       => 'dashicons dashicons-before dashicons-arrow-up-alt',
                        'show_remove'   => true
                    ),
                    
                    'stickyFooter'     => array(
                        'type'          => 'select',
                        'label'         => __('Sticky Footer', 'fl-builder'),
                        'help'         => __('Ensures the footer is always at the bottom of the page', 'fl-builder'),
                        'default'       => 'yes',
                        'options'       => array(
                            'yes'      => __('Yes', 'fl-builder'),
                            'no'      => __('No', 'fl-builder')
                        ),
                    ),
                )
            )
        )
    ), // end content

    'style'       => array(
        'title'         => __('Style', 'fl-builder'),
        'sections'      => array(
            'general'       => array(
                'title'         => __('Style', 'fl-builder'), 
                'fields'        => array( // Section Fields
                    
                    'copyrightFont'          => array(
						'type'          => 'font',
						'default'		=> array(
							'family'		=> 'Default',
							'weight'		=> 'Default',
						),
						'label'         => __('Copyright Font', 'fl-builder'),
						'preview'         => array(
							'type'            => 'font',
							'selector'        => 'p.copyright'
						)					
					),
                    
                    'copyrightSize'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Copyright Font Size', 'fl_builder' ),
                        'maxlength'     => '4',
                        'size'          => '5',
                        'placeholder'   => '14',
                        'default'       => '14',
                        'description'   => 'px',
                        'help'          => 'Choose the font size.',
                    ),                   
                    
                    'copyrightColor'     => array(
                        'type'          => 'color',
                        'label'         => __( 'Copyright Font Color', 'fl_builder' ),
                        'default'       => '',
                        'help'          => 'Choose your font color',
                    ),                    
                    
                    'copyrightLink'     => array(
                        'type'          => 'color',
                        'label'         => __( 'Copyright Link Color', 'fl_builder' ),
                        'default'       => '',
                        'help'          => 'Choose your font hover color',
                    ),                    
                    
                    'copyrightHover'     => array(
                        'type'          => 'color',
                        'label'         => __( 'Copyright Link Color: Hover', 'fl_builder' ),
                        'default'       => '',
                        'help'          => 'Choose your font hover color',
                    ), 
                    
                    'scrollColor'     => array(
                        'type'          => 'color',
                        'label'         => __( 'Scroll to Top Color', 'fl_builder' ),
                        'default'       => '',
                        'help'          => 'Choose your color',
                    ),  
                    
                    'scrollSize'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Copyright Font Size', 'fl_builder' ),
                        'maxlength'     => '4',
                        'size'          => '5',
                        'placeholder'   => '14',
                        'default'       => '14',
                        'description'   => 'px',
                        'help'          => 'Choose the font size.',
                    ), 
                    
                ),
            ),
        ),
    ), // end style

));
                           
                        