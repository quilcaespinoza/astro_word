<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'text' => array(
		'type'   => 'wp-editor',
		'label'  => esc_html__( 'Content', 'finvision' ),
		'desc'   => esc_html__( 'Enter some content for this texblock', 'finvision' ),
		'reinit' => true,
		'teeny' => false,
	),
);
