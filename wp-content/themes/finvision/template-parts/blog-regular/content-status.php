<?php
/**
 * The default template for displaying status content
 *
 * Used for both single and index/archive/search.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;
$postID = get_the_ID();
$show_post_thumbnail = ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) ? false : true;

$post_thumbnail = get_the_post_thumbnail( get_the_ID() );
$additional_post_class = ( $post_thumbnail ) ? 'bg_teaser after_cover darkgrey_bg ds ms' : '';
?>

<?php
//single item layout
if ( is_single() ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item content-padding big-padding with_shadow'); ?>>

    <div class="item-content">
        <header class="entry-header">
			<?php finvision_the_post_meta(); ?>

			<?php if ( get_the_title() ) : ?>
                <h1 class="entry-title"><?php the_title(); ?></h1>
			<?php endif; ?>
        </header>

		<?php if ( !empty( get_the_content() ) ) : ?>
            <div class="entry-content text-center">
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

</article><!-- #post-## -->
<?php
// Post author
finvision_list_authors();
// Prev/Next posts nav
finvision_post_nav();
?>
<?php else: ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item content-padding big-padding with_shadow text-center ' . $additional_post_class ); ?>>
		<?php
		echo wp_kses_post ( $post_thumbnail );
		?>

        <div class="item-content">

            <header class="entry-header">
				<?php
				finvision_the_post_meta();
				the_title( '<h3 class="entry-title big"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				?>
            </header><!-- .entry-header -->

			<?php if ( !empty( get_the_content() ) ) : ?>
                    <div class="entry-content">
						<?php
						//hidding "more link" in content
						the_content( esc_html__( 'Read More', 'finvision' ) );
						wp_link_pages( array(
							'before'      => '<div class="page-links highlightlinks topmargin_30"><span class="page-links-title">' . esc_html__( 'Pages:', 'finvision' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						) );
						?>
                    </div><!-- .entry-content -->
			<?php endif; //has content ?>

	        <?php finvision_the_post_additional_meta(); ?>

        </div><!-- eof .item-content -->

    </article><!-- #post-## -->
<?php endif; ?>
