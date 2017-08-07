<?php


class SWBreadcrumbsClass extends FLBuilderModule {

    public function __construct()
    {
      
        parent::__construct(array(
            'name'              => __( 'Breadcrumbs', 'fl-builder' ),
            'description'       => __( 'Add a header to posts', 'fl-builder' ),
            'category'          => BRANDING,
            'partial_refresh'   => true,
            'dir'               => SW_BREADCRUMBS_MODULE_DIR . '/',
            'url'               => SW_BREADCRUMBS_MODULE_URL . '/',
        ));
        
    }    
    
}

FLBuilder::register_module( 'SWBreadcrumbsClass', array(
    
    'style-tab'      => array(
        
        'title'         => __( 'Style', 'fl-builder' ),
        'sections'      => array( 

            
              'crumb_style'  => array(
                'title'         => __( 'Breadcrumbs', 'fl-builder' ),
                'fields'        => array(
                    
                    'crumb_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Breadcrumb Color', 'fl-builder' ),
                        'default'       => '',
                        'show_reset'    => true
                    ), // end crumb_color
                    
                    'crumb_align'     => array(
						'type'          => 'select',
						'label'         => __('Breadcrumb Alignment', 'fl-builder'),
						'default'       => 'flex-start',
						'options'       => array(
							'flex-start'       =>  __('Left', 'fl-builder'),
							'center'        =>  __('Center', 'fl-builder'),
							'flex-end'        =>  __('Right', 'fl-builder'),
						),
					), // end crumb_align
                    
                    'crumb_hover_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Breadcrumb Hover Color', 'fl-builder' ),
                        'default'       => '',
                        'show_reset'    => true
                    ), // end crumb_hover_color
                    
                    'active_crumb_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Breadcrumb Active Color', 'fl-builder' ),
                        'default'       => '',
                        'show_reset'    => true
                    ), // end active_crumb_color
                    
                    'crumb_size'     => array(
						'type'          => 'select',
						'label'         => __('Breadcrumb Font Size', 'fl-builder'),
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
						'label'         => __('Breadcrumb Custom Font Size', 'fl-builder'),
						'default'       => '14',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					), // crumb_font_size
                    
                    
                    'crumb_divider' => array(
						'type'          => 'text',
						'label'         => __('Breadcrumb Divider', 'fl-builder'),
						'default'       => '/',
						'maxlength'     => '3',
						'size'          => '4',
					), // crumb_divider
                    
                    'divider_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Breadcrumb Divider Color', 'fl-builder' ),
                        'default'       => '',
                        'show_reset'    => true
                    ), // end divider_color
                    
                    'crumb_underline'     => array(
						'type'          => 'select',
						'label'         => __('Breadcrumb Underline', 'fl-builder'),
						'default'       => 'none',
						'options'       => array(
							'none'       =>  __('None', 'fl-builder'),
							'hover'        =>  __('Hover', 'fl-builder'),
							'always'       =>  __('Always', 'fl-builder'),
						),
					), // end crumb_underline
                    
                ) // end fields
                  
            ), // end crumb_style
            
        ) // end sections
        
    ), // end style-tab
    
) );