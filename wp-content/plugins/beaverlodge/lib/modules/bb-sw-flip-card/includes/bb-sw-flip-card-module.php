<?php


class SWFlipCardClass extends FLBuilderModule {

    public function __construct()
    {
        
        parent::__construct(array(
            'name'              => __( 'Flip Card Layout', 'fl-builder' ),
            'description'       => __( 'Add a flip card layout', 'fl-builder' ),
            'category'          => BRANDING,
            'partial_refresh'   => true,
            'dir'               => SW_FLIP_CARD_MODULE_DIR . '/',
            'url'               => SW_FLIP_CARD_MODULE_URL . '/',
        ));
        
        $this->add_js('jquery.flip.min.js', $this->url . 'includes/jquery.flip.min.js', array(), '', true);
              
    }    
    
}

FLBuilder::register_module( 'SWFlipCardClass', array(
    
    'content-tab'      => array(
        
        'title'         => __( 'Content', 'fl-builder' ),
        'sections'      => array( 
            
              'content_select'  => array(
                'title'         => __( 'Content', 'fl-builder' ),
                'fields'        => array(                    
                                      
                    'panel'    => array(
                        'type'          => 'form',
                        'label'        => __('Panels', 'fl_builder'),
                        'form'          => 'flip_card_panel', 
                        'preview_text'  => 'label',
                        'multiple'      => true
                    ),
                    
                ) // end fields
                  
            ), // end content_select
            
        ), // end sections
        
    ), // end content-tab    
    
    'layout-tab'      => array(
        
        'title'         => __( 'Layout', 'fl-builder' ),
        'sections'      => array( 
            
              'layout_select'  => array(
                'title'         => __( 'Layout', 'fl-builder' ),
                'fields'        => array(                    
                                      
                    'width' => array(
						'type'          => 'text',
						'label'         => __('Panel Width', 'fl-builder'),
						'default'       => '380',
						'maxlength'     => '4',
						'size'          => '5',
						'description'   => 'px'
					),
                    
                    'height' => array(
						'type'          => 'text',
						'label'         => __('Panel Height', 'fl-builder'),
						'default'       => '260',
						'maxlength'     => '4',
						'size'          => '5',
						'description'   => 'px'
					),
                    
                    'gutter' => array(
						'type'          => 'text',
						'label'         => __('Column Margin', 'fl-builder'),
						'default'       => '10',
						'maxlength'     => '4',
						'size'          => '5',
						'description'   => 'px'
					),
                    
                    'margin' => array(
						'type'          => 'text',
						'label'         => __('Row Margin', 'fl-builder'),
						'default'       => '10',
						'maxlength'     => '4',
						'size'          => '5',
						'description'   => 'px'
					),
                    
                    'padding' => array(
						'type'          => 'text',
						'label'         => __('Panel Padding', 'fl-builder'),
						'default'       => '20',
						'maxlength'     => '4',
						'size'          => '5',
						'description'   => 'px'
					), 
                    
                    'align'     => array(
						'type'          => 'select',
						'label'         => __('Panel Alignment', 'fl-builder'),
						'default'       => 'flex-start',
						'options'       => array(
							'flex-start'     =>  __('Left', 'fl-builder'),
							'center'         =>  __('Center', 'fl-builder'),
							'flex-end'       =>  __('Right', 'fl-builder'),
						),
					),
                    
                    'trigger'     => array(
						'type'          => 'select',
						'label'         => __('Trigger', 'fl-builder'),
						'default'       => 'hover',
						'options'       => array(
							'hover'     =>  __('Hover', 'fl-builder'),
							'click'     =>  __('Click', 'fl-builder')
						),
					),                   
                    
                    'speed' => array(
						'type'          => 'text',
						'label'         => __('Animation Speed', 'fl-builder'),
						'default'       => '1000',
						'maxlength'     => '4',
						'size'          => '5',
						'description'   => __('milliseconds', 'fl_builder'),
					),
                    
                    'direction'     => array(
						'type'          => 'select',
						'label'         => __('Flip Direction', 'fl-builder'),
						'default'       => 'y',
						'options'       => array(
							'y'         =>  __('Horizontal', 'fl-builder'),
							'x'         =>  __('Vertical', 'fl-builder')
						),
					),
                    
                    'reverse'     => array(
						'type'          => 'select',
						'label'         => __('Reverse Direction', 'fl-builder'),
						'default'       => 'false',
						'options'       => array(
							'false'     =>  __('False', 'fl-builder'),
							'true'      =>  __('True', 'fl-builder')
						),
					),
                    
                ) // end fields
                  
            ), // end layout_select
            
        ), // end sections
        
    ), // end layout-tab

    'style-tab'      => array(
        
        'title'         => __( 'Styles', 'fl-builder' ),
        'sections'      => array( 
            
              'front_text'  => array(
                'title'         => __( 'Front Text', 'fl-builder' ),
                'fields'        => array(
                    
                    'title_font'     => array(
						'type'          => 'select',
						'label'         => __('Title Font', 'fl-builder'),
						'default'       => 'h2',
						'options'       => array(
							'h1'         =>  'H1',
							'h2'         =>  'H2',
							'h3'         =>  'H3',
							'h4'         =>  'H4',
							'h5'         =>  'H5',
							'h6'         =>  'H6',
							'none'       =>  __('Dont Display', 'fl-builder'),
						),
					),
                    
                    'title_font_color'      => array(
							'type'          => 'color',
							'label'         => __('Title Font Color', 'fl-builder'),
							'show_reset'    => true,
                            'default'       => '222222',
				    ), 
                    
                    'front_font_color'      => array(
							'type'          => 'color',
							'label'         => __('Font Color', 'fl-builder'),
							'show_reset'    => true,
                            'default'       => '222222',
				    ), 
                    
                ) // end fields
                  
            ), // end front_text
            
              'back_text'  => array(
                'title'         => __( 'Back Text', 'fl-builder' ),
                'fields'        => array(
                    
                    'back_font_color'      => array(
							'type'          => 'color',
							'label'         => __('Font Color', 'fl-builder'),
							'show_reset'    => true,
                            'default'       => '222222',
						), 
                    
                ) // end fields
                  
            ), // end back_text
            
              'back_btn'  => array(
                'title'         => __( 'Button', 'fl-builder' ),
                'fields'        => array(
                    
                    'btn_font_color'      => array(
							'type'          => 'color',
							'label'         => __('Font Color', 'fl-builder'),
							'show_reset'    => true,
                            'default'       => 'ffffff',
						), 
                    
                    'btn_font_hover_color'      => array(
							'type'          => 'color',
							'label'         => __('Font Hover Color', 'fl-builder'),
							'show_reset'    => true,
                            'default'       => 'ffffff',
						), 
                    
                    'btn_bg_color'      => array(
							'type'          => 'color',
							'label'         => __('Background Color', 'fl-builder'),
							'show_reset'    => true,
                            'default'       => 'b20022',
						), 
                    
                    'btn_bg_hover_color'      => array(
							'type'          => 'color',
							'label'         => __('Background Hover Color', 'fl-builder'),
							'show_reset'    => true,
                            'default'       => 'b20022',
						), 
                    
					'btn_top_padding' => array(
						'type'          => 'text',
						'label'         => __('Top/Bottom Padding', 'fl-builder'),
						'default'       => '10',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
                    
					'btn_side_padding' => array(
						'type'          => 'text',
						'label'         => __('Side Padding', 'fl-builder'),
						'default'       => '20',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
                    
					'btn_width' => array(
						'type'          => 'text',
						'label'         => __('Width', 'fl-builder'),
						'default'       => '200',
						'maxlength'     => '4',
						'size'          => '5',
						'description'   => 'px'
					),
                    
					'transition' => array(
						'type'          => 'text',
						'label'         => __('Hover Transition', 'fl-builder'),
						'default'       => '500',
						'maxlength'     => '4',
						'size'          => '5',
						'description'   => 'ms'
					),
                    
                ) // end fields
                  
            ), // end back_text
            
        ) // end sections
        
    ), // end style-tab
    
) );

FLBuilder::register_settings_form('flip_card_panel', array(
	'title' => __('Panel Settings', 'fl-builder'),
	'tabs'  => array(
		'general'        => array(
			'title'         => __('Content', 'fl-builder'),
			'sections'      => array(
                
				'general'       => array(
					'title'     => __('General', 'fl-builder'),
					'fields'    => array(
                        
						'label'         => array(
							'type'          => 'text',
							'label'         => __('Title', 'fl-builder'),
							'help'          => __('A label to identify this panel on the Custom Panel tab.', 'fl-builder')
						),
                        
					)
				),
                
				'front' => array(
					'title'     => __('Front Panel', 'fl-builder'),
					'fields'    => array(                        
                        
                        'front_text'          => array(
							'type'          => 'editor',
							'media_buttons' => false,
							'rows'          => 6
						),
						
						'bg_type'     => array(
                            'type'          => 'select',
                            'label'         => __('Background Type', 'fl-builder'),
                            'default'       => 'bg_color',
                            'options'       => array(
                                'bg_image'       =>  __('Image', 'fl-builder'),
                                'bg_color'        =>  __('Color', 'fl-builder')
                            ),
                            'toggle'        => array(
                                'bg_image'        => array(
                                    'fields'        => array('front_photo')
                                ),
                                'bg_color'        => array(
                                    'fields'        => array('bg_color')
                                ),
                            )
                        ),  
                        
                        'front_photo'      => array(
							'type'          => 'photo',
							'label'         => __('Image', 'fl-builder')
						),
                        
                        'bg_color'      => array(
							'type'          => 'color',
							'label'         => __('Background Color', 'fl-builder'),
							'show_reset'    => true,
                            'default'       => 'ffffff',
						), 
                        
					)
				),
                
				'back'      => array(
					'title'         => __('Back Panel', 'fl-builder'),
					'fields'        => array(
                        
						'back_text'          => array(
							'type'          => 'editor',
							'media_buttons' => false,
							'rows'          => 6
						),
                        
                        'button'         => array(
							'type'          => 'text',
							'label'         => __('Button Text', 'fl-builder')
						),                        
                        
                        'url'         => array(
							'type'          => 'link',
							'label'         => __('URL Link', 'fl-builder')
						),
						
						'back_bg_type'     => array(
                            'type'          => 'select',
                            'label'         => __('Background Type', 'fl-builder'),
                            'default'       => 'bg_color',
                            'options'       => array(
                                'back_bg_image'       =>  __('Image', 'fl-builder'),
                                'back_bg_color'        =>  __('Color', 'fl-builder')
                            ),
                            'toggle'        => array(
                                'back_bg_image'        => array(
                                    'fields'        => array('back_photo')
                                ),
                                'back_bg_color'        => array(
                                    'fields'        => array('back_bg_color')
                                ),
                            )
                        ),  
                        
                        'back_photo'      => array(
							'type'          => 'photo',
							'label'         => __('Image', 'fl-builder')
						),
                        
                        'back_bg_color'      => array(
							'type'          => 'color',
							'label'         => __('Background Color', 'fl-builder'),
							'show_reset'    => true,
                            'default'       => 'ffffff',
						), 
					)
				)
			)
		),
		

	)
));