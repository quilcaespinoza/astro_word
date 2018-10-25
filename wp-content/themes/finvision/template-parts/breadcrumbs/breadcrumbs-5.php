<?php
/**
 * The template part for selected title (breadcrubms) section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<section class="page_breadcrumbs ls ms bg_image section_padding_top_40 section_padding_bottom_25">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<?php if ( !is_single() ) : ?>
                    <h1>
						<?php
						get_template_part( 'template-parts/breadcrumbs/page-title-text' );
						?>
                    </h1>
				<?php endif; ?>
			</div><!-- eof .col-* -->
		</div><!-- eof .row -->
		<?php if ( function_exists( 'fw_ext_breadcrumbs' ) ) { ?>
		<div class="bottom_breadcrumbs greylinks highlight">
			<?php fw_ext_breadcrumbs();  ?>
		</div>
		<?php } ?>
	</div><!-- eof .container -->
</section><!-- eof .page_breadcrumbs -->