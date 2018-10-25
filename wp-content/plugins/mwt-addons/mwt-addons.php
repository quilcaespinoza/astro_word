<?php
/*
Plugin Name: Modern Web Templates theme addons
Description: Additional functions for mwtemplates theme
Version:     1.0.2
Author:      mwtemplates
Author URI:  https://themeforest.net/user/mwtemplates/
License:     GPLv2 or later
*/

if ( ! function_exists( 'mwt_login_form' ) ) :

	function mwt_login_form() {
		$redirect_url = ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$html         = '';
		if ( ! is_user_logged_in() ) {
			$html = '
			<form name="loginform" id="login-dropdown-loginform" action="' . esc_url( site_url( 'wp-login.php', 'login_post' ) ) . '" method="post">
				<div class="form-group">
					<label for="login-dropdown-user_login">' . esc_html__( 'Username', 'mwt-addons' ) . '</label>
					<input type="text" name="log" id="login-dropdown-user_login" class="form-control" value="" placeholder="' . esc_html__( 'Login', 'mwt-addons' ) . '">
				</div>
				<div class="form-group">
					<label for="login-dropdown-user_pass">' . esc_html__( 'Password', 'mwt-addons' ) . '</label>
					<input type="password" name="pwd" id="login-dropdown-user_pass" class="form-control" value="" placeholder="' . esc_html__( 'Password', 'mwt-addons' ) . '">
				</div>
				<div class="checkbox">
					<label>
						<input name="rememberme" type="checkbox" id="login-dropdown-rememberme" value="forever"> ' . esc_html__( 'Remember Me', 'mwt-addons' ) . '
					 </label>
				</div>
				<input type="submit" name="wp-submit" id="login-dropdown-wp-submit" class="theme_button color1" value="' . esc_html__( 'Log In', 'mwt-addons' ) . '" />';

			if ( get_option( 'users_can_register' ) ) {
				$html .= ' <a href="' . esc_url( wp_registration_url() ) . '" class="theme_button color2">' . esc_html__( 'Register', 'mwt-addons' ) . '</a>';
			}

			$html .= '<input type="hidden" name="redirect_to" value="' . esc_url( $redirect_url ) . '" />
			</form>';
			$html .= '<a href="' . esc_url( wp_lostpassword_url( $redirect_url ) ) . '">' . esc_html__( 'Forgot Your Password?', 'mwt-addons' ) . '</a>';
		} else {
			$html = '<a href="' . esc_url( wp_logout_url( $redirect_url ) ) . '" class="theme_button color1">' . esc_html__( 'Log out', 'mwt-addons' ) . '</a>';
			if ( current_user_can( 'read' ) ) {
				$html .= ' <a href="' . admin_url() . '" class="theme_button color2">' . esc_html__( 'Site Admin', 'mwt-addons' ) . '</a>';
			}
		}
		echo $html;
	} //mwt_login_form()

endif;


//adding user social contacts
if ( ! function_exists( 'mwt_filter_modify_user_contact_methods' ) ):
	function mwt_filter_modify_user_contact_methods( $profile_fields ) {

		// Add new fields
		$profile_fields['twitter']     = esc_html__( 'Twitter URL', 'mwt-addons' );
		$profile_fields['facebook']    = esc_html__( 'Facebook URL', 'mwt-addons' );
		$profile_fields['google_plus'] = esc_html__( 'Google+ URL', 'mwt-addons' );
		$profile_fields['youtube'] = esc_html__( 'Youtube', 'mwt-addons' );
		$profile_fields['position'] = esc_html__( 'Position', 'mwt-addons' );

		return $profile_fields;

	}
endif; //function_exists
add_filter( 'user_contactmethods', 'mwt_filter_modify_user_contact_methods' );


require_once  plugin_dir_path( __FILE__ ) . '/mod-post-likes.php';
require_once  plugin_dir_path( __FILE__ ) . '/mod-post-views.php';
require_once  plugin_dir_path( __FILE__ ) . '/mod-post-share-buttons.php';
