<?php

class SWTableClass extends FLBuilderModule {

    public function __construct()
    {

        parent::__construct(array(
            'name'          => __( 'Tables', 'fl-builder' ),
            'description'   => __( 'Add responsive tables to your site!', 'fl-builder' ),
            'category'      => BRANDING,
            'dir'           => SW_TABLE_MODULE_DIR . '/',
            'url'           => SW_TABLE_MODULE_URL . '/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
        
        $this->add_js('tablesaw.js', $this->url . 'tablesaw.js', array(), '', true);
        $this->add_js('tablesaw-ini.js', $this->url . 'tablesaw-init.js', array(), '', true);
        $this->add_js('loadfont.js', '//filamentgroup.github.io/demo-head/loadfont.js', array(), '', true);
        $this->add_css('tablesaw.css', $this->url . 'tablesaw.css');
       
    }    
    

}

FLBuilder::register_module( 'SWTableClass', array(

    'header'       => array(
        'title'         => __('Table Headers', 'fl-builder'),
        
        'sections'      => array(
            
            'headers'       => array(
                'title'         => __('Column Headers', 'fl-builder'), 
                'fields'        => array( // Section Fields
                    
                    'header'     => array(
                        'type'          => 'text',
                        'label'         => __('Header', 'fl-builder'),
                        'multiple'       => true,
                    ),
                )
            ), // end headers
            
            'sort'       => array(
                'title'         => __('Sortable Table', 'fl-builder'), 
                'fields'        => array( // Section Fields
                    
                    'sortable'     => array(
                        'type'          => 'select',
                        'label'         => __('Sort', 'fl-builder'),
                        'default'       => 'data-tablesaw-sortable data-tablesaw-sortable-switch',
                        'options'       => array(
                            'data-tablesaw-sortable data-tablesaw-sortable-switch'=> 'Yes',
                            ''    => 'No',
                        ),
                    ),
                )
            ), // end sort
        
            'scroll'       => array(
                'title'         => __('Scrollable Table', 'fl-builder'), 
                'fields'        => array( // Section Fields
                    
                    'scrollable'     => array(
                        'type'          => 'select',
                        'label'         => __('Scroll', 'fl-builder'),
                        'default'       => 'swipe',
                        'options'       => array(
                            'swipe'     => 'Yes',
                            'stack'     => 'No',
                        ),
                        'help'         => __('This will disable stacking and enable swipe/scroll when below the breakpoint', 'fl-builder'),
                    ),
                )
            ), // end scroll
        
        )
    ), // end header

    'row'       => array(
        'title'         => __('Table Rows', 'fl-builder'),
        
        'sections'      => array(
            
            'Cells'       => array(
                'title'         => __('Row Cells', 'fl-builder'), 
                'fields'        => array( // Section Fields
                    
                    'rows'     => array(
                        'type'          => 'form',
                        'label'        => __('Rows', 'fl_builder'),
                        'form'          => 'content_table_row', 
                        'preview_text'  => 'label',
                        'multiple'      => true
                    ),
                )
            ), // end headers
        
        )
    ), // end row
    
     'style-tab'       => array(
        'title'         => __('Style', 'fl-builder'),
        
        'sections'      => array(
            
            'headerStyle'       => array(
                'title'         => __('Header', 'fl-builder'), 
                'fields'        => array( // Section Fields
                    
                    'headerBackground'     => array(
                        'type'          => 'color',
                        'default'          => 'e2dfdc',
                        'label'         => __('Background Colour', 'fl_builder'),
                        'help'          => __('Change the table header background colour', 'fl_builder'),
                    ), // end headerBackground
                    
                    'header_font'          => array(
						'type'          => 'font',
						'default'		=> array(
							'family'		=> 'Default',
							'weight'		=> 300
						),
						'label'         => __('Font', 'fl-builder'),
						'preview'         => array(
							'type'            => 'font',
							'selector'        => '.tablesaw thead tr th'
						)					
					),
                    
					'header_font_size'     => array(
						'type'          => 'select',
						'label'         => __('Font Size', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('header_custom_font_size')
							)
						)
					),
					'header_custom_font_size' => array(
						'type'          => 'text',
						'label'         => __('Custom Font Size', 'fl-builder'),
						'default'       => '24',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
                    
                    'headerFont'     => array(
                        'type'          => 'color',
                        'default'          => 'ffffff',
                        'label'         => __('Font Colour', 'fl_builder'),
                        'help'          => __('Change the table header font colour', 'fl_builder'),
                    ), // end headerFont
                    
                    'headerBorder'     => array(
                        'type'          => 'color',
                        'default'          => 'ffffff',
                        'label'         => __('Border Colour', 'fl_builder'),
                        'help'          => __('Change the table header border colour', 'fl_builder'),
                    ), // end headerBorder
                    
                )
            ), // end header section
                
            'rowStyle'       => array(
                'title'         => __('Rows', 'fl-builder'), 
                'fields'        => array( // Section Fields
                    
                    'rowsBackground'     => array(
                        'type'          => 'color',
                        'default'          => 'ffffff',
                        'label'         => __('Background Colour', 'fl_builder'),
                        'help'          => __('Change the table row background colour', 'fl_builder'),
                    ), // end rowsBackground
                    
                    'rowsEvenBackground'     => array(
                        'type'          => 'color',
                        'default'          => 'ffffff',
                        'label'         => __('Background Colour: Even Rows', 'fl_builder'),
                        'help'          => __('Change the tables even rows background colour', 'fl_builder'),
                    ), // end rowsEvenBackground
                    
                    'rowsOddBackground'     => array(
                        'type'          => 'color',
                        'default'          => 'ffffff',
                        'label'         => __('Background Colour: Odd Rows', 'fl_builder'),
                        'help'          => __('Change the tables odd rows background colour', 'fl_builder'),
                    ), // end rowsOddBackground
                    
                    'row_font'          => array(
						'type'          => 'font',
						'default'		=> array(
							'family'		=> 'Default',
							'weight'		=> 300
						),
						'label'         => __('Font', 'fl-builder'),
						'preview'         => array(
							'type'            => 'font',
							'selector'        => '.tablesaw tbody tr td'
						)					
					),
                    
					'row_font_size'     => array(
						'type'          => 'select',
						'label'         => __('Font Size', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('row_custom_font_size')
							)
						)
					),
					'row_custom_font_size' => array(
						'type'          => 'text',
						'label'         => __('Custom Font Size', 'fl-builder'),
						'default'       => '24',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
                    
                    'rowsFont'     => array(
                        'type'          => 'color',
                        'default'          => '333333',
                        'label'         => __('Font Colour', 'fl_builder'),
                        'help'          => __('Change the table row font colour', 'fl_builder'),
                    ), // end rowsFont
                    
                    'rowsFontEven'     => array(
                        'type'          => 'color',
                        'default'          => '333333',
                        'label'         => __('Font Colour: Even Rows', 'fl_builder'),
                        'help'          => __('Change the tables even rows font colour', 'fl_builder'),
                    ), // end rowsFontEven
                    
                    'rowsFontOdd'     => array(
                        'type'          => 'color',
                        'default'          => '333333',
                        'label'         => __('Font Colour: Odd Rows', 'fl_builder'),
                        'help'          => __('Change the tables odd rows font colour', 'fl_builder'),
                    ), // end rowsFontOdd
                    
                    'rowsBorder'     => array(
                        'type'          => 'color',
                        'default'          => '333333',
                        'label'         => __('Border Colour', 'fl_builder'),
                        'help'          => __('Change the table row border colour', 'fl_builder'),
                    ), // end rowsBorder
                    
                )
            ), // end header section
            
        
        )
    ), // end css-tab   
    
     'css-tab'       => array(
        'title'         => __('Custom CSS', 'fl-builder'),
        
        'sections'      => array(
            
            'css'       => array(
                'title'         => __('Custom CSS', 'fl-builder'), 
                'fields'        => array( // Section Fields
                    
                    'customCSS'     => array(
                        'type'          => 'code',
                        'editor'          => 'html',
                         'rows'          => '20',
                        'help'          => 'Please only use this if you know what you are doing',
                        'placeholder'   => 'Proceed with caution',
                    ), // end customCSS
                    
                )
            ), // end css section
            
        
        )
    ), // end css-tab

));


FLBuilder::register_settings_form('content_table_row', array(
	'title' => __('Row Settings', 'fl-builder'),
	'tabs'  => array(
		
        'general'        => array( // Tab
			'title'         => __('Content', 'fl-builder'), // Tab title
			'sections'      => array( // Tab Sections
				'general'       => array(
					'title'     => '',
					'fields'    => array(
						'label'         => array(
							'type'          => 'text',
							'label'         => __('Row Label', 'fl-builder'),
							'help'          => __('A label to identify this panel on the Custom Panel tab.', 'fl-builder')
						),
                        
                        'cell'         => array(
							'type'          => 'textarea',
							'label'         => __('Cell', 'fl-builder'),
                            'multiple'      => true,
						),
					)
				),

			)
		),

	)
));
                        