<?php 

class SWNextpageClass extends FLBuilderModule {

    public function __construct()
    {

        parent::__construct(array(
            'name'          => __( 'Next Page', 'fl-builder' ),
            'description'   => __( 'Add next page button to your site!', 'fl-builder' ),
            'category'      => BRANDING,
            'dir'           => SW_NEXTPAGE_MODULE_DIR . '/',
            'url'           => SW_NEXTPAGE_MODULE_URL . '/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
        
        //$this->add_js('typed.js', $this->url . 'js/typed.js', array(), '', true);
        
    }    
    
}

FLBuilder::register_module( 'SWNextpageClass', array(
    
    
    'content-tab'      => array(
        'title'         => __( 'Content', 'fl-builder' ),
        'sections'      => array(
            
            'buttons'  => array(
                'title'         => __( 'Buttons', 'fl-builder' ),
                'fields'        => array(
                    
					'prev_btn'         => array(
						'type'          => 'select',
						'label'         => __('Show Prev Button', 'fl-builder'),
						'default'       => 'yes',
						'options'       => array(
							'yes'          => __( 'Yes', 'fl-builder' ),
							'no'          => __('No', 'fl-builder'),
						),
					),
                    
					'parent_btn'         => array(
						'type'          => 'select',
						'label'         => __('Show Parent Button', 'fl-builder'),
						'default'       => 'yes',
						'options'       => array(
							'yes'          => __( 'Yes', 'fl-builder' ),
							'no'          => __('No', 'fl-builder'),
						),
					),
                    
					'next_btn'         => array(
						'type'          => 'select',
						'label'         => __('Show Next Button', 'fl-builder'),
						'default'       => 'yes',
						'options'       => array(
							'yes'          => __( 'Yes', 'fl-builder' ),
							'no'          => __('No', 'fl-builder'),
						),
					),
                    
				)
			), 
        ),
    ),    
    'style-tab'      => array(
        'title'         => __( 'Style', 'fl-builder' ),
        'sections'      => array(
            
            'text_panel'  => array(
                'title'         => __( 'Style', 'fl-builder' ),
                'fields'        => array(
					'bg_color'      => array(
						'type'          => 'color',
						'label'         => __('Background Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true
					),
					'bg_hover_color' => array(
						'type'          => 'color',
						'label'         => __('Background Hover Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true,
						'preview'       => array(
							'type'          => 'none'
						)
					),
					'text_color'    => array(
						'type'          => 'color',
						'label'         => __('Text Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true
					),
					'text_hover_color' => array(
						'type'          => 'color',
						'label'         => __('Text Hover Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true,
						'preview'       => array(
							'type'          => 'none'
						)
					)
				)
			),
			'style'         => array(
				'title'         => __('Style', 'fl-builder'),
				'fields'        => array(
					'style'         => array(
						'type'          => 'select',
						'label'         => __('Style', 'fl-builder'),
						'default'       => 'flat',
						'options'       => array(
							'flat'          => __('Flat', 'fl-builder'),
							'gradient'      => __('Gradient', 'fl-builder'),
							'transparent'   => __('Transparent', 'fl-builder')
						),
						'toggle'        => array(
							'transparent'   => array(
								'fields'        => array('bg_opacity', 'border_size')
							)
						)
					),
					'border_size'   => array(
						'type'          => 'text',
						'label'         => __('Border Size', 'fl-builder'),
						'default'       => '2',
						'description'   => 'px',
						'maxlength'     => '3',
						'size'          => '5',
						'placeholder'   => '0'
					),
					'bg_opacity'    => array(
						'type'          => 'text',
						'label'         => __('Background Opacity', 'fl-builder'),
						'default'       => '0',
						'description'   => '%',
						'maxlength'     => '3',
						'size'          => '5',
						'placeholder'   => '0'
					)
				)  
			),
			'formatting'    => array(
				'title'         => __('Structure', 'fl-builder'),
				'fields'        => array(
					'width'         => array(
						'type'          => 'select',
						'label'         => __('Width', 'fl-builder'),
						'default'       => 'auto',
						'options'       => array(
							'auto'          => _x( 'Auto', 'Width.', 'fl-builder' ),
							'full'          => __('Full Width', 'fl-builder'),
							'custom'        => __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'auto'          => array(
								'fields'        => array('align')
							),
							'full'          => array(),
							'custom'        => array(
								'fields'        => array('align', 'custom_width')
							)
						)
					),
					'custom_width'  => array(
						'type'          => 'text',
						'label'         => __('Custom Width', 'fl-builder'),
						'default'       => '200',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'align'         => array(
						'type'          => 'select',
						'label'         => __('Alignment', 'fl-builder'),
						'default'       => 'left',
						'options'       => array(
							'center'        => __('Center', 'fl-builder'),
							'left'          => __('Left', 'fl-builder'),
							'right'         => __('Right', 'fl-builder')
						)
					),
					'font_size'     => array(
						'type'          => 'text',
						'label'         => __('Font Size', 'fl-builder'),
						'default'       => '16',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'padding'       => array(
						'type'          => 'text',
						'label'         => __('Padding', 'fl-builder'),
						'default'       => '12',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'border_radius' => array(
						'type'          => 'text',
						'label'         => __('Round Corners', 'fl-builder'),
						'default'       => '4',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					)
                    
                    
                    
                    ), 
                    
                ),
            
            
            
            
        ),
    ),
    
) ); 
    