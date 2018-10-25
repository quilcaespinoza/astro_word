<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tabs' => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Panels', 'finvision' ),
		'popup-title'   => esc_html__( 'Add/Edit Accordion Panels', 'finvision' ),
		'desc'          => esc_html__( 'Create your accordion panels', 'finvision' ),
		'template'      => '{{=tab_title}}',
		'size' => 'large', // small, medium, large
		'popup-options' => array(
			'tab_title'          => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title', 'finvision' )
			),
			'tab_content'        => array(
				'type'  => 'wp-editor',
				'label' => esc_html__( 'Content', 'finvision' )
			),
			'tab_featured_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Panel Featured Image', 'finvision' ),
				'image'       => esc_html__( 'Image for your panel.', 'finvision' ),
				'help'        => esc_html__( 'It appears to the left from your content', 'finvision' ),
				'images_only' => true,
			),
			'tab_icon'           => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Icon in panel title', 'finvision' ),
				'set'   => 'rt-icons-2',
			),
		)
	),
	'id'   => array( 'type' => 'unique' ),
	'accordion_color'     => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Style', 'finvision' ),
		'choices' => array(
			''       => esc_html__( 'Default', 'finvision' ),
			'collapse-unstyled' => esc_html__( 'Unstyled', 'finvision' ),
		),
	),
);