<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Contact form', 'finvision' ),
	'description' => esc_html__( 'Build contact forms', 'finvision' ),
	'tab'         => esc_html__( 'Content Elements', 'finvision' ),
	'popup_size'  => 'large',
	'type'        => 'special'
);