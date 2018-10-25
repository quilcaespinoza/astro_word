<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Single service loop item layout
 * also using as a default service view in a shortcode
 */

$ext_services_settings = fw()->extensions->get( 'services' )->get_settings();
$taxonomy_name = $ext_services_settings['taxonomy_name'];

$icon_array = fw_ext_services_get_icon_array();

?>
<?php if ( has_post_thumbnail() ) : ?>
    <article class="vertical-item content-padding with_border text-center">

        <div class="item-media">
	        <?php the_post_thumbnail(); ?>
        </div>

        <div class="item-content">
            <h4 class="entry-title">
                <a href="<?php the_permalink(); ?>">
			        <?php the_title(); ?>
                </a>
            </h4>
            <div>
	            <?php the_excerpt(); ?>
            </div>
        </div>

    </article>
<?php else: ?>
<div class="teaser text-center">

    <?php if ( $icon_array['icon_type'] === 'image' ) : ?>
        <?php echo wp_kses_post( $icon_array['icon_html']); ?>
    <?php else: //icon ?>
        <div class="teaser_icon black size_big border_icon">
            <?php echo wp_kses_post( $icon_array['icon_html']); ?>
        </div>
    <?php endif; ?>
	<h3>
		<a href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
		</a>
	</h3>
	<div class="theme_buttons small_buttons color1">
	<?php
		echo get_the_term_list( get_the_ID(), $taxonomy_name, '', ' ', '' );
	?>
	</div>
	<div>
		<?php the_excerpt(); ?>
	</div>
</div><!-- eof .teaser -->
<?php endif; ?>
