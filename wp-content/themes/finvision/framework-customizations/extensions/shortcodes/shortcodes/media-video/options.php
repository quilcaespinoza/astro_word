<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'url'    => array(
		'type'  => 'text',
		'label' => esc_html__( 'Insert Video URL', 'finvision' ),
		'desc'  => esc_html__( 'Insert Video URL to embed this video', 'finvision' )
	),
	'video_sizes' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'video_size' => array(
				'type'    => 'select',
				'value'   => 'embed-responsive-3by2',
				'label'   => esc_html__( 'Video Size', 'finvision' ),
				'choices' => array(
					'embed-responsive-16by9'          => esc_html__( 'Responsive 16 by 9', 'finvision' ),
					'embed-responsive-4by3'         => esc_html__( 'Responsive 4 by 3', 'finvision' ),
					'embed-responsive-3by2' => esc_html__( 'Responsive 3 by 2', 'finvision' ),
					'custom'  => esc_html__( 'Custom sizes', 'finvision' ),
				),
			),
		),
		'choices'      => array(
			'embed-responsive-16by9'   => array(),
			'embed-responsive-4by3'    => array(),
			'embed-responsive-3by2'    => array(),
			'custom'                   => array(
				'width'  => array(
					'type'  => 'text',
					'label' => esc_html__( 'Video Width', 'finvision' ),
					'desc'  => esc_html__( 'Enter a value for the width', 'finvision' ),

				),
				'height' => array(
					'type'  => 'text',
					'label' => esc_html__( 'Video Height', 'finvision' ),
					'desc'  => esc_html__( 'Enter a value for the height', 'finvision' ),

				)
			),
		),
		'show_borders' => true,
	),
	'cover_image'            => array(
		'type'  => 'upload',
		'label' => esc_html__( 'Choose Cover Image', 'finvision' ),
		'desc'  => esc_html__( 'Only for responsive video sizes', 'finvision' )
	),
);
