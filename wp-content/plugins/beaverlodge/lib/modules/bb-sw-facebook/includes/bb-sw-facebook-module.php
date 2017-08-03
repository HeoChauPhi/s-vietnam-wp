<?php

class SWFacebookClass extends FLBuilderModule {

    public function __construct()
    {
       
        parent::__construct(array(
            'name'          => __( 'Facebook Page Feed', 'fl-builder' ),
            'description'   => __( 'Add Facebook Page content to your site!', 'fl-builder' ),
            'category'      => BRANDING,
            'dir'           => SW_FACEBOOK_MODULE_DIR . '/',
            'url'           => SW_FACEBOOK_MODULE_URL . '/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));  
        
        $this->add_js('query.fb.albumbrowser.js', $this->url . 'js/query.fb.albumbrowser.js', array(), '', true);
        
    }  
    
}

FLBuilder::register_module( 'SWFacebookClass', array(
    
    
    

    'content-tab'       => array(
        'title'         => __('Content Settings', 'fl-builder'),
        
        'sections'      => array(
            
            'selection'       => array(
                'title'         => __('API', 'fl-builder'), 
                'fields'        => array( // Section Fields
                    
                    'pageName'     => array(
                        'type'          => 'text',
                        'label'         => __('Facebook Page Name', 'fl-builder'),
                        'help'          => 'Please see the name that is displayed in the Page URL eg: for Beaver Builder the url is https://www.facebook.com/wpbeaverbuilder/ so use wpbeaverbuilder',
                    ), // end pageName
                    
                    'showAccountInfo'     => array(
                        'type'          => 'select',
                        'label'         => __('Show Page Info', 'fl-builder'),
                        'default'       => 'true',
                        'options'   => array(
                            'true'  => 'true',
                            'false' => 'false'
                        ),
                        'help'          => 'Display Page Name and link in the header',
                    ), // end showAccountInfo
                    
                    'showImageCount'     => array(
                        'type'          => 'select',
                        'label'         => __('Show Image Count', 'fl-builder'),
                        'default'       => 'true',
                        'options'   => array(
                            'true'  => 'true',
                            'false' => 'false'
                        ),
                        'help'          => 'Display number of images contained in each album',
                    ), // end showImageCount
                    
                    'showImageText'     => array(
                        'type'          => 'select',
                        'label'         => __('Show Image Description', 'fl-builder'),
                        'default'       => 'true',
                        'options'   => array(
                            'true'  => 'true',
                            'false' => 'false'
                        ),
                        'help'          => 'Display images descriptions',
                    ), // end showImageCount
                    
                    'lightbox'     => array(
                        'type'          => 'select',
                        'label'         => __('Use Lightbox', 'fl-builder'),
                        'default'       => 'true',
                        'options'   => array(
                            'true'  => 'true',
                            'false' => 'false'
                        ),
                        'help'          => 'Display images as a lightbox popup',
                    ), // end lightbox
                    
                    'photosCheckbox'     => array(
                        'type'          => 'select',
                        'label'         => __('Use Checkbox', 'fl-builder'),
                        'default'       => 'false',
                        'options'   => array(
                            'true'  => 'true',
                            'false' => 'false'
                        ),
                        'help'          => 'Display photo checkbox',
                    ), // end photosCheckbox
                    
                    'showComments'     => array(
                        'type'          => 'select',
                        'label'         => __('Show Comments', 'fl-builder'),
                        'default'       => 'true',
                        'options'   => array(
                            'true'  => 'true',
                            'false' => 'false'
                        ),
                        'help'          => 'Display photo comments',
                    ), // end showComments
                    
                    'excludeAlbums'     => array(
                        'type'          => 'text',
                        'label'         => __('Exclude Albums', 'fl-builder'),
                        'help'          => 'Choose which albums to ignore',
                        'placeholder'   => 'Profile Pictures',
                        'multiple'      => true,
                    ), // end excludeAlbums
                    
                    'thumbnailSize'     => array(
                        'type'          => 'text',
                        'label'         => __('Thumnail Size', 'fl-builder'),
                        'help'          => 'Choose the size of thumbnails',
                        'placeholder'   => '150',
                        'default'      => '150',
                        'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
                    ), // end thumbnailSize
                    
                )
            ), // end selection section
    
        
        )
    ), // end content-tab

    
   
));
                        