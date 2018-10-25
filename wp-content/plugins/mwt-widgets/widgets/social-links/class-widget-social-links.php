<?php if ( ! defined( 'ABSPATH' ) ) {
	die();
}
if ( ( defined( 'FW' ) ) && ! ( class_exists( 'MWT_Widget_Social_Links' ) ) ) :

class MWT_Widget_Social_Links extends WP_Widget {

	/**
	 * Widget constructor.
	 */
	private $options;
	private $prefix;

	function __construct() {

		$widget_ops = array(
			'classname'   => 'widget_social_links',
			'description' => esc_html__( 'Add social links', 'mwt-widgets' ),
		);

		parent::__construct( false, esc_html__( 'Theme - Social Links', 'mwt-widgets' ), $widget_ops );

		//Create our options by using Unyson option types
		$this->options = array(
			'title' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Widget Title', 'mwt-widgets' ),
			),
			'social_icons' => array(
				'type'            => 'addable-box',
				'value'           => '',
				'label'           => esc_html__( 'Social Buttons', 'mwt-widgets' ),
				'desc'            => esc_html__( 'Optional social buttons', 'mwt-widgets' ),
				'template'        => '{{=icon}}',
				'box-options'     => array(
					'icon'       => array(
						'type'  => 'icon',
						'label' => esc_html__( 'Social Icon', 'mwt-widgets' ),
						'set'   => 'social-icons',
					),
					'icon_class' => array(
						'type'        => 'select',
						'value'       => '',
						'label'       => esc_html__( 'Icon type', 'mwt-widgets' ),
						'desc'        => esc_html__( 'Select one of predefined social button types', 'mwt-widgets' ),
						'choices'     => array(
							''                                    => esc_html__( 'Default', 'mwt-widgets' ),
							'border-icon'                         => esc_html__( 'Simple Bordered Icon', 'mwt-widgets' ),
							'border-icon rounded-icon'            => esc_html__( 'Rounded Bordered Icon', 'mwt-widgets' ),
							'bg-icon'                             => esc_html__( 'Simple Background Icon', 'mwt-widgets' ),
							'bg-icon rounded-icon'                => esc_html__( 'Rounded Background Icon', 'mwt-widgets' ),
							'color-icon bg-icon'                  => esc_html__( 'Color Light Background Icon', 'mwt-widgets' ),
							'color-icon bg-icon rounded-icon'     => esc_html__( 'Color Light Background Rounded Icon', 'mwt-widgets' ),
							'color-icon'                          => esc_html__( 'Color Icon', 'mwt-widgets' ),
							'color-icon border-icon'              => esc_html__( 'Color Bordered Icon', 'mwt-widgets' ),
							'color-icon border-icon rounded-icon' => esc_html__( 'Rounded Color Bordered Icon', 'mwt-widgets' ),
							'color-bg-icon'                       => esc_html__( 'Color Background Icon', 'mwt-widgets' ),
							'color-bg-icon rounded-icon'          => esc_html__( 'Rounded Color Background Icon', 'mwt-widgets' ),

						),
						/**
						 * Allow save not existing choices
						 * Useful when you use the select to populate it dynamically from js
						 */
						'no-validate' => false,
					),
					'icon_url'   => array(
						'type'  => 'text',
						'value' => '',
						'label' => esc_html__( 'Icon Link', 'mwt-widgets' ),
						'desc'  => esc_html__( 'Provide a URL to your icon', 'mwt-widgets' ),
					)
				),
				'limit'           => 0, // limit the number of boxes that can be added
				'add-button-text' => esc_html__( 'Add', 'mwt-widgets' ),
				'sortable'        => true,
			)
		);
		$this->prefix  = 'widget_social_links';
	}

	function widget( $args, $instance ) {
		extract( wp_parse_args( $args ) );

		$title     = esc_attr( $instance['title'] );
		$title     = $before_title  . $title . $after_title;

		$params = array();

		foreach ( $instance as $key => $value ) {
			$params[ $key ] = $value;
		}

		$instance = $params;

		$filepath = MWT_WIDGETS_PLUGIN_PATH . '/widgets/social-links/views/widget.php';

		if ( file_exists( $filepath ) ) {
			include( $filepath );
		} else {
			esc_html_e( 'View not found', 'mwt-widgets' );
		}
	}

	function update( $new_instance, $old_instance ) {
		return fw_get_options_values_from_input(
			$this->options,
			FW_Request::POST( fw_html_attr_name_to_array_multi_key( $this->get_field_name( $this->prefix ) ), array() )
		);
	}

	function form( $values ) {

		$prefix = $this->get_field_id( $this->prefix ); // Get unique prefix, preventing duplicated key
		$id     = 'fw-widget-options-' . $prefix;

		// Print our options
		echo '<div class="fw-force-xs fw-theme-admin-widget-wrap fw-framework-widget-options-widget" data-fw-widget-id="' . esc_attr( $id ) . '" id="' . esc_attr( $id ) . '">';

		echo fw()->backend->render_options( $this->options, $values, array(
			'id_prefix'   => $prefix . '-',
			'name_prefix' => $this->get_field_name( $this->prefix ),
		) );
		echo '</div>';

		return $values;
	}
}

endif;