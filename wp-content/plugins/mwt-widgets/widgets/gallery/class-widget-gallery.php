<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

if ( ( defined( 'FW' ) ) && ! ( class_exists( 'MWT_Widget_Gallery' ) ) ) :

class MWT_Widget_Gallery extends WP_Widget {

	/**
	 * @internal
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_gallery',
			'description' => esc_html__( 'Recent gallery images', 'mwt-widgets' ),
		);
		parent::__construct( false, esc_html__( 'Theme - Gallery', 'mwt-widgets' ), $widget_ops );

		//Create our options by using Unyson option types
		$this->options = array(
			'title' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Widget Title', 'mwt-widgets' ),
			),
			'number' => array(
				'type'       => 'text',
				'value'      => '6',
				'label'      => esc_html__( 'Number of posts', 'mwt-widgets' ),
			),
		);
		$this->prefix  = 'widget_gallery';
	}

	/**
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		extract( wp_parse_args( $args ) );

		$title     = esc_attr( $instance['title'] );
		$title     = !empty( $title ) ? $before_title  . $title . $after_title : '';
		$number = ( (int) ( $instance['number'] ) > 0 ) ? esc_attr( $instance['number'] ) : 5;

		$popular_posts = $this->fw_get_posts_with_info( array(
			'items' => $number,
		) );

		$params = array();

		foreach ( $instance as $key => $value ) {
			$params[ $key ] = $value;
		}

		$instance = $params;

		$filepath = MWT_WIDGETS_PLUGIN_PATH . '/widgets/gallery/views/widget.php';

		if ( file_exists( $filepath ) ) {
			include( $filepath );
		} else {
			esc_html_e( 'View not found', 'mwt-widgets' );
		}
	}

	/**
	 * @param array $args
	 *
	 * @return array
	 */
	public function fw_get_posts_with_info( $args = array() ) {
		$defaults = array(
			'sort'        => 'recent',
			'items'       => 6,
			'image_post'  => true,
			'date_post'   => true,
			'date_format' => 'F jS, Y',
			'post_type'   => 'fw-portfolio',

		);

		extract( wp_parse_args( $args, $defaults ) );

		$query = new WP_Query( array(
			'post_type'           => $post_type,
			'orderby'             => $sort,
			'order'               => 'DESC',
			'ignore_sticky_posts' => true,
			'posts_per_page'      => $items
		) );

		//wp reset query removed
		return $query;
	}

	public function update( $new_instance, $old_instance ) {
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