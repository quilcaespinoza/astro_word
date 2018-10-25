<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'style' => array(
		'type'     => 'multi-picker',
		'label'    => false,
		'desc'     => false,
		'picker' => array(
			'ruler_type' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Ruler Type', 'finvision' ),
				'desc'    => esc_html__( 'Here you can set the styling and size of the HR element', 'finvision' ),
				'choices' => array(
					'line'  => esc_html__( 'Line', 'finvision' ),
					'space' => esc_html__( 'Whitespace', 'finvision' ),
				)
			)
		),
		'choices'     => array(
			'space' => array(
				'height' => array(
					'label' => esc_html__( 'Height', 'finvision' ),
					'desc'  => esc_html__( 'How much whitespace do you need? Enter a pixel value. Positive value will increase the whitespace, negative value will reduce it. eg: \'50\', \'-25\', \'200\'', 'finvision' ),
					'type'  => 'text',
					'value' => '50'
				)
			)
		)
	),
	'responsive'         => array(
		'attr'          => array( 'class' => 'fw-advanced-button' ),
		'type'          => 'popup',
		'label'         => esc_html__( 'Responsive visibility', 'finvision' ),
		'button'        => esc_html__( 'Settings', 'finvision' ),
		'size'          => 'medium',
		'popup-options' => array(
			'hidden_lg'     => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => __( 'Large ( > 1199px)', 'finvision' ),
						'desc'         => esc_html__( 'Display on large screen?', 'finvision' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'finvision' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'finvision' ),
						)
					),
				),
			),
			'hidden_md'     => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => __( 'Medium ( > 991px )', 'finvision' ),
						'desc'         => esc_html__( 'Display on medium screen?', 'finvision' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'finvision' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'finvision' ),
						)
					),
				),
			),
			'hidden_sm'     => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => __( 'Small ( > 767px )', 'finvision' ),
						'desc'         => esc_html__( 'Display on small screen?', 'finvision' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'finvision' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'finvision' ),
						)
					),
				),
			),
			'hidden_xs' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => __( 'Extra small ( < 768px )', 'finvision' ),
						'desc'         => esc_html__( 'Display on extra small screen?', 'finvision' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'finvision' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'finvision' ),
						)
					),
				),
				'choices' => array(),
			),
		),
	),
);
