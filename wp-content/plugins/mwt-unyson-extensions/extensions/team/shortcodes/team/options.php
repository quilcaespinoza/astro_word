<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$ext_team_settings = fw()->extensions->get( 'team' )->get_settings();
$taxonomy = $ext_team_settings['taxonomy_name'];

$options = array(
	'number'        => array(
		'type'       => 'text',
		'value'      => '6',
		'label'      => esc_html__( 'Items number', 'mwt-unyson-extensions' ),
		'desc'       => esc_html__( 'Number of members to display', 'mwt-unyson-extensions' ),
	),
	'margin'        => array(
		'label'   => esc_html__( 'Horizontal item margin (px)', 'mwt-unyson-extensions' ),
		'desc'    => esc_html__( 'Select horizontal item margin', 'mwt-unyson-extensions' ),
		'value'   => '30',
		'type'    => 'select',
		'choices' => array(
			'0'  => esc_html__( '0', 'mwt-unyson-extensions' ),
			'1'  => esc_html__( '1px', 'mwt-unyson-extensions' ),
			'2'  => esc_html__( '2px', 'mwt-unyson-extensions' ),
			'10' => esc_html__( '10px', 'mwt-unyson-extensions' ),
			'30' => esc_html__( '30px', 'mwt-unyson-extensions' ),
		)
	),
	'layout'        => array(
		'label'   => esc_html__( 'Layout', 'mwt-unyson-extensions' ),
		'desc'    => esc_html__( 'Choose layout', 'mwt-unyson-extensions' ),
		'value'   => 'carousel',
		'type'    => 'select',
		'choices' => array(
			'carousel' => esc_html__( 'Carousel', 'mwt-unyson-extensions' ),
			'isotope'  => esc_html__( 'Masonry Grid', 'mwt-unyson-extensions' ),
		)
	),
	'carousel_autoplay'  => array(
		'type'         => 'switch',
		'value'        => true,
		'label'        => esc_html__( 'Auto play carousel', 'mwt-unyson-extensions' ),
		'desc'         => esc_html__( 'Start sliding carousel automatically', 'mwt-unyson-extensions' ),
		'left-choice'  => array(
			'value' => false,
			'label' => esc_html__( 'No', 'mwt-unyson-extensions' ),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__( 'Yes', 'mwt-unyson-extensions' ),
		),
	),
	'responsive_lg' => array(
		'label'   => esc_html__( 'Columns on large screens', 'mwt-unyson-extensions' ),
		'desc'    => __( 'Select items number on wide screens (>1200px)', 'mwt-unyson-extensions' ),
		'value'   => '4',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'mwt-unyson-extensions' ),
			'2' => esc_html__( '2', 'mwt-unyson-extensions' ),
			'3' => esc_html__( '3', 'mwt-unyson-extensions' ),
			'4' => esc_html__( '4', 'mwt-unyson-extensions' ),
			'6' => esc_html__( '6', 'mwt-unyson-extensions' ),
		)
	),
	'responsive_md' => array(
		'label'   => esc_html__( 'Columns on middle screens', 'mwt-unyson-extensions' ),
		'desc'    => __( 'Select items number on middle screens (>992px)', 'mwt-unyson-extensions' ),
		'value'   => '3',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'mwt-unyson-extensions' ),
			'2' => esc_html__( '2', 'mwt-unyson-extensions' ),
			'3' => esc_html__( '3', 'mwt-unyson-extensions' ),
			'4' => esc_html__( '4', 'mwt-unyson-extensions' ),
			'6' => esc_html__( '6', 'mwt-unyson-extensions' ),
		)
	),
	'responsive_sm' => array(
		'label'   => esc_html__( 'Columns on small screens', 'mwt-unyson-extensions' ),
		'desc'    => __( 'Select items number on small screens (>768px)', 'mwt-unyson-extensions' ),
		'value'   => '2',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'mwt-unyson-extensions' ),
			'2' => esc_html__( '2', 'mwt-unyson-extensions' ),
			'3' => esc_html__( '3', 'mwt-unyson-extensions' ),
			'4' => esc_html__( '4', 'mwt-unyson-extensions' ),
			'6' => esc_html__( '6', 'mwt-unyson-extensions' ),
		)
	),
	'responsive_xs' => array(
		'label'   => esc_html__( 'Columns on extra small screens', 'mwt-unyson-extensions' ),
		'desc'    => esc_html__( 'Select items number on extra small screens (<767px)', 'mwt-unyson-extensions' ),
		'value'   => '1',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'mwt-unyson-extensions' ),
			'2' => esc_html__( '2', 'mwt-unyson-extensions' ),
			'3' => esc_html__( '3', 'mwt-unyson-extensions' ),
			'4' => esc_html__( '4', 'mwt-unyson-extensions' ),
			'6' => esc_html__( '6', 'mwt-unyson-extensions' ),
		)
	),
	'show_filters'  => array(
		'type'         => 'switch',
		'value'        => false,
		'label'        => esc_html__( 'Show filters', 'mwt-unyson-extensions' ),
		'desc'         => esc_html__( 'Hide or show categories filters', 'mwt-unyson-extensions' ),
		'left-choice'  => array(
			'value' => false,
			'label' => esc_html__( 'No', 'mwt-unyson-extensions' ),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__( 'Yes', 'mwt-unyson-extensions' ),
		),
	),
	'cat' => array(
		'type'  => 'multi-select',
		'label' => esc_html__('Select categories', 'mwt-unyson-extensions'),
		'desc'  => esc_html__('You can select one or more categories', 'mwt-unyson-extensions'),
		'population' => 'taxonomy',
		'source' => $taxonomy,
		'prepopulate' => 10,
		'limit' => 100,
	)
);