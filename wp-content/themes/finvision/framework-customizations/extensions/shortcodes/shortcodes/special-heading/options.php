<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'heading_align' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Text alignment', 'finvision' ),
		'desc'    => esc_html__( 'Select heading text alignment', 'finvision' ),
		'choices' => array(
			''   => esc_html__( 'Left', 'finvision' ),
			'text-center' => esc_html__( 'Center', 'finvision' ),
			'text-right'  => esc_html__( 'Right', 'finvision' ),
		),
	),
	'headings'      => array(
		'type'        => 'addable-box',
		'value'       => '',
		'label'       => esc_html__( 'Headings', 'finvision' ),
		'desc'        => esc_html__( 'Choose a tag and text inside it', 'finvision' ),
		'box-options' => array(

			'heading_variant' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'value'   => false,
				'picker'  => array(
					'heading_tag'            => array(
						'type'    => 'select',
						'value'   => 'h3',
						'label'   => esc_html__( 'Heading tag', 'finvision' ),
						'desc'    => esc_html__( 'Select a tag for your heading', 'finvision' ),
						'choices' => array(
							'h2' => esc_html__( 'H2 tag', 'finvision' ),
							'h3' => esc_html__( 'H3 tag', 'finvision' ),
							'h4' => esc_html__( 'H4 tag', 'finvision' ),
							'h5' => esc_html__( 'H5 tag', 'finvision' ),
							'p'  => esc_html__( 'P tag', 'finvision' ),
						),
					),
				),
				'choices' => array(
					'h2'        => array(),
					'h3'        => array(),
					'h4'        => array(),
					'h5'        => array(),
					'p'         => array(),
					'span_bg'   => array(
						'position' => array(
							'type'      => 'switch',
							'label'     => esc_html__( 'Heading Position', 'finvision' ),
							'desc'      => esc_html__( 'Choose where to put heading, before section or inside section', 'finvision' ),
							'value'     => 'inside',
							'left-choice'   => array(
								'value' => '',
								'label' => esc_html__( 'Inside', 'finvision' )
							),
							'right-choice'   => array(
								'value' => 'before_section',
								'label' => esc_html__( 'Before', 'finvision' )
							)
						),
					)
				),
			),

			'heading_text'           => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Heading text', 'finvision' ),
				'desc'  => esc_html__( 'Text to appear in slide layer', 'finvision' ),
			),
			'heading_text_color'     => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading text color', 'finvision' ),
				'desc'    => esc_html__( 'Select a color for your text in layer', 'finvision' ),
				'choices' => array(
					''           => esc_html__( 'Inherited', 'finvision' ),
					'highlight'  => esc_html__( 'Accent Color', 'finvision' ),
					'grey'       => esc_html__( 'Dark grey theme color', 'finvision' ),
					'black'      => esc_html__( 'Dark theme color', 'finvision' ),
				),
			),
			'heading_text_weight'    => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading text weight', 'finvision' ),
				'desc'    => esc_html__( 'Select a weight for your text in layer', 'finvision' ),
				'choices' => array(
					''     => esc_html__( 'Normal', 'finvision' ),
					'bold' => esc_html__( 'Bold', 'finvision' ),
					'thin' => esc_html__( 'Thin', 'finvision' ),
				),
			),
			'heading_text_transform' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading text transform', 'finvision' ),
				'desc'    => esc_html__( 'Select a weight for your text in layer', 'finvision' ),
				'choices' => array(
					''                => esc_html__( 'None', 'finvision' ),
					'text-lowercase'  => esc_html__( 'Lowercase', 'finvision' ),
					'text-uppercase'  => esc_html__( 'Uppercase', 'finvision' ),
					'text-capitalize' => esc_html__( 'Capitalize', 'finvision' ),

				),
			),
		),
		'template'    => '{{- heading_text }}',
	)
);
