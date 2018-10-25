<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} ?>

<?php
    if ( has_tag( 'new' ) ) : ?>
        <div class="with-corner-label">
    <?php endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item content-padding big-padding with_shadow' ); ?>>

    <?php finvision_post_thumbnail(); ?>

    <div class="item-content">
        <header class="entry-header">
	        <?php finvision_the_post_meta(); ?>

	        <?php if ( get_the_title() ) : ?>
                <h1 class="entry-title"><?php the_title(); ?></h1>
	        <?php endif; ?>
        </header>

        <?php if ( !empty( get_the_content() ) ) : ?>
            <div class="entry-content">
                <?php
                the_content( esc_html__( 'Read More', 'finvision' ) );
                ?>
            </div><!-- .entry-content -->
        <?php endif; //has content ?>

        <?php
        wp_link_pages( array(
            'before'      => '<div class="page-links highlightlinks"><span class="page-links-title">' . esc_html__( 'Pages:', 'finvision' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
        ) );
        ?>

        <?php
        the_tags( '<div class="tag-links">', ' ', '</div>' );
        finvision_the_post_additional_meta();
        ?>

    </div>

</article>

<?php if ( has_tag( 'new' ) ) : ?>
    </div>
<?php endif;

// Post author
finvision_list_authors();
// Prev/Next posts nav
finvision_post_nav();
?>

