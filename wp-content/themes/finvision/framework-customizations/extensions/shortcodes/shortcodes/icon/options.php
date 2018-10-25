<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'icon'       => array(
		'type'  => 'icon-v2',
		'label' => esc_html__( 'Icon', 'finvision' ),
	),
	'icon_style' => array(
		'type'    => 'select',
		'value'   => 'default_icon',
		'label'   => esc_html__( 'Icon Color', 'finvision' ),
		'desc'    => esc_html__( 'Select one of predefined colors.', 'finvision' ),
		'choices' => array(
			'default_icon' => esc_html__( 'Default Font Color', 'finvision' ),
			'black'        => esc_html__( 'Dark Color', 'finvision' ),
			'highlight'    => esc_html__( 'Accent Color', 'finvision' ),
		),
	),
	'icon_size'       => array(
		'label'   => esc_html__( 'Icon Size', 'finvision' ),
		'desc'    => esc_html__( 'Choose icon size', 'finvision' ),
		'type'    => 'select',
		'choices' => array(
			''         => esc_html__( 'Regular font size', 'finvision' ),
			'size_small' => esc_html__( 'Small Icon Size (28px)', 'finvision' ),
			'size_normal'  => esc_html__( 'Normal Icon Size (42px)', 'finvision' ),
			'size_big'  => esc_html__( 'Big Icon Size (64px)', 'finvision' ),
		)
	),
	'content'       => array(
		'type'  => 'text',
		'label' => esc_html__('Icon text', 'finvision'),
	),
	'link'       => array(
		'type'  => 'text',
		'label' => esc_html__('Icon text link', 'finvision'),
	)
);