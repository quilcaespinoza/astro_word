<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get social icons to add in member item:
$icons_social = fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' );

$options = array(
	'image' => array(
		'label' => esc_html__( 'Person Image', 'finvision' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'finvision' ),
		'type'  => 'upload'
	),
	'name'  => array(
		'label' => esc_html__( 'Person Name', 'finvision' ),
		'desc'  => esc_html__( 'Name of the person', 'finvision' ),
		'type'  => 'text',
		'value' => ''
	),
	'job'   => array(
		'label' => esc_html__( 'Person Position Title', 'finvision' ),
		'type'  => 'text',
		'value' => ''
	),
	'accent_color'  => array(
		'type'    => 'select',
		'value'   => 'highlight',
		'label'   => esc_html__( 'Accent Color', 'finvision' ),
		'choices' => array(
			'highlight'  => esc_html__( 'Accent Color 1', 'finvision' ),
			'highlight2'  => esc_html__( 'Accent Color 2', 'finvision' ),
			'highlight3'  => esc_html__( 'Accent Color 3', 'finvision' ),
			'highlight4'  => esc_html__( 'Accent Color 4', 'finvision' ),
		)
	),
);