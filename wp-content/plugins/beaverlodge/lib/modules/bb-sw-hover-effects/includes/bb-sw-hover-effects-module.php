<?php

class SWHoverEffectClass extends FLBuilderModule {

    public function __construct()
    {

        parent::__construct(array(
            'name'          => __( 'Hover Effects', 'fl-builder' ),
            'description'   => __( 'Add hover card effects to your site!', 'fl-builder' ),
            'category'      => BRANDING,
            'dir'           => SW_HOVEREFFECTS_MODULE_DIR . '/',
            'url'           => SW_HOVEREFFECTS_MODULE_URL . '/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
        
            $this->add_css('set1.css', $this->url . 'css/set1.css'); 
            $this->add_css('set2.css', $this->url . 'css/set2.css'); 
        
    }    
    

}

FLBuilder::register_module( 'SWHoverEffectClass', array(

    'content'       => array(
        'title'         => __('Content', 'fl-builder'),
        'sections'      => array(
            'general'       => array(
                'title'         => __('Content Selection', 'fl-builder'), 
                'fields'        => array( // Section Fields
                    
                    'content_type' => array(
						'type'          => 'select',
						'label'         => __('Content Type', 'fl-builder'),
						'default'       => 'custom',
                        'options'       => array(
                            'custom'    => __('Custom', 'fl-builder'),
                            'posts'     => __('Posts', 'fl-builder'),
                        ),
                        'toggle'        => array(
                            'posts'      => array(
                                'fields'        => array('post_qty', 'post_cat', 'image_crop', 'image_align'),
                            ),
                            'custom'      => array(
                                'sections'        => array('custom_section'),
                            )
                        ),
					),                   
                                        
                    'post_qty' => array(
						'type'          => 'text',
						'label'         => __('Post Qty', 'fl-builder'),
						'default'       => '4',
						'maxlength'     => '3',
						'size'          => '4',
					),
                        
                    'post_cat' => array(
                        'type'          => 'suggest',
                        'label'         => __( 'Post Category', 'fl-builder' ),
                        'action'        => 'fl_as_terms',
                        'data'          => 'category',
                    ),
                )
            ),
			
            'custom_section' => array(
                'title'         => __('Custom Content', 'fl-builder'),
                'fields'        => array(  
                    
					'panel'    => array(
                        'type'          => 'form',
                        'label'        => __('Content', 'fl_builder'),
                        'form'          => 'content_hover_panel', 
                        'preview_text'  => 'label',
                        'multiple'      => true
                    ),               
                    
					
                )
            )
        )
    ),

    'layout'       => array(
        'title'         => __('Layout Options', 'fl-builder'),
        'sections'      => array(
             
            'layout_section'       => array(
                'title'         => 'Layouts', 
                'fields'        => array(
                    
                    'effect'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Choose Hover Effect', 'fl_builder' ),
                        'default'       => 'lily',
                        'options'       => array(
                            'lily'      => 'Lily',
                            'sadie'     => 'Sadie',
                            'roxy'      => 'Roxy',
                            'bubba'     => 'Bubba',
                            'romeo'     => 'Romeo',
                            'layla'     => 'Layla',
                            'honey'     => 'Honey',
                            'oscar'     => 'Oscar',
                            'marley'    => 'Marley',
                            'ruby'      => 'Ruby',
                            'milo'      => 'Milo',
                            'dexter'    => 'Dexter',
                            'sarah'     => 'Sarah',
                            //'zoe'       => 'Zoe',
                            'chico'     => 'Chico',
                            'julia'     => 'Julia',
                            'goliath'   => 'Goliath',
                            //'hera'      => 'Hera',
                            //'winston'   => 'Winston',
                            'selena'    => 'Selena',
                            //'terry'     => 'Terry',
                            //'phoebe'    => 'Phoebe',
                            'apollo'    => 'Apollo',
                            //'kira'      => 'Kira',
                            'steve'     => 'Steve',
                            'moses'     => 'Moses',
                            'jazz'      => 'Jazz',
                            'ming'      => 'Ming',
                            'lexi'      => 'Lexi',
                            'duke'      => 'Duke',
                        ),
                        'description'   => __('See <a href="http://tympanus.net/Development/HoverEffectIdeas/index.html" target="_blank" style="color: #b20022;">Demos</a>', 'fl-builder'),
                    ), 

                    'panel_width' => array(
						'type'          => 'text',
						'label'         => __('Panel Width', 'fl-builder'),
						'default'       => '300',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),  
                    
                    'panel_height' => array(
						'type'          => 'text',
						'label'         => __('Panel Height', 'fl-builder'),
						'default'       => '300',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					), 

                    'panel_margin' => array(
						'type'          => 'text',
						'label'         => __('Row Margin', 'fl-builder'),
						'default'       => '10',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),   

                    'panel_gutter' => array(
						'type'          => 'text',
						'label'         => __('Column Margin', 'fl-builder'),
						'default'       => '10',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					), 

                    'panel_align' => array(
						'type'          => 'select',
						'label'         => __('Align Panels', 'fl-builder'),
						'default'       => 'left',
                        'options'       => array(
                            'flex-start'    => __('Left', 'fl-builder'),
                            'center'        => __('Center', 'fl-builder'),
                            'flex-end'      => __('Right', 'fl-builder'),
                        ),
					), 

                    'image_crop' => array(
						'type'          => 'select',
						'label'         => __('Image Crop', 'fl-builder'),
						'default'       => 'none',
                        'options'       => array(
                            'none'      => __('None', 'fl-builder'),
                            'fill'      => __('Fill', 'fl-builder'),
                            'contain'    => __('Contain', 'fl-builder'),
                            'cover'      => __('Cover', 'fl-builder'),
                            'scale-down'      => __('Scale Down', 'fl-builder'),
                        ),
					), 

                    'image_align' => array(
						'type'          => 'select',
						'label'         => __('Image Align', 'fl-builder'),
						'default'       => 'center center',
                        'options'       => array(
                            'center center'    => __('Center', 'fl-builder'),
                            'top center'    => __('Top Center', 'fl-builder'),
                            'bottom center'    => __('Bottom Center', 'fl-builder'),
                            'top left'    => __('Top Left', 'fl-builder'),
                            'center left'        => __('Center Left', 'fl-builder'),
                            'bottom left'      => __('Bottom Left', 'fl-builder'),
                            'top right'    => __('Top Right', 'fl-builder'),
                            'center right'        => __('Center Right', 'fl-builder'),
                            'bottom right'      => __('Bottom Right', 'fl-builder'),
                        ),
					), 
                   
                    
                )
            ),
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
                    
                    'title_spacing' => array(
						'type'          => 'text',
						'label'         => __('Title Letter Spacing', 'fl-builder'),
						'default'       => '3',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
                    
                    'title_font_color'  => array(
                        'type'          => 'color',
                        'label'         => __('Title Colour', 'fl-builder'),
                        'default'       => 'ffffff',
                        'show_reset'    => true,
                    ), 
                    
                    'title_style'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Title Style', 'fl-builder' ),
                        'default'   => 'uppercase',
                        'options'   => array (
                            'uppercase'     => __( 'Uppercase', 'fl-builder' ),
                            'lowercase'     => __( 'Lowercase', 'fl-builder' ),
                            'capitalize'    => __( 'Capitalize', 'fl-builder' ),                            
                            'none'          => 'Normal',
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
                    
                    'excerpt_spacing' => array(
						'type'          => 'text',
						'label'         => __('Excerpt Letter Spacing', 'fl-builder'),
						'default'       => '0.8',
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
                    
                    'excerpt_style'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Excerpt Style', 'fl-builder' ),
                        'default'   => 'none',
                        'options'   => array (
                            'none'          => 'Normal',
                            'uppercase'     => __( 'Uppercase', 'fl-builder' ),
                            'lowercase'     => __( 'Lowercase', 'fl-builder' ),
                            'capitalize'    => __( 'Capitalize', 'fl-builder' ),
                        ),
                    ),
                   
                    
                )
            ),
		)
    ),

));
                           
                           
FLBuilder::register_settings_form('content_hover_panel', array(
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
					'title'     => __('Panel Content', 'fl-builder'),
					'fields'    => array(
						'bg_photo'         => array(
							'type'          => 'photo',
							'label'         => __('background', 'fl-builder')
						),
						'title'         => array(
							'type'          => 'text',
							'label'         => __('Heading', 'fl-builder')
						),
                        'url'         => array(
							'type'          => 'link',
							'label'         => __('URL Link', 'fl-builder')
						),
						'text'          => array(
							'type'          => 'editor',
							'media_buttons' => false,
							'rows'          => 16
						),
                        'button'         => array(
							'type'          => 'text',
							'label'         => __('Button Text', 'fl-builder'),
                            'default'       => __('View more', 'fl-builder'),
						),
					)
				)
			)
		),
		

	)
));