<?php


class SWWooFeaturedClass extends FLBuilderModule {

    public function __construct()
    {

        parent::__construct(array(
            'name'          => __( 'WooCommerce Featured', 'fl-builder' ),
            'description'   => __( 'Add woo featured items', 'fl-builder' ),
            'category'      => BRANDING,
            'dir'           => SW_WOOFEATURED_MODULE_DIR . '/',
            'url'           => SW_WOOFEATURED_MODULE_URL . '/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
        
    }    
    
}

FLBuilder::register_module( 'SWWooFeaturedClass', array(
    
    'content-tab'      => array(
        
        'title'         => __( 'Content', 'fl-builder' ),
        'sections'      => array( 
            
              'content_select'  => array(
                'title'         => __( 'WooCommerce Featured Items', 'fl-builder' ),
                'fields'        => array(
                    
                    'quantity'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Quantity of Products', 'fl-builder' ),
                        'default'  => '12',
                        'size'      => '4',
                        'maxlength' => '5',
                    ),  // end quantity
                    
                    'columns'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Columns', 'fl-builder' ),
                        'default'  => '4',
                        'size'      => '4',
                        'maxlength' => '5',
                    ),  // end columns
                ) // end fields
                  
            ) // end content_select
            
        ) // end sections
        
    ), // end content-tab  
    
    'style-tab'      => array(
        
        'title'         => __( 'Styles', 'fl-builder' ),
        'sections'      => array( 
            
              'content_select'  => array(
                'title'         => __( 'WooCommerce Featured Items', 'fl-builder' ),
                'fields'        => array(
                    
                    'title'     => array(
                        'type'      => 'color',
                        'label'     => __( 'Title Colour', 'fl-builder' ),
                        'default'  => '222222',
                    ),  // end title
                    
                    'title_font' => array(
                        'type'          => 'font',
                        'label'         => __( 'Title Font', 'fl-builder' ),
                        'default'       => array(
                            'family'        => 'Helvetica',
                            'weight'        => 300
                        )
                    ), // end title_font
                    
                    'title_size'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Title Font Size', 'fl_builder' ),
                        'default'   => '14',
                        'size'      => '4',
                        'maxlength' => '5',
                        'description'   => 'px',
                    ),  // end title_size
                    
                    'stars'     => array(
                        'type'      => 'color',
                        'label'     => __( 'Star Rating Colours', 'fl-builder' ),
                        'default'  => '428bca',
                    ),  // end stars
                    
                    'star_size'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Star Size', 'fl_builder' ),
                        'default'   => '14',
                        'size'      => '4',
                        'maxlength' => '5',
                        'description'   => 'px',
                    ),  // end star_size                 
                    
                    'price_color'     => array(
                        'type'      => 'color',
                        'label'     => __( 'Price Colour', 'fl-builder' ),
                        'default'  => '428bca',
                    ),  // end price_color
                    
                    'price_size'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Price Font Size', 'fl_builder' ),
                        'default'   => '14',
                        'size'      => '4',
                        'maxlength' => '5',
                        'description'   => 'px',
                    ),  // end price_size
                    
                    'price_font' => array(
                        'type'          => 'font',
                        'label'         => __( 'Price Font', 'fl-builder' ),
                        'default'       => array(
                            'family'        => 'Helvetica',
                            'weight'        => 300
                        )
                    ), // end price_font                 
                    
                    'sale_font_color'     => array(
                        'type'      => 'color',
                        'label'     => __( 'Sale Colour', 'fl-builder' ),
                        'default'  => 'ffffff',
                    ),  // end sale_font_color                
                    
                    'sale_bg_color'     => array(
                        'type'      => 'color',
                        'label'     => __( 'Sale Background Colour', 'fl-builder' ),
                        'default'  => '428bca',
                    ),  // end sale_font_color
                    
                    'sale_size'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Sale Font Size', 'fl_builder' ),
                        'default'   => '14',
                        'size'      => '4',
                        'maxlength' => '5',
                        'description'   => 'px',
                    ),  // end price_size
                    
                    'sale_font' => array(
                        'type'          => 'font',
                        'label'         => __( 'Sale Font', 'fl-builder' ),
                        'default'       => array(
                            'family'        => 'Helvetica',
                            'weight'        => 300
                        )
                    ), // end price_font
                    
                ) // end fields
                  
            ) // end content_select
            
        ) // end sections
        
    ), // end content-tab 

) ); 