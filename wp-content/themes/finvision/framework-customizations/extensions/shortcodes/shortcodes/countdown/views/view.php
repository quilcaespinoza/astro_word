<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var $atts The shortcode attributes
 */

?>

<div class="comingsoon-countdown" data-count-to="<?php echo esc_attr( $atts['count_to'] ); ?>"></div>
