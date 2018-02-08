<?php

$date = date('Y/m/d h:i', time());

class SWCounterClass extends FLBuilderModule {

    public function __construct()
    {

        parent::__construct(array(
            'name'          => __( 'Countdown', 'fl-builder' ),
            'description'   => __( 'Add countdown clock to your site!', 'fl-builder' ),
            'category'      => BRANDING,
            'dir'           => SW_COUNTER_MODULE_DIR . '/',
            'url'           => SW_COUNTER_URL . '/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
        
        $this->add_js('jquery.countdown.js', $this->url . 'js/jquery.countdown.js', array(), '', true);
        
    }    
    
}

FLBuilder::register_module( 'SWCounterClass', array(
    
    'counter-content-tab'      => array(
        'title'         => __( 'Content', 'fl-builder' ),
        'sections'      => array(
            'content_select'  => array(
                'title'         => __( 'Counter', 'fl-builder' ),
                'fields'        => array(
                    
                    'sw_counter_date'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Date', 'fl_builder' ),
                        'default'       => $date,
                        'size'          => '20',
                        'description'   => 'Y/m/d h:m:s',
                    ), 
                        
                    
                    'sw_counter_message'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Message', 'fl_builder' ),
                        'default'       => 'Until this message will self destruct!',
                        'placeholder'   => 'Until this message will self destruct!',
                    ), 
                    
                    'sw_counter_days'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Display Days', 'fl_builder' ),
                        'default'       => 'yes',
                        'options'       => array(
                            'yes'    => 'Yes',
                            'no'    => 'No',
                        ),
                    ), 
                    
                    
                    'sw_counter_hrs'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Display Hours', 'fl_builder' ),
                        'default'       => 'yes',
                        'options'       => array(
                            'yes'    => 'Yes',  
                            'no'    => 'No',
                        ),
                    ), 
                    
                    'sw_counter_mins'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Display Minutes', 'fl_builder' ),
                        'default'       => 'yes',
                        'options'       => array(
                            'yes'    => 'Yes',  
                            'no'    => 'No',
                        ),
                    ),                     
                     
                    'sw_counter_secs'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Display Seconds', 'fl_builder' ),
                        'default'       => 'yes',
                        'options'       => array(
                            'yes'    => 'Yes',  
                            'no'    => 'No',
                        ),
                    ),                     
                    
                    'sw_counter_text'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Display Countdown Text', 'fl_builder' ),
                        'default'       => 'yes',
                        'options'       => array(
                            'yes'    => 'Yes',  
                            'no'    => 'No',
                        ),
                    ),                     
                    
                )
            )
        )
    ), 
    
    'counter-finish-tab'      => array(
        'title'         => __( 'End Message', 'fl-builder' ),
        'sections'      => array(
            'content_select'  => array(
                'title'         => __( 'End Message', 'fl-builder' ),
                'fields'        => array(
                    
                    'sw_end_msg'     => array(
                        'type'          => 'editor',
                        'media_buttons' => true,
                        'rows'          => 60,
                    ),                     
                    
                )
            )
        )
    ),
    
    'counter-style-tab'      => array(
        'title'         => __( 'Countdown Style', 'fl-builder' ),
        'sections'      => array(
            
            'text_panel'  => array(
                'title'         => __( 'Clock', 'fl-builder' ),
                'fields'        => array(
                    
                    'font'          => array(
						'type'          => 'font',
						'default'		=> array(
							'family'		=> 'Default',
							'weight'		=> 300
						),
						'label'         => __('Font', 'fl-builder'),
						'preview'         => array(
							'type'            => 'font',
							'selector'        => '.countdownHolder'
						)					
					),
                    
					'font_size'     => array(
						'type'          => 'select',
						'label'         => __('Font Size', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('custom_font_size')
							)
						)
					),
                    
					'custom_font_size' => array(
						'type'          => 'text',
						'label'         => __('Custom Font Size', 'fl-builder'),
						'default'       => '40',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
                    
                    'sw_counter_letter_spacing'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Letter Spacing', 'fl_builder' ),
                        'default'       => '-3',
                        'options'       => array(
                            '-3'    => '-3',  
                            '-2'    => '-2',  
                            '-1'    => '-1',  
                            '0'    => '0',  
                            '1'    => '1',  
                            '2'    => '2',  
                            '3'    => '3',
                        ),
                        'description'   => 'px',
                    ), 
                    
                    'sw_counter_font_color'      => array(
							'type'          => 'color',
							'label'         => __('Font Color', 'fl-builder'),
							'show_reset'    => true,
                            'default'       => '',
						), 
                    
                    'sw_counter_bg_color'      => array(
							'type'          => 'color',
							'label'         => __('Background Color', 'fl-builder'),
							'show_reset'    => true,
                            'default'       => '',
						),                    
                    
					'sw_counter_radius' => array(
						'type'          => 'text',
						'label'         => __('Border Radius', 'fl-builder'),
						'default'       => '10',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
                    
                    'sw_counter_divider_color'      => array(
							'type'          => 'color',
							'label'         => __('Divider Color', 'fl-builder'),
							'show_reset'    => true,
                            'default'       => '',
						),
                    
                    
                    
                    ), 
                    
                ),
            
            'countdownMsg'  => array(
                'title'         => __( 'Countdown Text', 'fl-builder' ),
                'fields'        => array(
                    
                    'counterFont'          => array(
						'type'          => 'font',
						'default'		=> array(
							'family'		=> 'Default',
							'weight'		=> 300
						),
						'label'         => __('Font', 'fl-builder'),
						'preview'         => array(
							'type'            => 'font',
							'selector'        => '.counter-text'
						)					
					),
                    
					'counterFont_size'     => array(
						'type'          => 'select',
						'label'         => __('Font Size', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('counterCustom_font_size')
							)
						)
					),
                    
					'counterCustom_font_size' => array(
						'type'          => 'text',
						'label'         => __('Custom Font Size', 'fl-builder'),
						'default'       => '14',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
                    
                    'counterLetter_spacing'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Letter Spacing', 'fl_builder' ),
                        'default'       => '0',
                        'options'       => array(
                            '-3'    => '-3',  
                            '-2'    => '-2',  
                            '-1'    => '-1',  
                            '0'    => '0',  
                            '1'    => '1',  
                            '2'    => '2',  
                            '3'    => '3',
                        ),
                        'description'   => 'px',
                    ), 
                    
                    'CounterFont_color'      => array(
							'type'          => 'color',
							'label'         => __('Font Color', 'fl-builder'),
							'show_reset'    => true,
                            'default'       => '333333',
						), 
                    
                    
                    ), 
                    
                ), // end countdown message section
            
                   
            'alertMsg'  => array(
                'title'         => __( 'Countdown Message', 'fl-builder' ),
                'fields'        => array(
                    
                    'alertFont'          => array(
						'type'          => 'font',
						'default'		=> array(
							'family'		=> 'Default',
							'weight'		=> 300
						),
						'label'         => __('Font', 'fl-builder'),
						'preview'         => array(
							'type'            => 'font',
							'selector'        => '.alert'
						)					
					),
                    
					'alertFont_size'     => array(
						'type'          => 'select',
						'label'         => __('Font Size', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('alertCustom_font_size')
							)
						)
					),
                    
					'alertCustom_font_size' => array(
						'type'          => 'text',
						'label'         => __('Custom Font Size', 'fl-builder'),
						'default'       => '18',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
                    
                    'alertLetter_spacing'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Letter Spacing', 'fl_builder' ),
                        'default'       => '0',
                        'options'       => array(
                            '-3'    => '-3',  
                            '-2'    => '-2',  
                            '-1'    => '-1',  
                            '0'    => '0',  
                            '1'    => '1',  
                            '2'    => '2',  
                            '3'    => '3',
                        ),
                        'description'   => 'px',
                    ), 
                    
                    'alertFont_color'      => array(
							'type'          => 'color',
							'label'         => __('Font Color', 'fl-builder'),
							'show_reset'    => true,
                            'default'       => '333333',
						), 
                    
                    
                    ), 
                    
                ), // end countdown message section
 
            
            
        )
    ),
    
) ); 
    