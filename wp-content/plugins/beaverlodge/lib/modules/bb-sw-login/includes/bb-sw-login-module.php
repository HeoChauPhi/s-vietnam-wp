<?php


class SWLoginClass extends FLBuilderModule {

    public function __construct()
    {
        parent::__construct(array(
            'name'              => __( 'Login Form', 'fl-builder' ),
            'description'       => __( 'Login Form', 'fl-builder' ),
            'category'          => BRANDING,
            'partial_refresh'   => true,
            'dir'               => SW_LOGIN_MODULE_DIR . '/',
            'url'               => SW_LOGIN_MODULE_URL . '/',
        ));
        
        
    } 
    
    
}

FLBuilder::register_module( 'SWLoginClass', array(
    
    'content-tab'      => array(
        
        'title'         => __( 'Content', 'fl-builder' ),
        'sections'      => array( 
            
              'content'  => array(
                'title'         => __( 'Login Information', 'fl-builder' ),
                'fields'        => array(
                    
                    'redirect'   => array(
						'type'          => 'select',
						'label'         => __('Redirection', 'fl-builder'),
						'default'       => 'get_home_url',
						'options'       => array(
							'home'      =>  __('Home Page', 'fl-builder'),
							'referrer'   =>  __('Previous Page', 'fl-builder'),
							'custom'            =>  __('Custom URL', 'fl-builder'),
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('url_redirect'),
							),
						),
                    ),
                    
                    'remember'   => array(
						'type'          => 'select',
						'label'         => __('Show Remember Me Field', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'      =>  __('Yes', 'fl-builder'),
							'false'     =>  __('No', 'fl-builder'),
						),
						'toggle'        => array(
							'true'        => array(
								'fields'        => array('label_remember'),
							),
						),
                    ),
                    
                    'url_redirect' => array(
                        'type'          => 'link',
                        'label'         => __('Redirect after Login', 'fl-builder'),
                        'default'       => '/',
                        'placeholder'   => '/',
                    ), // end url_redirect
                    
                    'label_username'     => array(
                        'type'          => 'text',
                        'label'         => __('Username Label', 'fl-builder'),
                        'default'       => 'Username or Email',
                    ), // end label_username
                    
                    'label_password'     => array(
                        'type'          => 'text',
                        'label'         => __('Password Label', 'fl-builder'),
                        'default'       => 'Password',
                    ), // end label_password
                    
                    'label_remember'     => array(
                        'type'          => 'text',
                        'label'         => __('Remember Me Label', 'fl-builder'),
                        'default'       => 'Remember Me',
                    ), // end label_remember
                    
                    'label_login'     => array(
                        'type'          => 'text',
                        'label'         => __('Login Button', 'fl-builder'),
                        'default'       => 'Login',
                    ), // end label_login
//                    
//                    'paswword_reset'   => array(
//						'type'          => 'select',
//						'label'         => __('Show Password Reset Link', 'fl-builder'),
//						'default'       => 'true',
//						'options'       => array(
//							'true'      =>  __('Yes', 'fl-builder'),
//							'false'     =>  __('No', 'fl-builder'),
//						),
//						'toggle'        => array(
//							'true'        => array(
//								'fields'        => array('lost_password', 'password_url'),
//							),
//						),
//                    ),
                    
                    'lost_password'     => array(
                        'type'          => 'text',
                        'label'         => __('Password Reset Text', 'fl-builder'),
                        'default'       => 'Lost Password?',
                    ),
                    
                    'password_url'     => array(
                        'type'          => 'link',
                        'label'         => __('Password URL', 'fl-builder'),
                    ),
                    
                ) // end fields
                  
            ) // end content
            
        ) // end sections
        
    ), // end content-tab
    
    'style-tab'      => array(
        
        'title'         => __( 'Style', 'fl-builder' ),
        'sections'      => array( 
            
              'labels'  => array(
                'title'         => __( 'Labels', 'fl-builder' ),
                'fields'        => array(
                    
                    'label_color' => array(
                        'type'          => 'color',
                        'label'         => __('Label Colour', 'fl-builder'),
                        'default'       => '808080',
                        'show_reset'    => true
                    ), // end label_color
                    
                    'label_font' => array(
                        'type'          => 'font',
                        'label'         => __( 'Label Font', 'fl-builder' ),
                        'default'       => array(
                            'family'        => 'Helvetica',
                            'weight'        => 300
                        )
                    ), // end label_font
                    
                    'label_size'     => array(
                        'type'          => 'text',
                        'label'         => __('Label Font Size', 'fl-builder'),
                        'default'       => '14',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'description'   => 'px',
                    ), // end label_size
                    
                    'label_margin'     => array(
                        'type'          => 'text',
                        'label'         => __('Label Margin - Bottom', 'fl-builder'),
                        'default'       => '5',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'description'   => 'px',
                    ), // end label_margin
                    
                ) // end fields
                  
            ), // end labels
            
              'inputs'  => array(
                'title'         => __( 'Fields', 'fl-builder' ),
                'fields'        => array(
                    
                    'input_color' => array(
                        'type'          => 'color',
                        'label'         => __('Input Font Colour', 'fl-builder'),
                        'default'       => '808080',
                        'show_reset'    => true
                    ), // end label_color
                    
                    'input_font' => array(
                        'type'          => 'font',
                        'label'         => __( 'Input Font', 'fl-builder' ),
                        'default'       => array(
                            'family'        => 'Helvetica',
                            'weight'        => 300
                        )
                    ), // end input_font
                    
                    'input_size'     => array(
                        'type'          => 'text',
                        'label'         => __('Input Font Size', 'fl-builder'),
                        'default'       => '14',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'description'   => 'px',
                    ), // end label_size
                    
                    'input_bg_color' => array(
                        'type'          => 'color',
                        'label'         => __('Input Background Colour', 'fl-builder'),
                        'default'       => 'fcfcfc',
                        'show_reset'    => true
                    ), // end input_bg_color
                    
                    'input_border_color' => array(
                        'type'          => 'color',
                        'label'         => __('Input Border Colour', 'fl-builder'),
                        'default'       => 'e6e6e6',
                        'show_reset'    => true
                    ), // end input_border_color
                    
                    'input_border_radius'     => array(
                        'type'          => 'text',
                        'label'         => __('Input Border Radius', 'fl-builder'),
                        'default'       => '4',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'description'   => 'px',
                    ), // end input_border_radius
                    
                    'input_top_padding'     => array(
                        'type'          => 'text',
                        'label'         => __('Input Padding - Top/Bottom', 'fl-builder'),
                        'default'       => '6',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'description'   => 'px',
                    ), // end input_top_padding
                    
                    'input_side_padding'     => array(
                        'type'          => 'text',
                        'label'         => __('Input Padding - Sides', 'fl-builder'),
                        'default'       => '10',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'description'   => 'px',
                    ), // end input_side_padding
                    
                    'input_height'     => array(
                        'type'          => 'text',
                        'label'         => __('Input Height', 'fl-builder'),
                        'default'       => '34',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'description'   => 'px',
                    ), // end input_height
                    
                ) // end fields
                  
            ), // end inputs
            
              'submit'  => array(
                'title'         => __( 'Submit', 'fl-builder' ),
                'fields'        => array(
                    
                    'submit_color' => array(
                        'type'          => 'color',
                        'label'         => __('Submit Font Colour', 'fl-builder'),
                        'default'       => 'ffffff',
                        'show_reset'    => true
                    ), // end submit_color
                    
                    'submit_font' => array(
                        'type'          => 'font',
                        'label'         => __( 'Submit Font', 'fl-builder' ),
                        'default'       => array(
                            'family'        => 'Helvetica',
                            'weight'        => 300
                        )
                    ), // end submit_font
                    
                    'submit_size'     => array(
                        'type'          => 'text',
                        'label'         => __('Submit Font Size', 'fl-builder'),
                        'default'       => '14',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'description'   => 'px',
                    ), // end submit_size
                    
                    'submit_bg_color' => array(
                        'type'          => 'color',
                        'label'         => __('Submit Background Colour', 'fl-builder'),
                        'default'       => '428bca',
                        'show_reset'    => true
                    ), // end submit_bg_color
                    
                    'submit_border_color' => array(
                        'type'          => 'color',
                        'label'         => __('Submit Border Colour', 'fl-builder'),
                        'default'       => '2d6ca2',
                        'show_reset'    => true
                    ), // end submit_border_color
                    
                    'submit_border_radius'     => array(
                        'type'          => 'text',
                        'label'         => __('Submit Border Radius', 'fl-builder'),
                        'default'       => '4',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'description'   => 'px',
                    ), // end submit_border_radius
                    
                    'submit_top_padding'     => array(
                        'type'          => 'text',
                        'label'         => __('Submit Padding - Top/Bottom', 'fl-builder'),
                        'default'       => '6',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'description'   => 'px',
                    ), // end submit_top_padding
                    
                    'submit_side_padding'     => array(
                        'type'          => 'text',
                        'label'         => __('Submit Padding - Sides', 'fl-builder'),
                        'default'       => '10',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'description'   => 'px',
                    ), // end submit_side_padding
                    
                ) // end fields
                  
            ), // end labels
            
        ) // end sections
        
    ), // end content-tab
    
) ); 