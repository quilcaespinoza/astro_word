<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$header_variant  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header' )['header_var'] : '';
if ( is_page() && function_exists('fw_get_db_post_option') ) {
	$page_header = fw_get_db_post_option( $post->ID, 'header' );
	$header_variant = ( $header_variant !== $page_header && $page_header !== '' ) ? $page_header : $header_variant;
}

$header_static_teasers = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header' )[ $header_variant ]['header_static_teasers'] : '';
$header_affix_teasers = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header' )[ $header_variant ]['header_affix_teasers'] : '';

//header columns classes
$logo_column_class = 'col-xs-9 col-sm-8 col-lg-3';
$menu_column_class = 'col-xs-3 col-sm-4 col-lg-9';

$has_teasers = '';

if ( !empty( $header_static_teasers ) || !empty( $header_affix_teasers ) ) {
	$has_teasers = 'with_teasers';
}
?>

<header class="page_header header_v1 animatable header_white <?php echo esc_attr( $has_teasers ); ?> toggler_right animatable">
    <div class="container-fluid">
        <div class="row flex-wrap v-center">
            <div class="<?php echo esc_attr( $logo_column_class ); ?>">

                <div class="affix-hidden">
                    <div class="display-flex v-center">
                        <div class="ds logo_wrapper">
							<?php get_template_part( 'template-parts/header/header-logo' ); ?>
                        </div>
						<?php if ( !empty( $header_static_teasers ) ) : ?>
                            <div class="logo_info_wrapper">
                                <div class="inline-content">
									<?php foreach( $header_static_teasers as $static_teaser ) : ?>
                                        <div>
											<?php echo wp_kses_post( $static_teaser['teaser_text'] ); ?>
                                        </div>
									<?php endforeach; ?>
                                </div>
                            </div>
						<?php endif; ?>
                    </div>
                </div>

                <div class="affix-visible">
                    <div class="display-flex v-center">
                        <div class="ds logo_wrapper">
							<?php get_template_part( 'template-parts/header/header-logo' ); ?>
                        </div>
						<?php if ( !empty( $header_affix_teasers ) ) : ?>
                            <div class="logo_info_wrapper">
                                <div class="inline-content fontsize_20 grey darklinks hidden-xs hidden-sm text-right">
									<?php foreach( $header_affix_teasers as $affix_teaser ) : ?>
                                        <div>
											<?php echo wp_kses_post( $affix_teaser['teaser_text'] ); ?>
                                        </div>
									<?php endforeach; ?>
                                </div>
                            </div>
						<?php endif; ?>
                    </div>
                </div>

            </div>
            <div class="<?php echo esc_attr( $menu_column_class ); ?> text-right with_toggler">
                <div class="header_mainmenu">
                    <div class="mainmenu_wrapper primary-navigation">
						<?php wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'sf-menu nav-menu nav',
							'container'      => 'ul'
						) ); ?>
                    </div>
                    <!-- header toggler -->
                    <span class="toggle_menu"><span></span></span>
                </div>
            </div>
        </div>
    </div>
</header>