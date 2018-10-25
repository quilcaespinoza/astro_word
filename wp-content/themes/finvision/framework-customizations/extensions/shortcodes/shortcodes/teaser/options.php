<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

//get button to add in a teaser:
$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );
$button_options = $button->get_options();
unset( $button_options['link'] );
$button_array = array(
	'button' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'value'   => false,
		'picker'  => array(
			'show_button' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Show teaser button', 'finvision' ),
				'left-choice'  => array(
					'value' => '',
					'label' => esc_html__( 'No', 'finvision' ),
				),
				'right-choice' => array(
					'value' => 'button',
					'label' => esc_html__( 'Yes', 'finvision' ),
				),
			),
		),
		'choices' => array(
			''       => array(),
			'button' => $button_options,
		),
	)
);

$teaser_center_array = array(
	'teaser_offset_icon' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Top offset icon', 'finvision' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'finvision' ),
		),
		'right-choice' => array(
			'value' => 'text-center',
			'label' => esc_html__( 'Yes', 'finvision' ),
		),
	),
	'teaser_center' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Center teaser contents', 'finvision' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'finvision' ),
		),
		'right-choice' => array(
			'value' => 'text-center',
			'label' => esc_html__( 'Yes', 'finvision' ),
		),
	),
);

$icon_options = array(
	'type'    => 'group',
	'options' => array(
		'icon'       => array(
			'type'  => 'icon-v2',
			'label' => esc_html__( 'Choose an Icon', 'finvision' ),
		),
		'icon_size'  => array(
			'type'    => 'select',
			'value'   => 'size_normal',
			'label'   => esc_html__( 'Icon Size', 'finvision' ),
			'choices' => array(
				'size_small'  => esc_html__( 'Small', 'finvision' ),
				'size_normal' => esc_html__( 'Normal', 'finvision' ),
				'size_big'    => esc_html__( 'Big', 'finvision' ),
			)
		),
		'icon_style' => array(
			'type'    => 'image-picker',
			'value'   => '',
			'label'   => esc_html__( 'Icon Style', 'finvision' ),
			'desc'    => esc_html__( 'Select one of predefined icon styles. If not set - no icon will appear.', 'finvision' ),
			'help'    => esc_html__( 'If not set - no icon will appear.', 'finvision' ),
			'choices' => array(
				''                            => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_00.png',
				'default_icon'                => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_01.png',
				'border_icon'                 => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_02.png',
				'background_icon'               => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_03.png',
				'border_icon round'           => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_04.png',
				'background_icon round'         => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_05.png',
				'round light_bg_color thick_border_icon' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_06.png',
			),
			'blank' => false, // (optional) if true, images can be deselected
		),
	),
);

$image_options = array(
	'type'        => 'upload',
	'value'       => '',
	'label'       => esc_html__( 'Teaser Image', 'finvision' ),
	'image'       => esc_html__( 'Image for your teaser.', 'finvision' ),
	'help'        => esc_html__( 'Image for your teaser. Image can appear as an element, or background or even can be hidden depends from chosen teaser type', 'finvision' ),
	'images_only' => true,
);

$option_teaser_icon = array(
	'icon_options' => $icon_options,
);

$option_teaser_image = array(
	'teaser_image' => $image_options,
);

$option_teaser_square = array(
	'teaser_image' => $image_options,
	'teaser_banner' => array(
		'type'  => 'switch',
		'label' => esc_html__( 'Teaser Banner', 'finvision' ),
		'desc' => esc_html__( 'Put whole teaser in a link', 'finvision' )
	)
);

$option_teaser_vertical_center = array(
	'is_vertical_center'         => array(
		'label' => esc_html__( 'Vertical center', 'finvision' ),
		'desc'  => esc_html__( 'Align vertically icon and content in side teasers', 'finvision' ),
		'type'  => 'switch',
	),
);

$option_teaser_counter = array(
	'icon_options'    => $icon_options,
	'counter_options' => array(
		'type'    => 'group',
		'options' => array(

			'number'                  => array(
				'type'  => 'text',
				'value' => 10,
				'label' => esc_html__( 'Count To Number', 'finvision' ),
				'desc'  => esc_html__( 'Choose value to count to', 'finvision' ),
			),
			'counter_additional_text' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Add some text after counter', 'finvision' ),
				'desc'  => esc_html__( 'You can add "+", "%", decimal values etc.', 'finvision' ),
			),
			'speed'                   => array(
				'type'       => 'slider',
				'value'      => 1000,
				'properties' => array(
					'min'  => 500,
					'max'  => 5000,
					'step' => 100,
				),
				'label'      => esc_html__( 'Counter Speed (counter teaser only)', 'finvision' ),
				'desc'       => esc_html__( 'Choose counter speed (in milliseconds)', 'finvision' ),
			),
		),
	),
);

$options = array(
	'title'        => array(
		'type'  => 'text',
		'label' => esc_html__( 'Teaser Title', 'finvision' ),
	),

	'link'         => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Teaser link', 'finvision' ),
		'desc'  => esc_html__( 'Link on title and optional button', 'finvision' ),
	),

	'teaser_types' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'teaser_type' => array(
				'type'    => 'image-picker',
				'value'   => 'icon_top',
				'label'   => esc_html__( 'Teaser Type', 'finvision' ),
				'desc'    => esc_html__( 'Select one of predefined teaser types', 'finvision' ),
				'choices' => array(
					'icon_top'      => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_top.png',
					'icon_left'     => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_left.png',
					'icon_right'    => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_right.png',
					'icon_image_bg' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_image_bg.png',
					'counter'       => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_counter.png',
					'icon_background' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_background.png',
				),
				'blank'   => false, // (optional) if true, images can be deselected
			),
		),
		'choices'      => array(
			'icon_top'      => array_merge( $option_teaser_icon, $teaser_center_array, $button_array ),
			'icon_left'     => array_merge( $option_teaser_icon, $option_teaser_vertical_center, $button_array ),
			'icon_right'    => array_merge( $option_teaser_icon, $option_teaser_vertical_center, $button_array ),
			'icon_image_bg' => array_merge( $option_teaser_icon, $option_teaser_square, $button_array ),
			'counter'       => $option_teaser_counter,
			'icon_background' => $option_teaser_icon
		),
		'show_borders' => true,
	),

	'teaser_style' => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Teaser Box Style', 'finvision' ),
		'choices' => array(
			''                             => esc_html__( 'Default (no border or background)', 'finvision' ),
			'with_padding big-padding with_border'     => esc_html__( 'Bordered', 'finvision' ),
			'with_padding big-padding with_background' => esc_html__( 'Muted Background', 'finvision' ),
			'with_padding big-padding with_shadow' => esc_html__( 'With Shadow', 'finvision' ),
			'with_padding big-padding ls ms'           => esc_html__( 'Grey Background', 'finvision' ),
			'with_padding big-padding ds gradient lightened'              => esc_html__( 'Dark background', 'finvision' ),
			'with_padding big-padding ds ms'           => esc_html__( 'Darkgrey Background', 'finvision' ),
			'with_padding big-padding cs gradient lightened'   => esc_html__( 'Accent color', 'finvision' ),
			'with_padding big-padding with_shadow with_thick_color_border'   => esc_html__( 'Thick Color Border', 'finvision' ),
		)
	),

	'teaser_accent_color' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Teaser accent color', 'finvision' ),
		'desc'    => esc_html__( 'Color of the title on mouse hover', 'finvision' ),
		'choices' => array(
			''       => esc_html__( 'Grey (default)', 'finvision' ),
			'dark'   => esc_html__( 'Dark', 'finvision' ),
			'color1' => esc_html__( 'Accent Color', 'finvision' ),
			'color1 light_bg' => esc_html__( 'Accent Color with Light Background', 'finvision' ),
		)
	),

	'content'      => array(
		'type'  => 'wp-editor',
		'label' => esc_html__( 'Teaser text', 'finvision' ),
		'desc'  => esc_html__( 'Enter desired teaser content', 'finvision' ),
	),

	'title_tag' => array(
		'type'    => 'select',
		'value'   => 'h3',
		'label'   => esc_html__( 'Title Tag', 'finvision' ),
		'choices' => array(
			'h2' => esc_html__( 'H2', 'finvision' ),
			'h3' => esc_html__( 'H3', 'finvision' ),
			'h4' => esc_html__( 'H4', 'finvision' ),
			'h5' => esc_html__( 'H5', 'finvision' ),
			'h6' => esc_html__( 'H6', 'finvision' ),
		)
	),

	'title_text_wight' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Title text weight', 'finvision' ),
		'choices' => array(
			''      => esc_html__( 'Regular', 'finvision' ),
			'thin'  => esc_html__( 'Thin', 'finvision' ),
			'semibold'  => esc_html__( 'Semibold', 'finvision' ),
			'bold'  => esc_html__( 'Bold', 'finvision' ),
		),
	),

	'title_text_transform' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Title text transform', 'finvision' ),
		'choices' => array(
			''                => esc_html__( 'None', 'finvision' ),
			'text-lowercase'  => esc_html__( 'Lowercase', 'finvision' ),
			'text-uppercase'  => esc_html__( 'Uppercase', 'finvision' ),
			'text-capitalize' => esc_html__( 'Capitalize', 'finvision' ),

		),
	),
);