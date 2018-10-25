<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * @var string $before_widget
 * @var string $after_widget
 * @var array $popular_posts
 * @var array $params
 * @var array $title
 */
$unique_id = uniqid();

echo wp_kses_post( $before_widget );
echo wp_kses_post( $title );
?>

	<div id="gallery_<?php echo esc_attr( $unique_id ); ?>" class="gallery-list">
		<?php while ( $popular_posts->have_posts() ) : $popular_posts->the_post(); ?>
            <div class="gallery-item">
                <a href="<?php the_permalink(); ?>">
		            <?php echo get_the_post_thumbnail( get_the_ID(), 'thumbnail' ); ?>
                </a>
            </div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); // reset the query ?>
	</div>
<?php echo wp_kses_post( $after_widget ); ?>
