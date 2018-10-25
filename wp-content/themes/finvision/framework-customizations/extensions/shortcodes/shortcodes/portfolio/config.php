<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$portfolio = fw()->extensions->get( 'portfolio' );
if ( empty( $portfolio ) ) {
	return;
}


$cfg = array(
	'page_builder' => array(
		'title'       => esc_html__( 'Portfolio', 'finvision' ),
		'description' => esc_html__( 'Portfolio project various views', 'finvision' ),
		'tab'         => esc_html__( 'Widgets', 'finvision' )
	)
);