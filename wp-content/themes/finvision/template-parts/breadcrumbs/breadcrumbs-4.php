<?php
/**
 * The template part for selected title (breadcrubms) section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<section class="page_breadcrumbs ds section_padding_top_25 section_padding_bottom_25">
	<div class="container">
		<div class="col-sm-12 text-center text-md-left">
			<?php if ( !is_single() ) : ?>
                <h1>
					<?php
					get_template_part( 'template-parts/breadcrumbs/page-title-text' );
					?>
                </h1>
			<?php endif; ?>
			<?php if ( function_exists( 'fw_ext_breadcrumbs' ) ) { ?>
			<div>
				<?php fw_ext_breadcrumbs();  ?>
			</div>
		<?php } ?>
		</div><!-- eof .col-* .display_table_md -->
	</div><!-- eof .container -->
</section><!-- eof .page_breadcrumbs -->