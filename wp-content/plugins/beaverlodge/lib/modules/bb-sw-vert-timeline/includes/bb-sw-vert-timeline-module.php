<?php

class swVertClass extends FLBuilderModule {

    public function __construct()
    {

        parent::__construct(array(
            'name'          => __( 'Vertical Timeline', 'fl-builder' ),
            'description'   => __( 'Vertical timeline for blog posts', 'fl-builder' ),
            'category'      => BRANDING,
            'dir'           => SW_VERT_TIMELINE_MODULE_DIR . '/',
            'url'           => SW_VERT_TIMELINE_MODULE_URL . '/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
              
    }
    

}

FLBuilder::register_module( 'swVertClass', array(

    'content_tab'      => array(
        
        'title'         => __( 'Content', 'fl-builder' ),
        'sections'      => array( 
            
              'content_select'  => array(
                'title'         => __( 'Posts Filter', 'fl-builder' ),
                'fields'        => array(
                    
                    'post_type' => array(
                        'type'  => 'select',
                        'label' => __('Choose Content Type', 'fl-builder'),
                        'default'   => 'blog',
                        'options'   => array(
                            'blog'  => 'Posts',
                            'custom'    => 'Custom',
                        ),
						'toggle'        => array(
							'blog'          => array(
								'fields'        => array('category', 'filter_type')
							),
							'custom'          => array(
								'tabs'        => array('custom_tab')
							),
						)
                    ), // end post_type
                    
                    'category'   => array(
                        'type'          => 'suggest',
                        'label'         => __('Choose Category', 'fl-builder'),
                        'action'    	=> 'fl_as_terms',
                        'data'      	=> 'category',
                    ), // end category 
                    
                    'filter_type'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Filter By Date', 'fl-builder' ),
                        'default'   => 'false',
                        'options'   => array(
                            'true'  => 'Yes',
                            'false' => 'No'
                        ),
						'toggle'        => array(
							'false'          => array(
								'fields'        => array('')
							),
							'true'          => array(
								'fields'        => array('start_date', 'end_date')
							),
						)
                    ),  // end filter_type                                         

                    'start_date'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Start Date', 'fl-builder' ),
                        'placeholder'   => 'November 21st, 2015',
                    ),  // end start_date                                       
                    
                    'end_date'     => array(
                        'type'      => 'text',
                        'label'     => __( 'End Date', 'fl-builder' ),
                        'placeholder'   => 'December 21st, 2015',
                    ),  // end end_date                    
                    
                    'time_switch' => array(
                        'type'  => 'select',
                        'label' => __('Switch Time and Date', 'fl-builder'),
                        'default'   => 'false',
                        'options'   => array(
                            'true'  => 'Yes',
                            'false' => 'No',
                        ),
                    ), // end time_switch                                       
                    
                    'readmore'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Read More Button Text', 'fl-builder' ),
                        'default'   => 'Read More',
                    ),  // end readmore  
                                                          
                    
                    'link_new_window'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Open in New Window', 'fl-builder' ),
                        'default'   => 'self',
                        'options'   => array(
                            'blank'  => 'Yes',
                            'self' => 'No',
                        ),
                    ),  // end link_new_window  
                    
                    
                    
                ) // end fields
                  
            ) // end content_select
            
        ) // end sections
        
    ), // end content-tab
    
     'custom_tab'      => array(
        
        'title'         => __( 'Custom', 'fl-builder' ),
        'sections'      => array( 
            
              'custom_content'  => array(
                'title'         => __( 'Add Content', 'fl-builder' ),
                'fields'        => array(
                    
                    'custom_posts'    => array(
                        'type'          => 'form',
                        'label'        => __('Posts', 'fl_builder'),
                        'form'          => 'custom_timeline_content', 
                        'preview_text'  => 'label',
                        'multiple'      => true
                    )
                    
                ) // end fields
                  
            ) // end custom_content
            
        ) // end sections
        
    ), // end custom-tab
    
    'style_tab'      => array(
        
        'title'         => __( 'Style', 'fl-builder' ),
        'sections'      => array( 
            
              'timeline_fonts'  => array(
                'title'         => __( 'Style Timeline Fonts', 'fl-builder' ),
                'fields'        => array(
                    
                    'heading_font'    => array(
						'type'          => 'text',
						'label'         => __('Heading Font Size', 'fl-builder'),
						'default'       => '30',
						'placeholder'   => '30',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),                    
                    
                    'content_font'    => array(
						'type'          => 'text',
						'label'         => __('Content Font Size', 'fl-builder'),
						'default'       => '16',
						'placeholder'   => '16',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
                    
                    'time_font'    => array(
						'type'          => 'text',
						'label'         => __('Time Font Size', 'fl-builder'),
						'default'       => '30',
						'placeholder'   => '30',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
                    
                    'date_font'    => array(
						'type'          => 'text',
						'label'         => __('Date Font Size', 'fl-builder'),
						'default'       => '12',
						'placeholder'   => '12',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					                    
                    
                    'span_align' => array(
                        'type'  => 'select',
                        'label' => __('Align Time and Date', 'fl-builder'),
                        'default'   => 'right',
                        'options'   => array(
							'left' => __('Left', 'fl-builder'),
                            'center' => __('Center', 'fl-builder'),
                            'right'  => __('Right', 'fl-builder'),
                        ),
                    ), // end span_align
                    
                    
                ) // end fields
                  
            ), // end timeline_style
            
              'timeline_colors'  => array(
                'title'         => __( 'Style Timeline Colours', 'fl-builder' ),
                'fields'        => array(
                    
                    'main_color'    => array(
						'type'          => 'color',
						'label'         => __('Main Color', 'fl-builder'),
						'default'       => '6cbfee',
						'show_reset'    => true
					),
                    
                    'second_color'    => array(
						'type'          => 'color',
						'label'         => __('Secondary Color', 'fl-builder'),
						'default'       => '3594cb',
						'show_reset'    => true
					),                    
                    
                    'blurb_font_color'    => array(
						'type'          => 'color',
						'label'         => __('Post Font Color', 'fl-builder'),
						'default'       => 'ffffff',
						'show_reset'    => true
					),
                    
                    'date_font_color'    => array(
						'type'          => 'color',
						'label'         => __('Date Font Color', 'fl-builder'),
						'default'       => 'bdd0db',
						'show_reset'    => true
					),
                    
                    
                ) // end fields
                  
            ), // end timeline_style
            
              'readmore_colors'  => array(
                'title'         => __( 'Style Readmore Button', 'fl-builder' ),
                'fields'        => array(
                    
                    'readmore_text_color'    => array(
						'type'          => 'color',
						'label'         => __('Text Color', 'fl-builder'),
						'default'       => 'ffffff',
						'show_reset'    => true
					),
                    
                    'readmore_text_hover_color'    => array(
						'type'          => 'color',
						'label'         => __('Text Hover Color', 'fl-builder'),
						'default'       => 'ffffff',
						'show_reset'    => true
					),
                    
                    'readmore_bg_color'    => array(
						'type'          => 'color',
						'label'         => __('Background Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true
					), 
                    
                    'readmore_bg_hover_color'    => array(
						'type'          => 'color',
						'label'         => __('Background Hover Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true
					),                    
                    
                    'readmore_border_color'    => array(
						'type'          => 'color',
						'label'         => __('Border Color', 'fl-builder'),
						'default'       => 'ffffff',
						'show_reset'    => true
					),
                                        
                    
                    'readmore_border_hover_color'    => array(
						'type'          => 'color',
						'label'         => __('Border Hover Color', 'fl-builder'),
						'default'       => 'ffffff',
						'show_reset'    => true
					),
                    
                    'readmore_border_radius'    => array(
						'type'          => 'text',
						'label'         => __('Border Radius', 'fl-builder'),
						'default'       => '2',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),                     
                    
                    'readmore_top_padding'    => array(
						'type'          => 'text',
						'label'         => __('Padding Top/Bottom', 'fl-builder'),
						'default'       => '5',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),                     
                    
                    'readmore_side_padding'    => array(
						'type'          => 'text',
						'label'         => __('Padding Side', 'fl-builder'),
						'default'       => '10',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),                     
                    
                    'readmore_top_margin'    => array(
						'type'          => 'text',
						'label'         => __('Margin Top/Bottom', 'fl-builder'),
						'default'       => '10',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),                     
                    
                    'readmore_side_margin'    => array(
						'type'          => 'text',
						'label'         => __('Margin Side', 'fl-builder'),
						'default'       => '0',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					), 
                    
                    
                ) // end fields
                  
            ) // end timeline_style
            
        ) // end sections
        
    ), // end stlye-tab
    
) ); 

FLBuilder::register_settings_form('custom_timeline_content', array(
	'title' => __('Custom Content', 'fl-builder'),
	'tabs'  => array(
		'general'        => array( // Tab
			'title'         => __('Content', 'fl-builder'), // Tab title
			'sections'      => array( // Tab Sections
				'general'       => array(
					'title'     => '',
					'fields'    => array(
						'label'         => array(
							'type'          => 'text',
							'label'         => __('Post Label', 'fl-builder'),
							'help'          => __('A label to identify this post on the Custom Post tab.', 'fl-builder')
						)
					)
				),
                
				'content'      => array(
					'title'         => __('Content', 'fl-builder'),
					'fields'        => array(

						'custom_title'         => array(
							'type'          => 'text',
							'label'         => __('Heading', 'fl-builder'),
						),
                        'custom_url'         => array(
							'type'          => 'text',
							'label'         => __('URL Link', 'fl-builder'),
						),
						'custom_text'          => array(
							'type'          => 'editor',
                            'label'         => __('Content', 'fl-builder'),
                            'media_buttons' => false,
							'rows'          => 10,
						),
						'custom_date'          => array(
							'type'          => 'text',
                            'label'         => __('Date', 'fl-builder'),
						),
						'custom_time'          => array(
							'type'          => 'text',
                            'label'         => __('Time', 'fl-builder'),
						),
                        
                        'custom_icon' => array(
                            'type'          => 'icon',
                            'label'         => __( 'Icon', 'fl-builder' ),
                            'show_remove'   => true
                        ),
					)
				)
			)
		),
		

	)
));