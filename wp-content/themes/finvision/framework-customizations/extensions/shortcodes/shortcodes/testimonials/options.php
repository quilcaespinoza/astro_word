<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'testimonials'        => array(
		'label'         => esc_html__( 'Testimonials', 'finvision' ),
		'popup-title'   => esc_html__( 'Add/Edit Testimonial', 'finvision' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Testimonials.', 'finvision' ),
		'type'          => 'addable-popup',
		'template'      => '{{=review_name}}',
		'popup-options' => array(
			'review_content'       => array(
				'label' => esc_html__( 'Quote', 'finvision' ),
				'desc'  => esc_html__( 'Enter the testimonial here', 'finvision' ),
				'type'  => 'textarea',
			),
			'review_avatar' => array(
				'type'  => 'upload',
				'label' => esc_html__( 'Choose avatar image', 'finvision' ),
			),
			'review_name'   => array(
				'label' => esc_html__( 'Review author name', 'finvision' ),
				'desc'  => esc_html__( 'Enter the Name of the Person to quote', 'finvision' ),
				'type'  => 'text'
			),
			'review_position'   => array(
				'label' => esc_html__( 'Review author position', 'finvision' ),
				'desc'  => esc_html__( 'Enter the Position of the Person to quote', 'finvision' ),
				'type'  => 'text'
			),
		)
	)
);