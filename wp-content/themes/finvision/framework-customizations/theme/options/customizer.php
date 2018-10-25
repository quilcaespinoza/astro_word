<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Framework options
 *
 * @var array $options Fill this array with options to generate framework settings form in WordPress customizer
 */

//find fw_ext
$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
$header_social_icons  = array();
$footer_social_icons  = array();
if ( ! empty( $shortcodes_extension ) ) {
	$social_icons_options = $shortcodes_extension->get_shortcode( 'icons_social' )->get_options();

	$header_social_icons = array(
		'header_social_icons' => $social_icons_options['social_icons'],
		'header_icons_wrapper_class' => $social_icons_options['icons_wrapper_class']
	);

	$footer_social_icons = array(
		'footer_social_icons' => $social_icons_options['social_icons'],
		'footer_icons_wrapper_class' => $social_icons_options['icons_wrapper_class']
	);

	$footer_social_icons['footer_social_icons']['box-options']['icon_text']['desc'] = esc_html__( 'Text to display near icon', 'finvision' );
	unset( $footer_social_icons['footer_social_icons']['box-options']['icon_class'] );
}

$slider_extension = fw()->extensions->get( 'slider' );
$choices = '';
if ( ! empty ( $slider_extension ) ) {
	$choices = $slider_extension->get_populated_sliders_choices();
}

//adding empty value to disable slider
$choices['0'] = esc_html__( 'No Slider', 'finvision' );

//header options
$header_v1_options = array(
	'header_static_teasers' => array(
		'type'  => 'addable-box',
		'label' => esc_html__('Header Static Teasers', 'finvision'),
		'desc'  => esc_html__('Add teasers that would be visible in static header', 'finvision'),
		'template'    => 'Item',
		'box-options' => array(
			'teaser_text' => array(
				'type' => 'wp-editor',
				'label' => esc_html__( 'Teaser text' , 'finvision' ),
			),
		),
	),
	'header_affix_teasers' => array(
		'type'  => 'addable-box',
		'label' => esc_html__('Header Affix Teasers', 'finvision'),
		'desc'  => esc_html__('Add teasers that would be visible in affix header (when scroll)', 'finvision'),
		'template'    => 'Item',
		'box-options' => array(
			'teaser_text' => array(
				'type' => 'wp-editor',
				'label' => esc_html__( 'Teaser text' , 'finvision' ),
			),
		),
	)
);

$header_teasers_common = array(
	'topline_combined_teasers' => array(
		'type'  => 'addable-box',
		'label' => esc_html__('Top Line Teasers', 'finvision'),
		'desc'  => esc_html__('Chose icon and enter teaser text', 'finvision'),
		'template'    => '{{=teaser_text}}',
		'box-options' => array(
			'teaser_icon' => array(
				'type' => 'icon-v2',
				'label' => esc_html__( 'Icon', 'finvision' ),
			),
			'teaser_text' => array(
				'type' => 'text',
				'label' => esc_html__( 'Teaser text' , 'finvision' ),
			),
			'teaser_text_link' => array(
				'type' => 'text',
				'label' => esc_html__( 'Teaser link' , 'finvision' ),
			),
		),
	),
);

$header_button = array(
	'header_button_label' => array(
		'type'  => 'text',
		'value' => esc_html__( 'Call back', 'finvision' ),
		'label' => esc_html__( 'Header button label', 'finvision' ),
	),
	'header_button_link' => array(
		'type'  => 'text',
		'value' => esc_url( '#' ),
		'label' => esc_html__( 'Header button link', 'finvision' ),
	)
);

$options = array(
	'logo_section'    => array(
		'title'   => esc_html__( 'Site Logo', 'finvision' ),
		'options' => array(
			'logo_image'             => array(
				'type'        => 'upload',
				'value'       => array(),
				'attr'        => array( 'class' => 'logo_image-class', 'data-logo_image' => 'logo_image' ),
				'label'       => esc_html__( 'Logo Image', 'finvision' ),
				'desc'        => esc_html__( 'Logo Image that appears in sections with light background', 'finvision' ),
				'help'        => esc_html__( 'Choose image to display as a site logo', 'finvision' ),
				'images_only' => true,
				'files_ext'   => array( 'png', 'jpg', 'jpeg', 'gif' ),
			),
			'logo_image_dark'             => array(
				'type'        => 'upload',
				'value'       => array(),
				'attr'        => array( 'class' => 'logo_image-class', 'data-logo_image' => 'logo_image' ),
				'label'       => esc_html__( 'Logo Image Light', 'finvision' ),
				'desc'        => esc_html__( 'Logo Image that appears in sections with light background', 'finvision' ),
				'help'        => esc_html__( 'Choose image to display as a site logo', 'finvision' ),
				'images_only' => true,
				'files_ext'   => array( 'png', 'jpg', 'jpeg', 'gif' ),
			),
			'logo_text'              => array(
				'type'  => 'text',
				'value' => 'Finvision',
				'attr'  => array( 'class' => 'logo_text-class', 'data-logo_text' => 'logo_text' ),
				'label' => esc_html__( 'Logo Text', 'finvision' ),
				'desc'  => esc_html__( 'Text that appears near logo image', 'finvision' ),
				'help'  => esc_html__( 'Type your text to show it in logo', 'finvision' ),
			),
			'footer_logo_image'             => array(
				'type'        => 'upload',
				'value'       => array(),
				'attr'        => array( 'class' => 'logo_image-class', 'data-logo_image' => 'logo_image' ),
				'label'       => esc_html__( 'Logo image that appears in footer', 'finvision' ),
				'desc'        => esc_html__( 'Select your logo', 'finvision' ),
				'help'        => esc_html__( 'Choose image to display as a site logo in footer section. If not set main logo image used', 'finvision' ),
				'images_only' => true,
				'files_ext'   => array( 'png', 'jpg', 'jpeg', 'gif' ),
			),
		),
	),
	'layout'          => array(
		'title'   => esc_html__( 'Theme Layout', 'finvision' ),
		'options' => array(
			'layout' => array(
				'type'    => 'multi-picker',
				'value'   => 'wide',
				'attr'    => array( 'class' => 'theme-layout-class', 'data-theme-layout' => 'layout' ),
				'label'   => esc_html__( 'Theme layout', 'finvision' ),
				'desc'    => esc_html__( 'Wide or Boxed layout', 'finvision' ),
				'picker'  => array(
					'boxed' => array(
						'type'         => 'switch',
						'value'        => '',
						'label'        => false,
						'desc'         => false,
						'left-choice'  => array(
							'value' => '',
							'label' => esc_html__( 'Wide', 'finvision' ),
						),
						'right-choice' => array(
							'value' => 'boxed_options',
							'label' => esc_html__( 'Boxed', 'finvision' ),
						),
					),
				),
				'choices' => array(
					'boxed_options' => array(
						'body_background_image' => array(
							'type'        => 'upload',
							'value'       => '',
							'label'       => esc_html__( 'Body background image', 'finvision' ),
							'help'        => esc_html__( 'Choose body background image if needed.', 'finvision' ),
							'images_only' => true,
						),
						'body_cover'            => array(
							'type'         => 'switch',
							'value'        => '',
							'label'        => esc_html__( 'Parallax background', 'finvision' ),
							'desc'         => esc_html__( 'Enable full width background for body', 'finvision' ),
							'left-choice'  => array(
								'value' => '',
								'label' => esc_html__( 'No', 'finvision' ),
							),
							'right-choice' => array(
								'value' => 'yes',
								'label' => esc_html__( 'Yes', 'finvision' ),
							),
						),
					),
				),

			),
		),
	),
	'color_scheme_number'     => array(
		'title'   => esc_html__( 'Theme Color Scheme', 'finvision' ),
		'options' => array(
			'color_scheme_number' => array(
				'type'    => 'image-picker',
				'value'   => '',
				'label'   => esc_html__( 'Color scheme', 'finvision' ),
				'desc'    => esc_html__( 'Select one of predefined theme main colors', 'finvision' ),
				'choices' => array(
					'' => get_template_directory_uri() . '/img/theme-options/color_scheme1.png',
					'2' => get_template_directory_uri() . '/img/theme-options/color_scheme2.png',
					'3' => get_template_directory_uri() . '/img/theme-options/color_scheme3.png',
				),
				'blank'   => false, // (optional) if true, image can be deselected
			),

		),
	),
	'blog_posts' => array(
		'title'   => esc_html__( 'Theme Blog', 'finvision' ),
		'options' => array(
			'blog_slider_switch' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'blog_slider_enabled' => array(
						'type'         => 'switch',
						'value'        => '',
						'label'        => esc_html__( 'Post slider', 'finvision' ),
						'desc'         => esc_html__( 'Enable slider on blog page', 'finvision' ),
						'left-choice'  => array(
							'value' => '',
							'label' => esc_html__( 'No', 'finvision' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'finvision' ),
						),
					),
				),
				'choices' => array(
					'yes' => array(
						'slider_id' => array(
							'type'    => 'select',
							'value'   => '',
							'label'   => esc_html__( 'Select Slider', 'finvision' ),
							'choices' => $choices
						),
					),
				),
			),

			'blog_layout' => array(
				'type'        => 'select',
				'value'       => 'regular',
				'label'       => esc_html__( 'Blog Layout', 'finvision' ),
				'desc'        => esc_html__( 'Select blog feed layout', 'finvision' ),
				'choices'     => array(
					'regular'        => esc_html__( 'Regular', 'finvision' ),
					'grid'           => esc_html__( 'Grid', 'finvision' ),
				),
			),

			'posts_side_image' => array(
				'type'         => 'switch',
				'value'        => 'post-layout-standard',
				'label'        => esc_html__( 'Side Image Layout', 'finvision' ),
				'desc'         => esc_html__( 'Enable blog post layout with side image. Works only with regular layout', 'finvision' ),
				'left-choice'  => array(
					'value' => 'post-layout-standard',
					'label' => esc_html__( 'No', 'finvision' ),
				),
				'right-choice' => array(
					'value' => 'post-layout-side',
					'label' => esc_html__( 'Yes', 'finvision' ),
				),
			),
		)
	),

	'headers'     => array(
		'title'   => esc_html__( 'Theme Header', 'finvision' ),
		'options' => array(
			'header' => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'header_var' => array(
						'type'    => 'image-picker',
						'value'   => '1',
						'attr'    => array(
							'class'    => 'header-thumbnail',
							'data-foo' => 'header',
						),
						'label'   => esc_html__( 'Template Header', 'finvision' ),
						'desc'    => esc_html__( 'Select one of predefined theme headers', 'finvision' ),
						'help'    => esc_html__( 'You can select one of predefined theme headers', 'finvision' ),
						'choices' => array(
							'1' => FINVISION_THEME_URI . '/img/theme-options/header1.png',
							'2' => FINVISION_THEME_URI . '/img/theme-options/header2.png',
							'3' => FINVISION_THEME_URI . '/img/theme-options/header3.png',
							'4' => FINVISION_THEME_URI . '/img/theme-options/header4.png',
							'5' => FINVISION_THEME_URI . '/img/theme-options/header5.png',
							'6' => FINVISION_THEME_URI . '/img/theme-options/header6.png',
							'21' => FINVISION_THEME_URI . '/img/theme-options/header21.png',
							'22' => FINVISION_THEME_URI . '/img/theme-options/header22.png',
							'23' => FINVISION_THEME_URI . '/img/theme-options/header23.png',
							'24' => FINVISION_THEME_URI . '/img/theme-options/header24.png',
						),
						'blank'   => false, // (optional) if true, image can be deselected
					),
				),
				'choices'      => array(
					'1'     => $header_v1_options,
					'2'     => $header_v1_options,
					'3'     => $header_teasers_common,
					'4'     => array(),
					'5'     => $header_teasers_common,
					'6'     => $header_teasers_common,
					'21'     => $header_teasers_common,
					'22'     => $header_teasers_common,
					'23'     => $header_teasers_common,
					'24'     => $header_teasers_common,
				),
				'show_borders' => true,
			),

			$header_social_icons,
		),
	),
	'breadcrumbs'     => array(
		'title'   => esc_html__( 'Theme Title Section', 'finvision' ),
		'options' => array(

			'breadcrumbs' => array(
				'type'    => 'image-picker',
				'value'   => '1',
				'attr'    => array(
					'class'    => 'breadcrumbs-thumbnail',
					'data-foo' => 'breadcrumbs',
				),
				'label'   => esc_html__( 'Page title sections with optional breadcrumbs', 'finvision' ),
				'desc'    => esc_html__( 'Select one of predefined page title sections. Install Unyson Breadcrumbs extension to display breadcrumbs', 'finvision' ),
				'help'    => esc_html__( 'You can select one of predefined theme title sections', 'finvision' ),
				'choices' => array(
					'1' => FINVISION_THEME_URI . '/img/theme-options/breadcrumbs1.png',
					'2' => FINVISION_THEME_URI . '/img/theme-options/breadcrumbs2.png',
					'3' => FINVISION_THEME_URI . '/img/theme-options/breadcrumbs3.png',
					'4' => FINVISION_THEME_URI . '/img/theme-options/breadcrumbs4.png',
					'5' => FINVISION_THEME_URI . '/img/theme-options/breadcrumbs5.png',
					'6' => FINVISION_THEME_URI . '/img/theme-options/breadcrumbs6.png',
				),
				'blank'   => false, // (optional) if true, image can be deselected
			),

			'breadcrumbs_background_image' => array(
				'type'        => 'background-image',
				'label'       => esc_html__( 'Background Image', 'finvision' ),
			),

		),
	),

	'footer'          => array(
		'title'   => esc_html__( 'Theme Footer', 'finvision' ),
		'options' => array(

			'footer' => array(
				'type'    => 'image-picker',
				'value'   => '1',
				'attr'    => array(
					'class'    => 'footer-thumbnail',
					'data-foo' => 'footer',
				),
				'label'   => esc_html__( 'Page footer', 'finvision' ),
				'desc'    => esc_html__( 'Select one of predefined page footers.', 'finvision' ),
				'help'    => esc_html__( 'You can select one of predefined theme footers', 'finvision' ),
				'choices' => array(
					'1' => FINVISION_THEME_URI . '/img/theme-options/footer1.png',
					'2' => FINVISION_THEME_URI . '/img/theme-options/footer2.png',
				),
				'blank'   => false, // (optional) if true, image can be deselected
			),
			$footer_social_icons
		),
	),

	'copyrights'      => array(
		'title'   => esc_html__( 'Theme Copyrights', 'finvision' ),
		'options' => array(

			'copyrights'      => array(
				'type'    => 'image-picker',
				'value'   => '1',
				'attr'    => array(
					'class'    => 'copyrights-thumbnail',
					'data-foo' => 'copyrights',
				),
				'label'   => esc_html__( 'Page copyrights', 'finvision' ),
				'desc'    => esc_html__( 'Select one of predefined page copyrights.', 'finvision' ),
				'help'    => esc_html__( 'You can select one of predefined theme copyrights', 'finvision' ),
				'choices' => array(
					'1' => FINVISION_THEME_URI . '/img/theme-options/copyrights1.png',
					'2' => FINVISION_THEME_URI . '/img/theme-options/copyrights2.png',
					'3' => FINVISION_THEME_URI . '/img/theme-options/copyrights3.png',
				),
				'blank'   => false, // (optional) if true, image can be deselected
			),
			'copyrights_text' => array(
				'type'  => 'wp-editor',
				'value' => '&copy; Copyright 2018. All Rights Reserved',
				'label' => esc_html__( 'Copyrights text', 'finvision' ),
				'desc'  => esc_html__( 'Please type your copyrights text', 'finvision' ),
			),
		),
	),
	'not_found_page'    => array(
		'title'   => esc_html__( 'Theme 404 page', 'finvision' ),
		'options' => array(
			'404_background_image'             => array(
				'type'        => 'upload',
				'value'       => array(),
				'attr'        => array( 'class' => 'logo_image-class', 'data-logo_image' => 'logo_image' ),
				'label'       => esc_html__( 'Background Image', 'finvision' ),
				'images_only' => true,
				'files_ext'   => array( 'png', 'jpg', 'jpeg', 'gif' ),
			),
		),
	),
	'fonts_panel'     => array(
		'title'   => esc_html__( 'Theme Fonts', 'finvision' ),
		'options' => array(
			'body_fonts_section' => array(
				'title'   => esc_html__( 'Font for body', 'finvision' ),
				'options' => array(
					'body_font_picker_switch' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'main_font_enabled' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => esc_html__( 'Enable', 'finvision' ),
								'desc'         => esc_html__( 'Enable custom body font', 'finvision' ),
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__( 'Disabled', 'finvision' ),
								),
								'right-choice' => array(
									'value' => 'main_font_options',
									'label' => esc_html__( 'Enabled', 'finvision' ),
								),
							),
						),
						'choices' => array(
							'main_font_options' => array(
								'main_font' => array(
									'type'       => 'typography-v2',
									'value'      => array(
										'family'         => 'Roboto',
										// For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
										// 'style' => 'italic',
										// 'weight' => 700,
										'subset'         => 'latin-ext',
										'variation'      => 'regular',
										'size'           => 14,
										'line-height'    => 24,
										'letter-spacing' => 0,
										'color'          => '#0000ff'
									),
									'components' => array(
										'family'         => true,
										// 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
										'size'           => true,
										'line-height'    => true,
										'letter-spacing' => true,
										'color'          => false
									),
									'attr'       => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
									'label'      => esc_html__( 'Custom font', 'finvision' ),
									'desc'       => esc_html__( 'Select custom font for headings', 'finvision' ),
									'help'       => esc_html__( 'You should enable using custom heading fonts above at first', 'finvision' ),
								),
							),
						),
					),
				),
			),

			'headings_fonts_section' => array(
				'title'   => esc_html__( 'Font for headings', 'finvision' ),
				'options' => array(
					'h_font_picker_switch' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'h_font_enabled' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => esc_html__( 'Enable', 'finvision' ),
								'desc'         => esc_html__( 'Enable custom heading font', 'finvision' ),
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__( 'Disabled', 'finvision' ),
								),
								'right-choice' => array(
									'value' => 'h_font_options',
									'label' => esc_html__( 'Enabled', 'finvision' ),
								),
							),
						),
						'choices' => array(
							'h_font_options' => array(
								'h_font' => array(
									'type'       => 'typography-v2',
									'value'      => array(
										'family'         => 'Roboto',
										// For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
										// 'style' => 'italic',
										// 'weight' => 700,
										'subset'         => 'latin-ext',
										'variation'      => 'regular',
										'size'           => 28,
										'line-height'    => '100%',
										'letter-spacing' => 0,
										'color'          => '#0000ff'
									),
									'components' => array(
										'family'         => true,
										// 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
										'size'           => false,
										'line-height'    => false,
										'letter-spacing' => true,
										'color'          => false
									),
									'attr'       => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
									'label'      => esc_html__( 'Custom font', 'finvision' ),
									'desc'       => esc_html__( 'Select custom font for headings', 'finvision' ),
									'help'       => esc_html__( 'You should enable using custom heading fonts above at first', 'finvision' ),
								),
							),
						),
					),
				),
			),

		),
	),
	'preloader_panel' => array(
		'title' => esc_html__( 'Theme Preloader', 'finvision' ),

		'options' => array(
			'preloader_enabled' => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Preloader', 'finvision' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'finvision' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'finvision' ),
				),
			),

			'preloader_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Custom preloader image', 'finvision' ),
				'help'        => esc_html__( 'GIF image recommended. Recommended maximum preloader width 150px, maximum preloader height 150px.', 'finvision' ),
				'images_only' => true,
			),


		),
	),
	'share_buttons'   => array(
		'title' => esc_html__( 'Theme Share Buttons', 'finvision' ),

		'options' => array(
			'share_facebook'    => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Facebook Share Button', 'finvision' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'finvision' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'finvision' ),
				),
			),
			'share_twitter'     => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Twitter Share Button', 'finvision' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'finvision' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'finvision' ),
				),
			),
			'share_google_plus' => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Google+ Share Button', 'finvision' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'finvision' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'finvision' ),
				),
			),
			'share_pinterest'   => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Pinterest Share Button', 'finvision' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'finvision' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'finvision' ),
				),
			),
			'share_linkedin'    => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable LinkedIn Share Button', 'finvision' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'finvision' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'finvision' ),
				),
			),
			'share_tumblr'      => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Tumblr Share Button', 'finvision' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'finvision' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'finvision' ),
				),
			),
			'share_reddit'      => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Reddit Share Button', 'finvision' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'finvision' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'finvision' ),
				),
			),

		),
	),

);