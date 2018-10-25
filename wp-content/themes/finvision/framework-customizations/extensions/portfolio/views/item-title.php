<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Widget Portfolio - title item layout
 */

?>
<div class="vertical-item content-padding big-padding text-center gallery-title-item">
    <div class="item-media">
        <?php
        $full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
        the_post_thumbnail( 'finvision-full-width' );
        ?>
        <div class="media-links">
            <div class="links-wrap">
                <a class="p-view prettyPhoto " data-gal="prettyPhoto[gal-<?php echo esc_attr( $unique_id ); ?>]"
                   href="<?php echo esc_url( $full_image_src ); ?>"></a>
            </div>
        </div>
    </div>
    <div class="item-content">
        <h3 class="bottommargin_10">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>
        <div class="categories-links small-text highlightlinks highlight">
		    <?php
		    echo get_the_term_list( get_the_ID(), 'fw-portfolio-category', '', ', ', '' );
		    ?>
        </div>
    </div>
</div>