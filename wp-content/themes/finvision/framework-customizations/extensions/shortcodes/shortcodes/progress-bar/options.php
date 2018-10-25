<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'title' => array(
		'type'       => 'text',
		'value'      => '',
		'label'      => esc_html__( 'Progress Bar title', 'finvision' ),
	),
	'percent' => array(
		'type'       => 'slider',
		'value'      => 80,
		'properties' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
		'label'      => esc_html__( 'Count To', 'finvision' ),
		'desc'       => esc_html__( 'Choose percent to count to', 'finvision' ),
	),
	'background_class' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Context background color', 'finvision' ),
		'desc'    => esc_html__( 'Select one of predefined background colors', 'finvision' ),
		'choices' => array(
			'' => esc_html__( 'Accent Color', 'finvision' ),
			'progress-bar-success' => esc_html__( 'Success', 'finvision' ),
			'progress-bar-info'    => esc_html__( 'Info', 'finvision' ),
			'progress-bar-warning' => esc_html__( 'Warning', 'finvision' ),
			'progress-bar-danger'  => esc_html__( 'Danger', 'finvision' ),

		),
	),
);