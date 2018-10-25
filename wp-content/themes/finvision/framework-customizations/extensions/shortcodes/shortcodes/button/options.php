<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$regular_button_options = array(
	'button_icon' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'use_icon' => array(
				'type'  => 'switch',
				'value' => '',
				'label' => esc_html__('Add icon to button', 'finvision'),
				'left-choice' => array(
					'value' => '',
					'label' => esc_html__('No', 'finvision'),
				),
				'right-choice' => array(
					'value' => 'icon',
					'label' => esc_html__('Yes', 'finvision'),
				),
			),

		),
		'choices'      => array(
			''       => array(),
			'icon'   => array(
				'icon_source'       => array(
					'type'  => 'icon-v2',
					'label' => esc_html__( 'Choose Icon', 'finvision' ),
				),
				'icon_side' => array(
					'type'  => 'switch',
					'value' => '',
					'label' => esc_html__('Icon Side.', 'finvision'),
					'desc' => esc_html__('Add icon before or after button Label', 'finvision'),
					'left-choice' => array(
						'value' => 'left',
						'label' => esc_html__('Left', 'finvision'),
					),
					'right-choice' => array(
						'value' => 'right',
						'label' => esc_html__('Right', 'finvision'),
					),
				),
			),
		),
	),
	'min_width' => array(
		'type'  => 'switch',
		'label' => esc_html__( 'Min width button', 'finvision' ),
		'desc'  => esc_html__( 'Switch to set min width for button. (270px)', 'finvision' ),
	),
	'small_button' => array(
		'type'  => 'switch',
		'label' => esc_html__( 'Small button', 'finvision' )
	)
);

$complex_button_options = array(
	'icon_left'       => array(
		'type'  => 'icon-v2',
		'label' => esc_html__( 'Left Icon', 'finvision' ),
	),
	'icon_right'       => array(
		'type'  => 'icon-v2',
		'label' => esc_html__( 'Right Icon', 'finvision' ),
	),
);

$options = array(
	'label'       => array(
		'label' => esc_html__( 'Button Label', 'finvision' ),
		'desc'  => esc_html__( 'This is the text that appears on your button', 'finvision' ),
		'type'  => 'text',
		'value' => esc_html__( 'Submit', 'finvision' ),
	),
	'link'        => array(
		'label' => esc_html__( 'Button Link', 'finvision' ),
		'desc'  => esc_html__( 'Where should your button link to', 'finvision' ),
		'type'  => 'text',
		'value' => '#'
	),
	'target'      => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Open Link in New Window', 'finvision' ),
		'desc'         => esc_html__( 'Select here if you want to open the linked page in a new window', 'finvision' ),
		'right-choice' => array(
			'value' => '_blank',
			'label' => esc_html__( 'Yes', 'finvision' ),
		),
		'left-choice'  => array(
			'value' => '_self',
			'label' => esc_html__( 'No', 'finvision' ),
		),
	),

	'button_types' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'button_type' => array(
				'type'    => 'select',
				'value'   => 'theme_button color1',
				'label'   => esc_html__( 'Button Type', 'finvision' ),
				'desc'    => esc_html__( 'Choose a type for your button', 'finvision' ),
				'choices' => array(
					'simple_link'          => esc_html__( 'Just link', 'finvision' ),
					'more-link'          => esc_html__( 'Read More link', 'finvision' ),
					'theme_button'         => esc_html__( 'Default', 'finvision' ),
					'theme_button color1'  => esc_html__( 'Accent Color', 'finvision' ),
					'theme_button round_button'  => esc_html__( 'Default Round', 'finvision' ),
					'theme_button color1 round_button'  => esc_html__( 'Accent Color Round', 'finvision' ),
				),
			),
		),
		'choices'      => array(
			'more-link'                             => array(),
			'simple_link'                           => $regular_button_options,
			'theme_button'                          => $regular_button_options,
			'theme_button color1'                   => $regular_button_options
		),
		'show_borders' => true,
	),
);