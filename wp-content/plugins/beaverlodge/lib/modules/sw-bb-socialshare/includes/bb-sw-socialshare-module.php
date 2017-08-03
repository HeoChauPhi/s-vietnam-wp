<?php


class SWSocialShareClass extends FLBuilderModule {

    public function __construct()
    {

        parent::__construct(array(
            'name'          => __( 'Social Share', 'fl-builder' ),
            'description'   => __( 'Add social sharing buttins to your site!', 'fl-builder' ),
            'category'      => BRANDING,
            'dir'           => SW_SOCIALSHARE_MODULE_DIR . '/',
            'url'           => SW_SOCIALSHARE_URL . '/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
        
        $this->add_js('jquery.socialshare.min', $this->url . 'js/jquery.socialshare.min.js', array(), '', true);
        
    }

}

FLBuilder::register_module( 'SWSocialShareClass', array(

    'content-tab'      => array(
        'title'         => __( 'Content', 'fl-builder' ),
        'sections'      => array(
            'content_select'  => array(
                'title'         => __( 'Social Share Select', 'fl-builder' ),
                'fields'        => array(  
                
                    'facebook'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Show Facebook Button', 'fl_builder' ),
                        'default'       => 'yes',
                        'options'       => array(
                            'yes'  => 'Yes',
                            'no'   => 'No',
                        ),
                    ), // end facebook 
                
                    'twitter'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Show Twitter Button', 'fl_builder' ),
                        'default'       => 'yes',
                        'options'       => array(
                            'yes'  => 'Yes',
                            'no'   => 'No',
                        ),
                        'toggle'        => array(
                            'yes'      => array(
                                'fields'        => array('handle', 'tags'),
                            ),
                            'no'      => array()
                        )
                    ), // end twitter 
                
                    'google'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Show Google+ Button', 'fl_builder' ),
                        'default'       => 'yes',
                        'options'       => array(
                            'yes'  => 'Yes',
                            'no'   => 'No',
                        ),
                    ), // end google 
                
                    'linkedin'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Show Linkedin Button', 'fl_builder' ),
                        'default'       => 'yes',
                        'options'       => array(
                            'yes'  => 'Yes',
                            'no'   => 'No',
                        ),
                    ), // end linkedin 
                
                    'pinterest'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Show Pinterest Button', 'fl_builder' ),
                        'default'       => 'yes',
                        'options'       => array(
                            'yes'  => 'Yes',
                            'no'   => 'No',
                        ),
                    ), // end pinterest 
                    
                    'title'     => array(
                        'type'  => 'text',
                        'label' => __( 'Choose Title', 'fl_builder' ),
                        'placeholder'   => 'BeaverBuilder Is the Best',
                    ), // end title
                    
                    'description'     => array(
                        'type'  => 'textarea',
                        'label' => __( 'Choose Post Excerpt', 'fl_builder' ),
                        'rows'          => '10',
                    ), // end description
                    
                    'image'     => array(
                        'type'  => 'photo',
                        'label' => __( 'Choose Image to Show', 'fl_builder' ),
                    ), // end image
                
                    'handle'     => array(
                        'type'  => 'text',
                        'label' => __( 'Choose Twitter Handle', 'fl_builder' ),
                        'placeholder'   => 'BeaverBuilder',
                    ), // end handle
                
                    'tags'     => array(
                        'type'  => 'text',
                        'label' => __( 'Choose Twitter Tags', 'fl_builder' ),
                        'placeholder'   => 'BeaverBuilder, revealthemagic',
                    ), // end tags
                  
                ) // end fields
                
            ) // end content_select
            
        ) // end sections
        
    ), // end content-tab
    
    'layout-tab'      => array(
        'title'         => __( 'Layout', 'fl-builder' ),
        'sections'      => array(
            'layout_select'  => array(
                'title'         => __( 'Social Share Layout', 'fl-builder' ),
                'fields'        => array(  
                
                    'stack'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Vertical or Horizontal', 'fl_builder' ),
                        'default'       => 'inline-block',
                        'options'       => array(
                            'inline-block'  => 'Horizontal',
                            'block'   => 'Vertical',
                        ),
                        'toggle'        => array(
                            'inline-block'      => array(
                                'fields'        => array('align'),
                            ),
                            'block'      => array(
                            'fields'        => array('float', 'position',),
                            ),
                        )
                    ), // end stack 
                    
                    'labels'     => array(
                        'type'          => 'select',
                        'label'         => __( 'Display Labels', 'fl_builder' ),
                        'default'       => 'yes',
                        'options'       => array(
                            'yes'  => 'Yes',
                            'no'   => 'No',
                        ),
                        'toggle'        => array(
                            'yes'      => array(
                                'fields'        => array(),
                            ),
                            'no'      => array(
                            'fields'        => array('hover'),
                            ),
                        )
                    ), // end labels 
                    
                    'hover'    => array(
                        'type'  => 'select',
                        'label' => __( 'Show Labels on Hover', 'fl-builder' ),
                        'default'   => 'yes',
                        'options'   => array(
                            'yes'   => 'Yes',
                            'no'    => 'No',
                        )
                    ), // end hover
                  
                    'align'    => array(
                        'type'  => 'select',
                        'label' => __( 'Align', 'fl-builder' ),
                        'default'   => 'center',
                        'options'   => array(
                            'left'   => 'Left',
                            'center'    => 'Center',
                            'right' => 'Right'
                        )
                    ), // end align
                  
                    'float'    => array(
                        'type'  => 'select',
                        'label' => __( 'Align', 'fl-builder' ),
                        'default'   => 'left',
                        'options'   => array(
                            'left'   => 'Left',
                            'right' => 'Right'
                        )
                    ), // end float
                  
                    'position'    => array(
                        'type'  => 'select',
                        'label' => __( 'Fixed Position', 'fl-builder' ),
                        'default'   => 'no',
                        'options'   => array(
                            'yes'   => 'Yes',
                            'no' => 'No'
                        ),
                        'toggle'        => array(
                            'yes'      => array(
                                'fields'        => array('top'),
                            ),
                            'no'      => array(
                            'fields'        => array(),
                            ),
                        )
                    ), // end position
                  
                    
                    'top'    => array(
                        'type'  => 'text',
                        'label' => __( 'Top Margin', 'fl-builder' ),
                        'default'   => '150',
                        'placeholder'   => '150',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'description'   => 'px'
                    ), // end top
                  
                ) // end fields
                
            ) // end content_select
            
        ) // end sections
        
    ), // end content-tab
    
)); //end class
    