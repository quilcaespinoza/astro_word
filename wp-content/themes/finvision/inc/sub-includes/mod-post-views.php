<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

if ( ! function_exists( 'finvision_show_post_views_count' ) ) :
	function finvision_show_post_views_count( $only_number = true ) {
		if ( function_exists( 'mwt_show_post_views_count' ) ) {
			mwt_show_post_views_count( $only_number );
		}
	} //finvision_show_post_views_count()
endif;
