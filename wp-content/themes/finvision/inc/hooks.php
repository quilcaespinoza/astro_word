<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/**
 * Filters and Actions
 */

if ( ! function_exists( 'finvision_action_setup' ) ) :
	/**
	 * Theme setup.
	 *
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support post thumbnails.
	 * @internal
	 */
	function finvision_action_setup() {

		/*
		 * Make Theme available for translation.
		 */
		load_theme_textdomain( 'finvision', FINVISION_THEME_PATH . '/languages' );

		add_editor_style( array( 'css/main.css' ) );

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );

		//Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		set_post_thumbnail_size( 760, 380, true );
		add_image_size( 'finvision-full-width', 1170, 780, true );
		add_image_size( 'finvision-small-width', 600, 780, true );
		add_image_size( 'finvision-square-width', 600, 600, true );
		add_image_size( 'finvision-big-thumbnail-width', 1170, 585, true );

		//content width
		$GLOBALS['content_width'] = apply_filters( 'finvision_filter_content_width', 891 );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'standard',
			'aside',
			'chat',
			'gallery',
			'link',
			'image',
			'quote',
			'status',
			'video',
			'audio',
		) );

		// Declare WooCommerce support
		add_theme_support( 'woocommerce' );
	} //finvision_action_setup()

endif;
add_action( 'after_setup_theme', 'finvision_action_setup' );


/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @param array $classes A list of existing body class values.
 *
 * @return array The filtered body class list.
 * @internal
 */
if ( !function_exists( 'finvision_filter_body_classes' ) ) :
	function finvision_filter_body_classes( $classes ) {
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		if ( get_header_image() ) {
			$classes[] = 'header-image';
		} else {
			$classes[] = 'masthead-fixed';
		}

		if ( is_archive() || is_search() || is_home() ) {
			$classes[] = 'archive-list-view';
		}

		if ( function_exists( 'fw_ext_sidebars_get_current_position' ) ) {
			$current_position = fw_ext_sidebars_get_current_position();
			if ( in_array( $current_position, array( 'full', 'left' ) )
			     || empty( $current_position )
			     || is_page_template( 'page-templates/full-width.php' )
			     || is_attachment()
			) {
				$classes[] = 'full-width';
			}
		} else {
			$classes[] = 'full-width';
		}

		if ( is_active_sidebar( 'sidebar-footer' ) ) {
			$classes[] = 'footer-widgets';
		}

		if ( is_singular() && ! is_front_page() ) {
			$classes[] = 'singular';
		}

		if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
			$classes[] = 'slider';
		} elseif ( is_front_page() ) {
			$classes[] = 'grid';
		}

		return $classes;
	} //finvision_filter_body_classes()
endif;
add_filter( 'body_class', 'finvision_filter_body_classes' );

//changing default comment form
if ( ! function_exists( 'finvision_filter_finvision_contact_form_fields' ) ) :
	function finvision_filter_finvision_contact_form_fields( $fields ) {
		$commenter     = wp_get_current_commenter();
		$user          = wp_get_current_user();
		$user_identity = $user->exists() ? $user->display_name : '';
		$req           = get_option( 'require_name_email' );
		$aria_req      = ( $req ? " aria-required='true'" : '' );
		$html_req      = ( $req ? " required='required'" : '' );
		$html5         = 'html5';
		$fields        = array(
			'author'        => '<div class="col-xs-12 col-sm-6"><p class="comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'finvision' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			                   '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' placeholder="' . esc_attr__( 'Your Name', 'finvision' ) . '"></p></div>',
			'email'         => '<div class="col-xs-12 col-sm-6"><p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'finvision' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			                   '<input id="email" class="form-control" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" ' . $aria_req . $html_req . ' placeholder="' . esc_attr__( 'Email Address', 'finvision' ) . '"/></p></div>',
			'comment_field' => '<div class="col-xs-12"><p class="comment-form-comment"><label for="comment">' . esc_html_x( 'Comment', 'noun', 'finvision' ) . '</label> <textarea id="comment"  class="form-control" name="comment" cols="45" rows="3"  aria-required="true" required="required"  placeholder="' . esc_attr__( 'Your Message', 'finvision' ) . '"></textarea></p></div>',
		);
		return $fields;
	} //finvision_filter_finvision_contact_form_fields()

endif;
add_filter( 'comment_form_default_fields', 'finvision_filter_finvision_contact_form_fields' );

//changing events slug
if ( ! function_exists( 'finvision_filter_fw_ext_events_post_slug' ) ) :
	function finvision_filter_fw_ext_events_post_slug( $slug ) {
		return 'event';
	} //finvision_filter_fw_ext_events_post_slug()
endif;
add_filter( 'fw_ext_events_post_slug', 'finvision_filter_fw_ext_events_post_slug' );

if ( ! function_exists( 'finvision_filter_fw_ext_events_taxonomy_slug' ) ) :
	function finvision_filter_fw_ext_events_taxonomy_slug( $slug ) {
		return 'events';
	} //finvision_filter_fw_ext_events_taxonomy_slug()
endif;
add_filter( 'fw_ext_events_taxonomy_slug', 'finvision_filter_fw_ext_events_taxonomy_slug' );

//wrapping in a span categories and archives items count
if ( !function_exists('finvision_filter_add_span_to_arhcive_widget_count') ) :
	function finvision_filter_add_span_to_arhcive_widget_count( $links ) {
		//for categories widget
		$links = str_replace( '</a> ', '</a> <span>', $links );
		$links = str_replace( '(', '/ ', $links );
		//for archive widget
		$links = str_replace( '&nbsp;', '</a> <span>', $links );
		$links = preg_replace( '/([0-9]+)\)/', '$1 /</span>', $links );

		return $links;
	} //finvision_filter_add_span_to_arhcive_widget_count()
endif;

//replacing parentheses with slashes for woocommerce widgets
if ( !function_exists('finvision_filter_replace_parentheses_with_slashes_woocommerce') ) :
	function finvision_filter_replace_parentheses_with_slashes_woocommerce( $links ) {
		//for categories widget
		$links = str_replace( '(', '/ ', $links );
		//for archive widget
		$links = preg_replace( '/([0-9]+)\)/', '$1 /', $links );

		return $links;
	} //finvision_filter_add_span_to_arhcive_widget_count()
endif;

//wrapping in a span categories and archives items count
if ( !function_exists('finvision_filter_woocommerce_rating_filter_widget') ) :
	function finvision_filter_woocommerce_rating_filter_widget( $links ) {
		$links = str_replace( '(', '/ ', $links );
		$links = str_replace( ')', ' /', $links );
		return $links;
	} //finvision_filter_add_span_to_arhcive_widget_count()
endif;

//categories
add_filter( 'wp_list_categories', 'finvision_filter_add_span_to_arhcive_widget_count' );
//arhcive
add_filter( 'get_archives_link', 'finvision_filter_add_span_to_arhcive_widget_count' );
//woocommerce layered_nav_count
add_filter( 'woocommerce_layered_nav_count', 'finvision_filter_replace_parentheses_with_slashes_woocommerce' );
add_filter( 'woocommerce_rating_filter_count', 'finvision_filter_woocommerce_rating_filter_widget' );


if ( !function_exists( 'finvision_filter_monster_widget_text' ) ) :
	function finvision_filter_monster_widget_text( $text ) {
		$text = str_replace( 'name="monster-widget-just-testing"', 'name="monster-widget-just-testing"', $text );

		return $text;
	}
endif;
add_filter( 'monster-widget-get-text', 'finvision_filter_monster_widget_text' );


/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @param array $classes A list of existing post class values.
 *
 * @return array The filtered post class list.
 * @internal
 */
if ( !function_exists( 'finvision_filter_post_classes' ) ) :
	function finvision_filter_post_classes( $classes ) {
		if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
			$classes[] = 'has-post-thumbnail';
		}
		return $classes;
	} //finvision_filter_post_classes()
endif;
add_filter( 'post_class', 'finvision_filter_post_classes' );


/**
 * Add bootstrap CSS classes to default password protected form.
 *
 *
 * @return string HTML code of password form
 * @internal
 */
if ( !function_exists( 'finvision_filter_password_form' ) ) :
	function finvision_filter_password_form( $html ) {
		$label = esc_attr__( 'Password', 'finvision' );
		$html  = str_replace( 'input name="post_password"', 'input class="form-control" name="post_password" placeholder="' . $label . '"', $html );
		$html  = str_replace( 'input type="submit"', 'input class="theme_button color1" type="submit"', $html );

		return $html;
	} //finvision_filter_password_form()
endif;
add_filter( 'the_password_form', 'finvision_filter_password_form' );


/**
 * Add bootstrap CSS class to readmore blog feed anchor.
 *
 *
 * @return string HTML code of password form
 * @internal
 */
if ( !function_exists( 'finvision_filter_gallery_post_style_owl') ) :
	function finvision_filter_gallery_post_style_owl( $gallery_html ) {
		if ( $gallery_html && ! is_admin() ) {
			$gallery_html = str_replace( 'gallery ', 'isotope_container ', $gallery_html );
			//if page is current
		}

		return $gallery_html;
	} //finvision_filter_gallery_post_style_owl()
endif;
add_filter( 'gallery_style', 'finvision_filter_gallery_post_style_owl' );

/**
 * Flush out the transients used in finvision_categorized_blog.
 * @internal
 */
if ( !function_exists( 'finvision_action_category_transient_flusher' ) ) :
	function finvision_action_category_transient_flusher() {
		delete_transient( 'finvision_category_count' );
	} //finvision_action_category_transient_flusher()
endif;
add_action( 'edit_category', 'finvision_action_category_transient_flusher' );
add_action( 'save_post', 'finvision_action_category_transient_flusher' );


/**
 * Register widget areas.
 * @internal
 */

if ( !function_exists( 'finvision_action_widgets_init' ) ) :
	function finvision_action_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Main Widget Area', 'finvision' ),
			'id'            => 'sidebar-main',
			'description'   => esc_html__( 'Appears in the content section of the site.', 'finvision' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area', 'finvision' ),
			'id'            => 'sidebar-footer',
			'description'   => esc_html__( 'Appears in the footer section of the site.', 'finvision' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	} //finvision_action_widgets_init()
endif;
add_action( 'widgets_init', 'finvision_action_widgets_init' );

/**
 * Processing google fonts customizer options
 */

if ( ! function_exists( 'finvision_action_process_google_fonts' ) ) :
	function finvision_action_process_google_fonts() {
		$google_fonts        = fw_get_google_fonts();
		$include_from_google = array();

		$font_body     = fw_get_db_customizer_option( 'main_font' );
		$font_headings = fw_get_db_customizer_option( 'h_font' );

		// if is google font
		if ( isset( $google_fonts[ $font_body['family'] ] ) ) {
			$include_from_google[ $font_body['family'] ] = $google_fonts[ $font_body['family'] ];
		}

		if ( isset( $google_fonts[ $font_headings['family'] ] ) ) {
			$include_from_google[ $font_headings['family'] ] = $google_fonts[ $font_headings['family'] ];
		}

		$google_fonts_links = finvision_get_remote_fonts( $include_from_google );
		// set a option in db for save google fonts link
		update_option( 'finvision_google_fonts_link', $google_fonts_links );
	} //finvision_action_process_google_fonts()

endif;
add_action( 'customize_save_after', 'finvision_action_process_google_fonts', 999, 2 );

if ( ! function_exists( 'finvision_get_remote_fonts' ) ) :
	function finvision_get_remote_fonts( $include_from_google ) {
		/**
		 * Get remote fonts
		 *
		 * @param array $include_from_google
		 */
		if ( ! sizeof( $include_from_google ) ) {
			return '';
		}

		$html = "<link href='http://fonts.googleapis.com/css?family=";

		foreach ( $include_from_google as $font => $styles ) {
			$html .= str_replace( ' ', '+', $font ) . ':' . implode( ',', $styles['variants'] ) . '|';
		}

		$html = substr( $html, 0, - 1 );
		$html .= "' rel='stylesheet' type='text/css'>";

		return $html;
	} //finvision_get_remote_fonts()
endif;

if ( ! function_exists( 'finvision_action_add_login_page_script_and_styles' ) ) :
	function finvision_action_add_login_page_script_and_styles( $page ) {
		wp_enqueue_style(
			'finvision-login-page-style',
			FINVISION_THEME_URI . '/css/login-page.css',
			array(),
			'1.0'
		);
		wp_enqueue_script(
			'finvision-login-page-script',
			FINVISION_THEME_URI . '/js/login-page.js',
			array( 'jquery' ),
			'1.0',
			false
		);
	}
endif;
add_action( 'login_enqueue_scripts', 'finvision_action_add_login_page_script_and_styles' );


//admin dashboard styles and scripts
if ( ! function_exists( 'finvision_action_load_custom_wp_admin_style' ) ) :
	function finvision_action_load_custom_wp_admin_style() {
		wp_register_style( 'finvision_custom_wp_admin_css', FINVISION_THEME_URI . '/css/admin-style.css', false, '1.0.0' );
		wp_enqueue_style( 'finvision_custom_wp_admin_css' );

		wp_register_style( 'finvision_custom_wp_admin_fonts', FINVISION_THEME_URI . '/css/fonts.css', false, '1.0.0' );
		wp_enqueue_style( 'finvision_custom_wp_admin_fonts' );

		if ( defined( 'FW' ) ) {
			wp_enqueue_script(
				'finvision-dashboard-widget-script',
				FINVISION_THEME_URI . '/js/dashboard-widget-script.js',
				array( 'jquery' ),
				'1.0',
				false
			);
		}
	} //finvision_action_load_custom_wp_admin_style()
endif;
add_action( 'admin_enqueue_scripts', 'finvision_action_load_custom_wp_admin_style' );

// removing woo styles
// Remove each style one by one
if ( !function_exists('finvision_filter_finvision_dequeue_styles')) :
	function finvision_filter_finvision_dequeue_styles( $enqueue_styles ) {
		unset( $enqueue_styles['woocommerce-general'] );    // Remove the gloss
		unset( $enqueue_styles['woocommerce-layout'] );        // Remove the layout
		unset( $enqueue_styles['woocommerce-smallscreen'] );    // Remove the smallscreen optimisation
		return $enqueue_styles;
	} //finvision_filter_finvision_dequeue_styles()
endif;
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

//this action defined in functions.php
add_action( 'tgmpa_register', 'finvision_action_register_required_plugins' );

if ( !function_exists('finvision_filter_wrap_cat_title_before_colon_in_span')) :
	function finvision_filter_wrap_cat_title_before_colon_in_span($title) {
		return preg_replace('/^.*: /', '<span class="taxonomy-name-title">${0}</span>', $title );
	}
endif;
add_filter('get_the_archive_title', 'finvision_filter_wrap_cat_title_before_colon_in_span');


//if Unyson installed - managing main slider and contact form scripts, sidebars
if ( defined( 'FW' ) ):
	//display main slider
	if ( ! function_exists( 'finvision_action_slider' ) ):

		function finvision_action_slider() {
			if(is_search()) {
				return;
			}
			$slider_id = fw_get_db_post_option( get_the_ID(), 'slider_id', false );
			if ( fw_ext( 'slider' ) ) {
				echo fw()->extensions->get( 'slider' )->render_slider( $slider_id, false );
			}

		}

		add_action( 'finvision_slider', 'finvision_action_slider' );

	endif;

	//display blog slider
	if ( ! function_exists( 'finvision_action_blog_slider' ) ):

		function finvision_action_blog_slider() {

			$blog_slider_options = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'blog_slider_switch' ) : '';
			$blog_slider_enabled = $blog_slider_options['yes'];
			if( $blog_slider_enabled ) {
				$slider_id= $blog_slider_enabled['slider_id'];
				if ( fw_ext( 'slider' ) ) {
					$slider_html = fw()->extensions->get( 'slider' )->render_slider( $slider_id, false );
					if( !empty( $slider_html ) ) {
						?>
						<div class="blog-slider col-sm-12">
							<?php
							echo fw()->extensions->get( 'slider' )->render_slider( $slider_id, false );
							?>
						</div>
						<?php
					}
				}
			}
		}

		add_action( 'finvision_blog_slider', 'finvision_action_blog_slider' );
	endif;

	//display donations slider
	if ( ! function_exists( 'finvision_action_donations_slider' ) ):

		function finvision_action_donations_slider() {

			$donations_slider_options = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'donations_slider_switch' ) : '';
			$donations_slider_enabled = $donations_slider_options['yes'];
			if( $donations_slider_enabled ) {
				$slider_id= $donations_slider_enabled['slider_id'];
				if ( fw_ext( 'slider' ) ) {
					$slider_html = fw()->extensions->get( 'slider' )->render_slider( $slider_id, false );
					if( !empty( $slider_html ) ) {
						?>
                        <div class="donations-slider col-sm-12">
							<?php
							echo fw()->extensions->get( 'slider' )->render_slider( $slider_id, false );
							?>
                        </div>
						<?php
					}
				}
			}
		}

		add_action( 'finvision_donations_slider', 'finvision_action_donations_slider' );
	endif;

	/**
	 * Display current submitted FW_Form errors
	 * @return array
	 */
	if ( ! function_exists( 'finvision_action_display_form_errors' ) ):
		function finvision_action_display_form_errors() {
			$form = FW_Form::get_submitted();

			if ( ! $form || $form->is_valid() ) {
				return;
			}

			wp_enqueue_script(
				'finvision-show-form-errors',
				FINVISION_THEME_URI . '/js/form-errors.js',
				array( 'jquery' ),
				'1.0',
				true
			);

			wp_localize_script( 'finvision-show-form-errors', '_localized_form_errors', array(
				'errors'  => $form->get_errors(),
				'form_id' => $form->get_id()
			) );
		}
	endif;
	add_action( 'wp_enqueue_scripts', 'finvision_action_display_form_errors' );


	//removing standard sliders from Unyson - we use our theme slider
	if ( !function_exists( 'finvision_filter_disable_sliders' ) ) :
		function finvision_filter_disable_sliders( $sliders ) {
			foreach ( array( 'owl-carousel', 'bx-slider', 'nivo-slider' ) as $name ) {
				$key = array_search( $name, $sliders );
				unset( $sliders[ $key ] );
			}

			return $sliders;
		}
	endif;

	add_filter( 'fw_ext_slider_activated', 'finvision_filter_disable_sliders' );

	//removing standard fields from Unyson slider - we use our own slider fields
	if ( !function_exists( 'finvision_slider_population_method_custom_options' ) ) :
		function finvision_slider_population_method_custom_options( $arr ) {
			/**
			 * Filter for disable standard slider fields for carousel slider
			 *
			 * @param array $arr
			 */
			unset(
				$arr['wrapper-population-method-custom']['options']['custom-slides']['slides_options']['title'],
				$arr['wrapper-population-method-custom']['options']['custom-slides']['slides_options']['desc']
			);

			return $arr;
		}
	endif;
	add_filter( 'fw_ext_theme_slider_population_method_custom_options', 'finvision_slider_population_method_custom_options' );

	//adding custom sidebar for shop page if WooCommerce active
	if ( class_exists( 'WooCommerce' ) ) :
		if ( !function_exists( 'finvision_filter_fw_ext_sidebars_add_conditional_tag' ) ) :
			function finvision_filter_fw_ext_sidebars_add_conditional_tag($conditional_tags) {
				$conditional_tags['is_archive_page_slug'] = array(
					'order_option' => 2, // (optional: default is 1) position in the 'Others' lists in backend
					'check_priority' => 'last', // (optional: default is last, can be changed to 'first') use it to change priority checking conditional tag
					'name' => esc_html__('Products Type - Shop', 'finvision'), // conditional tag title
					'conditional_tag' => array(
						'callback' => 'is_shop', // existing callback
						'params' => array('products') //parameters for callback
					)
				);

				return $conditional_tags;
			}
		endif;
		add_filter('fw_ext_sidebars_conditional_tags', 'finvision_filter_fw_ext_sidebars_add_conditional_tag' );

		remove_theme_support( 'wc-product-gallery-zoom' );
		remove_theme_support( 'wc-product-gallery-lightbox' );
		remove_theme_support( 'wc-product-gallery-slider' );
	endif; //WooCommerce

	//theme icon fonts
	if ( ! function_exists( 'finvision_filter_custom_packs_list' ) ) :
		function finvision_filter_custom_packs_list($current_packs) {
			/**
			 * $current_packs is an array of pack names.
			 * You should return which one you would like to show in the picker.
			 */
			return array('social_icons', 'finvision_icons', 'font-awesome');
		}
	endif;
	add_filter('fw:option_type:icon-v2:filter_packs', 'finvision_filter_custom_packs_list');

	if ( ! function_exists( 'finvision_filter_add_my_icon_pack' ) ) :
		function finvision_filter_add_my_icon_pack($default_packs) {
			/**
			 * No fear. Defaults packs will be merged in back. You can't remove them.
			 * Changing some flags for them is allowed.
			 */
			return array(
				'finvision_icons' => array(
					'name'             => 'finvision_icons', // same as key
					'title'            => 'Finvision Icons',
					'css_class_prefix' => 'rt-icon2',
					'css_file'         => FINVISION_THEME_PATH . '/css/fonts.css',
					'css_file_uri'     => FINVISION_THEME_URI . '/css/fonts.css',
				),
				'social_icons' => array(
					'name'             => 'social_icons', // same as key
					'title'            => 'Social Icons',
					'css_class_prefix' => 'socicon',
					'css_file'         => FINVISION_THEME_PATH . '/css/fonts.css',
					'css_file_uri'     => FINVISION_THEME_URI . '/css/fonts.css',
				)
			);
		}
	endif;
	add_filter('fw:option_type:icon-v2:packs', 'finvision_filter_add_my_icon_pack');

	if ( ! function_exists( 'finvision_breadcrumbs_blank_search_query_fix' ) ) :
		/**
		 * Breadcrumbs modifications
		 */
		function finvision_breadcrumbs_blank_search_query_fix( $items ) {

			if ( is_search() ) {
				if ( trim ( get_search_query() ) == false ) {
					$items[ sizeof( $items ) - 1 ]['name'] = esc_html__( 'Search', 'finvision' );
				}
			}

			return $items;
		}
	endif;

	add_filter( 'fw_ext_breadcrumbs_build', 'finvision_breadcrumbs_blank_search_query_fix' );

	//enable tags for events
	if ( ! function_exists( 'finvision_add_tags_for_events_unyson_extension' ) ) :
		function finvision_add_tags_for_events_unyson_extension() {
			return true;
		}
	endif;

	add_filter('fw:ext:events:enable-tags', 'finvision_add_tags_for_events_unyson_extension');

endif; //defined('FW')

//adding custom styles to TinyMCE
// Callback function to insert 'styleselect' into the $buttons array
if ( ! function_exists( 'finvision_filter_mce_theme_format_insert_button' ) ) :
	function finvision_filter_mce_theme_format_insert_button( $buttons ) {
		array_unshift( $buttons, 'styleselect' );

		return $buttons;
	} //finvision_filter_mce_theme_format_insert_button()
endif;
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'finvision_filter_mce_theme_format_insert_button' );
// Callback function to filter the MCE settings
if ( ! function_exists( 'finvision_filter_mce_theme_format_add_styles' ) ) :
	function finvision_filter_mce_theme_format_add_styles( $init_array ) {
		// Define the style_formats array
		$style_formats = array(
			// Each array child is a format with it's own settings
			array(
				'title'   => esc_html__( 'Excerpt', 'finvision' ),
				'block'   => 'p',
				'classes' => 'entry-excerpt',
				'wrapper' => false,
			),
			array(
				'title'   => esc_html__( 'Paragraph with dropcap', 'finvision' ),
				'block'   => 'p',
				'classes' => 'big-first-letter',
				'wrapper' => false,
			),
			array(
				'title'   => esc_html__( 'Main theme color', 'finvision' ),
				'inline'  => 'span',
				'classes' => 'highlight',
				'wrapper' => false,
			),

		);
		// Insert the array, JSON ENCODED, into 'style_formats'
		$init_array['style_formats'] = json_encode( $style_formats );

		return $init_array;

	} //finvision_filter_mce_theme_format_add_styles()
endif;
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'finvision_filter_mce_theme_format_add_styles', 1 );


//demo content on remote hosting
/**
 * @param FW_Ext_Backups_Demo[] $demos
 *
 * @return FW_Ext_Backups_Demo[]
 */


if ( ! function_exists( 'finvision_filter_theme_fw_ext_backups_demos' ) ) :

	function finvision_filter_theme_fw_ext_backups_demos( $demos ) {
		$demo_version_suffix = '-v' . FINVISION_REMOTE_DEMO_VERSION; // '-v1.0.0'

		$demos_array = array (
			'finvision-demo' . $demo_version_suffix => array (
				'title'        => esc_html__( 'Finvision Demo', 'finvision' ),
				'screenshot'   => esc_url('http://webdesign-finder.com/remote-demo-content/finvision/demo/screenshot.png'),
				'preview_link' => esc_url('http://webdesign-finder.com/finvision/'),
			),
		);

		// You may request this demo id from this theme author to get a colorized demo content. See the author contacts information.
		$secret_demo_id = FINVISION_REMOTE_DEMO_ID;
		if ( $secret_demo_id ) {
			$demos_array['finvision-demo-colorized-' . $secret_demo_id . $demo_version_suffix] = array(
				'title' => esc_html__('Finvision Demo Colorized', 'finvision'),
				'screenshot' => esc_url('http://webdesign-finder.com/remote-demo-content/finvision/demo-colorized/screenshot.png'),
				'preview_link' => esc_url('http://webdesign-finder.com/finvision/'),
			);
		}

		// remote demo URL
		$download_url = esc_url('http://webdesign-finder.com/remote-demo-content/finvision');

		foreach ( $demos_array as $id => $data ) {
			$demo = new FW_Ext_Backups_Demo( $id, 'piecemeal', array (
				'url'     => $download_url,
				'file_id' => $id,
			) );
			$demo->set_title( $data[ 'title' ] );
			$demo->set_screenshot( $data[ 'screenshot' ] );
			$demo->set_preview_link( $data[ 'preview_link' ] );

			$demos[ $demo->get_id() ] = $demo;

			unset( $demo );
		}

		return $demos;
	} //finvision_filter_theme_fw_ext_backups_demos()
endif;
add_filter( 'fw:ext:backups-demo:demos', 'finvision_filter_theme_fw_ext_backups_demos' );

//add comments support to events
add_post_type_support( 'fw-event', 'comments' );

//add tags support to portfolio
add_filter( 'fw:ext:portfolio:enable-tags', 'finvision_add_portfolio_tags_support' );
if ( !function_exists( 'finvision_add_portfolio_tags_support' ) ) {
	function finvision_add_portfolio_tags_support() {
		return true;
	}
}