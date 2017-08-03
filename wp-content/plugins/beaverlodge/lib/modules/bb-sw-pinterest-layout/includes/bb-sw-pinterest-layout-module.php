<?php

class SWPinterestLayoutClass extends FLBuilderModule {

    public function __construct()
    {

        parent::__construct(array(
            'name'              => __( 'Pinterest Blog Layout', 'fl-builder' ),
            'description'       => __( 'Add a pinterest style layout', 'fl-builder' ),
            'category'          => BRANDING,
            'partial_refresh'   => true,
            'dir'               => SW_PINTEREST_LAYOUT_MODULE_DIR . '/',
            'url'               => SW_PINTEREST_LAYOUT_MODULE_URL . '/',
        ));
      
        $this->add_js('jquery.quicksand.js', $this->url . 'js/jquery.quicksand.js', array(), '', true);
        
    }    
    
}

FLBuilder::register_module( 'SWPinterestLayoutClass', array(
    
    'content-tab'      => array(
        
        'title'         => __( 'Content', 'fl-builder' ),
        'sections'      => array( 
            
              'content_select'  => array(
                'title'         => __( 'Content', 'fl-builder' ),
                'fields'        => array(
                    
                    'post_selection' => array(
                        'type'          => 'select',
                        'label'         => __( 'Select Post Type', 'fl-builder' ),
                        'default'       => 'option-1',
                        'options'       => sw_get_posts(),
						'toggle'        => array(
							'post'          => array(
								'fields'        => array('post_cat')
							),
						)
                    ),
                    
                    'post_cat' => array(
                        'type'          => 'suggest',
                        'label'         => __('Choose Category', 'fl-builder'),
                        'action'    	=> 'fl_as_terms',
                        'data'      	=> 'category',
                    ),
                    
                    'order_by' => array(
                        'type'          => 'select',
                        'label'         => __( 'Order By', 'fl-builder' ),
                        'default'       => 'date',
                        'options'       => array(
                            'date'       => __( 'Date', 'fl-builder' ),
                            'title'    => __( 'Title', 'fl-builder' ),
                            'name'    => __( 'Name', 'fl-builder' ),
                            'rand'    => __( 'Random', 'fl-builder' ),
                            'comment_count'    => __( 'Comment Count', 'fl-builder' ),
                            'ID'    => __( 'Post ID', 'fl-builder' ),
                            'none'    => __( 'None', 'fl-builder' ),
                        ),
                    ),
                    
                    'post_order' => array(
                        'type'          => 'select',
                        'label'         => __( 'Post Order', 'fl-builder' ),
                        'default'       => 'DESC',
                        'options'       => array(                            
                            'DESC'    => __( 'Descending', 'fl-builder' ),
                            'ASC'       => __( 'Ascending', 'fl-builder' ),
                        ),
                    ),
                    
                    'post_count' => array(
                        'type'          => 'select',
                        'label'         => __( 'Post to Display', 'fl-builder' ),
                        'default'       => 'all',
                        'options'       => array(
                            'all'       => __( 'All', 'fl-builder' ),
                            'custom'    => __( 'Custom', 'fl-builder' ),
                        ),
                        'toggle'        => array(
							'all'        => array(
								'fields'  => array('')
							),
							'custom'      => array(
								'fields'  => array('post_qty'),
							),
						),
                    ),
                    
                    'post_qty' => array(
                        'type'          => 'text',
                        'label'         => __( 'Post Count', 'fl-builder' ),
                        'default'       => '20',
                        'size'          => '4',
                        'maxlength'     => '5',
                    ),
                    
//                    'filter_menu' => array(
//                        'type'          => 'select',
//                        'label'         => __( 'Display Filter Menu', 'fl-builder' ),
//                        'default'       => 'yes',
//                        'options'       => array(
//                            'yes'       => __( 'Yes', 'fl-builder' ),
//                            'no'        => __( 'No', 'fl-builder' ),
//                        ),
//                        'toggle'        => array(
//							'yes'        => array(
//								'sections'  => array('nav')
//							),
//							'no'      => array(
//								'sections'  => array(''),
//							),
//						),
//                    ),
                    
                    'read_more' => array(
                        'type'          => 'text',
                        'label'         => __( 'Read More Button', 'fl-builder' ),
                        'default'       => 'Read More',
                    ),
                    
                ) // end fields
                  
            ), // end content_select
            
              'breakpoints'  => array(
                'title'         => __( 'Layout', 'fl-builder' ),
                'fields'        => array(
                    
                    'columns' => array(
                        'type'          => 'text',
                        'label'         => __( 'Columns', 'fl-builder' ),
                        'default'       => '4',
                        'size'      => '4',
                        'maxlength' => '5',
                    ),
                    
                    'top_padding' => array(
                        'type'          => 'text',
                        'label'         => __( 'Row Padding', 'fl-builder' ),
                        'default'       => '10',
                        'size'      => '4',
                        'maxlength' => '5',
                    ),
                    
                    'side_padding' => array(
                        'type'          => 'text',
                        'label'         => __( 'Column Padding', 'fl-builder' ),
                        'default'       => '10',
                        'size'          => '4',
                        'maxlength'     => '5',
                    ),
                    
                ) // end fields
                  
            ) // end content_select
            
        ) // end sections
        
    ), // end content-tab
    
    'style-tab'      => array(
        
        'title'         => __( 'Styles', 'fl-builder' ),
        'sections'      => array( 
            
              'general'  => array(
                'title'         => __( 'General', 'fl-builder' ),
                'fields'        => array(                
                    
                    'item_bg_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Post Background Colour', 'fl-builder' ),
                        'default'       => 'ffffff',
                        'show_reset'    => true
                    ),              
                    
                    'item_shadow' => array(
                        'type'          => 'color',
                        'label'         => __( 'Post Shadow Colour', 'fl-builder' ),
                        'default'       => 'cccccc',
                        'show_reset'    => true
                    ),
                    
                    'hor_shadow' => array(
                        'type'          => 'text',
                        'label'         => __( 'Horizontal Shadow', 'fl-builder' ),
                        'default'       => '2',
                        'size'          => '4',
                        'maxlength'     => '5',
                        'description'   => 'px',
                    ),
                    
                    'ver_shadow' => array(
                        'type'          => 'text',
                        'label'         => __( 'Vertical Shadow', 'fl-builder' ),
                        'default'       => '2',
                        'size'          => '4',
                        'maxlength'     => '5',
                        'description'   => 'px',
                    ),
                    
                    'shadow_spread' => array(
                        'type'          => 'text',
                        'label'         => __( 'Shadow Spread', 'fl-builder' ),
                        'default'       => '5',
                        'size'          => '4',
                        'maxlength'     => '5',
                        'description'   => 'px',
                    ),
                    
                ) // end fields
                  
            ), // end general
            
              'title'  => array(
                'title'         => __( 'Titles', 'fl-builder' ),
                'fields'        => array(
//                    
//                    'title_font' => array(
//                        'type'          => 'font',
//                        'label'         => __( 'Title Font', 'fl-builder' ),
//                        'default'       => array(
//                            'family'        => 'Default',
//                            'weight'        => 'Default'
//                        )
//                    ),
                    
                    'title_class' => array(
                        'type'          => 'select',
                        'label'         => __( 'Title Class', 'fl_builder' ),
                        'default'       => '3',
                        'options'       => array(
                            '1'         => 'H1',
                            '2'         => 'H2',
                            '3'         => 'H3',
                            '4'         => 'H4',
                            '5'         => 'H5',
                            '6'         => 'H6',
                        ),              
                    ),
                    
//                    'title_font_size' => array(
//                        'type'          => 'select',
//                        'label'         => __( 'Title Font Size', 'fl-builder' ),
//                        'default'       => 'default',
//                        'options'      => array(
//                            'default'   => __( 'Default', 'fl-builder' ),
//                            'custom'    => __( 'Custom', 'fl-builder' ),
//                        ),
//                        'toggle'        => array(
//							'default'        => array(
//								'fields'  => array('')
//							),
//							'custom'      => array(
//								'fields'  => array('title_size'),
//							),
//						),
//                    ),                    
//                    
//                    'title_size' => array(
//                        'type'          => 'text',
//                        'label'         => __( 'Custom Font Size', 'fl-builder' ),
//                        'default'       => '24',
//                        'size'          => '4',
//                        'maxlength'     => '5',
//                        'description'   => 'px',
//                    ),    
                    
                    'title_align' => array(
                        'type'          => 'select',
                        'label'         => __( 'Title Align', 'fl-builder' ),
                        'default'       => 'center',
                        'options'      => array(
                            'center'   => __( 'Center', 'fl-builder' ),
                            'left'    => __( 'Left', 'fl-builder' ),
                            'right'    => __( 'Right', 'fl-builder' ),
                        ),
                    ),             
                    
                    'title_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Title Colour', 'fl-builder' ),
                        'default'       => '',
                        'show_reset'    => true,
                    ),                                 
                    
                    'title_color_hover' => array(
                        'type'          => 'color',
                        'label'         => __( 'Title Hover Colour', 'fl-builder' ),
                        'default'       => '',
                        'show_reset'    => true,
                    ),                                 
                    
                    'title_border_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Title Border Colour', 'fl-builder' ),
                        'default'       => '1d1d1d',
                        'show_reset'    => true,
                    ),
                    
                ) // end fields
                  
            ), // end title
            
              'excerpt'  => array(
                'title'         => __( 'Excerpt', 'fl-builder' ),
                'fields'        => array(
                    
//                    'excerpt_font' => array(
//                        'type'          => 'font',
//                        'label'         => __( 'Excerpt Font', 'fl-builder' ),
//                        'default'       => array(
//                            'family'        => 'Default',
//                            'weight'        => 'Default'
//                        )
//                    ),
                    
//                    'excerpt_font_size' => array(
//                        'type'          => 'select',
//                        'label'         => __( 'Excerpt Font Size', 'fl-builder' ),
//                        'default'       => 'default',
//                        'options'      => array(
//                            'default'   => __( 'Default', 'fl-builder' ),
//                            'custom'    => __( 'Custom', 'fl-builder' ),
//                        ),
//                        'toggle'        => array(
//							'default'        => array(
//								'fields'  => array('')
//							),
//							'custom'      => array(
//								'fields'  => array('excerpt_size'),
//							),
//						),
//                    ),                    
                    
//                    'excerpt_size' => array(
//                        'type'          => 'text',
//                        'label'         => __( 'Custom Font Size', 'fl-builder' ),
//                        'default'       => '24',
//                        'size'          => '4',
//                        'maxlength'     => '5',
//                        'description'   => 'px',
//                    ),  
                    
                    'excerpt_align' => array(
                        'type'          => 'select',
                        'label'         => __( 'Excerpt Align', 'fl-builder' ),
                        'default'       => 'left',
                        'options'      => array(
                            'left'    => __( 'Left', 'fl-builder' ),
                            'center'   => __( 'Center', 'fl-builder' ),
                            'right'    => __( 'Right', 'fl-builder' ),
                        ),
                    ),               
                    
                    'excerpt_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Excerpt Colour', 'fl-builder' ),
                        'default'       => '',
                        'show_reset'    => true
                    ),
                    
                ) // end fields
                  
            ), // end excerpt
            
              'button'  => array(
                'title'         => __( 'Read More', 'fl-builder' ),
                'fields'        => array(
                    
//                    'more_font' => array(
//                        'type'          => 'font',
//                        'label'         => __( 'Read More Font', 'fl-builder' ),
//                        'default'       => array(
//                            'family'        => 'Default',
//                            'weight'        => 'Default'
//                        )
//                    ),
//                    
//                    'more_font_size' => array(
//                        'type'          => 'select',
//                        'label'         => __( 'Read More Font Size', 'fl-builder' ),
//                        'default'       => 'default',
//                        'options'      => array(
//                            'default'   => __( 'Default', 'fl-builder' ),
//                            'custom'    => __( 'Custom', 'fl-builder' ),
//                        ),
//                        'toggle'        => array(
//							'default'        => array(
//								'fields'  => array('')
//							),
//							'custom'      => array(
//								'fields'  => array('more_size'),
//							),
//						),
//                    ),                    
//                    
//                    'more_size' => array(
//                        'type'          => 'text',
//                        'label'         => __( 'Custom Font Size', 'fl-builder' ),
//                        'default'       => '24',
//                        'size'          => '4',
//                        'maxlength'     => '5',
//                        'description'   => 'px',
//                    ), 
                    
                    'more_align' => array(
                        'type'          => 'select',
                        'label'         => __( 'Read More Align', 'fl-builder' ),
                        'default'       => 'right',
                        'options'      => array(
                            'right'    => __( 'Right', 'fl-builder' ),
                            'left'    => __( 'Left', 'fl-builder' ),
                            'center'   => __( 'Center', 'fl-builder' ),
                        ),
                    ),               
                    
                    'more_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Read More Colour', 'fl-builder' ),
                        'default'       => 'f5f5f5',
                        'show_reset'    => true
                    ),           
                    
                    'more_bg_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Read More Background', 'fl-builder' ),
                        'default'       => 'cccccc',
                        'show_reset'    => true
                    ),                 
                    
                    'more_border' => array(
                        'type'          => 'text',
                        'label'         => __( 'Read More Corners', 'fl-builder' ),
                        'default'       => '2',
                        'size'          => '4',
                        'maxlength'     => '5',
                        'description'   => 'px',
                    ),                   
                    
                    'more_padding_top' => array(
                        'type'          => 'text',
                        'label'         => __( 'Read More Padding Top/Bottom', 'fl-builder' ),
                        'default'       => '10',
                        'size'          => '4',
                        'maxlength'     => '5',
                        'description'   => 'px',
                    ),                  
                    
                    'more_padding_side' => array(
                        'type'          => 'text',
                        'label'         => __( 'Read More Padding Sides', 'fl-builder' ),
                        'default'       => '20',
                        'size'          => '4',
                        'maxlength'     => '5',
                        'description'   => 'px',
                    ),                   
                    
//                    'more_margin_top' => array(
//                        'type'          => 'text',
//                        'label'         => __( 'Read More Margin Top/Bottom', 'fl-builder' ),
//                        'default'       => '10',
//                        'size'          => '4',
//                        'maxlength'     => '5',
//                        'description'   => 'px',
//                    ),                  
//                    
//                    'more_margin_side' => array(
//                        'type'          => 'text',
//                        'label'         => __( 'Read More Margin Sides', 'fl-builder' ),
//                        'default'       => '10',
//                        'size'          => '4',
//                        'maxlength'     => '5',
//                        'description'   => 'px',
//                    ),  
                    
                ) // end fields
                  
            ), // end button
            
//              'nav'  => array(
//                'title'         => __( 'Navigation', 'fl-builder' ),
//                'fields'        => array(
//                    
//                    'nav_align' => array(
//                        'type'          => 'select',
//                        'label'         => __( 'Navigation Align', 'fl-builder' ),
//                        'default'       => 'center',
//                        'options'      => array(
//                            'center'   => __( 'Center', 'fl-builder' ),
//                            'flex-start'    => __( 'Left', 'fl-builder' ),
//                            'flex-end'    => __( 'Right', 'fl-builder' ),
//                        ),
//                    ),  
//                    
//                    'nav_font' => array(
//                        'type'          => 'font',
//                        'label'         => __( 'Navigation Font', 'fl-builder' ),
//                        'default'       => array(
//                            'family'        => 'Default',
//                            'weight'        => 'Default'
//                        )
//                    ),
//                    
//                    'nav_font_size' => array(
//                        'type'          => 'select',
//                        'label'         => __( 'Navigation Font Size', 'fl-builder' ),
//                        'default'       => 'default',
//                        'options'      => array(
//                            'default'   => __( 'Default', 'fl-builder' ),
//                            'custom'    => __( 'Custom', 'fl-builder' ),
//                        ),
//                        'toggle'        => array(
//							'default'        => array(
//								'fields'  => array('')
//							),
//							'custom'      => array(
//								'fields'  => array('nav_size'),
//							),
//						),
//                    ),                    
//                    
//                    'nav_size' => array(
//                        'type'          => 'text',
//                        'label'         => __( 'Navigation Font Size', 'fl-builder' ),
//                        'default'       => '24',
//                        'size'          => '4',
//                        'maxlength'     => '5',
//                        'description'   => 'px',
//                    ),                
//                    
//                    'nav_color' => array(
//                        'type'          => 'color',
//                        'label'         => __( 'Navigation Colour', 'fl-builder' ),
//                        'default'       => 'f5f5f5',
//                        'show_reset'    => true
//                    ),           
//                    
//                    'nav_bg_color' => array(
//                        'type'          => 'color',
//                        'label'         => __( 'Navigation Background', 'fl-builder' ),
//                        'default'       => 'cccccc',
//                        'show_reset'    => true
//                    ),                 
//                    
//                    'nav_border' => array(
//                        'type'          => 'text',
//                        'label'         => __( 'Navigation Corners', 'fl-builder' ),
//                        'default'       => '2',
//                        'size'          => '4',
//                        'maxlength'     => '5',
//                        'description'   => 'px',
//                    ),                   
//                    
//                    'nav_padding_top' => array(
//                        'type'          => 'text',
//                        'label'         => __( 'Navigation Padding Top/Bottom', 'fl-builder' ),
//                        'default'       => '10',
//                        'size'          => '4',
//                        'maxlength'     => '5',
//                        'description'   => 'px',
//                    ),                  
//                    
//                    'nav_padding_side' => array(
//                        'type'          => 'text',
//                        'label'         => __( 'Navigation Padding Sides', 'fl-builder' ),
//                        'default'       => '20',
//                        'size'          => '4',
//                        'maxlength'     => '5',
//                        'description'   => 'px',
//                    ),                    
//                    
//                    'nav_margin' => array(
//                        'type'          => 'text',
//                        'label'         => __( 'Navigation Column Margin', 'fl-builder' ),
//                        'default'       => '10',
//                        'size'          => '4',
//                        'maxlength'     => '5',
//                        'description'   => 'px',
//                    ),             
//                    
//                    'nav_hover_color' => array(
//                        'type'          => 'color',
//                        'label'         => __( 'Navigation Hover Colour', 'fl-builder' ),
//                        'default'       => '222222',
//                        'show_reset'    => true
//                    ),           
//                    
//                    'nav_hover_bg_color' => array(
//                        'type'          => 'color',
//                        'label'         => __( 'Navigation Hover Background', 'fl-builder' ),
//                        'default'       => 'cccccc',
//                        'show_reset'    => true
//                    ),            
//                    
//                    'nav_active_color' => array(
//                        'type'          => 'color',
//                        'label'         => __( 'Navigation Active Colour', 'fl-builder' ),
//                        'default'       => '222222',
//                        'show_reset'    => true
//                    ),           
//                    
//                    'nav_active_bg_color' => array(
//                        'type'          => 'color',
//                        'label'         => __( 'Navigation Active Background', 'fl-builder' ),
//                        'default'       => 'cccccc',
//                        'show_reset'    => true
//                    ), 
//                    
//                ) // end fields
//                  
//            ), // end nav
            
        ) // end sections
        
    ), // end style-tab
    
) ); 

function sw_get_posts(){
 
    $data = '';
    
    $args = array(
       'public'   => true,
    );

    $posts = get_post_types( $args );
    
    $posts = array_diff($posts, array("attachment", "fl-builder-template", "page"));
    
    foreach ($posts as $post) {
        
        $obj = get_post_type_object($post);
        $label = $obj->labels->singular_name;
        $data[$post] = $label;

    }
    
    return $data;
    
}
