<?php


class SWModalClass extends FLBuilderModule {

    public function __construct()
    {

        parent::__construct(array(
            'name'          => __( 'OnClick PopUp', 'fl-builder' ),
            'description'   => __( 'Add a modal popup', 'fl-builder' ),
            'category'      => BRANDING,
            'dir'           => SW_MODAL_MODULE_DIR . '/',
            'url'           => SW_MODAL_MODULE_URL . '/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
        
        $options = get_option( 'bl_beaverlodge_settings' );
         if ($options['bl_bootstrap_scripts'] == '2') {
             $this->add_js('bootstrap.min.js', $this->url . 'js/bootstrap.min.js', array(), '', true);      
             $this->add_css('bootstrap.min.css', $this->url . 'css/bootstrap.min.css' );   
         }
        
    } 
	/**
	 * @method update
	 */
	public function update( $settings )
	{
		// Remove the old three_d setting.
		if ( isset( $settings->three_d ) ) {
			unset( $settings->three_d );
		}
		
		return $settings;
	}
    
	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'fl-button-wrap';

		if(!empty($this->settings->width)) {
			$classname .= ' fl-button-width-' . $this->settings->width;
		}
		if(!empty($this->settings->align)) {
			$classname .= ' fl-button-' . $this->settings->align;
		}
		if(!empty($this->settings->icon)) {
			$classname .= ' fl-button-has-icon';
		}

		return $classname;
	}    
}

FLBuilder::register_module( 'SWModalClass', array(
    
    'html_tab'      => array(
        
        'title'         => __( 'Content', 'fl-builder' ),
        'sections'      => array( 
            
              'html_select'  => array(
                'title'         => __( 'HTML', 'fl-builder' ),
                'fields'        => array(
                    
                    'content'     => array(
                        'type'          => 'code',
                        'editor'        => 'html',
                        'rows'          => '18'
                    ),  // end content
                    
                ) // end fields
                  
            ), // end html_select
            
        ) // end sections
        
    ), // end html_tab 
    
    'button_tab'      => array(
        
        'title'         => __( 'Button', 'fl-builder' ),
        'sections'      => array( 
            
              'button_content'  => array(
                'title'         => __( 'Button Content', 'fl-builder' ),
                'fields'        => array(
                    
                    'btn_style'         => array(
						'type'          => 'select',
						'label'         => __('Link Type', 'fl-builder'),
						'default'       => 'button',
						'options'       => array(
							'button'          => __('Button', 'fl-builder'),
							'image'      => __('Image', 'fl-builder'),
						),
						'toggle'        => array(
							'button'   => array(
								'fields'        => array('text', 'icon', 'icon_position'),
                                'sections'      => array('colors', 'style', 'formatting')
							),
							'image'   => array(
								'fields'        => array('image', 'image_align')
							),
						)
					),
                    
                    'image' => array(
                        'type'          => 'photo',
                        'label'         => __('Photo Link', 'fl-builder'),
                        'show_remove'	=> false
                    ), 
                    
                    'image_align' => array(
                        'type'          => 'select',
                        'label'         => __('Image Align', 'fl-builder'),
						'default'       => 'left',
                        'options'       => array(
							'left'          => __('Left', 'fl-builder'),
							'middle'      => __('Center', 'fl-builder'),
							'right'      => __('Right', 'fl-builder'),
						),
                    ), 
                    
                    'text'          => array(
						'type'          => 'text',
						'label'         => __('Text', 'fl-builder'),
						'default'       => __('Click Here', 'fl-builder'),
						'preview'         => array(
							'type'            => 'text',
							'selector'        => '.fl-button-text'
						)
					),
					'icon'          => array(
						'type'          => 'icon',
						'label'         => __('Icon', 'fl-builder'),
						'show_remove'   => true
					),
					'icon_position' => array(
						'type'          => 'select',
						'label'         => __('Icon Position', 'fl-builder'),
						'default'       => 'before',
						'options'       => array(
							'before'        => __('Before Text', 'fl-builder'),
							'after'         => __('After Text', 'fl-builder')
						)
					),
                    
                ) // end fields
                  
            ), // end button_content            
            
              'colors'        => array(
				'title'         => __('Colors', 'fl-builder'),
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
                            'left'          => __('Left', 'fl-builder'),
							'center'        => __('Center', 'fl-builder'),
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
				)
			)
            
        ) // end sections
        
    ), // end button_tab
     
    
    'modal_tab'      => array(
        
        'title'         => __( 'Modal', 'fl-builder' ),
        'sections'      => array( 
            
              'modal_style'  => array(
                'title'         => __( 'Modal Style', 'fl-builder' ),
                'fields'        => array(
                    'modal_title_text'     => array(
                        'type'          => 'select',
                        'default'       => 'true',
                        'label'        => __( 'Display Header', 'fl-builder' ),
                        'options'       => array(
                            'true'        => 'True',
                            'false'        => 'False',
                        ),
						'toggle'        => array(
							'false'          => array(),
							'true'        => array(
								'fields'        => array('modal_title')
							)
						)
                    ),  // end close_btn
                    'modal_title'     => array(
                        'type'          => 'text',
                        'default'          => 'Modal Window Title',
                        'palceholder'          => 'Modal Header',
                        'label'        => __( 'Modal Window Title', 'fl-builder' ),
                    ),  // end modal_title
                    'modal_size'     => array(
                        'type'          => 'select',
                        'default'       => 'lg',
                        'label'        => __( 'Modal Size', 'fl-builder' ),
                        'options'       => array(
                            'sm'        => 'Small',
                            'lg'        => 'Large',
                            'custom'    => 'Custom',
                        ),
						'toggle'        => array(
							'sm'          => array(),
							'lg'          => array(),
							'custom'        => array(
								'fields'        => array('modal_height', 'modal_width')
							)
						)
                    ),  // end modal_size
                    
                    
					'modal_height'       => array(
						'type'          => 'text',
						'label'         => __('Popup Height', 'fl-builder'),
						'default'       => '150',
						'placeholder'     => '150',
						'maxlength'     => '4',
						'size'          => '5',
						'description'   => 'px'
					),
                    
					'modal_width' => array(
						'type'          => 'text',
						'label'         => __('Popup Width', 'fl-builder'),
						'default'       => '900',
						'placeholder'       => '900',
						'maxlength'     => '4',
						'size'          => '5',
						'description'   => 'px'
					),
                    
                    'close_btn'     => array(
                        'type'          => 'select',
                        'default'       => 'true',
                        'label'        => __( 'Display Close Button', 'fl-builder' ),
                        'options'       => array(
                            'true'        => 'True',
                            'false'        => 'False',
                        ),
						'toggle'        => array(
							'false'          => array(),
							'true'        => array(
								'fields'        => array('close_btn_text', 'close_btn_size', 'close_btn_type')
							)
						)
                    ),  // end close_btn
                    
                    'close_btn_text'     => array(
                        'type'          => 'text',
                        'default'          => 'Close',
                        'palceholder'          => 'Close',
                        'label'        => __( 'Close Button Text', 'fl-builder' ),
                    ),  // end close_btn_text
                    
                    'close_btn_size'     => array(
                        'type'          => 'select',
                        'default'       => 'lg',
                        'label'        => __( 'Close Button Size', 'fl-builder' ),
                        'options'       => array(
                            'xs'        => 'Extra Small',
                            'sm'        => 'Small',
                            'md'        => 'Medium',
                            'lg'        => 'Large',
                        ),
                    ),  // end close_btn_size
                    
                    'close_btn_type'     => array(
                        'type'          => 'select',
                        'default'       => 'default',
                        'label'        => __( 'Close Button Type', 'fl-builder' ),
                        'options'       => array(
                            'default'        => 'Default',
                            'primary'        => 'Primary',
                            'success'        => 'Success',
                            'info'           => 'Info',
                            'warning'        => 'Warning',
                            'danger'         => 'Danger',
                            'link'           => 'Link',
                        ),
                    ),  // end close_btn_type
                    
                    'modal_bg_color' => array(
						'type'          => 'color',
						'label'         => __('Background Color', 'fl-builder'),
						'default'       => '#ffffff',
						'show_reset'    => true,
						'preview'       => array(
							'type'          => 'none'
						)
					),
                    
                    'overlay_bg_color' => array(
						'type'          => 'color',
						'label'         => __('Background Overlay Color', 'fl-builder'),
						'default'       => '#000000',
						'show_reset'    => true,
						'preview'       => array(
							'type'          => 'none'
						)
					),
                    
                    'modal_header_color' => array(
						'type'          => 'color',
						'label'         => __('Header Color', 'fl-builder'),
						'default'       => '#333333',
						'show_reset'    => true,
						'preview'       => array(
							'type'          => 'none'
						)
					),
                    
                    
                    'modal_font_color' => array(
						'type'          => 'color',
						'label'         => __('Font Color', 'fl-builder'),
						'default'       => '#808080',
						'show_reset'    => true,
						'preview'       => array(
							'type'          => 'none'
						)
					),
                    
                    'show_borders'     => array(
                        'type'          => 'select',
                        'default'       => 'true',
                        'label'        => __( 'Show Borders', 'fl-builder' ),
                        'options'       => array(
                            'true'        => 'True',
                            'false'        => 'False',
                        ),
                    ),
                    
                ) // end fields
                  
            ), // end modal_style
            
        ) // end sections
        
    ), // end modal_tab
    
) ); 
    