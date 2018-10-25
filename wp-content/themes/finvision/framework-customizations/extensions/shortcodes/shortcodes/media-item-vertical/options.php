<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get social icons to add in item:
$icon = fw_ext( 'shortcodes' )->get_shortcode( 'icon' );
//get social icons to add in item:
$icons_social = fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' );

$options = array(
	'title'      => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title of the Box', 'finvision' ),
	),
	'title_tag'  => array(
		'type'    => 'select',
		'value'   => 'h3',
		'label'   => esc_html__( 'Title Tag', 'finvision' ),
		'choices' => array(
			'h2' => esc_html__( 'H2', 'finvision' ),
			'h3' => esc_html__( 'H3', 'finvision' ),
			'h4' => esc_html__( 'H4', 'finvision' ),
		)
	),
	'content'    => array(
		'type'          => 'wp-editor',
		'label'         => esc_html__( 'Item text', 'finvision' ),
		'desc'          => esc_html__( 'Enter desired item content', 'finvision' ),
		'size'          => 'small', // small, large
		'editor_height' => 400,
	),
	'item_style' => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Item Box Style', 'finvision' ),
		'choices' => array(
			''                                => esc_html__( 'Default (no border or background)', 'finvision' ),
			'content-padding with_border'     => esc_html__( 'Bordered', 'finvision' ),
			'content-padding with_background' => esc_html__( 'Muted Background', 'finvision' ),
			'content-padding with_border with_background' => esc_html__( 'Bordered Muted Background', 'finvision' ),
			'content-padding ls ms'           => esc_html__( 'Grey background', 'finvision' ),
			'content-padding ds'              => esc_html__( 'Darkgrey background', 'finvision' ),
			'content-padding ds ms'           => esc_html__( 'Dark background', 'finvision' ),
			'content-padding cs'              => esc_html__( 'Main color background', 'finvision' ),
			'content-padding big-padding with_border'        => esc_html__( 'Bordered with Padding', 'finvision' ),
			'content-padding big-padding with_background'    => esc_html__( 'Muted Background with Padding', 'finvision' ),
			'content-padding big-padding with_border with_background'    => esc_html__( 'Bordered Muted Background with Padding', 'finvision' ),
			'content-padding big-padding ls ms'              => esc_html__( 'Grey background with Padding', 'finvision' ),
			'content-padding big-padding ds'                 => esc_html__( 'Darkgrey background with Padding', 'finvision' ),
			'content-padding big-padding ds ms'              => esc_html__( 'Dark background with Padding', 'finvision' ),
			'content-padding big-padding cs'                 => esc_html__( 'Main color background with Padding', 'finvision' ),
		)
	),
	'link'       => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Item link', 'finvision' ),
		'desc'  => esc_html__( 'Link on title and optional button', 'finvision' ),
	),
	'item_image' => array(
		'type'        => 'upload',
		'value'       => '',
		'label'       => esc_html__( 'Item Image', 'finvision' ),
		'image'       => esc_html__( 'Image for your item. Not all item layouts show image', 'finvision' ),
		'help'        => esc_html__( 'Image for your item. Image can appear as an element, or background or even can be hidden depends from chosen item type', 'finvision' ),
		'images_only' => true,
	),
	'text_align' => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Text Alignment', 'finvision' ),
		'choices' => array(
			'text-left'   => esc_html__( 'Left', 'finvision' ),
			'text-center' => esc_html__( 'Center', 'finvision' ),
			'text-right'  => esc_html__( 'Right', 'finvision' ),
		)
	),
	'icons'      => array(
		'type'            => 'addable-box',
		'value'           => '',
		'label'           => esc_html__( 'Additional info', 'finvision' ),
		'desc'            => esc_html__( 'Add icons with title and text', 'finvision' ),
		'box-options'     => $icon->get_options(),
		'add-button-text' => esc_html__( 'Add New', 'finvision' ),
		'template'        => '{{=title}}',
		'sortable'        => true,
	),
	$icons_social->get_options(),

);