<?php
/**
 * The template for default displaying portfolio taxonomy
 */
get_header();
//no columns on single gallery page - giving true as a parameter to get column classes function
$column_classes = finvision_get_columns_classes( true );

//get all terms for filter
if ( have_posts() ) :

	$all_categories = array();
	$categories     = array();
	// Start the Loop.
	while ( have_posts() ) : the_post();
	    if ( get_the_terms( get_the_ID(), 'fw-portfolio-category' ) ) {
		    $all_categories[] = get_the_terms( get_the_ID(), 'fw-portfolio-category' );
        }

	endwhile;
	wp_reset_postdata();

    foreach ( $all_categories as $post_categories ) :
        foreach ( $post_categories as $category ) :
            $categories[] = $category;
        endforeach;
    endforeach;

	$categories = array_unique( $categories, SORT_REGULAR );

endif; //have_posts

$unique_id = uniqid();
?>
	<div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
		<?php
		if ( count( $categories ) > 1 ) : ?>
			<div class="filters isotope_filters-<?php echo esc_attr( $unique_id ); ?>">
                <select>
                    <option value="*"><?php echo esc_html__( 'All', 'finvision' ); ?></option>
	                <?php foreach ( $categories as $category ) : ?>
                        <option value=".<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></option>
	                <?php endforeach; ?>
                </select>
			</div><!-- eof isotope_filters -->
		<?php endif; //count subcategories check ?>
		<div class="isotope_container isotope row masonry-layout columns_margin_bottom_20"
		     data-filters=".isotope_filters-<?php echo esc_attr( $unique_id ); ?>">
			<?php if ( have_posts() ) : ?>
				<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
					$term_objects      = get_the_terms( get_the_ID(), 'fw-portfolio-category' );
					$item_filter_class = '';
					if( !empty($term_objects) ) :
						foreach ( $term_objects as $term_object ) {
							$item_filter_class .= ' ' . $term_object->slug;
						}
					endif;
					?>
					<div
						class="isotope-item col-xs-12 col-sm-6 <?php echo esc_attr( $item_filter_class ); ?>">
						<?php
						//include item layout view file
						if ( has_post_thumbnail() ) {
							include( fw()->extensions->get( 'portfolio' )->locate_view_path( 'item-regular' ) );
						} else {
							include( fw()->extensions->get( 'portfolio' )->locate_view_path( 'item-extended' ) );
						}
						?>
					</div><!-- eof isotope-item -->
					<?php
				endwhile;
			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
		</div><!-- eof .isotope_container -->
		<?php // Pagination.
		finvision_paging_nav();
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