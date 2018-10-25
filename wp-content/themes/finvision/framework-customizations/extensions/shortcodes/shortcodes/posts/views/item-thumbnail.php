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

<article <?php post_class( "vertical-item content-absolute big-padding text-center" . $filter_classes ); ?>>
	<?php finvision_post_thumbnail(); ?>
	<div class="item-content">
		<?php
		the_title( '<h3 class="entry-title small"><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' );
		?>
	</div>
</article><!-- eof vertical-item -->
