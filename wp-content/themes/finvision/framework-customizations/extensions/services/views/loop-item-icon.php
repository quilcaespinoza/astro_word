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

<article <?php post_class( 'with_padding big-padding with_shadow text-center' ) ?>>
	<div class="teaser">
        <a href="<?php the_permalink(); ?>">
            <?php finvision_get_icon_v2($icon_array); ?>
        </a>
		<h3 class="entry-title small">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>" class="more-link"><?php echo esc_html__( 'Read more', 'finvision' ); ?></a>
	</div>
</article><!-- eof .teaser -->