<?php


class SWListsClass extends FLBuilderModule {

    public function __construct()
    {
      
        parent::__construct(array(
            'name'              => __( 'Lists', 'fl-builder' ),
            'description'       => __( 'Add a custom list to your site', 'fl-builder' ),
            'category'          => BRANDING,
            'partial_refresh'   => true,
            'dir'               => SW_LISTS_MODULE_DIR . '/',
            'url'               => SW_LISTS_MODULE_URL . '/',
        ));
        
    }    
    
}

FLBuilder::register_module( 'SWListsClass', array(
    
    'content-tab'      => array(
        
        'title'         => __( 'Content', 'fl-builder' ),
        'sections'      => array( 

            
              'list-content'  => array(
                'title'         => __( 'Lists Content', 'fl-builder' ),
                'fields'        => array(
                    
                    'list_items' => array(
                        'type'          => 'form',
                        'label'         => __( 'List Item', 'fl-builder' ),
                        'form'          => 'list_form',
                        'preview_text'  => 'title',
                        'multiple'      => true,
                    ), // end list_items
                    
                ) // end fields
                  
            ), // end list-content
            
        ) // end sections
        
    ), // end content-tab
    
    'style-tab'      => array(
        
        'title'         => __( 'Style', 'fl-builder' ),
        'sections'      => array( 

            
              'list_style'  => array(
                'title'         => __( 'List Style', 'fl-builder' ),
                'fields'        => array(
                    
                    'text_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Text Color', 'fl-builder' ),
                        'default'       => '',
                        'show_reset'    => true
                    ), // end text_color
                    
                    'text_hover_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Text Hover Color', 'fl-builder' ),
                        'default'       => '',
                        'show_reset'    => true
                    ), // end text_hover_color
                    
                    'icon_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Icon Color', 'fl-builder' ),
                        'default'       => '',
                        'show_reset'    => true
                    ), // end icon_color
                    
                    'text_size'     => array(
						'type'          => 'select',
						'label'         => __('Text Font Size', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('text_font_size')
							)
						)
					), // end text_size
                    
                    'text_font_size' => array(
						'type'          => 'text',
						'label'         => __('Text Custom Font Size', 'fl-builder'),
						'default'       => '14',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					), // text_font_size
                    
                    'text_underline'     => array(
						'type'          => 'select',
						'label'         => __('Text Link Underline', 'fl-builder'),
						'default'       => 'none',
						'options'       => array(
							'none'       =>  __('None', 'fl-builder'),
							'hover'        =>  __('Hover', 'fl-builder'),
							'always'       =>  __('Always', 'fl-builder'),
						),
					), // end text_underline
                    
                ) // end fields
                  
            ), // end list_style
            
        ) // end sections
        
    ), // end style-tab
    
) );

FLBuilder::register_settings_form('list_form', array(
    'title' => __('List Item', 'fl-builder'),
    'tabs'  => array(
        
        'axis'      => array(
            'title'         => __('Item', 'fl-builder'),
            'sections'      => array(
                'general'       => array(
                    'title'         => '',
                    'fields'        => array(
                        
                    'title' => array(
                        'type'          => 'text',
                        'label'         => __('Text', 'fl-builder'),
                    ), // end title
                        
                    'link' => array(
                        'type'          => 'link',
                        'label'         => __('Link', 'fl-builder'),
                    ), // end title
                        
                    'icon' => array(
                        'type'          => 'icon',
                        'label'         => __('Icon', 'fl-builder'),
                        'default'       => 'fa fa-check-square',
                        'show_remove'   => true
                    ), // end icon
                        
                    'class' => array(
                        'type'          => 'text',
                        'label'         => __('Custom Class', 'fl-builder'),
                        'placeholder'   => 'fa-spin',
                    ), // end class

                        
                    )
                ),
            )
        ), // end axis
    )
));