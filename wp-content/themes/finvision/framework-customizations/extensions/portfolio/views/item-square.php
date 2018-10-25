<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 *  Portfolio - square item layout
 */

?>
<div class="vertical-item gallery-item ds">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="item-media">
			<?php
			$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
			the_post_thumbnail( 'finvision-square-width');
			?>
			<div class="media-links">
				<div class="links-wrap">
					<a class="p-view prettyPhoto "
					   data-gal="prettyPhoto[gal-<?php echo esc_attr( $unique_id ); ?>]"
					   href="<?php echo esc_url( $full_image_src ); ?>"></a>
				</div>
			</div>
		</div>
	<?php endif; //has_post_thumbnail ?>
</div>