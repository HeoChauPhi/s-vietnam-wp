<?php

class SWMasonryClass extends FLBuilderModule {

    public function __construct()
    {

        parent::__construct(array(
            'name'          => __( 'Masonry Gallery', 'fl-builder' ),
            'description'   => __( 'Add gorgeous masonry gallery layout to your site!', 'fl-builder' ),
            'category'      => BRANDING,
            'dir'           => SW_MASONRY_MODULE_DIR . '/',
            'url'           => SW_MASONRY_URL . '/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
        
        $this->add_js('unitegallery.min.js', $this->url . 'plugins/unitegallery/unitegallery.min.js', array(), '', true);
        $this->add_js('ug-theme-tiles.js', $this->url . 'plugins/unitegallery/ug-theme-tiles.js', array(), '', true);
        $this->add_js('jquery.swipebox.min.js', $this->url . 'plugins/swipebox/jquery.swipebox.min.js', array(), '', true);
        $this->add_js('slick.min.js', $this->url . 'js/slick.min.js', array(), '', true);
       
        $this->add_css( 'unite-gallery.css', $this->url . 'plugins/unitegallery/unite-gallery.css');
        $this->add_css( 'swipebox.min.css', $this->url . 'plugins/swipebox/swipebox.min.css');
        $this->add_css( 'slick.css', $this->url . 'css/slick.css');
    
    }    
    
}

FLBuilder::register_module( 'SWMasonryClass', array(
    'content-tab'      => array(
        'title'         => __( 'Content', 'fl-builder' ),
        'sections'      => array(
            'content_select'  => array(
                'title'         => __( 'Gallery', 'fl-builder' ),
                'fields'        => array(
                    
                    'post'     => array(
                        'type'      => 'suggest',
                        'label'     => __( 'Choose Gallery', 'fl_builder' ),
                        'action'    => 'fl_as_posts',
                        'data'      => 'sw-gallery',
                    ),   
                    
                    'layout'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Choose Layout', 'fl_builder' ),
                        'default'    => '',
                        'options'      => array(
                            '' => 'Choose',
                            'masonry' => 'Masonry',
                            'horizontal' => 'Horizontal Scroll'
                        ),
                        'toggle'        => array(
                            'masonry'       => array(
                                'tabs'  => array('masonry_style_tab'),
                            ),
                            'horizontal'       => array(
                                'tabs'  => array('horizontal_style_tab'),
                            ),
                        ), // end toggle
                         
                    ), 
                    
                    'shuffle'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Shuffle Images', 'fl_builder' ),
                        'default'   => 'yes',
                        'options'   => array (
                            'yes'   => 'Yes',
                            'no'    => 'No',
                        ),
                    ), 
                )
            )
        )
    ),
    
    'masonry_style_tab'      => array(
        'title'         => __( 'Masonry Style', 'fl-builder' ),
        'sections'      => array(
            
            'layout_options'  => array(
                'title'         => __( 'Layout', 'fl-builder' ),
                'fields'        => array(
                    
                     'format'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Grid Format', 'fl_builder' ),
                        'default'   => 'columns',
                        'options'   => array (
                            'justified'  => 'Justified Masonry',
                            'columns'  => 'Masonry',
                            'grid' => 'Grid',
                        ),
                    ), 
                    
                    'captions'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Display Captions', 'fl_builder' ),
                        'default'   => 'true',
                        'options'   => array (
                            'true'  => 'True',
                            'false' => 'False',
                        ),
                    ), 
                    
                    'padding'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Image Padding', 'fl_builder' ),
                        'default'       => '5',
                        'maxlength'     => '3',
                        'size'          => '3',
                        'placholder'    => '5',
                        'description'   => 'px',
                    ),      
                    
                     'icons'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Enable Icons', 'fl_builder' ),
                        'default'   => 'true',
                        'options'   => array (
                            'true'  => 'True',
                            'false' => 'False',
                        ),
                    ),  
                    
                     'lightbox'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Enable Lightbox', 'fl_builder' ),
                        'default'   => 'true',
                        'options'   => array (
                            'true'  => 'True',
                            'false' => 'False',
                        ),
                    ),  
                    
                    'links'    => array(
                        'type'          => 'select',
                        'label'         => __( 'Use Links', 'fl-builder' ),
                        'default'       => 'true',
                        'options'       => array (
                            'true'       => 'True',
                            'false'      => 'False',
                        ),
                    ), // end links
                    
                    'rowHeight'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Row Height', 'fl_builder' ),
                        'default'       => '150',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'placholder'    => '150',
                        'description'   => 'px',
                    ), 
                    

                    )
                ),
                
                
            'border_options'  => array(
                'title'         => __( 'Border', 'fl-builder' ),
                'fields'        => array(
                    
                    
                    'img_border'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Images Border', 'fl_builder' ),
                        'default'   => 'false',
                        'options'   => array (
                            'true'   => 'True',
                            'false'    => 'False',
                        ),
                    ),
                    
                    'border_color'      => array(
							'type'          => 'color',
							'label'         => __('Border Color', 'fl-builder'),
							'show_reset'    => true,
                            'default'       => 'f0f0f0',
						),
                    
                    'border_width'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Border Height', 'fl_builder' ),
                        'default'       => '2',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'placholder'    => '2',
                        'description'   => 'px',
                    ), 
                    
                    'border_radius'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Border Radius', 'fl_builder' ),
                        'default'       => '0',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'placholder'    => '0',
                        'description'   => 'px',
                    ), 
                    
                    'border_outline'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Border Outline', 'fl_builder' ),
                        'default'   => 'false',
                        'options'   => array (
                            'true'   => 'True',
                            'false'    => 'False',
                        ),
                    ),
                        
                    'outline_color'      => array(
							'type'          => 'color',
							'label'         => __('Outline Color', 'fl-builder'),
							'show_reset'    => true,
                            'default'       => '8B8B8B',
						),
                    
                    ), 
                    
                ),
            
            'overlay_options'  => array(
                'title'         => __( 'Overlay', 'fl-builder' ),
                'fields'        => array(
                    
                    
                    'overlay_color'      => array(
							'type'          => 'color',
							'label'         => __('Overlay Color', 'fl-builder'),
							'show_reset'    => true,
                            'default'       => '000000',
						),
                    
                    'overlay_opacity'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Overlay Opacity', 'fl_builder' ),
                        'default'       => '0.4',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'placholder'    => '0.4',
                    ), 
                    
                    'image_effects'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Enable Image Effects', 'fl_builder' ),
                        'default'   => 'false',
                        'options'   => array (
                            'true'   => 'True',
                            'false'    => 'False',
                        ),
                    ),
                    
                    'effect_result'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Choose Effect', 'fl_builder' ),
                        'default'   => 'blur',
                        'options'   => array (
                            'blur'   => 'Blur',
                            'bw'   => 'Black & White',
                            'sepia'    => 'Sepia',
                        ),
                    ),
                    
                    'reverse_effects'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Reverse Effects', 'fl_builder' ),
                        'default'   => 'true',
                        'options'   => array (
                            'true'   => 'True',
                            'false'    => 'False',
                        ),
                    ),
                    
                    
                    ), 
                    
                ),
            
            
            'text_panel'  => array(
                'title'         => __( 'Text Panel', 'fl-builder' ),
                'fields'        => array(
                    
                    
                    'text_bg_color'      => array(
							'type'          => 'color',
							'label'         => __('Overlay Color', 'fl-builder'),
							'show_reset'    => true,
                            'default'       => '000000',
						),
                    
                    'text_bg_opacity'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Background Opacity', 'fl_builder' ),
                        'default'       => '0.4',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'placholder'    => '0.4',
                    ), 
                    
                    'text_bg_padding_top'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Top Padding', 'fl_builder' ),
                        'default'   => '8',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'placholder'    => '8',
                    ),
                    
                    'text_bg_padding_right'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Right Padding', 'fl_builder' ),
                        'default'   => '8',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'placholder'    => '8',
                    ),
                    
                    'text_bg_padding_bottom'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Bottom Padding', 'fl_builder' ),
                        'default'   => '8',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'placholder'    => '8',
                    ),
                    
                    'text_bg_padding_left'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Left Padding', 'fl_builder' ),
                        'default'   => '8',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'placholder'    => '8',
                    ),
                    
                    
                    ), 
                    
                ),
            
            
            
            
        ),
    ),
    
    'horizontal_style_tab'      => array(
        'title'         => __( 'Horizontal Style', 'fl-builder' ),
        'sections'      => array(
            
            'layout_options'  => array(
                'title'         => __( 'Styling', 'fl-builder' ),
                'fields'        => array(
                    
                     'height'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Gallery Height', 'fl_builder' ),
                        'default'   => '500',
                        'maxlength'     => '4',
                        'size'          => '5',
                        'placeholder'    => '500',
                        'description'   => 'px',
                        
                    ),  
                    
                     'mob_height'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Mobile Gallery Height', 'fl_builder' ),
                        'default'   => '250',
                        'maxlength'     => '4',
                        'size'          => '5',
                        'placeholder'    => '250',
                        'description'   => 'px',
                        
                    ),  
                    
                    'loop'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Loop Gallery', 'fl_builder' ),
                        'default'   => 'true',
                        'options'   => array (
                            'true'  => 'True',
                            'false' => 'False',
                        ),
                    ),      
                    
                    'autoplay'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Auto Play', 'fl_builder' ),
                        'default'   => 'true',
                        'options'   => array (
                            'true'  => 'True',
                            'false' => 'False',
                        ),
                        'toggle'        => array(
							'true'        => array(
								'fields'        => array('autoplay_speed', 'pause')
							)
						)
                    ),  
                    
                     'autoplay_speed'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Autoplay Speed', 'fl_builder' ),
                        'default'       => '2000',
                        'maxlength'     => '4',
                        'size'          => '5',
                        'placholder'    => '2000',
                         'description'   => 'ms',
                    ), 
                    
                    'pause'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Pause on Hover', 'fl_builder' ),
                        'default'   => 'true',
                        'options'   => array (
                            'true'   => 'True',
                            'false'    => 'False',
                        ),
                    ), 
                    
                    'arrows'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Show Arrows', 'fl_builder' ),
                        'default'   => 'true',
                        'options'   => array (
                            'true'   => 'True',
                            'false'    => 'False',
                        ),
                        'toggle'        => array(
							'true'        => array(
								'fields'        => array('autoplay_speed', 'pause', 'left_arrow_icon', 'right_arrow_icon', 'arrow_color', 'arrow_size')
							)
						)
                    ), 
                    
                     'left_arrow_icon'     => array(
                        'type'      => 'icon',
                        'label'     => __( 'Left Arrow', 'fl_builder' ),
                        'default'   => 'fa fa-chevron-left',
                    ), 
                    
                     'right_arrow_icon'     => array(
                        'type'      => 'icon',
                        'label'     => __( 'Right Arrow', 'fl_builder' ),
                        'default'   => 'fa fa-chevron-right',
                    ), 
                    
                    'arrow_color'      => array(
							'type'          => 'color',
							'label'         => __('Arrow Color', 'fl-builder'),
							'show_reset'    => true,
                            'default'       => '333333',
						),
                    
                    
                     'arrow_size'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Arrow Font Size', 'fl_builder' ),
                        'default'       => '40',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'placholder'    => '40',
                         'description'   => 'px',
                    ), 
                    
                     'horiz_lightbox'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Enable Lightbox', 'fl_builder' ),
                        'default'   => 'false',
                        'options'   => array (
                            'true'  => 'True',
                            'false' => 'False',
                        ),
                    ), 
                    
                     'scrollbar'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Enable Scrollbar', 'fl_builder' ),
                        'default'   => 'false',
                        'options'   => array (
                            'true'  => 'True',
                            'false' => 'False',
                        ),
                         'toggle'        => array(
							'true'        => array(
								'fields'        => array('scrollcolor')
							),
//							'false'        => array(
//								'fields'        => array('nav_dots')
//							),
						)
                    ), 
                    
                    'scrollcolor'      => array(
							'type'          => 'color',
							'label'         => __('Scroll Bar Color', 'fl-builder'),
							'show_reset'    => true,
                            'default'       => '333333',
						),
//                        
//                     'nav_dots'     => array(
//                        'type'      => 'select',
//                        'label'     => __( 'Show Navigation Dots', 'fl_builder' ),
//                        'default'   => 'false',
//                        'options'   => array (
//                            'true'  => 'True',
//                            'false' => 'False',
//                        ),
//                    ),                     
                    
                    'lightbox_opacity'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Lightbox Opacity', 'fl_builder' ),
                        'default'       => '0.2',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'placholder'    => '0.2',
                    ), 

                        

                    )
                ),
            
            
            
            
        ),
    )
) );    