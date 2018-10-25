<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'container_type' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'container' => array(
				'type'      => 'select',
				'value'     => '',
				'choices'   => array(
					''   => esc_html__('Unstyled container', 'finvision'),
					'inline-content'   => esc_html__('Inline content', 'finvision'),
					'content-justify'   => esc_html__('Space between elements', 'finvision'),
					'flex-wrap'   => esc_html__('Flex container', 'finvision'),
				),
			),

		),
		'choices'      => array(
			''                  => array(),
			'inline-content'    => array(
				'big_spacing'  => array(
					'type'  => 'switch',
					'value' => '',
					'label' => esc_html__('Big spacing', 'finvision'),
					'desc'  => esc_html__('Increase horizontal spacing between elements on wide screens', 'finvision'),
					'left-choice' => array(
						'value' => '',
						'label' => esc_html__('No', 'finvision'),
					),
					'right-choice' => array(
						'value' => 'big-spacing',
						'label' => esc_html__('Yes', 'finvision'),
					),
				),
				'vertical_spacing'  => array(
					'type'  => 'switch',
					'value' => 'v-spacing',
					'label' => esc_html__('Vertical spacing between elements', 'finvision'),
					'desc'  => esc_html__('Adds bottom margin for elements, useful when elements breaks to a new line', 'finvision'),
					'left-choice' => array(
						'value' => '',
						'label' => esc_html__('No', 'finvision'),
					),
					'right-choice' => array(
						'value' => 'v-spacing',
						'label' => esc_html__('Yes', 'finvision'),
					),
				)
			),
			'content-justify'   => array(
				'vertical_align' => array(
					'type'  => 'switch',
					'value' => '',
					'label' => esc_html__('Align elements vertically', 'finvision'),
					'left-choice' => array(
						'value' => '',
						'label' => esc_html__('No', 'finvision'),
					),
					'right-choice' => array(
						'value' => 'v-center',
						'label' => esc_html__('Yes', 'finvision'),
					),
				),
				'vertical_spacing' => array(
					'type'  => 'switch',
					'value' => '',
					'label' => esc_html__('Vertical spacing between elements', 'finvision'),
					'desc'  => esc_html__('Adds 10px top and bottom margin for elements, useful when elements breaks to a new line', 'finvision'),
					'left-choice' => array(
						'value' => '',
						'label' => esc_html__('No', 'finvision'),
					),
					'right-choice' => array(
						'value' => 'v-spacing',
						'label' => esc_html__('Yes', 'finvision'),
					),
				),
			),
			'flex-wrap'  => array(
				'vertical_align' => array(
					'type'  => 'switch',
					'value' => '',
					'label' => esc_html__('Align elements vertically', 'finvision'),
					'left-choice' => array(
						'value' => '',
						'label' => esc_html__('No', 'finvision'),
					),
					'right-choice' => array(
						'value' => 'v-center',
						'label' => esc_html__('Yes', 'finvision'),
					),
				),
			)
		),
	),
	'custom_class' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'add_custom_class' => array(
				'type'  => 'switch',
				'value' => '',
				'label' => esc_html__('Custom class', 'finvision'),
				'desc'  => esc_html__('Add custom class to container', 'finvision'),
				'left-choice' => array(
					'value' => '',
					'label' => esc_html__('No', 'finvision'),
				),
				'right-choice' => array(
					'value' => 'custom',
					'label' => esc_html__('Yes', 'finvision'),
				),
			),

		),
		'choices'      => array(
			''         => array(),
			'custom'   => array(
				'class' => array(
					'type'  => 'text',
					'value' => '',
					'label' => esc_html__('Enter your custom classes', 'finvision'),
				),
			)
		),
	),
);