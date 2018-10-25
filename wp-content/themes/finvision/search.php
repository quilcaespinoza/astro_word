<?php
/**
 * The template for displaying Search Results pages
 */

get_header();
$column_classes = finvision_get_columns_classes(); ?>
	<div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
		<?php if ( have_posts() ) :

			$blog_layout = 'regular';
			if ( function_exists( 'fw_get_db_customizer_option' ) ) {
				$blog_layout = fw_get_db_customizer_option( 'blog_layout' );
			}

			// Start the Loop.
			while ( have_posts() ) : the_post();
		        $post_type = get_post_type();
				if ( 'page' === $post_type ) {
					get_template_part( 'template-parts/content', 'page' );
				} else if ( 'fw-event' === $post_type ) {
					get_template_part( 'template-parts/content', 'event-horizontal' );
                } else if ( 'post' === $post_type ) {
					get_template_part( 'template-parts/blog-regular/content', get_post_format() );
                } else {
					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				}

			endwhile;
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