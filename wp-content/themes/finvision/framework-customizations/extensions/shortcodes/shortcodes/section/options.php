<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'tab_main_options' => array(
		'type' => 'tab',
		'title' => esc_html__('Main Options', 'finvision'),
		'options' => array(
			'container_type' => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'is_fullwidth'     => array(
						'label' => esc_html__( 'Full Width', 'finvision' ),
						'type'  => 'switch',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('No', 'finvision'),
						),
						'right-choice' => array(
							'value' => 'fullwidth',
							'label' => esc_html__('Yes', 'finvision'),
						),
					),

				),
				'choices'      => array(
					''                  => array(),
					'fullwidth'   => array(
						'side_paddings' => array(
							'type'  => 'switch',
							'value' => true,
							'label' => esc_html__('Side paddings', 'finvision'),
							'desc' => esc_html__('Show Fullwidth container side paddings', 'finvision'),
						),
					),
				),
			),

			'background_color' => array(
				'type'    => 'select',
				'value'   => 'ls',
				'label'   => esc_html__( 'Background color', 'finvision' ),
				'desc'    => esc_html__( 'Select background color', 'finvision' ),
				'help'    => esc_html__( 'Select one of predefined background colors', 'finvision' ),
				'choices' => array(
					'ls'             => esc_html__( 'Light', 'finvision' ),
					'ls ms'          => esc_html__( 'Light Grey', 'finvision' ),
					'ds gradient lightened'             => esc_html__( 'Dark Grey', 'finvision' ),
					'ds ms'          => esc_html__( 'Dark', 'finvision' ),
					'cs gradient lightened'             => esc_html__( 'Accent Color', 'finvision' ),
				),
			),
			'section_borders' => array(
				'type'  => 'multi-select',
				'value' => array(),
				'label' => esc_html__('Section borders', 'finvision'),
				'help'  => esc_html__('You can select multiple choices', 'finvision'),
				'prepopulate' => false,
				'choices' => array(
					'with_top_border' => esc_html__('Top section border', 'finvision'),
					'with_bottom_border' => esc_html__('Bottom section border', 'finvision'),
					'with_top_border_container' => esc_html__('Top container border', 'finvision'),
					'with_bottom_border_container' => esc_html__('Bottom container border', 'finvision'),
				),
				'limit' => 100,
			),
			'top_padding'      => array(
				'type'    => 'select',
				'value'   => 'section_padding_top_50',
				'label'   => esc_html__( 'Top padding', 'finvision' ),
				'desc'    => esc_html__( 'Choose top padding value', 'finvision' ),
				'choices' => array(
					'section_padding_top_0'   => esc_html__( '0', 'finvision' ),
					'section_padding_top_5'   => esc_html__( '5 px', 'finvision' ),
					'section_padding_top_15'  => esc_html__( '15 px', 'finvision' ),
					'section_padding_top_25'  => esc_html__( '25 px', 'finvision' ),
					'section_padding_top_30'  => esc_html__( '30 px', 'finvision' ),
					'section_padding_top_40'  => esc_html__( '40 px', 'finvision' ),
					'section_padding_top_50'  => esc_html__( '50 px', 'finvision' ),
					'section_padding_top_65'  => esc_html__( '65 px', 'finvision' ),
					'section_padding_top_75'  => esc_html__( '75 px', 'finvision' ),
					'section_padding_top_90'  => esc_html__( '90 px', 'finvision' ),
					'section_padding_top_100' => esc_html__( '100 px', 'finvision' ),
					'section_padding_top_105' => esc_html__( '105 px', 'finvision' ),
					'section_padding_top_110' => esc_html__( '110 px', 'finvision' ),
					'section_padding_top_115' => esc_html__( '115 px', 'finvision' ),
					'section_padding_top_120' => esc_html__( '120 px', 'finvision' ),
					'section_padding_top_125' => esc_html__( '125 px', 'finvision' ),
					'section_padding_top_130' => esc_html__( '130 px', 'finvision' ),
					'section_padding_top_135' => esc_html__( '135 px', 'finvision' ),
					'section_padding_top_140' => esc_html__( '140 px', 'finvision' ),
					'section_padding_top_145' => esc_html__( '145 px', 'finvision' ),
					'section_padding_top_150' => esc_html__( '150 px', 'finvision' ),
				),
			),
			'bottom_padding'   => array(
				'type'    => 'select',
				'value'   => 'section_padding_bottom_50',
				'label'   => esc_html__( 'Bottom padding', 'finvision' ),
				'desc'    => esc_html__( 'Choose bottom padding value', 'finvision' ),
				'choices' => array(
					'section_padding_bottom_0'   => esc_html__( '0', 'finvision' ),
					'section_padding_bottom_5'   => esc_html__( '5 px', 'finvision' ),
					'section_padding_bottom_15'  => esc_html__( '15 px', 'finvision' ),
					'section_padding_bottom_25'  => esc_html__( '25 px', 'finvision' ),
					'section_padding_bottom_30'  => esc_html__( '30 px', 'finvision' ),
					'section_padding_bottom_40'  => esc_html__( '40 px', 'finvision' ),
					'section_padding_bottom_50'  => esc_html__( '50 px', 'finvision' ),
					'section_padding_bottom_65'  => esc_html__( '65 px', 'finvision' ),
					'section_padding_bottom_75'  => esc_html__( '75 px', 'finvision' ),
					'section_padding_bottom_90'  => esc_html__( '90 px', 'finvision' ),
					'section_padding_bottom_100' => esc_html__( '100 px', 'finvision' ),
					'section_padding_bottom_105' => esc_html__( '105 px', 'finvision' ),
					'section_padding_bottom_110' => esc_html__( '110 px', 'finvision' ),
					'section_padding_bottom_115' => esc_html__( '115 px', 'finvision' ),
					'section_padding_bottom_120' => esc_html__( '120 px', 'finvision' ),
					'section_padding_bottom_125' => esc_html__( '125 px', 'finvision' ),
					'section_padding_bottom_130' => esc_html__( '130 px', 'finvision' ),
					'section_padding_bottom_135' => esc_html__( '135 px', 'finvision' ),
					'section_padding_bottom_140' => esc_html__( '140 px', 'finvision' ),
					'section_padding_bottom_145' => esc_html__( '145 px', 'finvision' ),
					'section_padding_bottom_150' => esc_html__( '150 px', 'finvision' ),
				),
			),

			'skew_overlay' => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'is_overlay'     => array(
						'label' => esc_html__( 'Skew Overlay', 'finvision' ),
						'type'  => 'switch',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('No', 'finvision'),
						),
						'right-choice' => array(
							'value' => 'overlay',
							'label' => esc_html__('Yes', 'finvision'),
						),
					),
				),
				'choices'      => array(
					''          => array(),
					'overlay'   => array(
						'overlay_side'     => array(
							'label' => esc_html__( 'Overlay Side', 'finvision' ),
							'type'  => 'switch',
							'left-choice' => array(
								'value' => 'left',
								'label' => esc_html__('Left', 'finvision'),
							),
							'right-choice' => array(
								'value' => 'right',
								'label' => esc_html__('Right', 'finvision'),
							),
						),
					),
				),
			),


			'background_image' => array(
				'label'   => esc_html__( 'Background Image', 'finvision' ),
				'desc'    => esc_html__( 'Please select the background image', 'finvision' ),
				'type'    => 'background-image',
				'choices' => array(//	in future may will set predefined images
				)
			),
			'background_cover' => array(
				'label' => esc_html__( 'Background Cover', 'finvision' ),
				'type'  => 'switch',
			),
			'parallax'         => array(
				'label' => esc_html__( 'Parallax', 'finvision' ),
				'type'  => 'switch',
			),
			'overlay_color'    => array(
				'label' => esc_html__( 'Overlay color', 'finvision' ),
				'desc'  => esc_html__( 'Overlay background image with semitransparent section background color', 'finvision' ),
				'value' => false,
				'type'  => 'switch',
			),
			'section_id' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('ID attribute', 'finvision'),
				'desc'  => esc_html__('Add ID attribute to section. Useful for single page menu', 'finvision'),
			),
			'section_class' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('Custom class for section', 'finvision'),
				'desc'  => esc_html__('Add custom class to section. Useful for custom styling', 'finvision'),
			),
		),
	),

	'tab_alignment_spacing' => array(
		'type' => 'tab',
		'title' => esc_html__('Columns Alignment and Spacing', 'finvision'),
		'options' => array(

			'columns_padding'  => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Column paddings', 'finvision' ),
				'desc'    => esc_html__( 'Choose columns horizontal paddings value', 'finvision' ),
				'choices' => array(
					'columns_padding_0'  => esc_html__( '0', 'finvision' ),
					'columns_padding_1'  => esc_html__( '1 px', 'finvision' ),
					'columns_padding_2'  => esc_html__( '2 px', 'finvision' ),
					'columns_padding_5'  => esc_html__( '5 px', 'finvision' ),
					'columns_padding_10' => esc_html__( '10 px', 'finvision' ),
					'' => esc_html__( '15 px - default', 'finvision' ),
					'columns_padding_30' => esc_html__( '30 px', 'finvision' ),
					'columns_padding_50' => esc_html__( '50 px', 'finvision' ),
					'columns_padding_60' => esc_html__( '60 px', 'finvision' ),
					'columns_padding_80' => esc_html__( '80 px', 'finvision' ),
				),
			),
			'columns_top_margin'  => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Column Top Margin', 'finvision' ),
				'desc'    => esc_html__( 'Choose columns top margin value', 'finvision' ),
				'choices' => array(
					'columns_margin_top_0'  => esc_html__( '0 px', 'finvision' ),
					'columns_margin_top_5'  => esc_html__( '5 px', 'finvision' ),
					''  => esc_html__( '10 px - default', 'finvision' ),
					'columns_margin_top_15'  => esc_html__( '15 px', 'finvision' ),
					'columns_margin_top_20'  => esc_html__( '20 px', 'finvision' ),
					'columns_margin_top_30'  => esc_html__( '30 px', 'finvision' ),
					'columns_margin_top_40'  => esc_html__( '40 px', 'finvision' ),
					'columns_margin_top_50'  => esc_html__( '50 px', 'finvision' ),
					'columns_margin_top_60'  => esc_html__( '60 px', 'finvision' ),
				),
			),
			'columns_bottom_margin'  => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Column Bottom Margin', 'finvision' ),
				'desc'    => esc_html__( 'Choose columns bottom margin value', 'finvision' ),
				'choices' => array(
					'columns_margin_bottom_0'   => esc_html__( '0 px', 'finvision' ),
					'columns_margin_bottom_5'   => esc_html__( '5 px', 'finvision' ),
					''  => esc_html__( '10 px - default', 'finvision' ),
					'columns_margin_bottom_15'  => esc_html__( '15 px', 'finvision' ),
					'columns_margin_bottom_20'  => esc_html__( '20 px', 'finvision' ),
					'columns_margin_bottom_30'  => esc_html__( '30 px', 'finvision' ),
					'columns_margin_bottom_40'  => esc_html__( '40 px', 'finvision' ),
					'columns_margin_bottom_50'  => esc_html__( '50 px', 'finvision' ),
					'columns_margin_bottom_60'  => esc_html__( '60 px', 'finvision' ),
				),
			),
			'is_flex_wrap'         => array(
				'label' => esc_html__( 'Equalize columns height', 'finvision' ),
				'type'  => 'switch',
			),
			'is_vertical_center'         => array(
				'label' => esc_html__( 'Vertical align columns', 'finvision' ),
				'desc'  => esc_html__( 'Align columns vertically', 'finvision' ),
				'type'  => 'switch',
			),
			'is_content_vertical_center'         => array(
				'label' => esc_html__( 'Vertical align content in columns', 'finvision' ),
				'desc'  => esc_html__( 'Stretch columns height and align content vertically', 'finvision' ),
				'type'  => 'switch',
			),
		),
	),

	'tab_onehalf_media_options' => array(
		'type' => 'tab',
		'title' => esc_html__('One half width Media', 'finvision'),
		'options' => array(
			'side_media_image' => array(
				'type'  => 'upload',
				'value' => array(),
				'label' => esc_html__('Side media image', 'finvision'),
				'desc'  => esc_html__('Select image that you want to appear as one half side image', 'finvision'),
				'images_only' => true,
			),
			'side_media_link' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('Link to your side media', 'finvision'),
				'desc'  => esc_html__('You can add a link to your side media. If YouTube link will be provided, video will play in LightBox', 'finvision'),
			),
			'side_media_video' => array(
				'type'    => 'oembed',
				'value'   => '',
				'label'   => esc_html__( 'Video', 'finvision' ),
				'desc'    => esc_html__( 'Adds video player. Works only when side media image is set', 'finvision' ),
				'help'    => esc_html__( 'Leave blank if no needed', 'finvision' ),
				'preview' => array(
					'width'      => 278, // optional, if you want to set the fixed width to iframe
					'height'     => 185, // optional, if you want to set the fixed height to iframe
					/**
					 * if is set to false it will force to fit the dimensions,
					 * because some widgets return iframe with aspect ratio and ignore applied dimensions
					 */
					'keep_ratio' => true
				),
			),
			'side_media_position'  => array(
				'type'  => 'switch',
				'value' => 'image_cover_left',
				'label' => esc_html__('Media position', 'finvision'),
				'desc'  => esc_html__('Left or right media position', 'finvision'),
				'left-choice' => array(
					'value' => 'image_cover_left',
					'label' => esc_html__('Left', 'finvision'),
				),
				'right-choice' => array(
					'value' => 'image_cover_right',
					'label' => esc_html__('Right', 'finvision'),
				),
			),
		),

	),

);
