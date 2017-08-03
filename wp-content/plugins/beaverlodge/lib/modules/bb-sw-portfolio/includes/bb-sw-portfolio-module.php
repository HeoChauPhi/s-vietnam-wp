<?php


class SWPortfolioClass extends FLBuilderModule {

    public function __construct()
    {

        parent::__construct(array(
            'name'          => __( 'Portfolio', 'fl-builder' ),
            'description'   => __( 'Portfolio Module', 'fl-builder' ),
            'category'      => BRANDING,
            'dir'           => SW_PORTFOLIO_MODULE_DIR . '/',
            'url'           => SW_PORTFOLIO_URL . '/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));

            $this->add_js('jquery.quicksand.js', $this->url . 'js/jquery.quicksand.js', array(), '', true);      
            $this->add_js('jquery.swipebox.min.js', $this->url . 'js/jquery.swipebox.min.js', array(), '', true); 
            $this->add_css( 'swipebox.min.css', $this->url . 'css/swipebox.min.css');
    }    
    
}

FLBuilder::register_module( 'SWPortfolioClass', array(
    
    'style_tab'      => array(
        
        'title'         => __( 'Style', 'fl-builder' ),
        'sections'      => array( 
            
              'style_nav'  => array(
                'title'         => __( 'Navigation', 'fl-builder' ),
                'fields'        => array(
                    
                    'align'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Navigation Align', 'fl-builder' ),
                        'default'   => 'center',
                        'options'   => array(
                            'flex-start'    => 'Left',
                            'center'    => 'Center',
                            'flex-end'    => 'Right',
                        ),
                    ),  // end align
                    
                    'font' => array(
                        'type'          => 'font',
                        'label'         => __( 'Font', 'fl-builder' ),
                        'default'       => array(
                            'family'        => 'Helvetica',
                            'weight'        => 300
                        ),
                    ),
                    
                    'font_size' => array(
                        'type'          => 'text',
                        'label'         => __('Font Size', 'fl-builder'),
                        'description'   => 'px',
                        'default'       => '14',
                        'maxlength'     => '2',
                        'size'          => '3',
                        'preview'       => array(
                            'type'          => 'css',
                            'selector'      => '.portfolio-navbar a',
                            'property'      => 'font-size',
                            'unit'          => 'px'
                        )
                    ),

                    'font_color'     => array(
                        'type'      => 'color',
                        'label'     => __( 'Font Colour', 'fl-builder' ),
                        'default'   => 'ffffff',
                        'show_reset'    => true
                    ),  // end font_color
                    
                    
                    'font_hover_color'     => array(
                        'type'      => 'color',
                        'label'     => __( 'Font Hover Colour', 'fl-builder' ),
                        'default'   => 'ffffff',
                        'show_reset'    => true
                    ),  // end font_hover_color
                    
                    'bg_color'     => array(
                        'type'      => 'color',
                        'label'     => __( 'Background Colour', 'fl-builder' ),
                        'default'   => '00BFFF',
                        'show_reset'    => true
                    ),  // end bg_color                    
                    
                    'bg_hover_color'     => array(
                        'type'      => 'color',
                        'label'     => __( 'Background Hover Colour', 'fl-builder' ),
                        'default'   => '0093FF',
                        'show_reset'    => true
                    ),  // end bg_hover_color
                    
                ) // end fields
                  
            ), // end style_nav
            
              'style_gallery'  => array(
                'title'         => __( 'Gallery', 'fl-builder' ),
                'fields'        => array(
                    
                    'thumbnail'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Thumbnail Size', 'fl-builder' ),
                        'default'   => 'thumbnail',
                        'options'   => array(
                            'thumbnail'    => 'Thumbnail',
                            'medium'    => 'Medium',
                            'large'    => 'Large',
                            'full'    => 'Full Size',
                            'custom'    => 'Custom',
                        ),
                        'toggle'        => array(
                            'custom'       => array(
                                'fields'  => array('custom_width', 'custom_height'),
                            ),
                        ), // end toggle
                    ),  // end thumbnail
                    
                    'custom_width' => array(
                        'type'          => 'text',
                        'label'         => __('Thumbnail Width', 'fl-builder'),
                        'description'   => 'px',
                        'default'       => '150',
                        'maxlength'     => '4',
                        'size'          => '5',
                    ), // end custom_width
                    
                    'custom_height' => array(
                        'type'          => 'text',
                        'label'         => __('Thumbnail Height', 'fl-builder'),
                        'description'   => 'px',
                        'default'       => '95',
                        'maxlength'     => '4',
                        'size'          => '5',
                    ), // end custom_width                    
                    
                    'margin' => array(
                        'type'          => 'text',
                        'label'         => __('Margin', 'fl-builder'),
                        'description'   => 'px',
                        'default'       => '6',
                        'maxlength'     => '2',
                        'size'          => '3',
                    ), // end margin
                    
                    'lightbox'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Link Type', 'fl-builder' ),
                        'default'   => 'url',
                        'options'   => array(
                            'url'    => 'Post URL',
                            'lightbox'    => 'Lightbox',
                        ),
                    ),  // end link
                    
                ) // end fields
                  
            ) // end style_gallery
            
        ) // end sections
        
    ), // end style_tab
    
) ); 
    