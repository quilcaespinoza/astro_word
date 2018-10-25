<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Single service loop item layout
 */

$ext_services_settings = fw()->extensions->get( 'services' )->get_settings();
$taxonomy_name = $ext_services_settings['taxonomy_name'];

$icon_array = fw_ext_services_get_icon();
?>

<article <?php post_class( 'vertical-item content-padding big-padding with_shadow text-center' ) ?>>
    <div class="item-media">
	    <?php the_post_thumbnail( 'finvision-square-width' ); ?>
        <div class="media-links">
            <a class="abs-link" href="<?php the_permalink(); ?>"></a>
        </div>
    </div>
    <div class="item-content">
        <header class="entry-header">
            <h3>
                <a href="<?php the_permalink(); ?>">
			        <?php the_title(); ?>
                </a>
            </h3>
        </header>
        <div>
		    <?php the_excerpt(); ?>
        </div>
        <div class="topmargin_35">
            <a href="<?php the_permalink(); ?>" class="theme_button"><?php echo esc_html__( 'Read more', 'finvision' ); ?></a>
        </div>
    </div>
</article><!-- eof .teaser -->