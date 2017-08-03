<?php

class SWToolbarCTAClass extends FLBuilderModule {

    public function __construct()
    {

        parent::__construct(array(
            'name'          => __( 'Toolbar CTA', 'fl-builder' ),
            'description'   => __( 'Add a footer to your site!', 'fl-builder' ),
            'category'      => BRANDING,
            'dir'           => SW_TOOLBAR_CTA_MODULE_DIR . '/',
            'url'           => SW_TOOLBAR_CTA_MODULE_URL . '/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
        
         
    }    
    

}

FLBuilder::register_module( 'SWToolbarCTAClass', array(

    'content'       => array(
        'title'         => __('Content', 'fl-builder'),
        'sections'      => array(
            'general'       => array(
                'title'         => __('Content Selection', 'fl-builder'), 
                'fields'        => array( // Section Fields
                    
                    
                    'title'   => array(
                        'type'          => 'text',
                        'label'         => __('Title', 'fl-builder'),
                        'placeholder'   => __('This is the description', 'fl-builder'),
                    ),
                    
                    'button_text'     => array(
                        'type'          => 'text',
                        'label'         => __('Button Text', 'fl-builder'),
                        'placeholder'       => __('View', 'fl-builder'),
                    ),
                    
                    
                    
                    'link_type'     => array(
                        'type'          => 'select',
                        'label'         => __('Link Type', 'fl-builder'),
                        'default'       => 'url',
                        'options'       => array(
                            'url'       => __('URL', 'fl-builder'),
                            'file'      => __('File Download', 'fl-builder'),
                            'tel'       => __('Phone', 'fl-builder'),
                        ),
                        'toggle'        => array(
                            'url'       => array(
                                'fields'  => array('btn_url_link'),
                            ),
                            'file'       => array(
                                'fields'  => array('btn_file_link'),
                            ),
                            'tel'       => array(
                                'fields'  => array('btn_tel_link'),
                            ),
                        ), // end toggle
                    ),
                    
                    'btn_url_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Button Link', 'fl-builder'),
                    ),
                    
                    'btn_tel_link'     => array(
                        'type'          => 'text',
                        'label'         => __('Button Phone Number', 'fl-builder'),
                        'placeholder'   => __('+999999999', 'fl-builder'),
                    ),
                    
                    'btn_file_link'     => array(
                        'type'          => 'zestsms-pdf',
                        'label'         => __( 'Document File', 'fl-builder' ),
                        'description'   => __( 'Supports: PDF, XLS, PPT, DOC, TXT, RTF', 'fl-builder' ),
                    ),
                    
                    'location'     => array(
                        'type'          => 'select',
                        'label'         => __('CTA Location', 'fl-builder'),
                        'default'       => 'top',
                        'options'       => array(
                            'top'       => __('Top of Page', 'fl-builder'),
                            'bottom'    => __('Bottom of Page', 'fl-builder'),
                        ),
                    ),
                )
            )
        )
    ), // end content

    'style'       => array(
        'title'         => __('Style', 'fl-builder'),
        'sections'      => array(
            'general'       => array(
                'title'         => __('Style', 'fl-builder'), 
                'fields'        => array(                  
                    
                    'title_color'   => array(
                        'type'          => 'color',
                        'label'         => __( 'Title Colour', 'fl-builder' ),
                        'default'       => 'ffffff',
                        'show_reset'    => true
                    ), 
                    
                    'font' => array(
                        'type'          => 'font',
                        'label'         => __( 'Font', 'fl-builder' ),
                        'default'       => array(
                            'family'        => 'Default',
                        )
                    ),
                    
                    'font_size' => array(
                        'type'          => 'text',
                        'label'         => __( 'Font Size', 'fl-builder' ),
                        'default'       => '18',
                        'description'   => 'px',
                        'maxlength'     => '2',
                        'size'          => '3',
                    ),
                    
                    'btn_color'   => array(
                        'type'          => 'color',
                        'label'         => __( 'Button Text Colour', 'fl-builder' ),
                        'default'       => 'ffffff',
                        'show_reset'    => true
                    ), 
                    
                    'btn_hover_color'   => array(
                        'type'          => 'color',
                        'label'         => __( 'Button Text Hover Colour', 'fl-builder' ),
                        'default'       => 'ffffff',
                        'show_reset'    => true
                    ),                
                    
                    'btn_bg_color'   => array(
                        'type'          => 'color',
                        'label'         => __( 'Button Background Colour', 'fl-builder' ),
                        'default'       => '',
                        'show_reset'    => true
                    ),               
                                    
                    
                    'btn_hover_bg_color'   => array(
                        'type'          => 'color',
                        'label'         => __( 'Button Background Hover Colour', 'fl-builder' ),
                        'default'       => '',
                        'show_reset'    => true
                    ),               
                    
                    'btn_border_color'   => array(
                        'type'          => 'color',
                        'label'         => __( 'Button Border Colour', 'fl-builder' ),
                        'default'       => 'ffffff',
                        'show_reset'    => true
                    ),                 
                    
                    'btn_hover_border_color'   => array(
                        'type'          => 'color',
                        'label'         => __( 'Button Border Hover Colour', 'fl-builder' ),
                        'default'       => 'ffffff',
                        'show_reset'    => true
                    ),               
                    
                    'bg_color'   => array(
                        'type'          => 'color',
                        'label'         => __( 'Background Colour', 'fl-builder' ),
                        'default'       => 'b20022',
                        'show_reset'    => true
                    ),      
                )
            )
        )
    ), // end style

));
                           
                        