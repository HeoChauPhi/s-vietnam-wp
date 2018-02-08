<?php 

class SWAnimeTxtClass extends FLBuilderModule {

    public function __construct()
    {
    
        parent::__construct(array(
            'name'          => __( 'Animated Text', 'fl-builder' ),
            'description'   => __( 'Add animated text to your site!', 'fl-builder' ),
            'category'      => BRANDING,
            'dir'           => SW_ANIMETEXT_MODULE_DIR . '/',
            'url'           => SW_ANIMETEXT_URL . '/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
        
        $this->add_js('typed.js', $this->url . 'js/typed.js', array(), '', true);
        
    }    
    
}

FLBuilder::register_module( 'SWAnimeTxtClass', array(
    
    'content-tab'      => array(
        'title'         => __( 'Content', 'fl-builder' ),
        'sections'      => array(
            
            'link_select'  => array(
                'title'         => __( 'Link', 'fl-builder' ),
                'fields'        => array(           
                    
                    'url'     => array(
                        'type'          => 'text',
                        'label'         => __( 'URL', 'fl_builder' ),
                    ),                      
                    
                )
            ),
        
  
            'content_select'  => array(
                'title'         => __( 'Sentences', 'fl-builder' ),
                'fields'        => array(                     
                    
                    'nonanimated'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Add Plain Text', 'fl_builder' ),
                        'default'       => 'no',
                        'options'       => array(
                            'yes' => 'Yes',
                            'no'      => 'No',
                        ),
                        'toggle'        => array(
                            'yes'       => array(
                                'fields'    => array('plaintext'),
                            ) ,
                        ),
                    ),          
                    
                    'plaintext'     => array(
                        'type'          => 'textarea',
                        'label'         => __( 'Non Animated Sentence', 'fl_builder' ),
                        'rows'          => '6',
                    ),             
                    
                    'sentence'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Sentence', 'fl_builder' ),
                        'default'       => '',
                        'multiple'      => true,
                    ),                      
                    
                )        
            )
        ),
        
    ),
        
    
    
    'animate-tab'      => array(
        'title'         => __( 'Animation', 'fl-builder' ),
        'sections'      => array(
            
            'text_panel'  => array(
                'title'         => __( 'Animation', 'fl-builder' ),
                'fields'        => array(
                    
                    
                    'loop'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Loop', 'fl-builder' ),
                        'default'       => 'true',
                        'options'       => array(
                                'true'  => 'True',
                                'false' => 'False',
                            ),
                        'help'          => 'Set whether you want the animation to repeat',
                        'toggle'        => array(
							'true'        => array(
								'fields'  => array('loop_count')
							)
						)
                    ), 
                    
                    'loop_count'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Loop Count', 'fl_builder' ),
                        'maxlength'     => '3',
                        'size'          => '4',
                        'help'          => 'Add how many times to loop. Leave blank for infinite',
                    ), 
                     
                    'startDelay'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Delay Start', 'fl_builder' ),
                        'maxlength'     => '3',
                        'size'          => '4',
                        'placeholder'   => '0',
                        'default'       => '0',
                        'description'   => 'ms',
                        'help'          => 'Choose whether you want the animation to delay on load.',
                    ), 
                    
                    'typeSpeed'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Type Speed', 'fl_builder' ),
                        'maxlength'     => '3',
                        'size'          => '4',
                        'placeholder'   => '50',
                        'default'       => '50',
                        'description'   => 'ms',
                        'help'          => 'Choose the speed you want the animation of each character to take.',
                    ), 
                    
                    
                    'backSpeed'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Back Speed', 'fl_builder' ),
                        'maxlength'     => '3',
                        'size'          => '4',
                        'placeholder'   => '20',
                        'default'       => '20',
                        'description'   => 'ms',
                        'help'          => 'Choose the speed you want the animation of each character to take on deletion.',
                    ), 
                    
                    
                    'backDelay'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Back Delay', 'fl_builder' ),
                        'maxlength'     => '4',
                        'size'          => '5',
                        'placeholder'   => '500',
                        'default'       => '500',
                        'description'   => 'ms',
                        'help'          => 'Choose the delay you want before returning to beginning.',
                    ),  
                    
                    
                    'cursor'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Display Cursor', 'fl-builder' ),
                        'default'       => 'true',
                        'options'       => array(
                                'true'  => 'True',
                                'false' => 'False',
                            ),
                        'help'          => 'Set whether you want a cursor before text',
                        'toggle'        => array(
							'true'        => array(
								'fields'  => array('cursor_char')
							)
						)
                    ), 
                    
                    'cursor_char'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Cursor Character', 'fl_builder' ),
                        'default'       => '|',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'help'          => 'Add how many times to loop. Leave blank for infinite',
                    ),          
                    
                    ), 
                    
                ),  
            
        ),
    ),
         
    
    
    'style-tab'      => array(
        'title'         => __( 'Style', 'fl-builder' ),
        'sections'      => array(
            
            'text_panel'  => array(
                'title'         => __( 'Style', 'fl-builder' ),
                'fields'        => array(
                    
                    'font_family'          => array(
						'type'          => 'font',
						'default'		=> array(
							'family'		=> 'Default',
							'weight'		=> 300
						),
						'label'         => __('Font', 'fl-builder'),
						'preview'         => array(
							'type'            => 'font',
							'selector'        => '.header-text a'
						)					
					),
                    
                    'font_size'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Font Size', 'fl_builder' ),
                        'maxlength'     => '4',
                        'size'          => '5',
                        'placeholder'   => '14',
                        'default'       => '14',
                        'description'   => 'px',
                        'help'          => 'Choose the font size.',
                    ),                   
                    
                    'plain_color'     => array(
                        'type'          => 'color',
                        'label'         => __( 'Non Animated Font Color', 'fl_builder' ),
                        'default'       => '',
                        'help'          => 'Choose your font color',
                    ),                   
                    
                    'font_color'     => array(
                        'type'          => 'color',
                        'label'         => __( 'Font Color', 'fl_builder' ),
                        'default'       => '',
                        'help'          => 'Choose your font color',
                    ),                    
                    
                    'font_color_hover'     => array(
                        'type'          => 'color',
                        'label'         => __( 'Font Color: Hover', 'fl_builder' ),
                        'default'       => '',
                        'help'          => 'Choose your font hover color',
                    ),                    
                    
                    'font_underline'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Text Underline', 'fl_builder' ),
                        'default'       => 'none',
                        'options'       => array(
                            'underline' => 'Yes',
                            'none'      => 'No',
                        ),
                        'help'          => 'Choose whether to underline on hover',
                    ),                    
                    
                    'font_underline_hover'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Text Underline: Hover', 'fl_builder' ),
                        'default'       => 'none',
                        'options'       => array(
                            'underline' => 'Yes',
                            'none'      => 'No',
                        ),
                        'help'          => 'Choose whether to underline on hover',
                    ),           
                                    
                    
                    'align'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Align Text', 'fl_builder' ),
                        'default'       => 'left',
                        'options'       => array(
                            'left' => __('Left', 'fl-builder'),
                            'center' => __('Center', 'fl-builder'),
                            'right' => __('Right', 'fl-builder'),
                        ),
                        'help'          => 'Choose alignment',
                    ),           
                    
                    
                    
                    ), 
                    
                ),
            
            
            
            
        ),
    ),
    
) ); 
    