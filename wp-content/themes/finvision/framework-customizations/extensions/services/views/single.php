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
$column_classes = finvision_get_columns_classes();

$column_classes['main_column_class'] = ( $column_classes['main_column_class'] === 'col-xs-12' ) ? 'col-xs-12 col-md-10 col-md-offset-1': $column_classes['main_column_class'];

//getting taxonomy name
$ext_services_settings = fw()->extensions->get( 'services' )->get_settings();
$taxonomy_name = $ext_services_settings['taxonomy_name'];

$atts = fw_get_db_post_option(get_the_ID());

$image_alt = get_post_meta(get_post_thumbnail_id($pID), '_wp_attachment_image_alt', true);
?>
    <div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( "vertical-item content-padding big-padding with_shadow" ); ?>>

	            <?php finvision_post_thumbnail(); ?>

                <div class="item-content">
                    <h1 class="entry-title">
		                <?php the_title(); ?>
                    </h1>

                    <div class="entry-content">
	                    <?php the_content(); ?>

                        <?php if ( !empty( $atts['title'] ) ) : ?>
                            <h3 class="text-uppercase">
                                <?php echo wp_kses_post( $atts['title'] ); ?>
                            </h3>
                        <?php endif; ?>

	                    <?php if ( ! empty( $atts['progress_bars'] ) ) :
		                    foreach($atts['progress_bars'] as $bar) :
			                    echo fw_ext( 'shortcodes' )->get_shortcode( 'progress_bar' )->render( $bar );
		                    endforeach;
	                    endif; //skills check ?>
                    </div>

	                <?php if ( function_exists( 'mwt_share_this' ) ) { ?>
		                <?php finvision_share_this( true, '', 'color-icon border-icon rounded-icon' ); ?>
	                <?php } ?>
                </div>

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