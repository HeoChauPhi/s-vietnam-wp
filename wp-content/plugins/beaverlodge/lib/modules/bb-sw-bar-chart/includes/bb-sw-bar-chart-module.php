<?php


class SWBarChartClass extends FLBuilderModule {

    public function __construct()
    {
        
        parent::__construct(array(
            'name'              => __( 'Charts', 'fl-builder' ),
            'description'       => __( 'Add a chart to your site', 'fl-builder' ),
            'category'          => BRANDING,
            'partial_refresh'   => true,
            'dir'               => SW_BARCHART_MODULE_DIR . '/',
            'url'               => SW_BARCHART_MODULE_URL . '/',
        ));
        

        $this->add_js('visualise.js', $this->url . 'includes/visualise.js', array(), '', true);
        //$this->add_css('graph', $this->url . 'css/graph.css');
        
    }    
    
}

FLBuilder::register_module( 'SWBarChartClass', array(
    
    'content-tab'      => array(
        
        'title'         => __( 'Content', 'fl-builder' ),
        'sections'      => array( 
            
              'type'  => array(
                'title'         => __( 'Graph Type', 'fl-builder' ),
                'fields'        => array(
                    
                    'graph_style' => array(
                        'type'          => 'select',
                        'label'         => __('Graph Type', 'fl-builder'),
                        'default'       => 'bar',
                        'options'   => array(
                            'bar'   => __('Bar', 'fl-builder'),
                            'pie'   => __('Pie', 'fl-builder'),
                        ),
                        'toggle'        => array(
                            'bar'       => array(
                                'fields'  => array('width'),
                            ),
                        ), // end toggle
                    ), // end graph_style
                    
                    'legend' => array(
                        'type'          => 'select',
                        'label'         => __('Display Legend', 'fl-builder'),
                        'default'       => 'true',
                        'options'   => array(
                            'true'   => __('Yes', 'fl-builder'),
                            'false'  => __('No', 'fl-builder'),
                        ),
                    ), // end legend
                    
                    'width'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Graph Width', 'fl_builder' ),
                        'default'   => '300',
                        'size'      => '4',
                        'maxlength' => '5',
                        'description' => 'px',
                    ),  // end width
                    
                    'height'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Graph Height', 'fl_builder' ),
                        'default'   => '300',
                        'size'      => '4',
                        'maxlength' => '5',
                        'description' => 'px',
                    ),  // end height
                    
                    'align' => array(
                        'type'          => 'select',
                        'label'         => __('Alignment', 'fl-builder'),
                        'default'       => 'left',
                        'options'   => array(
                            'left'      => __('Left', 'fl-builder'),
                            'center'    => __('Center', 'fl-builder'),
                            'right'     => __('Right', 'fl-builder'),
                        ),
                    ), // end legend
                    
                ) // end fields
                  
            ), // end axis-content
            
              'content'  => array(
                'title'         => __( 'Chart Values', 'fl-builder' ),
                'fields'        => array(
                    
                    'values' => array(
                        'type'          => 'form',
                        'label'         => __('Values', 'fl-builder'),
                        'form'          => 'x_axis_form',
                        'preview_text'  => 'title',
                        'multiple'      => true,
                    ), // end values
                    
                ) // end fields
                  
            ), // end axis-content
            
        ) // end sections
        
    ), // end content-tab
    
) ); 

FLBuilder::register_settings_form('x_axis_form', array(
    'title' => __('Chart Values', 'fl-builder'),
    'tabs'  => array(
        
        'axis'      => array(
            'title'         => __('Chart Value', 'fl-builder'),
            'sections'      => array(
                'general'       => array(
                    'title'         => '',
                    'fields'        => array(
                        
                    'title' => array(
                        'type'          => 'text',
                        'label'         => __('Title', 'fl-builder'),
                    ), // end title
                        
                    'value' => array(
                        'type'          => 'text',
                        'label'         => __('Value', 'fl-builder'),
                        'size'      => '4',
                        'maxlength' => '3',
                        'description' => '%'
                    ), // end value
                        
                    'colour' => array(
                        'type'          => 'color',
                        'label'         => __('Colour', 'fl-builder'),
                    ), // end value

                        
                    )
                ),
            )
        ), // end axis
    )
));