<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get teaser to add in teasers row:
$button = fw_ext( 'shortcodes' )->get_shortcode( 'button' );

$options = array(
	'teasers'                => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Teasers in row', 'finvision' ),
		'popup-title'   => esc_html__( 'Add/Edit Teasers', 'finvision' ),
		'template'      => 'Teaser',
		'popup-options' => array(
			'icon'       => array(
				'type'  => 'icon-v2',
				'label' => esc_html__( 'Choose an Icon', 'finvision' ),
			),
			'content'    => array(
				'type'   => 'wp-editor',
				'label'  => esc_html__( 'Content', 'finvision' ),
			),
			'buttons'    => array(
				'type'          => 'addable-popup',
				'label'         => esc_html__( 'Buttons', 'finvision' ),
				'template'      => '{{=label}}',
				'popup-options' => $button->get_options(),
			),
		),
	),

);