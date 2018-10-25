<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$portfolio = fw()->extensions->get( 'portfolio' );
if ( empty( $portfolio ) ) {
	return;
}

$options = array(
	'layout_variant' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'value'   => false,
		'picker'  => array(
			'layout'        => array(
				'label'   => esc_html__( 'Portfolio Layout', 'finvision' ),
				'desc'    => esc_html__( 'Choose projects layout', 'finvision' ),
				'value'   => 'isotope',
				'type'    => 'select',
				'choices' => array(
					'carousel' => esc_html__( 'Carousel', 'finvision' ),
					'isotope'  => esc_html__( 'Masonry Grid', 'finvision' ),
				)
			),
		),
		'choices' => array(
			'carousel'   => array(
				'loop' => array(
					'label'     => esc_html__( 'Loop Carousel', 'finvision' ),
					'value'     => '',
					'type'      => 'switch',
				),
				'center' => array(
					'label'     => esc_html__( 'Center Carousel', 'finvision' ),
					'value'     => '',
					'type'      => 'switch',
				),
				'dots' => array(
					'label'     => esc_html__( 'Show Dots', 'finvision' ),
					'value'     => '',
					'type'      => 'switch',
				),
				'nav' => array(
					'label'     => esc_html__( 'Show Nav', 'finvision' ),
					'value'     => '',
					'type'      => 'switch',
				),
				'autoplay' => array(
					'label'     => esc_html__( 'Auto Play Carousel', 'finvision' ),
					'value'     => '',
					'type'      => 'switch',
				),
			),
			'isotope'   => array(),
		),
	),


	'item_layout'   => array(
		'label'   => esc_html__( 'Item layout', 'finvision' ),
		'desc'    => esc_html__( 'Choose Item layout', 'finvision' ),
		'value'   => 'item-regular',
		'type'    => 'select',
		'choices' => array(
			'item-regular'  => esc_html__( 'Image with hovering title', 'finvision' ),
			'item-title'    => esc_html__( 'Image with title', 'finvision' ),
			'item-extended' => esc_html__( 'Image with title and excerpt', 'finvision' ),
		)
	),
	'number'        => array(
		'type'       => 'text',
		'value'      => '6',
		'label'      => esc_html__( 'Items number', 'finvision' ),
		'desc'       => esc_html__( 'Number of portfolio projects tu display', 'finvision' ),
	),
	'margin'        => array(
		'label'   => esc_html__( 'Horizontal item margin (px)', 'finvision' ),
		'desc'    => esc_html__( 'Select horizontal item margin', 'finvision' ),
		'value'   => '30',
		'type'    => 'select',
		'choices' => array(
			'0'  => esc_html__( '0', 'finvision' ),
			'1'  => esc_html__( '1px', 'finvision' ),
			'2'  => esc_html__( '2px', 'finvision' ),
			'10' => esc_html__( '10px', 'finvision' ),
			'30' => esc_html__( '30px', 'finvision' ),
		)
	),
	'responsive_lg' => array(
		'label'   => esc_html__( 'Columns on wide screens', 'finvision' ),
		'desc'    => esc_html__( 'Select items number on wide screens (>=1200px)', 'finvision' ),
		'value'   => '4',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'finvision' ),
			'2' => esc_html__( '2', 'finvision' ),
			'3' => esc_html__( '3', 'finvision' ),
			'4' => esc_html__( '4', 'finvision' ),
			'5' => esc_html__( '5', 'finvision' ),
			'6' => esc_html__( '6', 'finvision' ),
		)
	),
	'responsive_md' => array(
		'label'   => esc_html__( 'Columns on middle screens', 'finvision' ),
		'desc'    => esc_html__( 'Select items number on middle screens (>=992px)', 'finvision' ),
		'value'   => '3',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'finvision' ),
			'2' => esc_html__( '2', 'finvision' ),
			'3' => esc_html__( '3', 'finvision' ),
			'4' => esc_html__( '4', 'finvision' ),
			'5' => esc_html__( '5', 'finvision' ),
			'6' => esc_html__( '6', 'finvision' ),
		)
	),
	'responsive_sm' => array(
		'label'   => esc_html__( 'Columns on small screens', 'finvision' ),
		'desc'    => esc_html__( 'Select items number on small screens (>=768px)', 'finvision' ),
		'value'   => '2',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'finvision' ),
			'2' => esc_html__( '2', 'finvision' ),
			'3' => esc_html__( '3', 'finvision' ),
			'4' => esc_html__( '4', 'finvision' ),
			'5' => esc_html__( '5', 'finvision' ),
		)
	),
	'responsive_xs' => array(
		'label'   => esc_html__( 'Columns on extra small screens', 'finvision' ),
		'desc'    => esc_html__( 'Select items number on extra small screens (>=500px)', 'finvision' ),
		'value'   => '1',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'finvision' ),
			'2' => esc_html__( '2', 'finvision' ),
			'3' => esc_html__( '3', 'finvision' ),
			'4' => esc_html__( '4', 'finvision' ),
		)
	),
	'responsive_xxs' => array(
		'label'   => esc_html__( 'Columns on extra small screens', 'finvision' ),
		'desc'    => esc_html__( 'Select items number on extra small screens (<500px)', 'finvision' ),
		'value'   => '1',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'finvision' ),
			'2' => esc_html__( '2', 'finvision' ),
			'3' => esc_html__( '3', 'finvision' ),
			'4' => esc_html__( '4', 'finvision' ),
		)
	),
	'show_filters'  => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Show filters', 'finvision' ),
		'desc'         => esc_html__( 'Hide or show categories filters', 'finvision' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'finvision' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'finvision' ),
		),
	),
);