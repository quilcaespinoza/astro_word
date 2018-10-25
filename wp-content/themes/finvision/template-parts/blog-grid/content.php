<?php
/**
 * The default template for displaying content
 *
 * Used for index/archive/search.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;
$pID = get_the_ID();

if ( has_tag( 'new' ) ) : ?>
    <div class="with-corner-label">
<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item content-padding big-padding with_shadow' ); ?>>

    <?php finvision_post_thumbnail(); ?>

    <div class="item-content">

        <header class="entry-header">

			<?php finvision_the_post_meta(); ?>

			<?php
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			?>

        </header><!-- .entry-header -->

	    <?php if ( !empty( get_the_content() ) ) :
            $post_format = get_post_format();
            ?>

            <div class="entry-content">
	            <?php if ( strpos( $post->post_content, '<!--more-->') || $post_format === 'link' ) {
	                the_content( '' );
                } else {
	                the_excerpt();
                } ?>
            </div><!-- .entry-content -->

	    <?php endif; //has content ?>

	    <?php finvision_the_post_additional_meta(); ?>

    </div><!-- eof .item-content -->

</article><!-- #post-## -->

<?php if ( has_tag( 'new' ) ) : ?>
    </div>
<?php endif;
