<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * @var string $before_widget
 * @var string $after_widget
 * @var array $popular_posts
 */
$unique_id = uniqid();

echo wp_kses_post( $before_widget );

if ( $title ) {
	echo wp_kses_post( $before_title . $title . $after_title );
}

?>

	<ul id="popular_posts_<?php echo esc_attr( $unique_id ); ?>" class="media-list darklinks">
		<?php while ( $popular_posts->have_posts() ) : $popular_posts->the_post(); ?>
			<li <?php post_class( 'media' ); ?>>
				<?php if ( has_post_thumbnail() ) : ?>
					<a href="<?php the_permalink(); ?>" class="media-left">
						<?php echo get_the_post_thumbnail( get_the_ID(), 'thumbnail' ); ?>
					</a>
				<?php endif; //has_post_thumbnail ?>
				<div class="media-body">
					<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
					<div class="item-meta">
						<?php
						// Set up and print post meta information.
						if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
							<!-- comments number and link
							<span class="comments-link">
								<i class="rt-icon2-bubble highlight"></i>
								<?php comments_popup_link( esc_html__( 'No comments', 'mwt-widgets' ), esc_html__( '1 comment', 'mwt-widgets' ), esc_html__( '% comments', 'mwt-widgets' ) ); ?>
							</span>
							-->
							<?php
						endif; //post_password_required
						?>
						<span>
						<i class="rt-icon2-heart-outline highlight"></i>
						<?php
							finvision_post_like_count( get_the_ID() );
						?>
						</span>
					</div>
				</div>
			</li>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); // reset the query ?>
	</ul>
<?php echo wp_kses_post( $after_widget ); ?>
