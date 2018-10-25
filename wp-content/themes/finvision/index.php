<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Used for blog page
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */

get_header();

$column_classes = finvision_get_columns_classes(); ?>

	<div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
		<?php
		if ( have_posts() ) :

            $blog_layout = 'regular';
            if ( function_exists( 'fw_get_db_customizer_option' ) ) {
                $blog_layout = fw_get_db_customizer_option( 'blog_layout' );
            }

            if ( $blog_layout === 'grid' ) : ?>
                <div class="isotope_container isotope row masonry-layout columns_padding_30 columns_margin_bottom_50">
            <?php endif;

			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the post format-specific template for the content. If you want to
				 * use this in a child theme, then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */

				if ( $blog_layout === 'grid' ) : ?>
                    <div class="isotope-item col-xs-12 col-sm-6">
                        <?php get_template_part( 'template-parts/blog-grid/content', get_post_format() ); ?>
                    </div>
                <?php else:
				    get_template_part( 'template-parts/blog-regular/content', get_post_format() );
                endif;

			endwhile;

            if ( $blog_layout === 'grid' ) : ?>
                </div>
            <?php endif;

			// Previous/next post navigation.
			finvision_paging_nav();
		else :
			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</div><!--eof #content -->
<?php if ( $column_classes['sidebar_class'] ): ?>
	<!-- main aside sidebar -->
	<aside class="<?php echo esc_attr( $column_classes['sidebar_class'] ); ?>">
		<?php get_sidebar(); ?>
	</aside>
	<!-- eof main aside sidebar -->
	<?php
endif;
get_footer();