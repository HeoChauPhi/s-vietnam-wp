<?php

class SWTooltipClass extends FLBuilderModule {
    
    public function __construct()
    {

        parent::__construct(array(
            'name'          => __( 'Tooltip', 'fl-builder' ),
            'description'   => __( 'Add tooltiup hover effects to your site!', 'fl-builder' ),
            'category'      => BRANDING,
            'dir'           => SW_TOOLTIP_MODULE_DIR . '/',
            'url'           => SW_TOOLTIP_MODULE_URL . '/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
        
        $this->add_js('zebra_tooltips.js', $this->url . 'zebra_tooltips.js', array(), '', true);
        $this->add_css('zebra_tooltips.css', $this->url . 'zebra_tooltips.css');
    }       
    
}

FLBuilder::register_module( 'SWTooltipClass', array(
    
    'content-tab'      => array(
        'title'         => __( 'Content', 'fl-builder' ),
        'sections'      => array(
            
            'content_select'  => array(
                'title'         => __( 'Content', 'fl-builder' ),
                'fields'        => array(
                    
                    'title'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Title', 'fl_builder' ),
                        'placeholder'   => __( 'Enter a title', 'fl_as_posts'),
                    ),     
                      
                    'photo_source'  => array(
						'type'          => 'select',
						'label'         => __('Image Source', 'fl-builder'),
						'default'       => 'library',
						'options'       => array(
							'library'       => __('Media Library', 'fl-builder'),
							'url'           => __('URL', 'fl-builder')
						),
						'toggle'        => array(
							'library'       => array(
								'fields'        => array('photo')
							),
							'url'           => array(
								'fields'        => array('photo_url')
							)
						)
					),
					'photo'         => array(
						'type'          => 'photo',
						'label'         => __('Image', 'fl-builder')
					),
					'photo_url'     => array(
						'type'          => 'text',
						'label'         => __('Image URL', 'fl-builder'),
						'placeholder'   => __( 'http://www.example.com/my-photo.jpg', 'fl-builder'                        )
					),
                       
					'url'     => array(
						'type'          => 'text',
						'label'         => __('URL', 'fl-builder'),
						'placeholder'   => __( 'http://www.example.com', 'fl-builder')
					),
                                              
                )
            ), // end content section
        
            'excerpt_select'  => array(
                'title'         => __( 'Excerpt', 'fl-builder' ),
                'fields'        => array(
            
                    'excerpt'     => array(
                        'type'      => 'editor',
				        'media_buttons' => false,
				        'rows'          => 16
                    ), 
                 )
            ) // end excerpt section
            
        ) // end sections
    ), // end content tab
    
    'style-tab'      => array(
        'title'         => __( 'Styles', 'fl-builder' ),
        'sections'      => array(
            'content_select'  => array(
                'title'         => __( 'Styles', 'fl-builder' ),
                'fields'        => array(
                    
                    'background_color'     => array(
                        'type'          => 'color',
                        'label'         => __( 'Popup Background Color', 'fl_builder' ),
                        'default'       => '000',
                        'show_reset'    => true
                    ), 
                    
                    'font_color'     => array(
                        'type'          => 'color',
                        'label'         => __( 'Popup Text Color', 'fl_builder' ),
                        'default'       => 'fff',
                        'show_reset'    => true
                    ),
                    
                    'popup_align'     => array(
						'type'            => 'select',
						'label'           => __('Popup Align', 'fl-builder'),
						'default'         => 'center',
                        'options'         => array(
                            'left'    => 'Left',
                            'center'    => 'Center',
                            'right'    => 'Right',
                        )
					),
                    
                    'popup_position'     => array(
						'type'            => 'select',
						'label'           => __('Popup Position', 'fl-builder'),
						'default'         => 'above',
                        'options'         => array(
                            'above'    => 'Above',
                            'below'    => 'Below',
                        )
					),
                    
                    'color'     => array(
                        'type'          => 'color',
                        'label'         => __( 'Link Text Color', 'fl_builder' ),
                        'default'       => 'fff',
                        'show_reset'    => true
                    ),  
                    
                    'font'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Link Font Size', 'fl_builder' ),
                        'default'       => '16',
                        'maxlength'    => '3',
                        'size'          => '4',
                        'description'   => 'px'
                    ),  
                    
                    'top_padding'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Link Position (top)', 'fl_builder' ),
                        'default'       => '',
                        'maxlength'    => '3',
                        'size'          => '4',
                        'description'   => 'px'
                    ),  
                    
                    'left_padding'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Link Position (left)', 'fl_builder' ),
                        'default'       => '',
                        'maxlength'    => '3',
                        'size'          => '4',
                        'description'   => 'px'
                    ),  
                    
                    'width'     => array(
						'type'            => 'text',
						'label'           => __('Width', 'fl-builder'),
						'default'         => '400',
                        'maxlength'       => '3',
                        'size'            => '4',
                        'description'     => 'px'
					),
                    
                    'height'     => array(
						'type'            => 'text',
						'label'           => __('Height', 'fl-builder'),
						'default'         => '400',
                        'maxlength'       => '3',
                        'size'            => '4',
                        'description'     => 'px'
					),
                    
                    'size'     => array(
						'type'            => 'select',
						'label'           => __('Image Size', 'fl-builder'),
						'default'         => 'cover',
                        'options'         => array(
                            'cover'       => 'Cover',
                            'contain'     => 'Contain',
                            'auto 100%'   => 'Fit Height',
                            '100% auto'   => 'Fit Width',
                        )
					),
                    
                    'position'     => array(
						'type'            => 'select',
						'label'           => __('Image Position', 'fl-builder'),
						'default'         => 'center top',
                        'options'         => array(
                            'left top'    => 'Left Top',
                            'left center'    => 'Left Center',
                            'left bottom'    => 'Left Bottom',
                            'right top'      => 'Right Top',
                            'right center'   => 'Right Center',
                            'right bottom'   => 'Right Bottom',
                            'center top'     => 'Center Top',
                            'center center'  => 'Center Center',
                            'center bottom'  => 'Center Bottom',
                        )
					),
                    
                )
            )
        )
    ),
) ); 