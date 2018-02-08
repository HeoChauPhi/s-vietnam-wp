<?php


class SWPasswordClass extends FLBuilderModule {

    public function __construct()
    {
        parent::__construct(array(
            'name'              => __( 'Password Reset Form', 'fl-builder' ),
            'description'       => __( 'Password Reset Form', 'fl-builder' ),
            'category'          => BRANDING,
            'partial_refresh'   => true,
            'dir'               => SW_PASSWORD_MODULE_DIR . '/',
            'url'               => SW_PASSWORD_MODULE_URL . '/',
        ));
        
        
    }    
    
}

FLBuilder::register_module( 'SWPasswordClass', array(
    
    'content-tab'      => array(
        
        'title'         => __( 'Content', 'fl-builder' ),
        'sections'      => array( 
            
              'content'  => array(
                'title'         => __( 'Form Info', 'fl-builder' ),
                'fields'        => array(
                    
                    'no_email' => array(
                        'type'          => 'text',
                        'label'         => __('No email entererd warning', 'fl-builder'),
                        'default'       => 'Enter your e-mail address.',
                    ), // end no_email
                    
                    'invalid_email' => array(
                        'type'          => 'text',
                        'label'         => __('Invalid email entererd warning', 'fl-builder'),
                        'default'       => 'Invalid e-mail address.',
                    ), // end invalid_email
                    
                    'non_email' => array(
                        'type'          => 'text',
                        'label'         => __('No email registered warning', 'fl-builder'),
                        'default'       => 'There is no user registered with that email address.',
                    ), // end non_email
                    
                    'success_msg' => array(
                        'type'          => 'text',
                        'label'         => __('Success Message', 'fl-builder'),
                        'default'       => 'SUCCESS! Your new password will be emailed to you shortly.',
                    ), // end success_msg
                    
                    'failed_msg' => array(
                        'type'          => 'text',
                        'label'         => __('Failed Message', 'fl-builder'),
                        'default'       => 'Oops something went wrong updaing your account.',
                    ), // end failed_msg
                    
                ) // end fields
                  
            ) // end content
            
        ) // end sections
        
    ), // end content-tab
    
) ); 