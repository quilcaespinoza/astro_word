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
<article <?php post_class( "vertical-item content-padding big-padding with_shadow text-center" . $filter_classes ); ?>>
    <?php finvision_post_thumbnail( false, true ); ?>
    <div class="item-content">
        <?php
        the_title( '<h3 class="entry-title small"><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' );

        if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) : ?>
            <span class="categories-links small-text">
                <?php echo get_the_category_list( esc_html_x( ', ', 'Used between list items, there is a space after the comma.', 'finvision' ) ); ?>
            </span>
        <?php endif;
        ?>
    </div>
</article><!-- eof vertical-item -->
