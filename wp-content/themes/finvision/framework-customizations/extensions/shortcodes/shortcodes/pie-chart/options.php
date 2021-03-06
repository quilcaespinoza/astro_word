<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'size' => array(
		'type'       => 'slider',
		'value'      => 250,
		'properties' => array(
			'min'  => 100,
			'max'  => 350,
			'step' => 10,
		),
		'label'      => esc_html__( 'Chart Size (px)', 'finvision' ),
	),

	'line' => array(
		'type'       => 'slider',
		'value'      => 20,
		'properties' => array(
			'min'  => 1,
			'max'  => 40,
			'step' => 1,
		),
		'label'      => esc_html__( 'Chart Size (px)', 'finvision' ),
	),

	'trackcolor' => array(
		'type'  => 'color-picker',
		'value' => '#c14240',
		// palette colors array
		// 'palettes' => array( '#ba4e4e', '#0ce9ed', '#941940' ),
		'label' => esc_html__( 'Bar Color', 'finvision' ),
	),

	'bgcolor' => array(
		'type'  => 'color-picker',
		'value' => '#ffffff',
		'label' => esc_html__( 'Track Color', 'finvision' ),
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
	'speed'   => array(
		'type'       => 'slider',
		'value'      => 1000,
		'properties' => array(
			'min'  => 500,
			'max'  => 5000,
			'step' => 100,
		),
		'label'      => esc_html__( 'Percents Counter Speed', 'finvision' ),
		'desc'       => esc_html__( 'Choose counter speed (in milliseconds)', 'finvision' ),
	),
	'name'    => array(
		'type'  => 'text',
		'label' => esc_html__( 'Chart Name', 'finvision' ),
		'desc'  => esc_html__( 'Appears below percents number', 'finvision' ),
	),
);