<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Shortcode Posts - vertical item layout type 2
 */

$terms          = get_the_terms( get_the_ID(), 'category' );
$filter_classes = '';
foreach ( $terms as $term ) {
	$filter_classes .= ' filter-' . $term->slug;
}

$show_post_thumbnail = ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) ? false : true;

?>
<article <?php post_class( "vertical-item content-padding big-padding with_shadow " . $filter_classes ); ?>>
	<?php finvision_post_thumbnail(); ?>
    <div class="item-content">
        <header class="entry-header">
	        <?php finvision_the_post_meta(); ?>
	        <?php
	        the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' );
	        ?>
        </header>

		<?php if ( !empty( get_the_content() ) ) : ?>
            <div class="entry-content">
				<?php the_excerpt(); ?>
            </div><!-- .entry-content -->
		<?php endif; ?>
    </div>
</article><!-- eof vertical-item -->
