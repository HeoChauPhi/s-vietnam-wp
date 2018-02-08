<?php


class SWHeadingModule extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		
        parent::__construct(array(
			'name'          	=> __('Heading', 'fl-builder'),
			'description'   	=> __('Display a title/page heading.', 'fl-builder'),
			'category'          => BRANDING,
			'partial_refresh'	=> true,
            'dir'               => SW_HEADING_MODULE_DIR . '/',
            'url'               => SW_HEADING_MODULE_URL . '/',
		));
	}
}

FLBuilder::register_module('SWHeadingModule', array(
	'general'       => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
                    
                    'content_type'   => array(
						'type'          => 'select',
						'label'         => __('Content Type', 'fl-builder'),
						'default'       => 'text',
						'options'       => array(
							'text'       =>  __('Text', 'fl-builder'),
							'icon'        =>  __('Icon', 'fl-builder')
						),
						'toggle'        => array(
							'text'        => array(
								'fields'        => array('heading', 'font')
							),
							'icon'        => array(
								'fields'        => array('icon')
							),
						),
                    ),
                    
					'heading'        => array(
						'type'            => 'text',
						'label'           => __('Heading', 'fl-builder'),
						'default'         => '',
						'preview'         => array(
							'type'            => 'text',
							'selector'        => '.fl-heading-text'
						)
					),
                    
					'icon'        => array(
						'type'            => 'icon',
						'label'           => __('Icon', 'fl-builder'),
						'default'         => '',
					),
				)
			),
			'link'          => array(
				'title'         => __('Link', 'fl-builder'),
				'fields'        => array(
					'link'          => array(
						'type'          => 'link',
						'label'         => __('Link', 'fl-builder'),
						'preview'         => array(
							'type'            => 'none'
						)
					),
					'link_target'   => array(
						'type'          => 'select',
						'label'         => __('Link Target', 'fl-builder'),
						'default'       => '_self',
						'options'       => array(
							'_self'         => __('Same Window', 'fl-builder'),
							'_blank'        => __('New Window', 'fl-builder')
						),
						'preview'         => array(
							'type'            => 'none'
						)
					)
				)
			)
		)
	),
	'style'         => array(
		'title'         => __('Style', 'fl-builder'),
		'sections'      => array(
			'colors'        => array(
				'title'         => __('Colors', 'fl-builder'),
				'fields'        => array(
					'color'          => array(
						'type'          => 'color',
						'show_reset'    => true,
						'label'         => __('Text Color', 'fl-builder')
					),
				)
			),
			'structure'     => array(
				'title'         => __('Structure', 'fl-builder'),
				'fields'        => array(
					'd_alignment'     => array(
						'type'          => 'select',
						'label'         => __('Alignment', 'fl-builder'),
						'default'       => 'left',
						'options'       => array(
							'left'      =>  __('Left', 'fl-builder'),
							'center'    =>  __('Center', 'fl-builder'),
							'right'     =>  __('Right', 'fl-builder')
						),
						'preview'         => array(
							'type'            => 'css',
							'selector'        => '.fl-heading',
							'property'        => 'text-align'
						)
					),
                    'show_border'   => array(
						'type'          => 'select',
						'label'         => __('Show Borders', 'fl-builder'),
						'default'       => 'yes',
						'options'       => array(
							'yes'       =>  __('Yes', 'fl-builder'),
							'no'        =>  __('No', 'fl-builder')
						),
						'toggle'        => array(
							'yes'        => array(
								'fields'        => array('border_style', 'border_width', 'border_length', 'border_margin', 'border_colour', 'border_color', 'border_position')
							),
							'no'        => array(
								'fields'        => array('')
							),
						),
                        ),
                    'border_position'   => array(
						'type'          => 'select',
						'label'         => __('Border Position', 'fl-builder'),
						'default'       => 'side',
						'options'       => array(
							'side'       =>  __('Either Side', 'fl-builder'),
							'below'        =>  __('Below', 'fl-builder'),
							'above'        =>  __('Above', 'fl-builder'),
							'left'        =>  __('Left Only', 'fl-builder'),
							'right'        =>  __('Right Only', 'fl-builder'),
						),				
					),
                    'border_style' => array(
						'type'          => 'select',
						'label'         => __('Border Style', 'fl-builder'),
						'default'       => 'solid',
						'options'       => array(
							'solid'        =>  __('Solid', 'fl-builder'),
							'dotted'       =>  __('Dotted', 'fl-builder'),
							'dashed'        =>  __('Dashed', 'fl-builder'),
							'groove'        =>  __('Groove', 'fl-builder'),
							'ridge'        =>  __('Ridge', 'fl-builder'),
						),						
					),
                    'border_width' => array(
						'type'          => 'text',
						'label'         => __('Border Thickness', 'fl-builder'),
						'default'       => '2',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
                    'border_length' => array(
						'type'          => 'text',
						'label'         => __('Border Length', 'fl-builder'),
						'default'       => '100',
						'maxlength'     => '4',
						'size'          => '5',
						'description'   => 'px'
					),
                    'border_margin' => array(
						'type'          => 'text',
						'label'         => __('Heading Padding', 'fl-builder'),
						'default'       => '20',
						'maxlength'     => '4',
						'size'          => '5',
						'description'   => 'px'
					),
                    'border_colour' => array(
						'type'          => 'select',
						'label'         => __('Border Colour', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('border_color')
							),
						),						
					),
                    'border_color'          => array(
						'type'          => 'color',
						'show_reset'    => true,
						'label'         => __('Custom Border Color', 'fl-builder')
					),
					'tag'           => array(
						'type'          => 'select',
						'label'         => __( 'HTML Tag', 'fl-builder' ),
						'default'       => 'h3',
						'options'       => array(
							'h1'            =>  'h1',
							'h2'            =>  'h2',
							'h3'            =>  'h3',
							'h4'            =>  'h4',
							'h5'            =>  'h5',
							'h6'            =>  'h6'
						)
					),
					'font'          => array(
						'type'          => 'font',
						'default'		=> array(
							'family'		=> 'Default',
							'weight'		=> 300
						),
						'label'         => __('Font', 'fl-builder'),
						'preview'         => array(
							'type'            => 'font',
							'selector'        => '.fl-heading-text'
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
						'default'       => '24',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
                    
				)
			),
			'r_structure'   => array(
				'title'         => __( 'Mobile Structure', 'fl-builder' ),
				'fields'        => array(
					'r_alignment'   => array(
						'type'          => 'select',
						'label'         => __('Alignment', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('r_custom_alignment')
							)
						),
						'preview'         => array(
							'type'            => 'none'
						)
					),
					'r_custom_alignment' => array(
						'type'          => 'select',
						'label'         => __('Custom Alignment', 'fl-builder'),
						'default'       => 'center',
						'options'       => array(
							'left'      =>  __('Left', 'fl-builder'),
							'center'    =>  __('Center', 'fl-builder'),
							'right'     =>  __('Right', 'fl-builder')
						),
						'preview'         => array(
							'type'            => 'none'
						)
					),
					'r_font_size'   => array(
						'type'          => 'select',
						'label'         => __('Font Size', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('r_custom_font_size')
							)
						),
						'preview'         => array(
							'type'            => 'none'
						)
					),
					'r_custom_font_size' => array(
						'type'          => 'text',
						'label'         => __('Custom Font Size', 'fl-builder'),
						'default'       => '24',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'         => array(
							'type'            => 'none'
						)
					)
				)
			)
		)
	)
));