<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'number'        => array(
		'type'       => 'text',
		'value'      => '6',
		'label'      => esc_html__( 'Items number', 'finvision' ),
		'desc'       => esc_html__( 'Number of members to display', 'finvision' ),
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
			'60' => esc_html__( '60px', 'finvision' ),
		)
	),
	'layout'        => array(
		'label'   => esc_html__( 'Post Layout', 'finvision' ),
		'desc'    => esc_html__( 'Choose post layout', 'finvision' ),
		'value'   => 'carousel',
		'type'    => 'select',
		'choices' => array(
			'carousel' => esc_html__( 'Carousel', 'finvision' ),
			'isotope'  => esc_html__( 'Masonry Grid', 'finvision' ),
		)
	),
	'item_layout'   => array(
		'label'   => esc_html__( 'Item layout', 'finvision' ),
		'desc'    => esc_html__( 'Choose Item layout', 'finvision' ),
		'value'   => 'item-regular',
		'type'    => 'select',
		'choices' => array(
			'item-vertical'   => esc_html__( 'Vertical item type 1', 'finvision' ),
			'item-vertical2'   => esc_html__( 'Vertical item type 2', 'finvision' ),
			'item-thumbnail'   => esc_html__( 'Title overlaps thumbnail', 'finvision' ),
		)
	),
	'responsive_lg' => array(
		'label'   => esc_html__( 'Columns on large screens', 'finvision' ),
		'desc'    => __( 'Select items number on wide screens (>1200px)', 'finvision' ),
		'value'   => '4',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'finvision' ),
			'2' => esc_html__( '2', 'finvision' ),
			'3' => esc_html__( '3', 'finvision' ),
			'4' => esc_html__( '4', 'finvision' ),
			'6' => esc_html__( '6', 'finvision' ),
		)
	),
	'responsive_md' => array(
		'label'   => esc_html__( 'Columns on middle screens', 'finvision' ),
		'desc'    => __( 'Select items number on middle screens (>992px)', 'finvision' ),
		'value'   => '3',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'finvision' ),
			'2' => esc_html__( '2', 'finvision' ),
			'3' => esc_html__( '3', 'finvision' ),
			'4' => esc_html__( '4', 'finvision' ),
			'6' => esc_html__( '6', 'finvision' ),
		)
	),
	'responsive_sm' => array(
		'label'   => esc_html__( 'Columns on small screens', 'finvision' ),
		'desc'    => __( 'Select items number on small screens (>768px)', 'finvision' ),
		'value'   => '2',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'finvision' ),
			'2' => esc_html__( '2', 'finvision' ),
			'3' => esc_html__( '3', 'finvision' ),
			'4' => esc_html__( '4', 'finvision' ),
			'6' => esc_html__( '6', 'finvision' ),
		)
	),
	'responsive_xs' => array(
		'label'   => esc_html__( 'Columns on extra small screens', 'finvision' ),
		'desc'    => esc_html__( 'Select items number on extra small screens (<767px)', 'finvision' ),
		'value'   => '1',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'finvision' ),
			'2' => esc_html__( '2', 'finvision' ),
			'3' => esc_html__( '3', 'finvision' ),
			'4' => esc_html__( '4', 'finvision' ),
			'6' => esc_html__( '6', 'finvision' ),
		)
	),
	'show_filters'  => array(
		'type'         => 'switch',
		'value'        => false,
		'label'        => esc_html__( 'Show filters', 'finvision' ),
		'desc'         => esc_html__( 'Hide or show categories filters', 'finvision' ),
		'left-choice'  => array(
			'value' => false,
			'label' => esc_html__( 'No', 'finvision' ),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__( 'Yes', 'finvision' ),
		),
	),
	'cat' => array(
		'type'  => 'multi-select',
		'label' => esc_html__('Select categories', 'finvision'),
		'desc'  => esc_html__('You can select one or more categories', 'finvision'),
		'population' => 'taxonomy',
		'source' => 'category',
		'prepopulate' => 10,
		'limit' => 100,
	)
);