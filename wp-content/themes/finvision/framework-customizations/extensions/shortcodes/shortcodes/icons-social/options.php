<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'social_icons' => array(
		'type'            => 'addable-box',
		'value'           => '',
		'label'           => esc_html__( 'Social Buttons', 'finvision' ),
		'desc'            => esc_html__( 'Optional social buttons', 'finvision' ),
		'template'        => '{{=icon}}',
		'box-options'     => array(
			'icon'       => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Social Icon', 'finvision' ),
				'set'   => 'social-icons',
			),
			'icon_text'       => array(
				'type'  => 'text',
				'label' => esc_html__( 'Social Icon Text', 'finvision' ),
				'desc'  => esc_html__( 'This text displayed instead of icon for "Text Icon"', 'finvision' )
			),
			'icon_class' => array(
				'type'        => 'select',
				'value'       => '',
				'label'       => esc_html__( 'Icon type', 'finvision' ),
				'desc'        => esc_html__( 'Select one of predefined social button types', 'finvision' ),
				'choices'     => array(
					''                                    => esc_html__( 'Default', 'finvision' ),
					'text-icon'                           => esc_html__( 'Text Icon', 'finvision' ),
					'dark-icon'                           => esc_html__( 'Dark Icon', 'finvision' ),
					'border-icon'                         => esc_html__( 'Simple Bordered Icon', 'finvision' ),
					'border-icon rounded-icon'            => esc_html__( 'Rounded Bordered Icon', 'finvision' ),
					'bg-icon'                             => esc_html__( 'Simple Background Icon', 'finvision' ),
					'bg-icon rounded-icon'                => esc_html__( 'Rounded Background Icon', 'finvision' ),
					'color-icon bg-icon'                  => esc_html__( 'Color Light Background Icon', 'finvision' ),
					'color-icon bg-icon rounded-icon'     => esc_html__( 'Color Light Background Rounded Icon', 'finvision' ),
					'color-icon'                          => esc_html__( 'Color Icon', 'finvision' ),
					'color-icon border-icon'              => esc_html__( 'Color Bordered Icon', 'finvision' ),
					'color-icon border-icon rounded-icon' => esc_html__( 'Rounded Color Bordered Icon', 'finvision' ),
					'color-bg-icon'                       => esc_html__( 'Color Background Icon', 'finvision' ),
					'color-bg-icon rounded-icon'          => esc_html__( 'Rounded Color Background Icon', 'finvision' ),

				),
				/**
				 * Allow save not existing choices
				 * Useful when you use the select to populate it dynamically from js
				 */
				'no-validate' => false,
			),
			'icon_url'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Icon Link', 'finvision' ),
				'desc'  => esc_html__( 'Provide a URL to your icon', 'finvision' ),
			)
		),
		'limit'           => 0, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'finvision' ),
		'sortable'        => true,
	),
	'icons_wrapper_class' => array(
		'type'      => 'text',
		'label'     => esc_html__( 'Icons Container Custom Class', 'finvision' )
	)
);