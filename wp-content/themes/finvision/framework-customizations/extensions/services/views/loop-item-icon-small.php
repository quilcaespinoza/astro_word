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

<article <?php post_class( 'hover-teaser square' ) ?>>
    <div class="teaser-inner">
        <div class="teaser text-center">
	        <?php finvision_get_icon_v2($icon_array); ?>
            <h3 class="entry-title small">
                <a href="<?php the_permalink(); ?>">
			        <?php the_title(); ?>
                </a>
            </h3>
        </div>
    </div>
    <a href="<?php the_permalink(); ?>" class="abs-link"><span class="sr-only"><?php echo esc_html__( 'Read more', 'finvision' ); ?></span></a>
</article><!-- eof .teaser -->