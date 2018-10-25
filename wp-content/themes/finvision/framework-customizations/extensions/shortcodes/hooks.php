<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/** @internal */
if ( ! function_exists( 'finvision_filter_disable_shortcodes' ) ) :
	function finvision_filter_disable_shortcodes( $to_disable ) {
		$to_disable[] = 'icon_box';
		$to_disable[] = 'call_to_action';

		return $to_disable;
	}
endif;
add_filter( 'fw_ext_shortcodes_disable_shortcodes', 'finvision_filter_disable_shortcodes' );