<?php
/**
 * The template part for selected copyrights section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$social_icons = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'copyright_social' ) : '';


?>

<section class="page_copyright ds section_padding_top_65 section_padding_bottom_65">
    <div class="container">
        <div class="row flex-wrap v-center">
            <div class="col-xs-12 col-sm-6 text-center text-sm-left">
                <?php get_template_part( 'template-parts/footer/footer-logo' ); ?>
            </div>
            <div class="col-xs-12 col-sm-6 text-center text-sm-right">
                <?php echo wp_kses_post( function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'copyrights_text' ) : esc_html__( 'Powered by WordPress', 'finvision' ) ); ?>
            </div>
        </div>
    </div>
</section>

