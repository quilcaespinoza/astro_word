<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'slider_background' => array(
		'type'        => 'select',
		'value'       => 'ls',
		'label'       => esc_html__( 'Slider background', 'finvision' ),
		'desc'        => esc_html__( 'Select slider background color', 'finvision' ),
		'choices'     => array(
			'ls'    => esc_html__( 'Light', 'finvision' ),
			'ls ms' => esc_html__( 'Light Muted', 'finvision' ),
			'ds gradient lightened'    => esc_html__( 'Dark', 'finvision' ),
			'cs gradient lightened'    => esc_html__( 'Accent Color', 'finvision' ),
		),
		/**
		 * Allow save not existing choices
		 * Useful when you use the select to populate it dynamically from js
		 */
		'no-validate' => false,
	),

	'slider_responsive_layout' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'value'   => false,
		'picker'  => array(
			'all_scr_cover' => array(
				'type'      => 'switch',
				'label'     => esc_html__( 'Image overlay on small screens', 'finvision' ),
				'desc'      => esc_html__( 'Leave image overlay on small screens same as it is on large resolution', 'finvision' ),
				'value'     => 'all-scr-cover',
				'left-choice'   => array(
					'value' => '',
					'label' => esc_html__( 'No', 'finvision' )
				),
				'right-choice'   => array(
					'value' => 'all-scr-cover',
					'label' => esc_html__( 'Yes', 'finvision' )
				)
			),
		),
		'choices' => array(
			'all-scr-cover'   => array(
				'slider_height' => array(
					'label'     => esc_html__( 'Slider Height', 'finvision' ),
					'desc'      => esc_html__( 'Choose how to determine slider height, by content or by image', 'finvision' ),
					'value'     => '',
					'type'      => 'switch',
					'left-choice'   => array(
						'value' => '',
						'label' => esc_html__( 'Content', 'finvision' )
					),
					'right-choice'   => array(
						'value' => 'image-dependant',
						'label' => esc_html__( 'Image', 'finvision' )
					)
				),
			),
			''   => array(),
		),
	),
	'skew_overlay' => array(
		'type'      => 'switch',
		'label'     => esc_html__( 'Skew Overlay', 'finvision' ),
		'desc'      => esc_html__( 'Add skew overlay to slider', 'finvision' ),
		'value'     => true,
	),
	'slider_custom_class' => array(
		'label' => esc_html__('Custom Class', 'finvision'),
		'desc'  => esc_html__( 'Slider section custom class', 'finvision' ),
		'type' => 'text',
	),
);
