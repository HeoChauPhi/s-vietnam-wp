<?php


class SWDualCalloutClass extends FLBuilderModule {

    public function __construct()
    {
       
        parent::__construct(array(
            'name'              => __( 'Dual Callout', 'fl-builder' ),
            'description'       => __( 'A double button callout in Beaver Builder.', 'fl-builder' ),
            'category'          => BRANDING,
            'partial_refresh'   => true,
            'dir'               => SW_DUALCALLOUT_MODULE_DIR . '/',
            'url'               => SW_DUALCALLOUT_MODULE_URL . '/',
        ));
        
        
    }    
    
}

FLBuilder::register_module( 'SWDualCalloutClass', array(
    
    'content-tab'      => array(
        
        'title'         => __( 'Content', 'fl-builder' ),
        'sections'      => array( 
            
              'content_select'  => array(
                'title'         => __( 'Content', 'fl-builder' ),
                'fields'        => array(
                    
                    'align' => array(
                        'type'          => 'select',
                        'label'         => __('Alignment', 'fl-builder'),
                        'default'       => 'center',
                        'options'       => array(
                            'flex-start'   => 'Left',
                            'center'        => 'Center',
                            'flex-end'     => 'Right',
                        ),
                    ), // end align
                    
                    'image_select' => array(
                        'type'          => 'select',
                        'label'         => __('Image Selection', 'fl-builder'),
                        'default'       => 'image',
                        'options'       => array(
                            'image'     => 'Image',
                            'icon'      => 'Icon',
                            'none'      => 'None',
                        ),
                        'toggle'        => array(
							'image'        => array(
								'fields'  => array('image')
							),
							'icon'        => array(
								'fields'  => array('icon', 'icon_size'),
								'tabs'    => array('icon_tab')
							),
						),
                    ), // end image_select
                    
                    'image' => array(
                        'type'          => 'photo',
                        'label'         => __('Image', 'fl-builder'),
                        'default'       => 'http://placehold.it/300x300?text=Fotoplugins+Placeholder',
                    ), // end image
                    
                    'icon' => array(
                        'type'          => 'icon',
                        'label'         => __('Icon', 'fl-builder'),
                        'default'       => 'fa fa-anchor',
                    ), // end icon
                    
                    'heading' => array(
                        'type'          => 'text',
                        'label'         => __( 'Heading', 'fl-builder' ),
                        'placeholder'   => 'Heading goes here...',
                    ),  
                    
                    'excerpt' => array(
                        'type'          => 'editor',
                        'label'         => __( 'Content', 'fl_builder' ),
                        'media_buttons' => true,
                        'rows'          => 10
                    ), // end excerpt
                    
                    'button_one_url' => array(
                        'type'          => 'link',
                        'label'         => __( 'Button One URL', 'fl-builder' ),
                    ), // end button_one_url
                    
                    'button_one_text' => array(
                        'type'          => 'text',
                        'label'         => __( 'Button One Text', 'fl-builder' ),
                        'default'       => 'Button A',
                    ), // end button_one_text  
                    
                    'button_two_url' => array(
                        'type'          => 'link',
                        'label'         => __( 'Button Two URL', 'fl-builder' ),
                    ), // end button_one_url
                    
                    'button_two_text' => array(
                        'type'          => 'text',
                        'label'         => __( 'Button Two Text', 'fl-builder' ),
                        'default'       => 'Button B',
                    ), // end button_one_text    
                    
                ) // end fields
                  
            ), // end content_select 
            
        ) // end sections
        
    ), // end content-tab    
    
    
    'icon_tab'      => array(
        
        'title'         => __( 'Icon Style', 'fl-builder' ),
        'sections'      => array( 
            
              'icon_style'  => array(
                'title'         => __( 'Icon Style', 'fl-builder' ),
                'fields'        => array(
                    
                    'icon_size' => array(
                        'type'          => 'text',
                        'label'         => __('Icon Size', 'fl-builder'),
                        'default'       => '40',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'description'   => 'px',
                    ), // end icon_size
                    
                    'icon_colour' => array(
                        'type'          => 'color',
                        'label'         => __( 'Icon Colour', 'fl_builder' ),
                        'default'       => 'ffffff',
                    ), // end icon_colour
                    
                    'icon_bg_radius' => array(
                        'type'          => 'select',
                        'label'         => __('Icon Background', 'fl-builder'),
                        'default'       => '50',
                        'options'       => array(
                            '50'     => 'Circle',
                            '0'      => 'Square',
                            'none'   => 'None',
                        ),
                        'toggle'        => array(
							'50'        => array(
								'fields'  => array('icon_padding_circle', 'icon_bg_colour')
							),
							'0'        => array(
								'fields'  => array('icon_padding_sides', 'icon_padding_top', 'icon_bg_colour'),
							),
						),
                    ), // end icon_bg_radius
                    
                    'icon_bg_colour' => array(
                        'type'          => 'color',
                        'label'         => __( 'Icon Background Colour', 'fl_builder' ),
                        'default'       => '222222',
                    ), // end icon_colour
                    
                    'icon_padding_circle' => array(
                        'type'          => 'text',
                        'label'         => __( 'Icon Background Size', 'fl_builder' ),
                        'default'       => '80',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'description'   => 'px',      
                    ), // end icon_padding_circle
                    
                    'icon_padding_sides' => array(
                        'type'          => 'text',
                        'label'         => __( 'Icon Width', 'fl_builder' ),
                        'default'       => '80',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'description'   => 'px',      
                    ), // end icon_padding_sides
                    
                    'icon_padding_top' => array(
                        'type'          => 'text',
                        'label'         => __( 'Icon Height', 'fl_builder' ),
                        'default'       => '80',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'description'   => 'px',      
                    ), // end icon_padding_top
                    
                ) // end fields
                  
            ) // end title_style

        ) // end sections
        
    ), // end title-tab    
    
    'title-tab'      => array(
        
        'title'         => __( 'Title Style', 'fl-builder' ),
        'sections'      => array( 
            
              'title_style'  => array(
                'title'         => __( 'Title Style', 'fl-builder' ),
                'fields'        => array(
                    
                    'heading_class' => array(
                        'type'          => 'select',
                        'label'         => __( 'Heading Class', 'fl_builder' ),
                        'default'       => '1',
                        'options'       => array(
                            '1'         => 'H1',
                            '2'         => 'H2',
                            '3'         => 'H3',
                            '4'         => 'H4',
                            '5'         => 'H5',
                            '6'         => 'H6',
                        ),              
                    ),
                    
                    'heading_font_family' => array(
                        'type'          => 'font',
                        'label'         => __( 'Font', 'fl-builder' ),
                        'default'       => array(
                            'family'        => 'default',
                            'weight'        => 300
                        )
                    ),

                    'heading_font' => array(
                        'type'          => 'select',
                        'label'         => __('Heading Font Size', 'fl-builder'),
                        'default'       => 'default',
                        'options'       => array(
                            'default'     => 'Default',
                            'custom'      => 'Custom',
                        ),
                        'toggle'        => array(
							'custom'        => array(
								'fields'  => array('heading_fontsize')
							),
						),
                    ), // end heading_font
                    
                    'heading_fontsize' => array(
                        'type'          => 'text',
                        'label'         => __('Font Size', 'fl-builder'),
                        'default'       => '24',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'description'   => 'px',
                    ), // end heading_fontsize
                    
                    'heading_colour' => array(
                        'type'          => 'color',
                        'label'         => __( 'Heading Colour', 'fl_builder' ),
                        'default'       => '222222',
                    ), // end heading_class
                    
                ) // end fields
                  
            ) // end title_style

        ) // end sections
        
    ), // end title-tab
    
	'button-one-style'         => array(
		'title'         => __('Button One Style', 'fl-builder'),
		'sections'      => array(
            
            'formatting'    => array(
				'title'         => __('Structure', 'fl-builder'),
				'fields'        => array(
					'btn_one_width'         => array(
						'type'          => 'select',
						'label'         => __('Width', 'fl-builder'),
						'default'       => 'auto',
						'options'       => array(
							'auto'          => _x( 'Auto', 'Width.', 'fl-builder' ),
							'custom'        => __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'auto'        => array(
								'fields'        => array('')
							),
							'custom'        => array(
								'fields'        => array('btn_one_custom_width')
							),
						)
					),
					'btn_one_custom_width'  => array(
						'type'          => 'text',
						'label'         => __('Custom Width', 'fl-builder'),
						'default'       => '150',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'btn_one_font_size'     => array(
						'type'          => 'text',
						'label'         => __('Font Size', 'fl-builder'),
						'default'       => '16',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'btn_one_padding'       => array(
						'type'          => 'text',
						'label'         => __('Padding', 'fl-builder'),
						'default'       => '12',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
                    'border_size'   => array(
						'type'          => 'text',
						'label'         => __('Border Size', 'fl-builder'),
						'default'       => '2',
						'description'   => 'px',
						'maxlength'     => '3',
						'size'          => '5',
						'placeholder'   => '0'
					),
					'btn_one_border_radius' => array(
						'type'          => 'text',
						'label'         => __('Round Corners', 'fl-builder'),
						'default'       => '4',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'btn_one_margin_top' => array(
						'type'          => 'text',
						'label'         => __('Margin Top/Bottom', 'fl-builder'),
						'default'       => '5',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'btn_one_margin_sides' => array(
						'type'          => 'text',
						'label'         => __('Margin Sides', 'fl-builder'),
						'default'       => '5',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
				)
			), // end formatting
            
			'colors'        => array(
				'title'         => __('Colors', 'fl-builder'),
				'fields'        => array(                    
					'btn_one_style'         => array(
						'type'          => 'select',
						'label'         => __('Style', 'fl-builder'),
						'default'       => 'flat',
						'options'       => array(
							'flat'          => _x( 'Flat', 'Width.', 'fl-builder' ),
							'transparent'        => __('Transparent', 'fl-builder')
						),
						'toggle'        => array(
							'flat'        => array(
								'fields'        => array('btn_one_bg_color')
							),
							'transparent'        => array(
								'fields'        => array('')
							),
						)
					),
					'btn_one_bg_color'      => array(
						'type'          => 'color',
						'label'         => __('Background Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true
					),
					'btn_one_border_color'      => array(
						'type'          => 'color',
						'label'         => __('Border Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true
					),
					'btn_one_bg_hover_color' => array(
						'type'          => 'color',
						'label'         => __('Background Hover Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true,
						'preview'       => array(
							'type'          => 'none'
						)
					),
					'btn_one_text_color'    => array(
						'type'          => 'color',
						'label'         => __('Text Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true
					),
					'btn_one_text_hover_color' => array(
						'type'          => 'color',
						'label'         => __('Text Hover Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true,
						'preview'       => array(
							'type'          => 'none'
						)
					)
				)
			),
		)
	), // end button_one 
    	'button-two-style'         => array(
		'title'         => __('Button Two Style', 'fl-builder'),
		'sections'      => array(
            
            'formatting'    => array(
				'title'         => __('Structure', 'fl-builder'),
				'fields'        => array(
					'btn_two_width'         => array(
						'type'          => 'select',
						'label'         => __('Width', 'fl-builder'),
						'default'       => 'auto',
						'options'       => array(
							'auto'          => _x( 'Auto', 'Width.', 'fl-builder' ),
							'custom'        => __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'auto'        => array(
								'fields'        => array('')
							),
							'custom'        => array(
								'fields'        => array('btn_two_custom_width')
							),
						)
					),
					'btn_two_custom_width'  => array(
						'type'          => 'text',
						'label'         => __('Custom Width', 'fl-builder'),
						'default'       => '150',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'btn_two_font_size'     => array(
						'type'          => 'text',
						'label'         => __('Font Size', 'fl-builder'),
						'default'       => '16',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'btn_two_padding'       => array(
						'type'          => 'text',
						'label'         => __('Padding', 'fl-builder'),
						'default'       => '12',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
                    'border_size'   => array(
						'type'          => 'text',
						'label'         => __('Border Size', 'fl-builder'),
						'default'       => '2',
						'description'   => 'px',
						'maxlength'     => '3',
						'size'          => '5',
						'placeholder'   => '0'
					),
					'btn_two_border_radius' => array(
						'type'          => 'text',
						'label'         => __('Round Corners', 'fl-builder'),
						'default'       => '4',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'btn_two_margin_top' => array(
						'type'          => 'text',
						'label'         => __('Margin Top/Bottom', 'fl-builder'),
						'default'       => '5',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'btn_two_margin_sides' => array(
						'type'          => 'text',
						'label'         => __('Margin Sides', 'fl-builder'),
						'default'       => '5',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
				)
			), // end formatting
            
			'colors'        => array(
				'title'         => __('Colors', 'fl-builder'),
				'fields'        => array(                    
					'btn_two_style'         => array(
						'type'          => 'select',
						'label'         => __('Style', 'fl-builder'),
						'default'       => 'flat',
						'options'       => array(
							'flat'          => _x( 'Flat', 'Width.', 'fl-builder' ),
							'transparent'        => __('Transparent', 'fl-builder')
						),
						'toggle'        => array(
							'flat'        => array(
								'fields'        => array('btn_two_bg_color')
							),
							'transparent'        => array(
								'fields'        => array('')
							),
						)
					),
					'btn_two_bg_color'      => array(
						'type'          => 'color',
						'label'         => __('Background Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true
					),
					'btn_two_border_color'      => array(
						'type'          => 'color',
						'label'         => __('Border Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true
					),
					'btn_two_bg_hover_color' => array(
						'type'          => 'color',
						'label'         => __('Background Hover Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true,
						'preview'       => array(
							'type'          => 'ntwo'
						)
					),
					'btn_two_text_color'    => array(
						'type'          => 'color',
						'label'         => __('Text Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true
					),
					'btn_two_text_hover_color' => array(
						'type'          => 'color',
						'label'         => __('Text Hover Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true,
						'preview'       => array(
							'type'          => 'ntwo'
						)
					)
				)
			),
		)
	), // end button_two

) ); 