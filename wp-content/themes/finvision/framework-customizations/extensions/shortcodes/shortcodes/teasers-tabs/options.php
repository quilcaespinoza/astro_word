<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$teaser = fw_ext( 'shortcodes' )->get_shortcode( 'teaser' );

$options = array(
	'tabs'       => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs', 'finvision' ),
		'popup-title'   => esc_html__( 'Add/Edit Tabs', 'finvision' ),
		'desc'          => esc_html__( 'Create your tabs', 'finvision' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'           => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title', 'finvision' )
			),
			'tab_columns_width'   => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Column width in tab content', 'finvision' ),
				'value'   => 'col-sm-4',
				'desc'    => esc_html__( 'Choose teaser width inside tab content', 'finvision' ),
				'choices' => array(
					'col-sm-12' => esc_html__( '1/1', 'finvision' ),
					'col-sm-6'  => esc_html__( '1/2', 'finvision' ),
					'col-sm-4'  => esc_html__( '1/3', 'finvision' ),
					'col-sm-3'  => esc_html__( '1/4', 'finvision' ),
				),
			),
			'tab_columns_padding' => array(
				'type'    => 'select',
				'value'   => 'columns_padding_15',
				'label'   => esc_html__( 'Column paddings', 'finvision' ),
				'desc'    => esc_html__( 'Choose columns horizontal paddings value', 'finvision' ),
				'choices' => array(
					'columns_padding_0'  => esc_html__( '0', 'finvision' ),
					'columns_padding_1'  => esc_html__( '1 px', 'finvision' ),
					'columns_padding_2'  => esc_html__( '2 px', 'finvision' ),
					'columns_padding_5'  => esc_html__( '5 px', 'finvision' ),
					'columns_padding_15' => esc_html__( '15 px - default', 'finvision' ),
					'columns_padding_25' => esc_html__( '25 px', 'finvision' ),
				),
			),
			'tab_teasers'         => array(
				'type'          => 'addable-popup',
				'label'         => esc_html__( 'Teasers in tabs', 'finvision' ),
				'popup-title'   => esc_html__( 'Add/Edit Teasers in tabs', 'finvision' ),
				'desc'          => esc_html__( 'Create your teasers in tabs', 'finvision' ),
				'template'      => '{{=title}}',
				'popup-options' => $teaser->get_options(),

			),
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