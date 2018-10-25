<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * The template for displaying single service
 *
 */

get_header();
$pID = get_the_ID();

//no columns on single service page
$column_classes = fw_ext_extension_get_columns_classes( true );

//getting taxonomy name
$ext_services_settings = fw()->extensions->get( 'services' )->get_settings();
$taxonomy_name = $ext_services_settings['taxonomy_name'];

$image_alt = get_post_meta(get_post_thumbnail_id($pID), '_wp_attachment_image_alt', true);

?>
    <div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( "toppadding_5" ); ?>>

				<?php if ( has_post_thumbnail()) { ?>
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo esc_html( $image_alt ); ?>" class="alignleft big-margin" />
				<?php } ?>

                <h1 class="entry-title topmargin_0">
					<?php the_title(); ?>
                </h1>

				<?php the_content(); ?>

            </article><!-- #post-## -->
		<?php endwhile; ?>
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