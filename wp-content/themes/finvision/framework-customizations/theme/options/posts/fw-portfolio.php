<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'post-addition-meta-section' => array(
		'title'   => esc_html__( 'Project Addition Info', 'finvision' ),
		'type'    => 'box',
		'context' => 'normal',

		'options' => array(
			'tab_info' => array(
				'title'   => esc_html__( 'Info list', 'finvision' ),
				'type'    => 'tab',
				'options' => array(
					'project_info'     => array(
						'type'          => 'addable-popup',
						'label'         => esc_html__( 'Info Items', 'finvision' ),
						'popup-title'   => esc_html__( 'Info Item', 'finvision' ),
						'template'      => '{{=label}}',
						'popup-options' => array(
							'label'       => array(
								'type'  => 'text',
								'label' => esc_html__('Label', 'finvision'),
							),
							'content'       => array(
								'type'  => 'wp-editor',
								'label' => esc_html__('Content', 'finvision'),
							),
						)
					)
				),
			),
			'tab_services' => array(
				'title'   => esc_html__( 'Services list', 'finvision' ),
				'type'    => 'tab',
				'options' => array(
					'project_services'     => array(
						'type'          => 'addable-popup',
						'label'         => esc_html__( 'Services Items', 'finvision' ),
						'popup-title'   => esc_html__( 'Service Item', 'finvision' ),
						'template'      => '{{=content}}',
						'popup-options' => array(
							'content'       => array(
								'type'  => 'wp-editor',
								'label' => esc_html__('Content', 'finvision'),
							),
						)
					)
				),
			),
		),
	)
);
