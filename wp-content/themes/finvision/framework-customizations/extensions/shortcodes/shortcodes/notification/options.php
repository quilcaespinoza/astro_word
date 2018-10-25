<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'message' => array(
		'label' => esc_html__( 'Message', 'finvision' ),
		'desc'  => esc_html__( 'Notification message', 'finvision' ),
		'type'  => 'text',
		'value' => esc_html__( 'Message!', 'finvision' ),
	),
	'type'    => array(
		'label'   => esc_html__( 'Type', 'finvision' ),
		'desc'    => esc_html__( 'Notification type', 'finvision' ),
		'type'    => 'select',
		'choices' => array(
			'success' => esc_html__( 'Congratulations', 'finvision' ),
			'info'    => esc_html__( 'Information', 'finvision' ),
			'warning' => esc_html__( 'Alert', 'finvision' ),
			'danger'  => esc_html__( 'Error', 'finvision' ),
		)
	),
	'icon'       => array(
		'type'  => 'icon',
		'label' => esc_html__( 'Icon', 'finvision' ),
		'set'   => 'rt-icons-2',
	),
);