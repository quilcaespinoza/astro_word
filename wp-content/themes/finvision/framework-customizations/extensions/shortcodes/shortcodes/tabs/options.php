<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$accordion_options = fw_ext( 'shortcodes' )->get_shortcode( 'accordion' )->get_options();

$options = array(
	'tabs'       => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs', 'finvision' ),
		'popup-title'   => esc_html__( 'Add/Edit Tabs', 'finvision' ),
		'desc'          => esc_html__( 'Create your tabs', 'finvision' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'          => array(
				'type'  => 'text',
				'label' => esc_html__( 'Tab Title', 'finvision' )
			),
			'tab_content'        => array(
				'type'  => 'wp-editor',
				'label' => esc_html__( 'Tab Content', 'finvision' ),
			),
			'tab_featured_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Tab Featured Image', 'finvision' ),
				'image'       => esc_html__( 'Featured image for your tab', 'finvision' ),
				'help'        => esc_html__( 'Image for your tab. It appears on the top of your tab content', 'finvision' ),
				'images_only' => true,
			),
			'tab_icon'           => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Icon in tab title', 'finvision' ),
				'set'   => 'rt-icons-2',
			),
			'tab_accordion'  => array(
				'type' => 'popup',
				'label' => esc_html__('Accordion', 'finvision'),
				'desc' => esc_html__('Add accordion to the tab', 'finvision'),
				'button' => esc_html__('Add', 'finvision'),
				'size' => 'large', // small, medium, large
				'popup-options' => array(
					'position' => array(
						'type'         => 'switch',
						'value'        => '',
						'label'        => esc_html__( 'Accordion Position', 'finvision' ),
						'desc'         => esc_html__( 'Display accordion before or after main content', 'finvision' ),
						'left-choice'  => array(
							'value' => true,
							'label' => esc_html__( 'Before', 'finvision' ),
						),
						'right-choice' => array(
							'value' => false,
							'label' => esc_html__( 'after', 'finvision' ),
						),
					),
					$accordion_options
				),
			),
		),
	),
	'small_tabs' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Small Tabs', 'finvision' ),
		'desc'         => esc_html__( 'Decrease tabs size', 'finvision' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'finvision' ),
		),
		'right-choice' => array(
			'value' => 'small-tabs',
			'label' => esc_html__( 'Yes', 'finvision' ),
		),
	),
	'half_width' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Half Width Tabs', 'finvision' ),
		'desc'         => esc_html__( 'Two tabs per line', 'finvision' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'finvision' ),
		),
		'right-choice' => array(
			'value' => 'half-width-tabs',
			'label' => esc_html__( 'Yes', 'finvision' ),
		),
	),
	'top_border' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Top color border', 'finvision' ),
		'desc'         => esc_html__( 'Add top color border to tab content', 'finvision' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No top border', 'finvision' ),
		),
		'right-choice' => array(
			'value' => 'top-color-border',
			'label' => esc_html__( 'Color top border', 'finvision' ),
		),
	),
	'id'         => array( 'type' => 'unique' ),
);