<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'table'      => array(
		'type'  => 'table',
		'label' => false,
		'desc'  => false,
	),
	'table_type' => array(
		'type'    => 'select',
		'value'   => 'table',
		'label'   => esc_html__( 'Tabular table style', 'finvision' ),
		'choices' => array(
			'table'                => esc_html__( 'Bootstrap Default', 'finvision' ),
			'table table-striped'  => esc_html__( 'Bootstrap Striped', 'finvision' ),
			'table table-bordered' => esc_html__( 'Bootstrap Bordered', 'finvision' ),
			'table_template'  => esc_html__( 'Theme style', 'finvision' ),

		),
	),
);