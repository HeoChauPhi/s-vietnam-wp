<?php


class SWWooMenuClass extends FLBuilderModule {

    public function __construct()
    {
       
        parent::__construct(array(
            'name'          => __( 'eCommerce Menu', 'fl-builder' ),
            'description'   => __( 'A sliding ecommerce menu for the Beaver Builder plugin.', 'fl-builder' ),
            'category'      => BRANDING,
            'dir'           => WOO_CAT_MODULE_DIR . '/',
            'url'           => WOO_CAT_MODULE_URL . '/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));

         $this->add_js('jquery.catslider.js', $this->url . 'js/jquery.catslider.js', array(), '', true);      
         $this->add_js('modernizr.custom.js', $this->url . 'js/modernizr.custom.js', array(), '', true);
        
    }    
    
}

FLBuilder::register_module( 'SWWooMenuClass', array(
    
    'content-tab'      => array(
        
        'title'         => __( 'Content', 'fl-builder' ),
        'sections'      => array( 
            
              'main_menu_select'  => array(
                'title'         => __( 'Main Categories', 'fl-builder' ),
                'fields'        => array(
                    
                    'title'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Category', 'fl_builder' ),
                        'multiple'      => true
                    ),  // end title
                   
                    
                ) // end fields
                  
            ), // end main_menu_select
            
              'sub_menu_select'  => array(
                'title'         => __( 'Sub Categories', 'fl-builder' ),
                'fields'        => array(
                    
                    'sub_catergories'    => array(
                        'type'          => 'form',
                        'label'        => __('Sub Category', 'fl_builder'),
                        'form'          => 'woo_menu_content', 
                        'preview_text'  => 'label',
                        'multiple'      => true
                    )
                   
                    
                ) // end fields
                  
            ), // end sub_menu_select
            
        ) // end sections
        
    ), // end content-tab
    
) ); 

FLBuilder::register_settings_form('woo_menu_content', array(
	'title' => __('Menu Content', 'fl-builder'),
	'tabs'  => array(
		'general'        => array( // Tab
			'title'         => __('Content', 'fl-builder'), // Tab title
			'sections'      => array( // Tab Sections
				'general'       => array(
					'title'     => '',
					'fields'    => array(
						'label'         => array(
							'type'          => 'text',
							'label'         => __('Primary Menu', 'fl-builder'),
							'help'          => __('A label to identify which menu item it belongs to.', 'fl-builder')
						)
					)
				),
				'content'      => array(
					'title'         => __('Sub Category Info', 'fl-builder'),
					'fields'        => array(
                        
						'sub'          => array(
							'type'          => 'text',
                            'label'         => __('Sub Category', 'fl-builder')
						),
                        
                        'url'         => array(
							'type'          => 'text',
							'label'         => __('URL Link', 'fl-builder')
						),
                        
						'image'          => array(
							'type'          => 'photo',
							'label'         => __('Image', 'fl-builder')
						),
					)
				)
			)
		),
		

	)
));
    