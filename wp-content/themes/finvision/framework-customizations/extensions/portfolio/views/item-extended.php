<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Portfolio - extended item layout
 */

?>
<article <?php post_class( 'vertical-item content-padding big-padding text-center with_shadow' ) ?>>
	<?php if ( has_post_thumbnail() ) : ?>
        <div class="item-media-wrap">
            <div class="item-media">
		        <?php
		        the_post_thumbnail( 'finvision-full-width' );
		        ?>
                <div class="media-links">
                    <a class="abs-link" href="<?php the_permalink(); ?>"></a>
                </div>
            </div>
        </div>
	<?php endif; //has_post_thumbnail ?>
	<div class="item-content">
        <header class="entry-header">
            <div class="entry-meta categories-links highlightlinks highlight">
		        <?php
		        echo get_the_term_list( get_the_ID(), 'fw-portfolio-category', '', ', ', '' );
		        ?>
            </div>
            <h3 class="topmargin_0">
                <a href="<?php the_permalink(); ?>">
			        <?php the_title(); ?>
                </a>
            </h3>
        </header>
        <div class="content-3lines-ellipsis">
	        <?php echo the_excerpt(); ?>
        </div>

	</div>
</article><!-- eof vertical-item -->
