<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

//find fw_ext
$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
$button_options = array();
if ( ! empty( $shortcodes_extension ) ) {
	$button_options = $shortcodes_extension->get_shortcode( 'button' )->get_options();
}

$options = array(

	array(
		'type'  => 'group',
		'options'   => array(
			'slide_image_class' => array(
				'label' => esc_html__('Image Custom Class', 'finvision'),
				'type' => 'text',
			),

			'slide_media_layers'     => array(
				'type'        => 'addable-box',
				'value'       => '',
				'label'       => esc_html__( 'Slide Media Layers', 'finvision' ),
				'desc'        => esc_html__( 'Add slide media layers before of after main image', 'finvision' ),
				'box-options' => array(
					'media_layer_position'     => array(
						'label' => esc_html__( 'Before / After Main Image', 'finvision' ),
						'desc'  => esc_html__( 'Choose where to put media layer, before of after main slide image', 'finvision' ),
						'type'  => 'switch',
						'left-choice' => array(
							'value' => 'before',
							'label' => esc_html__('Before', 'finvision'),
						),
						'right-choice' => array(
							'value' => 'after',
							'label' => esc_html__('After', 'finvision'),
						),
					),
					'media_layer_class' => array(
						'label' => esc_html__('Layer Class', 'finvision'),
						'type' => 'text',
					),
					'media_layer_image' => array(
						'label' => esc_html__('Layer Image', 'finvision'),
						'type' => 'upload',
					),
					'media_layer_animation'      => array(
						'type'    => 'select',
						'value'   => '',
						'label'   => esc_html__( 'Layer Animation', 'finvision' ),
						'desc'    => esc_html__( 'Select one of predefined animations', 'finvision' ),
						'choices' => array(
							''               => esc_html__( 'Default', 'finvision' ),
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
				),
				'template'    => esc_html__( 'Slider Media Layer', 'finvision' ),

				'limit'           => 5, // limit the number of boxes that can be added
				'add-button-text' => esc_html__( 'Add', 'finvision' ),
			),
		)
	),

	'slide_align'      => array(
		'type'        => 'select',
		'value'       => 'text-left',
		'label'       => esc_html__( 'Slide text alignment', 'finvision' ),
		'desc'        => esc_html__( 'Select slide text alignment', 'finvision' ),
		'choices'     => array(
			'text-left'   => esc_html__( 'Left', 'finvision' ),
			'text-center' => esc_html__( 'Center', 'finvision' ),
			'text-right'  => esc_html__( 'Right', 'finvision' ),
		),
		/**
		 * Allow save not existing choices
		 * Useful when you use the select to populate it dynamically from js
		 */
		'no-validate' => false,
	),

	'slide_layers'     => array(
		'type'        => 'addable-box',
		'value'       => '',
		'label'       => esc_html__( 'Slide Layers', 'finvision' ),
		'desc'        => esc_html__( 'Choose a tag and text inside it', 'finvision' ),
		'box-options' => array(
			'layer_tag'            => array(
				'type'    => 'select',
				'value'   => 'h3',
				'label'   => esc_html__( 'Layer tag', 'finvision' ),
				'desc'    => esc_html__( 'Select a tag for your ', 'finvision' ),
				'choices' => array(
					'h3' => esc_html__( 'H3 tag', 'finvision' ),
					'h2' => esc_html__( 'H2 tag', 'finvision' ),
					'h4' => esc_html__( 'H4 tag', 'finvision' ),
					'h5' => esc_html__( 'H5 tag', 'finvision' ),
					'p'  => esc_html__( 'P tag', 'finvision' ),
					'hr'  => esc_html__( 'Divider tag', 'finvision' ),

				),
			),
			'layer_animation'      => array(
				'type'    => 'select',
				'value'   => 'fadeIn',
				'label'   => esc_html__( 'Animation type', 'finvision' ),
				'desc'    => esc_html__( 'Select one of predefined animations', 'finvision' ),
				'choices' => array(
					''               => esc_html__( 'Default', 'finvision' ),
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
			'layer_text'           => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Layer text', 'finvision' ),
				'desc'  => esc_html__( 'Text to appear in slide layer', 'finvision' ),
			),
			'layer_text_color'     => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Layer text color', 'finvision' ),
				'desc'    => esc_html__( 'Select a color for your text in layer', 'finvision' ),
				'choices' => array(
					''           => esc_html__( 'Inherited', 'finvision' ),
					'highlight'  => esc_html__( 'Accent Color 1', 'finvision' ),
					'grey'       => esc_html__( 'Dark grey theme color', 'finvision' ),
					'black'      => esc_html__( 'Dark theme color', 'finvision' ),

				),
			),
			'layer_text_weight'    => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Layer text weight', 'finvision' ),
				'desc'    => esc_html__( 'Select a weight for your text in layer', 'finvision' ),
				'choices' => array(
					''     => esc_html__( 'Normal', 'finvision' ),
					'bold' => esc_html__( 'Bold', 'finvision' ),
					'thin' => esc_html__( 'Thin', 'finvision' ),

				),
			),
			'layer_text_transform' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Layer text transform', 'finvision' ),
				'desc'    => esc_html__( 'Select a text transformation for your layer', 'finvision' ),
				'choices' => array(
					''                => esc_html__( 'None', 'finvision' ),
					'text-lowercase'  => esc_html__( 'Lowercase', 'finvision' ),
					'text-uppercase'  => esc_html__( 'Uppercase', 'finvision' ),
					'text-capitalize' => esc_html__( 'Capitalize', 'finvision' ),

				),
			),
		),
		'template'    => esc_html__( 'Slider Layer', 'finvision' ),

		'limit'           => 5, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'finvision' ),
	),
	'slide_buttons'     => array(
		'type'        => 'addable-box',
		'value'       => '',
		'label'       => esc_html__( 'Slide Buttons', 'finvision' ),
		'desc'        => esc_html__( 'Choose a button, link for it and text inside it', 'finvision' ),
		'template'    => esc_html__( 'Button', 'finvision' ),
		'box-options' => array(
			$button_options
		),
		'limit'           => 5, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'finvision' ),
	),
	'slide_button_animation' => array(
		'type'    => 'select',
		'value'   => 'fadeIn',
		'label'   => esc_html__( 'Buttons animation type', 'finvision' ),
		'desc'    => esc_html__( 'Select one of predefined animations', 'finvision' ),
		'choices' => array(
			''               => esc_html__( 'Default', 'finvision' ),
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
);