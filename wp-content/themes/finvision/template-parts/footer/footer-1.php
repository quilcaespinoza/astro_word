<?php
/**
 * The template part for selected footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$social_icons_list    = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'footer_social_icons' ) : '';
$social_icons_wrapper    = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'footer_icons_wrapper_class' ) : '';
$social_icons_options   = array( 'social_icons' => $social_icons_list, 'icons_wrapper_class' => $social_icons_wrapper );
?>

<footer class="page_footer cs gradient lightened section_padding_top_90 section_padding_bottom_90 columns_margin_bottom_40 columns_padding_30">
	<div class="container">

		<div class="row">
			<?php dynamic_sidebar( 'sidebar-footer' ); ?>
		</div>

	</div>
</footer><!-- .page_footer -->

<?php if ( ! empty( $social_icons_list ) ) : ?>
<section class="page_social ds light columns_margin_0">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="display-flex <?php echo esc_attr( $social_icons_wrapper ); ?>">
                    <?php foreach ( $social_icons_list as $icon ) : ?>
                        <a href="<?php echo esc_url( $icon['icon_url'] ) ?>"
                           class="social-icon bg-icon text-icon <?php echo esc_attr( $icon['icon'] ); ?>" target="_blank">
                            <span>
                                <span class="social-icon border-icon rounded-icon <?php echo esc_attr( $icon['icon'] ); ?>"></span>
	                            <?php if ( !empty( $icon['icon_text'] ) ) : ?>
                                    <span class="social-label">
		                                <?php echo esc_html( $icon['icon_text'] ); ?>
                                    </span>
	                            <?php endif; ?>
                            </span>
                        </a>
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; //social icons ?>