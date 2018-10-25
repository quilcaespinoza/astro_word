<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Include static files: javascript and css
 */

//removing default font awesome css style - we using our "fonts.css" file which contain font awesome
wp_deregister_style( 'fw-font-awesome' );

//Add Theme Fonts
wp_enqueue_style(
	'finvision-icon-fonts',
	FINVISION_THEME_URI . '/css/fonts.css',
	array(),
	FINVISION_THEME_VERSION
);

if ( is_admin_bar_showing() ) {
	//Add Frontend admin styles
	wp_register_style(
		'finvision-admin_bar',
		FINVISION_THEME_URI . '/css/admin-frontend.css',
		array(),
		FINVISION_THEME_VERSION
	);
	wp_enqueue_style( 'finvision-admin_bar' );
}

//styles and scripts below only for frontend: if in dashboard - exit
if ( is_admin() ) {
	return;
}

/**
 * Enqueue scripts and styles for the front end.
 */
// Add theme google font, used in the main stylesheet.
wp_enqueue_style(
	'finvision-font',
	finvision_google_font_url(),
	array(),
	FINVISION_THEME_VERSION
);

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

if ( is_singular() && wp_attachment_is_image() ) {
	wp_enqueue_script(
		'finvision-keyboard-image-navigation',
		FINVISION_THEME_URI . '/js/keyboard-image-navigation.js',
		array( 'jquery' ),
		FINVISION_THEME_VERSION
	);
}

//plugins theme script
wp_enqueue_script(
	'finvision-modernizr',
	FINVISION_THEME_URI . '/js/vendor/modernizr-2.6.2.min.js',
	false,
	'2.6.2',
	false
);


//replacing one compressed script with uncompressed versions - new theme requirements
wp_enqueue_script( 'bootstrap', FINVISION_THEME_URI . '/js/vendor/bootstrap.min.js', array( 'jquery' ), FINVISION_THEME_VERSION, true );
wp_enqueue_script( 'appear', FINVISION_THEME_URI . '/js/vendor/jquery.appear.js', array( 'jquery' ), FINVISION_THEME_VERSION, true );
wp_enqueue_script( 'hoverIntent', FINVISION_THEME_URI . '/js/vendor/jquery.hoverIntent.js', array( 'jquery' ), FINVISION_THEME_VERSION, true );
wp_enqueue_script( 'superfish', FINVISION_THEME_URI . '/js/vendor/superfish.js', array( 'jquery' ), FINVISION_THEME_VERSION, true );
wp_enqueue_script( 'easing', FINVISION_THEME_URI . '/js/vendor/jquery.easing.1.3.js', array( 'jquery' ), FINVISION_THEME_VERSION, true );
wp_enqueue_script( 'totop', FINVISION_THEME_URI . '/js/vendor/jquery.ui.totop.js', array( 'jquery' ), FINVISION_THEME_VERSION, true );
wp_enqueue_script( 'localScroll', FINVISION_THEME_URI . '/js/vendor/jquery.localScroll.min.js', array( 'jquery' ), FINVISION_THEME_VERSION, true );
wp_enqueue_script( 'scrollTo', FINVISION_THEME_URI . '/js/vendor/jquery.scrollTo.min.js', array( 'jquery' ), FINVISION_THEME_VERSION, true );
wp_enqueue_script( 'scrollbar', FINVISION_THEME_URI . '/js/vendor/jquery.scrollbar.min.js', array( 'jquery' ), FINVISION_THEME_VERSION, true );
wp_enqueue_script( 'parallax', FINVISION_THEME_URI . '/js/vendor/jquery.parallax-1.1.3.js', array( 'jquery' ), FINVISION_THEME_VERSION, true );
wp_enqueue_script( 'easypiechart', FINVISION_THEME_URI . '/js/vendor/jquery.easypiechart.min.js', array( 'jquery' ), FINVISION_THEME_VERSION, true );
wp_enqueue_script( 'bootstrap-progressbar', FINVISION_THEME_URI . '/js/vendor/bootstrap-progressbar.min.js', array( 'jquery' ), FINVISION_THEME_VERSION, true );
wp_enqueue_script( 'countTo', FINVISION_THEME_URI . '/js/vendor/jquery.countTo.js', array( 'jquery' ), FINVISION_THEME_VERSION, true );
wp_enqueue_script( 'prettyPhoto', FINVISION_THEME_URI . '/js/vendor/jquery.prettyPhoto.js', array( 'jquery' ), FINVISION_THEME_VERSION, true );
wp_enqueue_script( 'countdown', FINVISION_THEME_URI . '/js/vendor/jquery.countdown.min.js', array( 'jquery' ), FINVISION_THEME_VERSION, true );
wp_enqueue_script( 'isotope', FINVISION_THEME_URI . '/js/vendor/isotope.pkgd.min.js', array( 'jquery' ), FINVISION_THEME_VERSION, true );
wp_enqueue_script( 'owl-carousel', FINVISION_THEME_URI . '/js/vendor/owl.carousel.min.js', array( 'jquery' ), FINVISION_THEME_VERSION, true );
wp_enqueue_script( 'flexslider', FINVISION_THEME_URI . '/js/vendor/jquery.flexslider-min.js', array( 'jquery' ), FINVISION_THEME_VERSION, true );
wp_enqueue_script( 'finvision-js-cookie', FINVISION_THEME_URI . '/js/vendor/jquery.cookie.js', array( 'jquery' ), FINVISION_THEME_VERSION, true );

//custom plugins theme script
wp_enqueue_script(
	'finvision-plugins',
	FINVISION_THEME_URI . '/js/plugins.js',
	array( 'jquery' ),
	FINVISION_THEME_VERSION,
	true
);


//getting theme color scheme number
$color_scheme_number = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'color_scheme_number' ) : '';

//if WooCommerce - remove prettyPhoto - we have one in "compressed.js"
if ( class_exists( 'WooCommerce' ) ) :
	// Add Theme Woo Styles and Scripts
	wp_enqueue_style(
		'finvision-woo',
		FINVISION_THEME_URI . '/css/woo' . esc_attr( $color_scheme_number ) . '.css',
		array(),
		FINVISION_THEME_VERSION
	);

	wp_enqueue_script(
		'finvision-woo',
		FINVISION_THEME_URI . '/js/woo.js',
		array( 'jquery' ),
		FINVISION_THEME_VERSION,
		true
	);
endif; //WooCommerce

//selectize script
wp_enqueue_script(
	'selectize',
	FINVISION_THEME_URI . '/js/selectize.min.js',
	array( 'jquery' ),
	FINVISION_THEME_VERSION,
	true
);

//main theme script
wp_enqueue_script(
	'finvision-main',
	FINVISION_THEME_URI . '/js/main.js',
	array( 'jquery' ),
	FINVISION_THEME_VERSION,
	true
);

wp_localize_script('finvision-main', 'WPURLS', array( 'siteurl' => get_option('siteurl') ));

//Add Theme Booked Styles
if( class_exists('booked_plugin')) {
	wp_dequeue_style('booked-styles');
	wp_dequeue_style('booked-responsive');
	wp_enqueue_style(
		'finvision-booked',
		FINVISION_THEME_URI . '/css/booked' . esc_attr( $color_scheme_number ) . '.css',
		array(),
		'1.0.1'
	);
}//Booked

// Add Theme stylesheet.
wp_enqueue_style( 'finvision-css-style', get_stylesheet_uri() );

// Add Bootstrap Style
wp_enqueue_style(
	'bootstrap',
	FINVISION_THEME_URI . '/css/bootstrap.min.css',
	array(),
	FINVISION_THEME_VERSION
);

// Add Animations Style
wp_enqueue_style(
	'finvision-animations',
	FINVISION_THEME_URI . '/css/animations.css',
	array(),
	FINVISION_THEME_VERSION
);

// Add Theme Style
wp_enqueue_style(
	'finvision-main',
	FINVISION_THEME_URI . '/css/main' . esc_attr( $color_scheme_number ) . '.css',
	array(),
	FINVISION_THEME_VERSION
);

wp_add_inline_style( 'finvision-main', finvision_add_font_styles_in_head() );
