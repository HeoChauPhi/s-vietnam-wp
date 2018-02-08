<?php


class SWGmapClass extends FLBuilderModule {

    public function __construct()
    {
       
        parent::__construct(array(
            'name'          => __( 'GMap', 'fl-builder' ),
            'description'   => __( 'A indepth Google Map module', 'fl-builder' ),
            'category'      => BRANDING,
            'dir'           => SW_GMAP_MODULE_DIR . '/',
            'url'           => SW_GMAP_URL . '/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));

         $this->add_js('gmap3.js', $this->url . 'js/gmap3.min.js', array(), '', true);      
         $this->add_js('jquery-ui.min.js', $this->url . 'js/jquery-ui.min.js', array(), '', true);      
         $this->add_css('jquery-ui.min.css', $this->url . 'css/jquery-ui.min.css' );      
         $this->add_js('googlemapsapi.js', '//maps.google.com/maps/api/js?sensor=false&amp;language=en&amp;libraries=places', array(), '', true); 
        
    }    
    
}

FLBuilder::register_module( 'SWGmapClass', array(
    
    'content-tab'      => array(
        
        'title'         => __( 'Content', 'fl-builder' ),
        'sections'      => array( 
            
              'content_select'  => array(
                'title'         => __( 'GMap', 'fl-builder' ),
                'fields'        => array(
                    
                    'center_address'     => array(
                        'type'      => 'geocomplete',
                        'label'     => __( 'Main Address', 'fl_builder' ),
                        'placeholder'  => '1 E 161st St, Bronx, NY 10451, United States',
                        'default'  => '1 E 161st St, Bronx, NY 10451, United States',
                    ),  // end address
                    
                    'center_description'     => array(
                        'type'      => 'textarea',
                        'label'     => __( 'Main Address Pop Up Description', 'fl_builder' ),
                        'placeholder'  => 'Welcome to Yankee Stadium',
                        'default'  => 'Welcome to Yankee Stadium',
                        'rows'      => '6',
                    ),  // end description
                    
                    'custom_center_option'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Use Custom Center Field', 'fl_builder' ),
                        'default'  => 'false',
                        'options'      => array(
                            'true'  => 'Yes',
                            'false' => 'No',
                        ),
                        'toggle'        => array(
                            'true'       => array(
                                'fields'  => array('custom_center'),
                            ),
                        ), // end toggle
                        'help' => __( 'Also use if center map is not working', 'fl-builder' ),
                    ),  // end custom_center_option                  
                    
                    
                    'custom_center'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Enter Lat,, Long Coordinates', 'fl_builder' ),
                        'placeholder'  => '40.829095, -73.926601',
                    ),  // end custom_center
                    
                    'custom_center_marker'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Use Custom Marker', 'fl_builder' ),
                        'default'  => 'false',
                        'options'      => array(
                            'true'  => 'Yes',
                            'false' => 'No',
                        ),
                        'toggle'        => array(
                            'true'       => array(
                                'fields'  => array('center_marker'),
                            ),
                        ), // end toggle
                    ),  // end custom_center_marker
                    
                    'center_marker'     => array(
                        'type'      => 'photo',
                        'label'     => __( 'Main Address Custom Icon', 'fl_builder' ),
                        'help'     => __( 'Sizing of icon needs to be no bigger than 32x32px', 'fl_builder' ),
                        'show_remove'   => true
                    ),  // end marker 
                    
                    'address_fields'    => array(
                        'type'          => 'form',
                        'label'        => __('Additional Addresses', 'fl_builder'),
                        'form'          => 'content_address_form', 
                        'preview_text'  => 'label',
                        'multiple'      => true
                    ),
                    
                    'height'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Map Height', 'fl_builder' ),
                        'default'   => '250',
                        'placeholder'  => '250',
                        'size'      => '4',
                        'maxlength' => '5',
                        'description' => 'px',
                    ),  // end height
                    
                    'zoom'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Map Zoom', 'fl_builder' ),
                        'default'   => '14',
                        'placeholder'  => '14',
                        'size'      => '4',
                        'maxlength' => '5',
                    ),  // end zoom
                    
                    'map_syle'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Map Style', 'fl_builder' ),
                        'default'   => 'false',
                        'options'   => array(
                            'default'  => 'Default',
                            'desaturate'  => 'Grayscale',
                            'bluewater'  => 'Blue Water',
                            'icyblue'  => 'Icy Blue',
                            'lakechelan'  => 'Lake Chelan',
                            'redhat'  => 'Red Hat Antwerp',
                            'routexl'  => 'RouteXL',
                            'custom' => 'Custom',
                        ),
                    ),  // end map_syle
                    
                    'scroll'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Enable Mouse Scroll', 'fl_builder' ),
                        'default'   => 'false',
                        'options'   => array(
                            'true'  => 'True',
                            'false' => 'False',
                        ),
                    ),  // end scroll
                    
                    'drag'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Enable Dragging Map', 'fl_builder' ),
                        'default'   => 'true',
                        'options'   => array(
                            'true'  => 'True',
                            'false' => 'False',
                        ),
                    ),  // end drag
                    
//                    'placecard'     => array(
//                        'type'      => 'select',
//                        'label'     => __( 'Display Placecard', 'fl_builder' ),
//                        'default'   => 'true',
//                        'options'   => array(
//                            'true'  => 'Yes',
//                            'false' => 'No',
//                        ),
//                        'toggle'        => array(
//                            'true'       => array(
//                                'fields'  => array('map_icon', 'draggable', 'set_width'),
//                            ),
//                        ), // end toggle
//                    ),  // end placecard
                    
                    'set_width'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Set Width', 'fl_builder' ),
                        'default'   => 'true',
                        'options'   => array(
                            'true'  => 'Full Width',
                            'false' => 'Custom Width',
                        ),
                        'toggle'        => array(
                            'false'       => array(
                                'fields'  => array('map_width'),
                            ),
                        ), // end toggle
                    ),  // end set_width
                    
                    'map_width'     => array(
                        'type'      => 'text',
                        'label'     => __( 'Map Width', 'fl_builder' ),
                        'default'   => '300',
                        'placeholder'  => '300',
                        'size'      => '4',
                        'maxlength' => '5',
                    ),  // end map_width
                    
//                    'map_icon'     => array(
//                        'type'      => 'icon',
//                        'label'     => __( 'Icon', 'fl_builder' ),
//                        'default'   => 'fa fa-map',
//                        'show_remove'   => true
//                    ),  // end map_icon
//                    
//                    'draggable'     => array(
//                        'type'      => 'select',
//                        'label'     => __( 'Allow Moving Placecard', 'fl_builder' ),
//                        'default'   => 'true',
//                        'options'   => array(
//                            'true'  => 'Yes',
//                            'false' => 'No',
//                        ),
//                    ),  // end draggable
                    
                ) // end fields
                  
            ) // end content_select
            
        ) // end sections
        
    ), // end content-tab 

) ); 

FLBuilder::register_settings_form('content_address_form', array(
	'title' => __('Panel Settings', 'fl-builder'),
	'tabs'  => array(
		'general'        => array( // Tab
			'title'         => __('Addresses', 'fl-builder'), // Tab title
			'sections'      => array( // Tab Sections
				'general'       => array(
					'title'     => '',
					'fields'    => array(
						'label'         => array(
							'type'          => 'text',
							'label'         => __('Address Label', 'fl-builder'),
							'help'          => __('A label to identify this entry', 'fl-builder')
						)
					)
				),
                
				'background' => array(
					'title'     => __('Choose Address and Custom Image', 'fl-builder'),
					'fields'    => array(
                        
                        'address'     => array(
                        'type'      => 'geocomplete',
                        'label'     => __( 'Address', 'fl_builder' ),
                        'placeholder'  => '1 E 161st St, Bronx, NY 10451, United States',
                        'default'  => '1 E 161st St, Bronx, NY 10451, United States',
                    ),  // end address
                    
                    'description'     => array(
                        'type'      => 'textarea',
                        'label'     => __( 'Pop Up Description', 'fl_builder' ),
                        'placeholder'  => 'Welcome to Yankee Stadium',
                        'default'  => 'Welcome to Yankee Stadium',
                        'rows'      => '6',
                    ),  // end description
                    
                    'custom_marker'     => array(
                        'type'      => 'select',
                        'label'     => __( 'Use Custom Marker', 'fl_builder' ),
                        'default'  => 'false',
                        'options'      => array(
                            'true'  => 'Yes',
                            'false' => 'No',
                        ),
                        'toggle'        => array(
                            'true'       => array(
                                'fields'  => array('marker'),
                            ),
                        ), // end toggle
                    ),  // end custom_marker
                    
                    'marker'     => array(
                        'type'      => 'photo',
                        'label'     => __( 'Custom Icon', 'fl_builder' ),
                        'help'     => __( 'Sizing of icon needs to be no bigger than 32x32px', 'fl_builder' ),
                        'show_remove'   => true
                    ),  // end marker            
						
					)
				),
				
			)
		),
		

	)
));
    