<?php
/**
 * The template for displaying page title in page title section
 *
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( is_search() ) :
	printf( esc_html__( 'Search Results for: %s', 'finvision' ), get_search_query() );
	return;
endif;

if ( is_home() ) :
	$title = function_exists( 'fw_get_db_ext_settings_option' && function_exists( 'fw_ext_breadcrumbs' ) ) ? fw_get_db_ext_settings_option( 'breadcrumbs', 'blogpage-title' ) : esc_html__( 'Blog', 'finvision' );
	echo esc_html( $title );
	return;
endif;

if ( is_404() ) :
	$title = function_exists( 'fw_get_db_ext_settings_option' && function_exists( 'fw_ext_breadcrumbs' ) ) ? fw_get_db_ext_settings_option( 'breadcrumbs', '404-title' ) : esc_html__( '404', 'finvision' );
	echo esc_html( $title );
	return;
endif;

if ( is_singular() ) :
	single_post_title();
	return;
endif;

if ( is_archive() ) :
	the_archive_title();
	return;
endif;