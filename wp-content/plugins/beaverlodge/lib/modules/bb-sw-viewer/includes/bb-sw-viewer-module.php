<?php

class SWViewerClass extends FLBuilderModule {

    public function __construct()
    {

        parent::__construct(array(
            'name'          => __( 'Document Viewer', 'fl-builder' ),
            'description'   => __( 'Add clean document viewer to your site!', 'fl-builder' ),
            'category'      => BRANDING,
            'dir'           => SW_VIEWER_MODULE_DIR . '/',
            'url'           => SW_VIEWER_MODULE_URL . '/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
        
        
        $this->add_js('zestsms-pdf.js', $this->url . 'js/zestsms-pdf.js', array(), '', true);
        $this->add_css('zestsms-pdf.css', $this->url . 'css/zestsms-pdf.css');
        
    }    
    
}

FLBuilder::register_module( 'SWViewerClass', array(
    
    'pdf-tab'      => array(
        'title'         => __( 'Content', 'fl-builder' ),
        'sections'      => array(
            'pdf_select'  => array(
                'title'         => __( 'Document Viewer', 'fl-builder' ),
                'fields'        => array(
                    
                    'sw_pdf_title'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Document Title', 'fl-builder' ),
                        'default'       => 'PDF File',
                        'placeholder'   => 'PDF File',
                    ),
                    
                    'sw_pdf_location'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Document Location', 'fl-builder' ),
                        'default'       => 'external',
                        'options'       => array(
                            'local'     => __( 'Local File', 'fl-builder' ),
                            'external'  => __( 'External File', 'fl-builder' ),
                        ),
                        'toggle'        => array(
							'local'        => array(
								'fields'  => array('sw_pdf_file')
							),
							'external'      => array(
								'fields'  => array('sw_pdf_url'),
							),
						),
                    ),
                    
                    'sw_pdf_file'     => array(
                        'type'          => 'zestsms-pdf',
                        'label'         => __( 'Document File', 'fl-builder' ),
                        'description'   => __( 'Supports: PDF, XLS, PPT, DOC, TXT, RTF', 'fl-builder' ),
                    ),
                    
                    'sw_pdf_url'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Document URL', 'fl-builder' ),
                        'default'       => '',
                        'placeholder'   => 'http://yourdomain.com/pdfSample.pdf',
                        'description'   => __( 'Supports: PDF, XLS, PPT, DOC, TXT, RTF', 'fl-builder' ),
                    ),
                    
                    'sw_pdf_height'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Height', 'fl-builder' ),
                        'default'       => '400',
                        'maxlength'     => '4',
                        'size'          => '5',
                        'description'   => 'px',
                    ),
                    
                    'sw_pdf_width'     => array(
                        'type'          => 'text',
                        'label'         => __( 'Width', 'fl-builder' ),
                        'default'       => '500',
                        'maxlength'     => '4',
                        'size'          => '5',
                        'description'   => 'px',
                    ),
                    
                    'sw_pdf_align'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Alignment', 'fl-builder' ),
                        'default'       => 'left',
                        'options'       => array(
                            'left'      => __( 'Left', 'fl-builder' ),
                            'center'    => __( 'Center', 'fl-builder' ),
                            'right'     => __( 'Right', 'fl-builder' ),
                        ),
                    ),
                    
                    'sw_pdf_class'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Title Class', 'fl-builder' ),
                        'default'       => '2',
                        'options'       => array(
                            '1'         => 'H1',
                            '2'         => 'H2',
                            '3'         => 'H3',
                            '4'         => 'H4',
                            '5'         => 'H5',
                            '6'         => 'H6',
                        ),
                    ),
                    
                    'sw_pdf_download'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Hide Download Links', 'fl-builder' ),
                        'default'       => 'no',
                        'options'       => array(
                            'no'         => __( 'No', 'fl-builder' ),
                            'yes'         => __( 'Yes', 'fl-builder' ),
                        ),
                    ),
                    
                )
            )
        )
    ),
    
) ); 
