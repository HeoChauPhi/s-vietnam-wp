<?php

class SWInstagramClass extends FLBuilderModule {

    public function __construct()
    {

        parent::__construct(array(
            'name'          => __( 'Instagram Feed', 'fl-builder' ),
            'description'   => __( 'Add Instgram content to your site!', 'fl-builder' ),
            'category'      => BRANDING,
            'dir'           => SW_INSTAGRAM_MODULE_DIR . '/',
            'url'           => SW_INSTAGRAM_MODULE_URL . '/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));  
        
        $this->add_js('jquery.instastream.js', $this->url . 'js/jquery.instastream.js', array(), '', true);
        $this->add_css('jquery.instastream.css', $this->url . 'css/jquery.instastream.css');
    }  
    
}

FLBuilder::register_module( 'SWInstagramClass', array(
    
    
    

    'content-tab'       => array(
        'title'         => __('Content Settings', 'fl-builder'),
        
        'sections'      => array(
            
            'selection'       => array(
                'title'         => __('API', 'fl-builder'), 
                'fields'        => array( // Section Fields
                    
                    'userId'     => array(
                        'type'          => 'text',
                        'label'         => __('Instagram User ID', 'fl-builder'),
                        'help'          => 'Please see this ReadMe tab for instructions on how to obtain API Information',
                    ), // end userId
                    
                    'userToken'     => array(
                        'type'          => 'text',
                        'label'         => __('Instagram User Token', 'fl-builder'),
                        'default'       => '',
                        'help'          => 'Please see this ReadMe tab for instructions on how to obtain API Information',
                    ), // end userToken
                    
                )
            ), // end selection section
            
            
            'layout'       => array(
                'title'         => __('Layout', 'fl-builder'), 
                'fields'        => array( // Section Fields
                    
                    'instaPage'     => array(
                        'type'          => 'select',
                        'label'         => __('Pagination', 'fl-builder'),
                        'default'       => 'yes',
                        'help'          => 'Choose whether to have pagination',
                        'options'       => array(
                                'no'  => 'No',
                                'yes'    => 'Yes',
                            ),
                        'toggle'        => array(
                            'yes'      => array(
                                'fields'        => array( 'instaNextIcon', 'instaPrevIcon', 'instaIconSize' ),
                            ),
                        ),
                    ), // end instaPage
                    
                    'instaNextIcon'     => array(
                        'type'          => 'icon',
                        'label'         => __('Next Icon', 'fl-builder'),
                    ), // end instaNextIcon
                    
                    'instaPrevIcon'     => array(
                        'type'          => 'icon',
                        'label'         => __('Prev Icon', 'fl-builder'),
                    ), // end instaPrevIcon
                    
                    'instaIconSize'     => array(
                        'type'          => 'text',
                        'label'         => __('Icon Size', 'fl-builder'),
                        'default'       => '24',
                        'placeholder'   => '24',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'description'   => 'px',
                    ), // end instaIconSize
                    
                    
                    'instaQty'     => array(
                        'type'          => 'text',
                        'label'         => __('Qty Per Page', 'fl-builder'),
                        'default'       => '3',
                        'placeholder'   => '3',
                        'maxlength'     => '4',
                        'size'          => '5',
                        'help'          => 'How many would you like to display from your feed',
                    ), // end instaQty
                    
                    'instaSize'     => array(
                        'type'          => 'text',
                        'label'         => __('Image Width', 'fl-builder'),
                        'default'       => '100',
                        'placeholder'   => '100',
                        'maxlength'     => '4',
                        'size'          => '5',
                        'description'   => 'px',
                        'help'          => 'How big would you like your images',
                    ), // end instaSize
                    
                    'instaHeader'     => array(
                        'type'          => 'select',
                        'label'         => __('Display Description', 'fl-builder'),
                        'default'       => 'yes',
                        'help'          => 'Choose whether to display your description',
                        'options'       => array(
                                'no'  => 'No',
                                'yes'    => 'Yes',
                            ),
                    ), // end instaHeader
                    
                    'instaMeta'     => array(
                        'type'          => 'select',
                        'label'         => __('Display Meta', 'fl-builder'),
                        'default'       => 'yes',
                        'help'          => 'Choose whether to display your meta info',
                        'options'       => array(
                                'no'  => 'No',
                                'yes'    => 'Yes',
                            ),
                    ), // end instaMeta                    
                    
                    'instaMarginLeft'     => array(
                        'type'          => 'text',
                        'label'         => __('Margin Left', 'fl-builder'),
                        'default'       => '0',
                        'placeholder'   => '0',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'description'   => 'px',
                    ), // end instaMarginLeft
                    
                    'instaMarginRight'     => array(
                        'type'          => 'text',
                        'label'         => __('Margin Right', 'fl-builder'),
                        'default'       => '0',
                        'placeholder'   => '0',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'description'   => 'px',
                    ), // end instaMarginRight
                    
                    'instaMarginTop'     => array(
                        'type'          => 'text',
                        'label'         => __('Margin Top', 'fl-builder'),
                        'default'       => '0',
                        'placeholder'   => '0',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'description'   => 'px',
                    ), // end instaMarginTop
                    
                    'instaMarginBottom'     => array(
                        'type'          => 'text',
                        'label'         => __('Margin Bottom', 'fl-builder'),
                        'default'       => '0',
                        'placeholder'   => '0',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'description'   => 'px',
                    ), // end instaMarginBottom
                    
                    
                )
            ), // end selection section
            
            
        
        )
    ), // end content-tab

    
    'readme-tab'       => array(
        'title'         => __('ReadMe', 'fl-builder'),
        
        'sections'      => array(
            
            'read'       => array(
                'title'         => __('Instructions', 'fl-builder'), 
                'fields'        => array( // Section Fields
                    
                    'readMe'     => array(
                        'type'          => 'insta-readme',
                    ), // end readMe
                    
                )
            ), // end read section
            
        
        )
    ), // end readme-tab

    
    

));
                        