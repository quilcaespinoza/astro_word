<?php if ( ! defined( 'ABSPATH' ) ) {
	die();
}
if ( ( defined( 'FW' ) ) && ! ( class_exists( 'MWT_Widget_Contacts' ) ) ) :

class MWT_Widget_Contacts extends WP_Widget {

	/**
	 * Widget constructor.
	 */
	private $options;
	private $prefix;

	function __construct() {

		$widget_ops = array(
			'classname'   => 'widget_contacts',
			'description' => esc_html__( 'Add company logo with contacts', 'mwt-widgets' ),
		);

		parent::__construct( false, esc_html__( 'Theme - Contacts', 'mwt-widgets' ), $widget_ops );

		//Create our options by using Unyson option types
		$this->options = array(
			'title' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Widget Title', 'mwt-widgets' ),
			),
			'contacts' => array(
				'type'  => 'addable-box',
				'value' => array(),
				'label' => esc_html__('Contact item', 'mwt-widgets'),
				'desc'  => esc_html__('Media element with contact info and related icon', 'mwt-widgets'),
				'help'  => esc_html__('Enter contact info and choose icon', 'mwt-widgets'),
				'template' => '{{=contact_info}}',
				'box-options' => array(
					'contact_info' => array( 'type' => 'textarea' ),
					'link' => array(
						'type'   => 'text',
						'value'  => '',
						'label'  =>  esc_html__('Link address', 'mwt-widgets'),
						'desc'   => esc_html__('Fill this field only if you want it to be a link', 'mwt-widgets'),
					),
					'icon'       => array(
						'type'  => 'icon-v2',
						'label' => esc_html__( 'Choose an Icon', 'mwt-widgets' )
					),
					'icon_color'     => array(
						'type'    => 'select',
						'value'   => '',
						'label'   => esc_html__( 'Icon Color', 'mwt-widgets' ),
						'choices' => array(
							''           => esc_html__( 'Grey', 'mwt-widgets' ),
							'black'      => esc_html__( 'Darkgrey', 'mwt-widgets' ),
							'highlight'  => esc_html__( 'Accent Color', 'mwt-widgets' ),

						),
					),
				),
				'add-button-text' => esc_html__('Add', 'mwt-widgets'),
				'sortable' => true,
			)

		);
		$this->prefix  = 'widget_contacts';
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

		$filepath = MWT_WIDGETS_PLUGIN_PATH . '/widgets/contacts/views/widget.php';

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