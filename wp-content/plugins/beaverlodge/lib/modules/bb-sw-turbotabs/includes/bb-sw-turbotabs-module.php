<?php


class SWTurbotabsClass extends FLBuilderModule {

    public function __construct()
    {

        parent::__construct(array(
            'name'          => __( 'Turbotabs', 'fl-builder' ),
            'description'   => __( 'Powerful tabbed menu module', 'fl-builder' ),
            'category'      => BRANDING,
            'dir'           => SW_TURBOTABS_MODULE_DIR . '/',
            'url'           => SW_TURBOTABS_URL . '/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
        
    }    
    
}

FLBuilder::register_module( 'SWTurbotabsClass', array(
    
    'content-tab'      => array(
        
        'title'         => __( 'Content', 'fl-builder' ),
        'sections'      => array( 
            
              'content_select'  => array(
                'title'         => __( 'Tab Content', 'fl-builder' ),
                'fields'        => array(
                    
                    'tabs'    => array(
                        'type'          => 'form',
                        'label'        => __('Tabs', 'fl_builder'),
                        'form'          => 'content_form', 
                        'preview_text'  => 'label',
                        'multiple'      => true
                    )
                    
                ) // end fields
                  
            ), // end content_select         
            
            
        ) // end sections
        
    ), // end content-tab
    
    'style-tab'      => array(
        
        'title'         => __( 'Styles', 'fl-builder' ),
        'sections'      => array( 
            
              'general'  => array(
                'title'         => __( 'General', 'fl-builder' ),
                'fields'        => array(
                    
                    'breakpoint'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Breakpoint', 'fl_builder' ),
                        'default'       => '480',
                        'maxlength'     => '5',
                        'size'          => '6',
                        'placholder'    => '480',
                        'description'   => 'px',
                    ),  // end breakpoint
                    
                    'full_width'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Full Width Tab Menu', 'fl_builder' ),
                        'default'       => 'false',
                        'options'       => array(
                            'true'      => 'True',
                            'false'    => 'False',
                        ), // end full_width
                    ),  
                    
                ) // end general
                  
            ), // end tabs  
            
              'tabs'  => array(
                'title'         => __( 'Tabs', 'fl-builder' ),
                'fields'        => array(
                    
                    'tab_height'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Tab Height', 'fl_builder' ),
                        'default'       => '32',
                        'maxlength'     => '3',
                        'size'          => '3',
                        'placholder'    => '32',
                        'description'   => 'px',
                    ),  
                    
                    'tab_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Tab Color', 'fl-builder' ),
                        'default'       => '333333',
                        'show_reset'    => true
                    ), // end tab_color
                    
                    'overlay' => array(
                        'type'          => 'select',
                        'label'         => __( 'Hover Tab Color as Overlay with Image Background?', 'fl-builder' ),
                        'default'       => 'yes',
                        'options'       => array(
                            'yes'      => 'Yes',
                            'no'      => 'No',
                        ),
                    ), // end overlay 
                    
                    'tab_border' => array(
                        'type'          => 'color',
                        'label'         => __( 'Tab Border Color', 'fl-builder' ),
                        'default'       => 'ffffff',
                        'show_reset'    => true
                    ), // end tab_border
                    
                    'active_tab_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Active Tab Color', 'fl-builder' ),
                        'default'       => 'ffffff',
                        'show_reset'    => true
                    ), // end active_tab_color
                    
                    'active_overlay' => array(
                        'type'          => 'select',
                        'label'         => __( 'Use Active Tab Color as Overlay with Image Background?', 'fl-builder' ),
                        'default'       => 'yes',
                        'options'       => array(
                            'yes'      => 'Yes',
                            'no'      => 'No',
                        ),
                    ), // end overlay 
                    
                    'overlay_opacity' => array(
						'type'          => 'text',
						'label'         => __('Overlay Opacity', 'fl-builder'),
						'default'       => '20',
						'placeholder'     => '20',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => '%'
					),
                    
                    'active_tab_border' => array(
                        'type'          => 'color',
                        'label'         => __( 'Active Tab Border', 'fl-builder' ),
                        'default'       => '333333',
                        'show_reset'    => true
                    ), // end active_tab_border
                    
                    'font_size'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Font Size', 'fl_builder' ),
                        'default'       => '14',
                        'maxlength'     => '3',
                        'size'          => '3',
                        'placholder'    => '14',
                        'description'   => 'px',
                    ),
                    
                    'font_family' => array(
                        'type'          => 'font',
                        'label'         => __( 'Font', 'fl-builder' ),
                        'default'       => array(
                            'family'        => 'Helvetica',
                            'weight'        => 300
                        )
                    ),// end font_familty
                    
                    'tab_font_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Tab Font Color', 'fl-builder' ),
                        'default'       => 'ffffff',
                        'show_reset'    => true
                    ), // end tab_font_color                    
                    
                    'active_tab_font_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Active Tab Font Color', 'fl-builder' ),
                        'default'       => '333333',
                        'show_reset'    => true
                    ), // end active_tab_font_color
                    
                ) // end fields
                  
            ), // end tabs  
            
              'content'  => array(
                'title'         => __( 'Content', 'fl-builder' ),
                'fields'        => array( 
                    
                    'background_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Content Background Color', 'fl-builder' ),
                        'default'       => 'ffffff',
                        'show_reset'    => true
                    ), // end background_color
                    
                    'border_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Content Border Color', 'fl-builder' ),
                        'default'       => '333333',
                        'show_reset'    => true
                    ), // end border_color
                    
                    'font_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Content Font Color', 'fl-builder' ),
                        'default'       => '333333',
                        'show_reset'    => true
                    ), // end font_color
                    
                    'font_align' => array(
                        'type'          => 'select',
                        'label'         => __( 'Content Alignment', 'fl-builder' ),
                        'default'       => 'left',
                        'options'       => array(
                            'left'      => 'Left',
                            'center'    => 'Center',
                            'right'     => 'Right',
                        ),
                    ), // end icon 
                    
                ) // end fields
                  
            ), // end tabs        
            
            
        ) // end sections
        
    ), // end content-tab
    
) ); 
    
FLBuilder::register_settings_form('content_form', array(
    'title' => __('Tabs Content', 'fl-builder'),
    'tabs'  => array(
        'general'      => array(
            'title'         => __('Tab', 'fl-builder'),
            'sections'      => array(
                
                'content'       => array(
                    'title'         => 'Content',
                    'fields'        => array(
                        
                        'label'         => array(
                            'type'          => 'text',
                            'label'         => __('Tab Title', 'fl-builder'),
                        ), // end label                     
                        
                        'icon' => array(
                            'type'          => 'select',
                            'label'         => __( 'Icon Position', 'fl-builder' ),
                            'default'       => 'left',
                            'options'       => array(
                                'none'      => 'None',
                                'left'      => 'Left',
                                'right'     => 'Right',
                            ),
                            'toggle'        => array(
                                'none'      => array(
                                    'fields'        => array(''),
                                ),
                                'left'      => array(
                                    'fields'        => array('tab_icon'),
                                ),
                                'right'      => array(
                                    'fields'        => array('tab_icon'),
                                ),
                            ),
                        ), // end icon 
                        
                        'tab_icon' => array(
                            'type'          => 'icon',
                            'label'         => __( 'Icon', 'fl-builder' ),
                            'show_remove'   => true,
                        ), // end tab_icon   
                        
                        'content_type' => array(
                            'type'          => 'select',
                            'label'         => __( 'Content Type', 'fl-builder' ),
                            'default'       => 'custom',
                            'options'       => array(
                                'shortcode'   => 'Template',
                                'custom'      => 'Custom',
                            ),
                            'toggle'        => array(
                                'shortcode'      => array(
                                    'fields'        => array('template_selection'),
                                ),
                                'custom'      => array(
                                    'fields'        => array('tab_content'),
                                ),
                            ),
                        ), // end content_type     
                        
                        'template_selection' => array(
                            'type'          => 'select',
                            'label'         => __('Template', 'fl-builder'),
                            'options'       => fotoplugins_get_templates(),
                        ), // end template_select
                        
                        'tab_content' => array(
                            'type'          => 'editor',
                            'media_buttons' => true,
                            'rows'          => 10,
                        ), // end tab_content
                        
                        'bg_image' => array(
                            'type'          => 'photo',
                            'label'         => __('Choose Tab Background Image', 'fl-builder'),
                            'show_remove'	=> true,
                        ),
                        
                    )
                ), // end content
                
            )
        )
    )
));

function fotoplugins_get_templates() {
        
            
    $data  = array();
    $query = new WP_Query( array(
        'post_type' 		=> 'fl-builder-template',
        'orderby' 			=> 'title',
        'order' 			=> 'ASC',
        'posts_per_page' 	=> '-1'
    ) );

    $data = array(
        '' => 'Choose a Template'
    );
    
    foreach( $query->posts as $post ) {
        $data[ $post->ID ] = $post->post_title;
    }
    
    return $data;

}