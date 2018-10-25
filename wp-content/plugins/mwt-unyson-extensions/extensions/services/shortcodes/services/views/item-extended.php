<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Shortcode Posts - extended item layout
 */

$terms          = get_the_terms( get_the_ID(), 'category' );
$filter_classes = '';
foreach ( $terms as $term ) {
	$filter_classes .= ' filter-' . $term->slug;
}
?>
<article <?php post_class( "vertical-item content-padding with_background text-center" . $filter_classes ); ?>>
	<?php if ( get_the_post_thumbnail() ) : ?>
		<div class="item-media">
			<?php
			echo get_the_post_thumbnail();
			?>
			<div class="media-links">
				<a class="abs-link" href="<?php the_permalink(); ?>"></a>
			</div>
		</div>
	<?php endif; //eof thumbnail check ?>
	<div class="item-content">
		<h3 class="item-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>
		<?php solar_posted_on() ?>
		<?php if ( get_the_term_list( get_the_ID(), 'category', '', ' ', '' ) ) : ?>
			<div class="theme_buttons small_buttons color1">
				<?php
				echo get_the_term_list( get_the_ID(), 'category', '', ' ', '' );
				?>
			</div>
		<?php endif; //terms check ?>
		<?php echo the_excerpt(); ?>
	</div>
	<div class="item-icons greylinks">
		<div>
			<i class="rt-icon2-eye highlight"></i>
			<?php
			solar_show_post_views_count();
			?>
		</div>
		<?php
		// Set up and print post meta information.
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
			?>
			<div>
				<span class="comments-link">
					<i class="rt-icon2-bubble highlight"></i>
					<?php comments_popup_link( esc_html__( '0', 'solar' ), esc_html__( '1', 'solar' ), esc_html__( '%', 'solar' ) ); ?>
				</span>
			</div>
			<?php
		endif; //password
		?>
		<div>
			<i class="rt-icon2-like highlight"></i>
			<?php
			solar_post_like_button( get_the_ID() );
			solar_post_like_count( get_the_ID() );
			?>
		</div>
	</div>
</article><!-- eof vertical-item -->
