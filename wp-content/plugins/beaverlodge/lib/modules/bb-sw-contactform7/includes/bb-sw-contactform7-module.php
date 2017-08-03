<?php


class SWCF7Class extends FLBuilderModule {

    public function __construct()
    {
        
        parent::__construct(array(
            'name'              => __( 'ContactForm 7', 'fl-builder' ),
            'description'       => __( 'Add CF7 to Beaver Builder', 'fl-builder' ),
            'category'          => BRANDING,
            'partial_refresh'   => true,
            'dir'               => SW_CF7_MODULE_DIR . '/',
            'url'               => SW_CF7_MODULE_URL . '/',
        ));
        
    }    
    
}

FLBuilder::register_module( 'SWCF7Class', array(
    
    'content-tab'      => array(
        
        'title'         => __( 'Content', 'fl-builder' ),
        'sections'      => array( 
            
              'content_select'  => array(
                'title'         => __( 'Content', 'fl-builder' ),
                'fields'        => array(
                    
                    'contact_form' => array(
                        'type'          => 'select',
                        'label'         => __('Choose Form', 'fl-builder'),
                        'default'       => 'none',
                        'options'       => sw_get_forms(),
                    ), // end contact_form
                    
                ) // end fields
                  
            ) // end content_select
            
        ) // end sections
        
    ), // end content-tab    
    
    'style-tab'      => array(
        
        'title'         => __( 'Style', 'fl-builder' ),
        'sections'      => array( 
            
              'titles'  => array(
                'title'         => __( 'Title Styles', 'fl-builder' ),
                'fields'        => array(
                    
                    'title_color' => array(
                        'type'          => 'color',
                        'label'         => __('Title Color', 'fl-builder'),
                        'default'       => '#222222',
                        'show_reset'    => true
                    ), // end title_color
                    
                    'title_size' => array(
                        'type'          => 'text',
                        'label'         => __('Title Size', 'fl-builder'),
                        'default'       => '14',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
                        'preview'       => array(
                            'type'          => 'css',
                            'selector'      => '.sw-form-title',
                            'property'      => 'font-size',
                            'unit'          => 'px',
                        )        
                    ), // end title_size
                    
                    'title_font' => array(
                        'type'          => 'font',
                        'label'         => __( 'Title Font', 'fl-builder' ),
                        'default'       => array(
                            'family'        => 'Default',
                            'weight'        => 'Default',
                        )
                    ), // end title_font   
                    
                    'title_spacing' => array(
                        'type'          => 'text',
                        'label'         => __('Title Size', 'fl-builder'),
                        'default'       => '0',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
                        'preview'       => array(
                            'type'          => 'css',
                            'selector'      => '.sw-form-title',
                            'property'      => 'letter-spacing',
                            'unit'          => 'px',
                        )        
                    ), // end title_spacing
                    
                    'title_transform' => array(
                        'type'          => 'select',
                        'label'         => __( 'Title Transform', 'fl-builder' ),
                        'default'       => 'none',
                        'options'       => array(
                            'none'          => __( 'Normal', 'fl-builder' ),
                            'capitalize'    => __( 'Capitalize', 'fl-builder' ),
                            'uppercase'     => __( 'Uppercase', 'fl-builder' ),
                            'lowercase'     => __( 'Lowercase', 'fl-builder' ),
                        ),
                        'preview'       => array(
                            'type'          => 'css',
                            'selector'      => '.sw-form-title',
                            'property'      => 'text-transform',
                        ) 
                    ), // end title_transform       
                    
                ) // end fields
                  
            ), // end titles
            
              'inputs'  => array(
                'title'         => __( 'Input Styles', 'fl-builder' ),
                'fields'        => array(
                    
                    'input_color' => array(
                        'type'          => 'color',
                        'label'         => __('Text Color', 'fl-builder'),
                        'default'       => '#222222',
                        'show_reset'    => true
                    ), // end input_color
                    
                    'input_font' => array(
                        'type'          => 'font',
                        'label'         => __( 'Input Font', 'fl-builder' ),
                        'default'       => array(
                            'family'        => 'Default',
                            'weight'        => 'Default',
                        )
                    ), // end input_font   
                    
                    'input_bg' => array(
                        'type'          => 'color',
                        'label'         => __('Background Color', 'fl-builder'),
                        'default'       => '#ffffff',
                        'show_reset'    => true
                    ), // end input_bg
                    
                    'input_border' => array(
                        'type'          => 'color',
                        'label'         => __('Border Color', 'fl-builder'),
                        'default'       => '#cccccc',
                        'show_reset'    => true
                    ), // end input_border
                    
                    'input_radius' => array(
                        'type'          => 'text',
                        'label'         => __('Border Radius', 'fl-builder'),
                        'default'       => '5',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
                    ), // end input_radius   
                    
                    'input_width' => array(
                        'type'          => 'text',
                        'label'         => __('Text Field Widths', 'fl-builder'),
                        'default'       => '100',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => '%',
                    ), // end input_width   
                    
                    'input_text_height' => array(
                        'type'          => 'text',
                        'label'         => __('Text Field Heights', 'fl-builder'),
                        'default'       => '34',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
                    ), // end input_text_height  
                    
                    'input_msg_height' => array(
                        'type'          => 'text',
                        'label'         => __('Text Area Height', 'fl-builder'),
                        'default'       => '100',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
                    ), // end input_msg_height    
                    
                ) // end fields
                  
            ), // end inputs
            
              'button'  => array(
                'title'         => __( 'Button Styles', 'fl-builder' ),
                'fields'        => array(
                    
                    'button_color' => array(
                        'type'          => 'color',
                        'label'         => __('Text Color', 'fl-builder'),
                        'default'       => '#222222',
                        'show_reset'    => true
                    ), // end botton_color
                    
                    'button_font' => array(
                        'type'          => 'font',
                        'label'         => __( 'Button Font', 'fl-builder' ),
                        'default'       => array(
                            'family'        => 'Default',
                            'weight'        => 'Default',
                        )
                    ), // end button_font   
                    
                    'button_font_size' => array(
                        'type'          => 'text',
                        'label'         => __('Button Font Size', 'fl-builder'),
                        'default'       => '14',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
                    ), // end button_font_size   
                    
                    'button_bg' => array(
                        'type'          => 'color',
                        'label'         => __('Background Color', 'fl-builder'),
                        'default'       => '#ffffff',
                        'show_reset'    => true
                    ), // end button_bg
                    
                    'button_border' => array(
                        'type'          => 'color',
                        'label'         => __('Border Color', 'fl-builder'),
                        'default'       => '#cccccc',
                        'show_reset'    => true
                    ), // end button_border
                    
                    'button_radius' => array(
                        'type'          => 'text',
                        'label'         => __('Border Radius', 'fl-builder'),
                        'default'       => '5',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
                    ), // end button_radius   
                    
                    'button_top_padding' => array(
                        'type'          => 'text',
                        'label'         => __('Top/Bottom Padding', 'fl-builder'),
                        'default'       => '5',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
                    ), // end button_top_padding     
                    
                    
                    'button_side_padding' => array(
                        'type'          => 'text',
                        'label'         => __('Side Padding', 'fl-builder'),
                        'default'       => '5',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
                    ), // end button_side_padding  
                    
                    'button_fullwidth' => array(
                        'type'          => 'select',
                        'label'         => __( 'Make Button Full Width', 'fl-builder' ),
                        'default'       => 'no',
                        'options'       => array(
                            'yes'          => __( 'Yes', 'fl-builder' ),
                            'no'    => __( 'No', 'fl-builder' ),
                        ),
                    ), // end button_fullwidth      
                    
                ) // end fields
                  
            ), // end button
            
              'background'  => array(
                'title'         => __( 'Background Style', 'fl-builder' ),
                'fields'        => array(
                    
                    'form_bg' => array(
                        'type'          => 'color',
                        'label'         => __('Background Color', 'fl-builder'),
                        'default'       => '#ffffff',
                        'show_reset'    => true
                    ), // end form_bg
                    
                    'form_border' => array(
                        'type'          => 'color',
                        'label'         => __('Border Color', 'fl-builder'),
                        'default'       => '#cccccc',
                        'show_reset'    => true
                    ), // end form_border  
                    
                    'form_size' => array(
                        'type'          => 'text',
                        'label'         => __('Border Thickness', 'fl-builder'),
                        'default'       => '0',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
                    ), // end form_size   
                    
                    'form_radius' => array(
                        'type'          => 'text',
                        'label'         => __('Border Radius', 'fl-builder'),
                        'default'       => '5',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
                    ), // end form_radius   
                    
                    'form_top_padding' => array(
                        'type'          => 'text',
                        'label'         => __('Top/Bottom Padding', 'fl-builder'),
                        'default'       => '5',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
                    ), // end form_top_padding     
                    
                    
                    'form_side_padding' => array(
                        'type'          => 'text',
                        'label'         => __('Side Padding', 'fl-builder'),
                        'default'       => '5',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
                    ), // end form_side_padding     
                    
                ) // end fields
                  
            ), // end button
            
        ) // end sections
        
    ), // end content-tab
    
) ); 

function sw_get_forms() {    
        $forms = WPCF7_ContactForm::find();  

        $data  = array( 'none' => 'Choose Your Form');

        foreach( $forms as $form ) {
            $data[$form->id] = $form->title;
        }

        return $data;
    }