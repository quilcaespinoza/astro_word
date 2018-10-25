<?php
/**
 * The template part for selected title (breadcrubms) section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<section class="page_breadcrumbs cs gradient lightened section_padding_50">
	<div class="container">
		<div class="row">
            <div class="col-xs-12 text-center darklinks">

                    <?php if ( !is_single() ) : ?>
                        <h1>
                            <?php
                            get_template_part( 'template-parts/breadcrumbs/page-title-text' );
                            ?>
                        </h1>
                    <?php endif; ?>

                    <?php
                    if ( function_exists( 'woocommerce_breadcrumb123' ) ) {
                        woocommerce_breadcrumb( array(
                            'delimiter'   => '',
                            'wrap_before' => '<nav class="woocommerce-breadcrumb" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '><ol class="breadcrumb big-spacing darklinks">',
                            'wrap_after'  => '</ol></nav>',
                            'before'      => '<li>',
                            'after'       => '</li>',
                            'home'        => esc_html_x( 'Home', 'breadcrumb', 'finvision' )
                        ) );
                    } elseif ( function_exists( 'fw_ext_breadcrumbs' ) ) {
                        fw_ext_breadcrumbs();
                    }
	            ?>
            </div>
		</div>
	</div>
</section>