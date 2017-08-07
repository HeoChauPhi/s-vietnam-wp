<?php


class SWNewsTickerClass extends FLBuilderModule {

    public function __construct()
    {
        parent::__construct(array(
            'name'              => __( 'News Ticker', 'fl-builder' ),
            'description'       => __( 'Add a news ticker', 'fl-builder' ),
            'category'          => BRANDING,
            'partial_refresh'   => true,
            'dir'               => SW_NEWS_TICKER_MODULE_DIR . '/',
            'url'               => SW_NEWS_TICKER_MODULE_URL . '/',
        ));
        

        $this->add_js('jquery.easy-ticker.min.js', $this->url . 'js/jquery.easy-ticker.min.js', array(), '', true);
        
    }    
    
}

FLBuilder::register_module( 'SWNewsTickerClass', array(
    
    'content-tab'      => array(
        
        'title'         => __( 'Content', 'fl-builder' ),
        'sections'      => array( 
            
              'content_select'  => array(
                'title'         => __( 'Content', 'fl-builder' ),
                'fields'        => array(
                    
                    'content' => array(
                        'type'          => 'select',
                        'label'         => __('Choose Content', 'fl-builder'),
                        'default'       => 'posts',
                        'options'       => array(
                            'posts'     => __('Full Posts', 'fl-builder'),
                            'title'     => __('Title Only', 'fl-builder'),
                        ),
                    ), // end content
                    
                    'thumbnail' => array(
                        'type'          => 'select',
                        'label'         => __('Show Thumbnail', 'fl-builder'),
                        'default'       => 'yes',
                        'options'       => array(
                            'yes'       => __('Yes', 'fl-builder'),
                            'no'        => __('No', 'fl-builder'),
                        ),
                    ), // end thumbnail
                    
                    'post_count' => array(
                        'type'          => 'text',
                        'label'         => __( 'Post Count', 'fl_builder' ),
                        'default'       => '-1',
                        'size'          => '5',
                        'maxlength'     => '4',
                        'description'   => __( '-1 for all posts', 'fl_builder' ),
                    ),  // end visible
                    
                    'category'   => array(
                        'type'          => 'suggest',
                        'label'         => __('Choose Category', 'fl-builder'),
                        'action'    	=> 'fl_as_terms',
                        'data'      	=> 'category',
                    ), // end category 
                    
                ) // end fields
                  
            ) // end content_select
            
        ) // end sections
        
    ), // end content-tab
    
    'design-tab'      => array(
        
        'title'         => __( 'Design', 'fl-builder' ),
        'sections'      => array( 
            
              'design_layout'  => array(
                'title'         => __( 'Layout', 'fl-builder' ),
                'fields'        => array(
                    
                    'direction' => array(
                        'type'          => 'select',
                        'label'         => __('Choose Direction', 'fl-builder'),
                        'default'       => 'up',
                        'options'       => array(
                            'up'        => __('Up', 'fl-builder'),
                            'down'      =>  __('Down', 'fl-builder'),
                        ),
                    ), // end direction
                    
                    'speed' => array(
                        'type'          => 'select',
                        'label'         => __('Speed', 'fl-builder'),
                        'default'       => 'slow',
                        'options'       => array(
                            'slow'      =>  __('Slow', 'fl-builder'),
                            'medium'    =>  __('Medium', 'fl-builder'),
                            'fast'      =>  __('Fast', 'fl-builder'),
                        ),
                    ), // end speed
                    
                    'interval'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Interval', 'fl_builder' ),
                        'default'   => '2000',
                        'size'      => '5',
                        'maxlength' => '4',
                        'description' => 'ms',
                        'help'      => __('eg: 2000 = 2 seconds', 'fl-builder'),
                    ),  // end interval
                    
                    'visible'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Visible Posts', 'fl_builder' ),
                        'default'   => '1',
                        'size'      => '5',
                        'maxlength' => '4',
                        'help'      => __('Use 0 to show all', 'fl-builder'),
                    ),  // end visible
                    
                    'mouse' => array(
                        'type'          => 'select',
                        'label'         => __('Pause on Mouse Over', 'fl-builder'),
                        'default'       => '1',
                        'options'       => array(
                            '1'         => __('Yes', 'fl-builder'),
                            '0'         =>  __('No', 'fl-builder'),
                        ),
                    ), // end mouse
                    
                    'height_select' => array(
                        'type'          => 'select',
                        'label'         => __('Height', 'fl-builder'),
                        'default'       => 'auto',
                        'options'       => array(
                            'auto'      => __('Auto', 'fl-builder'),
                            'fixed'     =>  __('Fixed', 'fl-builder'),
                        ),
                        'toggle'        => array(
                            'fixed'       => array(
                                'fields'  => array('height'),
                            ),
                        ), // end toggle
                    ), // end height_select
                    
                    'height' => array(
                        'type'          => 'text',
                        'label'         => __( 'Fixed Height', 'fl_builder' ),
                        'default'       => '200',
                        'size'          => '5',
                        'maxlength'     => '4',
                        'description'   => 'px',
                    ),  // end visible
                    
                ) // end fields
                  
            ) // end content_select
            
        ) // end sections
        
    ), // end design-tab
    
    'style-tab'      => array(
        
        'title'         => __( 'Style', 'fl-builder' ),
        'sections'      => array( 
            
              'title'  => array(
                'title'         => __( 'Title', 'fl-builder' ),
                'fields'        => array(
                    
                    'title_size' => array(
						'type'          => 'text',
						'label'         => __('Title Font Size', 'fl-builder'),
						'default'       => '14',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					), // end title_size
                    
                    'title_line' => array(
						'type'          => 'text',
						'label'         => __('Title Line Height', 'fl-builder'),
						'default'       => '140',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => '%'
					), // end title_size
                    
                    'title_color'    => array(
						'type'          => 'color',
						'label'         => __('Title Font Color', 'fl-builder'),
						'default'       => '222222',
						'show_reset'    => true
					), // end title_color
                    
                ),
                  
            ), // end title
            
              'excerpt'  => array(
                'title'         => __( 'Excerpt', 'fl-builder' ),
                'fields'        => array(
                    
                    'excerpt_size' => array(
						'type'          => 'text',
						'label'         => __('Excerpt Font Size', 'fl-builder'),
						'default'       => '12',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					), // end excerpt_size
                    
                    'excerpt_color'    => array(
						'type'          => 'color',
						'label'         => __('Excerpt Font Color', 'fl-builder'),
						'default'       => 'cccccc',
						'show_reset'    => true
					), // end excerpt_color
                    
                ),
                  
            ), // end excerpt
            
              'image'  => array(
                'title'         => __( 'Thumbnail', 'fl-builder' ),
                'fields'        => array(
                    
                    'image_size' => array(
						'type'          => 'text',
						'label'         => __('Thumbnail Size', 'fl-builder'),
						'default'       => '80',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					), // end image_size
                    
                ),
                  
            ), // end image
            
              'general'  => array(
                'title'         => __( 'General', 'fl-builder' ),
                'fields'        => array(
                    
                    'post_padding_top' => array(
						'type'          => 'text',
						'label'         => __('Post Padding Top/Bottom', 'fl-builder'),
						'default'       => '30',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					), // end post_padding_top
                    
                    'post_padding_sides' => array(
						'type'          => 'text',
						'label'         => __('Post Padding Sides', 'fl-builder'),
						'default'       => '10',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					), // end post_padding_sides
                    
                    'post_column_gutter' => array(
						'type'          => 'text',
						'label'         => __('Image and Post Margin', 'fl-builder'),
						'default'       => '20',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					), // end post_column_gutter
                    
                    'bottom_border_size' => array(
						'type'          => 'text',
						'label'         => __('Bottom Border Size', 'fl-builder'),
						'default'       => '1',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					), // end bottom_border_size
                    
                    'bottom_border_color'    => array(
						'type'          => 'color',
						'label'         => __('Bottom Border Color', 'fl-builder'),
						'default'       => 'cccccc',
						'show_reset'    => true
					), // end bottom_border_color
                    
                    'bottom_border_select' => array(
                        'type'          => 'select',
                        'label'         => __('Border Type', 'fl-builder'),
                        'default'       => 'dashed',
                        'options'       => array(
                            'dashed'    => __('Dashed', 'fl-builder'),
                            'solid'     =>  __('Solid', 'fl-builder'),
                            'dotted'    =>  __('Dotted', 'fl-builder'),
                        ),
                    ), // end bottom_border_select
                    
                ),
                  
            ), // end image
            
        ) // end sections
        
    ), // end content-tab
    
) ); 