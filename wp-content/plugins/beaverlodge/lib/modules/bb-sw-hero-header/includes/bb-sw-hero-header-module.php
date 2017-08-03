<?php


class SWHeroHeaderClass extends FLBuilderModule {

    public function __construct()
    {
      
        parent::__construct(array(
            'name'              => __( 'Post Hero Header', 'fl-builder' ),
            'description'       => __( 'Add a header to posts', 'fl-builder' ),
            'category'          => BRANDING,
            'partial_refresh'   => true,
            'dir'               => SW_HERO_HEADER_MODULE_DIR . '/',
            'url'               => SW_HERO_HEADER_MODULE_URL . '/',
        ));
        
    }    
    
}

FLBuilder::register_module( 'SWHeroHeaderClass', array(
    
    'style-tab'      => array(
        
        'title'         => __( 'Style', 'fl-builder' ),
        'sections'      => array( 
            
              'general_style'  => array(
                'title'         => __( 'General', 'fl-builder' ),
                'fields'        => array(
                    
                    'height' => array(
						'type'          => 'text',
						'label'         => __('Height', 'fl-builder'),
						'default'       => '400',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					), // height
                    
                    'overlay_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Overlay Color', 'fl-builder' ),
                        'default'       => '000000',
                        'show_reset'    => true
                    ), // end overlay_color
                    
                    'overlay_opacity' => array(
						'type'          => 'text',
						'label'         => __('Overlay Opacity', 'fl-builder'),
						'default'       => '20',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => '%'
					), // overlay_opacity
                    
                    'background_pos'     => array(
						'type'          => 'select',
						'label'         => __('Background Position', 'fl-builder'),
						'default'       => 'center center',
						'options'       => array(
							'top center'     =>  __('Top Center', 'fl-builder'),
							'bottom center'  =>  __('Bottom Center', 'fl-builder'),
                            'left top'       =>  __('Left Top', 'fl-builder'),
                            'left center'    =>  __('Left Center', 'fl-builder'),
                            'left bottom'    =>  __('Left Bottom', 'fl-builder'),
                            'right top'      =>  __('Right Top', 'fl-builder'),      
                            'right center'   =>  __('Right Center', 'fl-builder'),   
                            'right bottom'   =>  __('Right Bottom', 'fl-builder'),   
                            'center top'   =>  __('Center Top', 'fl-builder'),   
                            'center center'  =>  __('Center', 'fl-builder'),
                            'center bottom'  =>  __('Center Bottom', 'fl-builder'),
						),
					), // end background_pos
                    
                    'default_bb'     => array(
						'type'          => 'select',
						'label'         => __('Default Page Builder Meta Layout', 'fl-builder'),
						'default'       => 'yes',
						'options'       => array(
							'yes'       =>  __('Yes', 'fl-builder'),
							'no'        =>  __('No', 'fl-builder')
						),
						'toggle'        => array(
							'no'        => array(
								'fields'  => array('comments'),
							)
						)
					), // end title_size
                    
                    'breadcrumbs'     => array(
						'type'          => 'select',
						'label'         => __('Display Breadcrumbs', 'fl-builder'),
						'default'       => 'yes',
						'options'       => array(
							'yes'       =>  __('Yes', 'fl-builder'),
							'no'        =>  __('No', 'fl-builder')
						),
						'toggle'        => array(
							'yes'        => array(
								'sections'        => array('crumb_style')
							)
						)
					), // end title_size
                    
                    'comments' => array(
						'type'          => 'text',
						'label'         => __('Comments Link ID', 'fl-builder'),
						'default'       => 'comments',
                        'help'          => __('This is the link to scroll to on the page', 'fl-builder')
					), // comments
                    
                        'page_title'     => array(
                            'type'          => 'select',
                            'label'         => __('Hide BB Theme Default Post Title', 'fl-builder'),
                            'default'       => 'yes',
                            'options'       => array(
                                'yes'       =>  __('Yes', 'fl-builder'),
                                'no'        =>  __('No', 'fl-builder')
                            ),
                        ), // end page_title
 
                ) // end fields
                  
            ), // end title_style  
            
              'title_style'  => array(
                'title'         => __( 'Title', 'fl-builder' ),
                'fields'        => array(
                    
                    'title_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Title Color', 'fl-builder' ),
                        'default'       => 'ffffff',
                        'show_reset'    => true
                    ), // end title_color
                    
                    'title_size'     => array(
						'type'          => 'select',
						'label'         => __('Font Size', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('title_font_size')
							)
						)
					), // end title_size
                    
                    'title_font_size' => array(
						'type'          => 'text',
						'label'         => __('Title Font Size', 'fl-builder'),
						'default'       => '36',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					), // title_font_size
                    
                ) // end fields
                  
            ), // end title_style 
            
              'meta_style'  => array(
                'title'         => __( 'Meta', 'fl-builder' ),
                'fields'        => array(
                    
                    'meta_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Meta Color', 'fl-builder' ),
                        'default'       => 'ffffff',
                        'show_reset'    => true
                    ), // end meta_color
                    
                    'meta_hover_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Meta Hover Color', 'fl-builder' ),
                        'default'       => 'ffffff',
                        'show_reset'    => true
                    ), // end meta_hover_color
                    
                    'meta_size'     => array(
						'type'          => 'select',
						'label'         => __('Font Size', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('meta_font_size')
							)
						)
					), // end meta_size
                    
                    'meta_font_size' => array(
						'type'          => 'text',
						'label'         => __('Meta Font Size', 'fl-builder'),
						'default'       => '14',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					), // meta_font_size
                    
                ) // end fields
                  
            ), // end meta_style
            
              'crumb_style'  => array(
                'title'         => __( 'Breadcrumbs', 'fl-builder' ),
                'fields'        => array(
                    
                    'crumb_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Breadcrumb Color', 'fl-builder' ),
                        'default'       => 'cccccc',
                        'show_reset'    => true
                    ), // end crumb_color
                    
                    'crumb_hover_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Breadcrumb Hover Color', 'fl-builder' ),
                        'default'       => 'ffffff',
                        'show_reset'    => true
                    ), // end crumb_hover_color
                    
                    'active_crumb_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Breadcrumb Active Color', 'fl-builder' ),
                        'default'       => 'ffffff',
                        'show_reset'    => true
                    ), // end active_crumb_color
                    
                    'crumb_size'     => array(
						'type'          => 'select',
						'label'         => __('Font Size', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('crumb_font_size')
							)
						)
					), // end crumb_size
                    
                    'crumb_font_size' => array(
						'type'          => 'text',
						'label'         => __('Breadcrumb Font Size', 'fl-builder'),
						'default'       => '14',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					), // crumb_font_size
                    
                ) // end fields
                  
            ), // end crumb_style
            
        ) // end sections
        
    ), // end style-tab
    
) );