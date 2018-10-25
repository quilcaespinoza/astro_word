<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

//find fw_ext
$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
$button_options = array();
if ( ! empty( $shortcodes_extension ) ) {
	$button_options = $shortcodes_extension->get_shortcode( 'button' )->get_options();
}

$options = array(
	'tab_main' => array(
		'type' => 'tab',
		'options' => array(
			'title'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Pricing plan title', 'finvision' ),
			),
			'currency'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Currency Sign', 'finvision' ),
			),
			'price'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Integer Price', 'finvision' ),
			),
			'price_decimal'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Decimal Price', 'finvision' ),
			),
			'accent_color' => array(
				'type'        => 'select',
				'value'       => '',
				'label'       => esc_html__( 'Accent Color', 'finvision' ),
				'choices'     => array(
					'' => esc_html__( 'Accent Color 1', 'finvision' ),
					'2' => esc_html__( 'Accent Color 2', 'finvision' ),
					'3' => esc_html__( 'Accent Color 3', 'finvision' ),
					'4' => esc_html__( 'Accent Color 4', 'finvision' ),
				),
				'no-validate' => false,
			),
			'description'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Pricing description', 'finvision' ),
			),
			'features'         => array(
				'type'            => 'addable-box',
				'value'           => '',
				'label'           => esc_html__( 'Pricing plan features', 'finvision' ),
				'box-options'     => array(
					'feature_name'   => array(
						'type'  => 'text',
						'value' => '',
						'label' => esc_html__( 'Feature name', 'finvision' ),
					),
					'feature_checked' => array(
						'type'        => 'select',
						'value'       => '',
						'label'       => esc_html__( 'Default, checked or unchecked', 'finvision' ),
						'choices'     => array(
							'default' => esc_html__( 'Default', 'finvision' ),
							'enabled' => esc_html__( 'Enabled', 'finvision' ),
							'disabled' => esc_html__( 'Disabled', 'finvision' ),
						),
						'no-validate' => false,
					),
				),
				'template'        => '{{=feature_name}}',
				'limit'           => 0, // limit the number of boxes that can be added
				'add-button-text' => esc_html__( 'Add', 'finvision' ),
				'sortable'        => true,
			),
		),
		'title' => esc_html__('Info', 'finvision'),
	),

	'tab_button' => array(
		'type' => 'tab',
		'options' => array(
			'price_buttons'     => array(
				'type'        => 'addable-box',
				'value'       => '',
				'label'       => esc_html__( 'Price Buttons', 'finvision' ),
				'desc'        => esc_html__( 'Choose a button, link for it and text inside it', 'finvision' ),
				'template'    => 'Button',
				'box-options' => array(
					$button_options
				),
				'limit'           => 5, // limit the number of boxes that can be added
				'add-button-text' => esc_html__( 'Add', 'finvision' ),
			),
		),
		'title' => esc_html__('Button', 'finvision'),
	),



);