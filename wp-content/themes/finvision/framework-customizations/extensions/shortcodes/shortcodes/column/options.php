<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$custom_column_classes = array(
	'custom_classes'    => array(
		'type'  => 'text',
		'label' => esc_html__( 'Custom column classes', 'finvision' ),
		'desc'  => esc_html__( 'Enter custom column classes', 'finvision' ),
	),
);

$options = array(
	'column_align'     => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Text alignment in column', 'finvision' ),
		'desc'    => esc_html__( 'Select text alignment inside your column', 'finvision' ),
		'choices' => array(
			''            => esc_html__( 'Inherit', 'finvision' ),
			'text-left'   => esc_html__( 'Left', 'finvision' ),
			'text-center' => esc_html__( 'Center', 'finvision' ),
			'text-right'  => esc_html__( 'Right', 'finvision' ),
		),
	),
	'column_padding'   => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Column padding', 'finvision' ),
		'desc'    => esc_html__( 'Select optional internal column paddings', 'finvision' ),
		'choices' => array(
			''           => esc_html__( 'No padding', 'finvision' ),
			'padding_10' => esc_html__( '10px', 'finvision' ),
			'padding_20' => esc_html__( '20px', 'finvision' ),
			'padding_30' => esc_html__( '30px', 'finvision' ),
			'padding_40' => esc_html__( '40px', 'finvision' ),
            'with_padding' => esc_html__( 'Theme style padding', 'finvision' ),
            'with_padding big-padding' => esc_html__( 'Theme style big padding', 'finvision' ),

		),
	),
	'background_color' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Background color', 'finvision' ),
		'desc'    => esc_html__( 'Select background color', 'finvision' ),
		'help'    => esc_html__( 'Select one of predefined background colors', 'finvision' ),
		'choices' => array(
			''                      => esc_html__( 'Transparent (No Background)', 'finvision' ),
			'with_background'      => esc_html__( 'Muted', 'finvision' ),
			'ds'                    => esc_html__( 'Dark Grey', 'finvision' ),
			'ds ms'                 => esc_html__( 'Dark', 'finvision' ),
			'main_bg_color'         => esc_html__( 'Accent color 1', 'finvision' ),
			'main_bg_color2'        => esc_html__( 'Accent color 2', 'finvision' ),
		),
	),
	'column_border' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Column border', 'finvision' ),
		'desc'    => esc_html__( 'Select optional border for column', 'finvision' ),
		'choices' => array(
			''                      => esc_html__( 'Transparent (No Background)', 'finvision' ),
			'with_background'       => esc_html__( 'No border', 'finvision' ),
			'with_border'           => esc_html__( 'With thin border', 'finvision' ),
			'with_border thick_border'  => esc_html__( 'With thick border', 'finvision' ),
		),
	),
	'background_image' => array(
		'label'   => esc_html__( 'Background Image', 'finvision' ),
		'desc'    => esc_html__( 'Select the background image', 'finvision' ),
		'type'    => 'background-image',
		'choices' => array(//	in future may will set predefined images
		)
	),
	'column_inner_box_custom_class'    => array(
		'type'  => 'text',
		'label' => esc_html__( 'Custom class', 'finvision' ),
		'desc'  => esc_html__( 'This class will be applied to the inner "div" of the column', 'finvision' ),
	),
	'column_animation' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Animation type', 'finvision' ),
		'desc'    => esc_html__( 'Select one of predefined animations', 'finvision' ),
		'choices' => array(
			''               => esc_html__( 'None', 'finvision' ),
			'slideDown'      => esc_html__( 'slideDown', 'finvision' ),
			'scaleAppear'    => esc_html__( 'scaleAppear', 'finvision' ),
			'fadeInLeft'     => esc_html__( 'fadeInLeft', 'finvision' ),
			'fadeInUp'       => esc_html__( 'fadeInUp', 'finvision' ),
			'fadeInRight'    => esc_html__( 'fadeInRight', 'finvision' ),
			'fadeInDown'     => esc_html__( 'fadeInDown', 'finvision' ),
			'fadeIn'         => esc_html__( 'fadeIn', 'finvision' ),
			'slideRight'     => esc_html__( 'slideRight', 'finvision' ),
			'slideUp'        => esc_html__( 'slideUp', 'finvision' ),
			'slideLeft'      => esc_html__( 'slideLeft', 'finvision' ),
			'expandUp'       => esc_html__( 'expandUp', 'finvision' ),
			'slideExpandUp'  => esc_html__( 'slideExpandUp', 'finvision' ),
			'expandOpen'     => esc_html__( 'expandOpen', 'finvision' ),
			'bigEntrance'    => esc_html__( 'bigEntrance', 'finvision' ),
			'hatch'          => esc_html__( 'hatch', 'finvision' ),
			'tossing'        => esc_html__( 'tossing', 'finvision' ),
			'pulse'          => esc_html__( 'pulse', 'finvision' ),
			'floating'       => esc_html__( 'floating', 'finvision' ),
			'bounce'         => esc_html__( 'bounce', 'finvision' ),
			'pullUp'         => esc_html__( 'pullUp', 'finvision' ),
			'pullDown'       => esc_html__( 'pullDown', 'finvision' ),
			'stretchLeft'    => esc_html__( 'stretchLeft', 'finvision' ),
			'stretchRight'   => esc_html__( 'stretchRight', 'finvision' ),
			'fadeInUpBig'    => esc_html__( 'fadeInUpBig', 'finvision' ),
			'fadeInDownBig'  => esc_html__( 'fadeInDownBig', 'finvision' ),
			'fadeInLeftBig'  => esc_html__( 'fadeInLeftBig', 'finvision' ),
			'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'finvision' ),
			'slideInDown'    => esc_html__( 'slideInDown', 'finvision' ),
			'slideInLeft'    => esc_html__( 'slideInLeft', 'finvision' ),
			'slideInRight'   => esc_html__( 'slideInRight', 'finvision' ),
			'moveFromLeft'   => esc_html__( 'moveFromLeft', 'finvision' ),
			'moveFromRight'  => esc_html__( 'moveFromRight', 'finvision' ),
			'moveFromBottom' => esc_html__( 'moveFromBottom', 'finvision' ),
		),
	),
	'animation_delay'    => array(
		'type'  => 'text',
		'label' => esc_html__( 'Animation delay (milliseconds)', 'finvision' ),
		'desc'  => esc_html__( 'You can leave it empty, default values would be used', 'finvision' ),
	),
	'custom_column' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'custom' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Custom column layout', 'finvision' ),
				'desc'        => esc_html__( 'Set your own column classes. It overrides other options. Use it only if you know what you doing', 'finvision' ),
				'left-choice'  => array(
					'value' => '',
					'label' => esc_html__( 'No', 'finvision' ),
				),
				'right-choice' => array(
					'value' => 'custom_cl',
					'label' => esc_html__( 'Yes', 'finvision' ),
				),
			),
		),
		'choices' => array(
			''       => array(),
			'custom_cl' => $custom_column_classes,
		),
        'show_borders' => true,
	)

);
