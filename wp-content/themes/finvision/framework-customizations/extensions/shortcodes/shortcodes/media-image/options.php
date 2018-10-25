<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'image'            => array(
		'type'  => 'upload',
		'label' => esc_html__( 'Choose Image', 'finvision' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'finvision' )
	),
	'size'             => array(
		'type'    => 'group',
		'options' => array(
			'width'  => array(
				'type'  => 'text',
				'label' => esc_html__( 'Width', 'finvision' ),
				'desc'  => esc_html__( 'Set image width', 'finvision' ),
				'value' => 300
			),
			'height' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Height', 'finvision' ),
				'desc'  => esc_html__( 'Set image height', 'finvision' ),
				'value' => 200
			),
			'frame' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'With Frame', 'finvision' ),
				'desc'         => esc_html__( 'Put image in offset frame', 'finvision' )
			),
		)
	),
	'image-link-group' => array(
		'type'    => 'group',
		'options' => array(
			'link'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Image Link', 'finvision' ),
				'desc'  => esc_html__( 'Where should your image link to?', 'finvision' )
			),
			'target' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Open Link in New Window', 'finvision' ),
				'desc'         => esc_html__( 'Select here if you want to open the linked page in a new window', 'finvision' ),
				'right-choice' => array(
					'value' => '_blank',
					'label' => esc_html__( 'Yes', 'finvision' ),
				),
				'left-choice'  => array(
					'value' => '_self',
					'label' => esc_html__( 'No', 'finvision' ),
				),
			),
		)
	)
);

