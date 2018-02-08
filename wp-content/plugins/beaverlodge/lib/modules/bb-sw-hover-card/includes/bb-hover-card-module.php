<?php

class SWHoverCardClass extends FLBuilderModule {

    public function __construct()
    {

        parent::__construct(array(
            'name'          => __( 'Hover Card', 'fl-builder' ),
            'description'   => __( 'Add hover card effects to your site!', 'fl-builder' ),
            'category'          => BRANDING,
            'dir'           => SW_HOVERCARD_MODULE_DIR . '/',
            'url'           => SW_HOVERCARD_MODULE_URL . '/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
        
        //$this->add_js('bootstrap.min.js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array(), '', true);
       $this->add_css('bootstrap.grid.css', $this->url . 'css/bootstrap.grid.css');
    }    
    

}

FLBuilder::register_module( 'SWHoverCardClass', array(

    'content'       => array(
        'title'         => __('Content', 'fl-builder'),
        'sections'      => array(
            'general'       => array(
                'title'         => __('Content Selection', 'fl-builder'), 
                'fields'        => array( // Section Fields
                    'post'     => array(
                        'type'          => 'select',
                        'label'         => __('Choose Post Type', 'fl-builder'),
                        'default'       => '',
                        'options'       => array(
                            'post'      => __('Posts', 'fl-builder'),
                            'product'      => __('WooCommerce', 'fl-builder'),
                            'sw_team'      => __('Team', 'fl-builder'),
                            'custom'      => __('Custom', 'fl-builder'),
                        ),
                        'toggle'        => array(
                            'post'      => array(
                                'fields'        => array( 'qty', 'category', 'excerpt', 'align', 'height', 'gutter', 'margin', 'position', 'behaviour', 'orderby', 'order'),
                                'sections'        => array('layout'),
                            ),
                            'sw_team'      => array(
                                'fields'        => array(  'teamcategory', 'gutter', 'margin', 'qty', 'excerpt', 'width', 'gutter', 'margin', 'position', 'behaviour'),
                                'sections'        => array('layout'),
                            ),
                            'product'      => array(
                                'fields'        => array( 'qty', 'woocategory', 'excerpt', 'width', 'height', 'gutter', 'margin', 'position', 'behaviour',),
                                'sections'        => array('layout'),
                            ),
                            'custom'      => array(
                                'fields'        => array('excerpt', 'align', 'width', 'height', 'gutter', 'margin', 'position', 'behaviour' ),
                                'sections'      => array('layout', 'background'),
                                'tabs'      => array('panels'),
                            ),
                        )
                    ),
                    'woocategory'   => array(
                        'type'          => 'suggest',
                        'label'         => __('Choose WooCommerce Category', 'fl-builder'),
                        'action'    	=> 'fl_as_terms',
                        'data'      	=> 'product_cat',
                    ),
                    'teamcategory'   => array(
                        'type'          => 'suggest',
                        'label'         => __('Choose Team Department', 'fl-builder'),
                        'action'    	=> 'fl_as_terms',
                        'data'      	=> 'team_department',
                    ),
                    'category'   => array(
                        'type'          => 'suggest',
                        'label'         => __('Choose Category', 'fl-builder'),
                        'action'    	=> 'fl_as_terms',
                        'data'      	=> 'category',
                    )
                )
            ),
			
            'layout' => array(
                'title'         => __('Layout Options', 'fl-builder'),
                'fields'        => array( 
                    
					'qty'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Choose Qty', 'fl-builder' ),
                        'default'       => '12',
                        'maxlength'     => '3',
                        'size'          => '3',
                        'placholder'    => '12',
                        'description'   => 'posts',
                    ),  
                    
					'orderby'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Sort By', 'fl-builder' ),
                        'default'       => 'date',
                        'options'       => array(
                            'date'      => __('Date', 'fl-builder'),
                            'ID'        => __('ID', 'fl-builder'),
                            'name'      => __('Name', 'fl-builder'),
                            'title'     => __('Title', 'fl-builder'),
                            'rand'      => __('Random', 'fl-builder'),
                        ),
                    ),  
                    
					'order'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Sort Order', 'fl-builder' ),
                        'default'       => 'DESC',
                        'options'       => array(
                            'DESC'      => __('Descending', 'fl-builder'),
                            'ASC'       => __('Ascending', 'fl-builder'),
                        ),
                    ),    
                    
					'desktop_qty_row'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Choose Desktop Qty Per Row', 'fl_builder' ),
                        'default'       => '3',
                        'options'       => array(
                            '12'        => '1',
                            '6'         => '2',
                            '4'         => '3',
                            '3'         => '4',
                            '2'         => '6',
                        ),
                    ),   
                    
					'tablet_qty_row'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Choose Tablet Qty Per Row', 'fl_builder' ),
                        'default'       => '6',
                        'options'       => array(
                            '12'        => '1',
                            '6'         => '2',
                            '4'         => '3',
                            '3'         => '4',
                            '2'         => '6',
                        ),
                    ),   
                    
					'mobile_qty_row'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Choose Mobile Qty Per Row', 'fl_builder' ),
                        'default'       => '12',
                        'options'       => array(
                            '12'        => '1',
                            '6'         => '2',
                            '4'         => '3',
                            '3'         => '4',
                            '2'         => '6',
                        ),
                    ),                  
                                        
                    'gutter'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Column Gutter', 'fl_builder' ),
                        'default'       => '0',
                        'maxlength'     => '3',
                        'size'          => '3',
                        'placholder'    => '0',
                        'description'   => 'px',
                    ),                  
                                        
                    'margin'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Row Margin', 'fl_builder' ),
                        'default'       => '0',
                        'maxlength'     => '3',
                        'size'          => '3',
                        'placholder'    => '0',
                        'description'   => 'px',
                    ), 
                    
                    'excerpt'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Display Excerpt', 'fl_builder' ),
                        'default'   => 'yes',
                        'options'   => array (
                            'yes'   => 'Yes',
                            'no'    => 'No',
                        ),
                        'toggle'        => array(
                            'yes'      => array(
                                'fields'        => array( 'excerpt_length'),
                            ),
                        )
                    ),
                    
                    'excerpt_length'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Excerpt Length', 'fl_builder' ),
                        'default'   => '25',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'placholder'    => '25',
                        'description'   => 'words',
                    ),   
                    
                    'title_hover'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Display Title', 'fl_builder' ),
                        'default'   => 'yes',
                        'options'   => array (
                            '-70'        => 'On Hover',
                            '0'         => 'Always',
                            'false'     => 'Not at All',
                        ),
                    ),                       
                    
                    'height'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Panel Height', 'fl_builder' ),
                        'default'       => '400',
                        'maxlength'     => '4',
                        'size'          => '4',
                        'placholder'    => '400',
                        'description'   => 'px',
                    ), 
                
                    'position'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Image Position', 'fl_builder' ),
                        'default'   => 'center center',
                        'options'   => array (
                            'left top' => 'Left Top',
                            'left center' => 'Left Center',
                            'left bottom' => 'Left Bottom',
                            'center top' => 'Center Top',
                            'center center' => 'Center Center',
                            'center bottom' => 'Center Bottom',
                            'right top' => 'Right Top',
                            'right center' => 'Right Center',
                            'right bottom' => 'Right Bottom',
                        ),
                    ),     
                    
                    'behaviour'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Image Behaviour', 'fl_builder' ),
                        'default'   => 'crop',
                        'options'   => array (
                            'scale-width' => 'Fit Width',
                            'scale-height' => 'Fit Height',
                            'crop' => 'Crop to Fit',
                        ),
                    ),
					
                )
            )
        )
    ),

    'panels'       => array(
        'title'         => __('Custom Panels', 'fl-builder'),
        'sections'      => array(
             
            'general'       => array(
                'title'         => '', 
                'fields'        => array(
                    'panel'    => array(
                        'type'          => 'form',
                        'label'        => __('Panels', 'fl_builder'),
                        'form'          => 'custom_hover_panel', 
                        'preview_text'  => 'label',
                        'multiple'      => true
                    )
                   
                )
            )
		)
    ),

    'style'       => array(
        'title'         => __('Style Panels', 'fl-builder'),
        'sections'      => array(
             
            'styling'       => array(
                'title'         => 'Title', 
                'fields'        => array(
                    
                    'title_font'          => array(
						'type'          => 'font',
						'default'		=> array(
							'family'		=> 'Default',
							'weight'		=> 300
						),
						'label'         => __('Title Font', 'fl-builder'),
						'preview'         => array(
							'type'            => 'font',
							'selector'        => 'figcaption h2'
						)					
					),
                    
                    'title_font_size' => array(
						'type'          => 'text',
						'label'         => __('Title Font Size', 'fl-builder'),
						'default'       => '20',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
                    
                    'title_font_color'  => array(
                        'type'          => 'color',
                        'label'         => __('Title Colour', 'fl-builder'),
                        'default'       => '000000',
                        'show_reset'    => true,
                    ),                   
                    
                    'title_background_color'  => array(
                        'type'          => 'color',
                        'label'         => __('Title Background Colour', 'fl-builder'),
                        'default'       => 'ffffff',
                        'show_reset'    => true,
                    ),
                   
                    'title_background_opacity' => array(
						'type'          => 'text',
						'label'         => __('Title Background Opacity', 'fl-builder'),
						'default'       => '100',
						'placeholder'     => '100',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => '%'
					),
                    
                    'title_full'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Make Title Cover Panel', 'fl_builder' ),
                        'default'   => 'false',
                        'options'   => array (
                            'true' => 'True',
                            'false' => 'False',
                        ),
                    ),                   
                    
                    'title_align'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Align Title Center', 'fl_builder' ),
                        'default'   => 'false',
                        'options'   => array (
                            'true' => 'True',
                            'false' => 'False',
                        ),
                    ),
                   
                    'excerpt_font'          => array(
						'type'          => 'font',
						'default'		=> array(
							'family'		=> 'Default',
							'weight'		=> 300
						),
						'label'         => __('Excerpt Font', 'fl-builder'),
						'preview'         => array(
							'type'            => 'font',
							'selector'        => 'figcaption h2'
						)					
					),
                    
                    'excerpt_font_size' => array(
						'type'          => 'text',
						'label'         => __('Excerpt Font Size', 'fl-builder'),
						'default'       => '14',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
                    
                    'excerpt_font_color'  => array(
                        'type'          => 'color',
                        'label'         => __('Excerpt Colour', 'fl-builder'),
                        'default'       => 'ffffff',
                        'show_reset'    => true,
                    ), 
                    
                    'icon_font_size' => array(
						'type'          => 'text',
						'label'         => __('Icon Font Size', 'fl-builder'),
						'default'       => '14',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
                    
                    'icon_font_color'  => array(
                        'type'          => 'color',
                        'label'         => __('Icon Colour', 'fl-builder'),
                        'default'       => 'ffffff',
                        'show_reset'    => true,
                    ), 
                    
                    'icon_hover_color'  => array(
                        'type'          => 'color',
                        'label'         => __('Icon Hover Colour', 'fl-builder'),
                        'default'       => 'ffffff',
                        'show_reset'    => true,
                    ), 
                    
                    'excerpt_full'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Make Content Cover Panel', 'fl_builder' ),
                        'default'   => 'false',
                        'options'   => array (
                            'true' => 'True',
                            'false' => 'False',
                        ),
                    ), 
                    
                    'excerpt_background_color'  => array(
                        'type'          => 'color',
                        'label'         => __('Content Background Colour', 'fl-builder'),
                        'default'       => '000000',
                        'show_reset'    => true,
                    ),
                   
                    'excerpt_background_opacity' => array(
						'type'          => 'text',
						'label'         => __('Content Background Opacity', 'fl-builder'),
						'default'       => '35',
						'placeholder'     => '35',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => '%'
					),
                    
                )
            ),
		)
    ),

));
                           
                           
FLBuilder::register_settings_form('custom_hover_panel', array(
	'title' => __('Panel Settings', 'fl-builder'),
	'tabs'  => array(
		'general'        => array( // Tab
			'title'         => __('Content', 'fl-builder'), // Tab title
			'sections'      => array( // Tab Sections
				'general'       => array(
					'title'     => '',
					'fields'    => array(
						'label'         => array(
							'type'          => 'text',
							'label'         => __('Panel Label', 'fl-builder'),
							'help'          => __('A label to identify this panel on the Custom Panel tab.', 'fl-builder')
						)
					)
				),
                
				'background' => array(
					'title'     => __('Background Layout', 'fl-builder'),
					'fields'    => array(
						'bg_layout'     => array(
							'type'          => 'select',
							'label'         => __('Type', 'fl-builder'),
							'default'       => 'photo',
							'help'          => __('This setting is for the entire background of your slide.', 'fl-builder'),
							'options'       => array(
								'photo'         => __('Photo', 'fl-builder'),
								//'video'         => __('Video', 'fl-builder'),
								'color'         => __('Color', 'fl-builder'),
								//'none'          => _x( 'None', 'Background type.', 'fl-builder' )
							),
							'toggle'        => array(
								'photo'         => array(
									'fields'        => array('bg_photo'),
									'sections'      => array('content', 'text')
								),
								'color'         => array(
									'fields'        => array('bg_color'),
									'sections'      => array('content', 'text')
								),
								'video'         => array(
									'fields'        => array('bg_video')
								),
								'none'          => array(
									'sections'      => array('content', 'text')
								)
							)
						),
						'bg_photo'      => array(
							'type'          => 'photo',
							'label'         => __('Background Photo', 'fl-builder')
						),
						'bg_color'      => array(
							'type'          => 'color',
							'label'         => __('Background Color', 'fl-builder'),
							'show_reset'    => true
						),
						'bg_video'      => array(
							'type'          => 'textarea',
							'label'         => __('Background Video Code', 'fl-builder'),
							'rows'          => '6'
						)
					)
				),
				'content'      => array(
					'title'         => __('Content Layout', 'fl-builder'),
					'fields'        => array(
						'content_layout' => array(
							'type'          => 'select',
							'label'         => __('Type', 'fl-builder'),
							'default'       => 'none',
							'help'          => __('This allows you to add content over or in addition to the background selection above. The location of the content layout can be selected in the style tab.', 'fl-builder'),
							'options'       => array(
								'text'          => __('Text', 'fl-builder'),
							),
							'toggle'        => array(
								'text'          => array(
									'fields'        => array('title', 'text'),
									'sections'      => array('text')
								),
							)
						),

						'title'         => array(
							'type'          => 'text',
							'label'         => __('Heading', 'fl-builder')
						),
                        'url'         => array(
							'type'          => 'text',
							'label'         => __('URL Link', 'fl-builder')
						),
						'text'          => array(
							'type'          => 'editor',
							'media_buttons' => false,
							'rows'          => 16
						)
					)
				)
			)
		),
		

	)
));