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
	'main' => array(
		'type'    => 'box',
		'title'   => '',
		'options' => array(
			'id'       => array(
				'type' => 'unique',
			),
			'builder'  => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Form Fields', 'finvision' ),
				'options' => array(
					'form' => array(
						'label'        => false,
						'type'         => 'form-builder',
						'value'        => array(
							'json' => apply_filters( 'fw:ext:forms:builder:load-item:form-header-title', true )
								? json_encode( array(
									array(
										'type'      => 'form-header-title',
										'shortcode' => 'form_header_title',
										'width'     => '',
										'options'   => array(
											'title'    => '',
											'subtitle' => '',
										)
									)
								) )
								: '[]'
						),
						'fixed_header' => true,
					),
				),
			),
			'settings' => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Settings', 'finvision' ),
				'options' => array(
					'settings-options' => array(
						'title'   => esc_html__( 'Contact Form Options', 'finvision' ),
						'type'    => 'tab',
						'options' => array(
							'background_color'    => array(
								'type'    => 'select',
								'value'   => 'ls',
								'label'   => esc_html__( 'Form Background color', 'finvision' ),
								'desc'    => esc_html__( 'Select background color', 'finvision' ),
								'help'    => esc_html__( 'Select one of predefined background colors', 'finvision' ),
								'choices' => array(
									''                              => esc_html__( 'No background', 'finvision' ),
									'with_padding big-padding muted_background' => esc_html__( 'Muted', 'finvision' ),
									'with_padding big-padding with_border'      => esc_html__( 'With Border', 'finvision' ),
									'with_padding big-padding ls'               => esc_html__( 'Light', 'finvision' ),
									'with_padding big-padding ls ms'            => esc_html__( 'Light Grey', 'finvision' ),
									'with_padding big-padding ds gradient lightened'               => esc_html__( 'Dark Grey', 'finvision' ),
									'with_padding big-padding ds ms'            => esc_html__( 'Dark', 'finvision' ),
									'with_padding big-padding cs gradient lightened'               => esc_html__( 'Accent Color', 'finvision' ),
								),
							),
							'columns_padding'     => array(
								'type'    => 'select',
								'value'   => 'columns_padding_15',
								'label'   => esc_html__( 'Column paddings in form', 'finvision' ),
								'desc'    => esc_html__( 'Choose columns horizontal paddings value', 'finvision' ),
								'choices' => array(
									'' => esc_html__( '15 px - default', 'finvision' ),
									'columns_padding_0'  => esc_html__( '0', 'finvision' ),
									'columns_padding_1'  => esc_html__( '1 px', 'finvision' ),
									'columns_padding_2'  => esc_html__( '2 px', 'finvision' ),
									'columns_padding_5'  => esc_html__( '5 px', 'finvision' ),
									'columns_padding_10'  => esc_html__( '10 px', 'finvision' ),
								),
							),
							'input_text_center'     => array(
								'type'  => 'switch',
								'value' => '',
								'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
								'label' => esc_html__('Input Text Center', 'finvision'),
								'desc'  => esc_html__('Center Text in Form Fields', 'finvision'),
								'left-choice' => array(
									'value' => '',
									'label' => esc_html__('No', 'finvision'),
								),
								'right-choice' => array(
									'value' => 'input-text-center',
									'label' => esc_html__('Yes', 'finvision'),
								),
							),
							'form_email_settings' => array(
								'type'    => 'group',
								'options' => array(
									'email_to' => array(
										'type'  => 'text',
										'label' => esc_html__( 'Email To', 'finvision' ),
										'help'  => esc_html__( 'We recommend you to use an email that you verify often', 'finvision' ),
										'desc'  => esc_html__( 'The form will be sent to this email address.', 'finvision' ),
									),
								),
							),
							'form_text_settings'  => array(
								'type'    => 'group',
								'options' => array(
									'subject-group'       => array(
										'type'    => 'group',
										'options' => array(
											'subject_message' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Subject Message', 'finvision' ),
												'desc'  => esc_html__( 'This text will be used as subject message for the email', 'finvision' ),
												'value' => esc_html__( 'Contact Form', 'finvision' ),
											),
										)
									),
									'submit-button-group' => array(
										'type'    => 'group',
										'options' => array(
											'submit_button_text' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Submit Button', 'finvision' ),
												'desc'  => esc_html__( 'This text will appear in submit button', 'finvision' ),
												'value' => esc_html__( 'Send Message', 'finvision' ),
											),
											'submit_button_type' => array(
												'type'    => 'select',
												'value'   => 'theme_button color1',
												'label'   => esc_html__( 'Button Type', 'finvision' ),
												'desc'    => esc_html__( 'Choose a type for your button', 'finvision' ),
												'choices' => array(
													'simple_link'          => esc_html__( 'Just link', 'finvision' ),
													'more-link'          => esc_html__( 'Read More link', 'finvision' ),
													'theme_button'         => esc_html__( 'Default', 'finvision' ),
													'theme_button color1'  => esc_html__( 'Accent Color', 'finvision' ),
													'theme_button round_button'  => esc_html__( 'Default Round', 'finvision' ),
													'theme_button color1 round_button'  => esc_html__( 'Accent Color Round', 'finvision' )
												),
											),
											'reset_button_text'  => array(
												'type'  => 'text',
												'label' => esc_html__( 'Reset Button', 'finvision' ),
												'desc'  => esc_html__( 'This text will appear in reset button. Leave blank if reset button not needed', 'finvision' ),
												'value' => esc_html__( 'Clear', 'finvision' ),
											),
											'custom_buttons'     => array(
												'type'        => 'addable-box',
												'value'       => '',
												'label'       => esc_html__( 'Custom button', 'finvision' ),
												'desc'        => esc_html__( 'Add Custom Buttons', 'finvision' ),
												'box-options' => array(
													$button_options
												),
												'template'    => esc_html__( 'Button', 'finvision' ),
												'limit'           => 5, // limit the number of boxes that can be added
												'add-button-text' => esc_html__( 'Add', 'finvision' ),
											),
										)
									),
									'success-group'       => array(
										'type'    => 'group',
										'options' => array(
											'success_message' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Success Message', 'finvision' ),
												'desc'  => esc_html__( 'This text will be displayed when the form will successfully send', 'finvision' ),
												'value' => esc_html__( 'Message sent!', 'finvision' ),
											),
										)
									),
									'failure_message'     => array(
										'type'  => 'text',
										'label' => esc_html__( 'Failure Message', 'finvision' ),
										'desc'  => esc_html__( 'This text will be displayed when the form will fail to be sent', 'finvision' ),
										'value' => esc_html__( 'Oops something went wrong.', 'finvision' ),
									),
								),
							),
						)
					),
					'mailer-options'   => array(
						'title'   => esc_html__( 'Mailer Options', 'finvision' ),
						'type'    => 'tab',
						'options' => array(
							'mailer' => array(
								'label' => false,
								'type'  => 'mailer'
							)
						)
					)
				),
			),
		),
	)
);