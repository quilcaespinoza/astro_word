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

	<ul id="recent_posts_<?php echo esc_attr( $unique_id ); ?>" class="media-list <?php echo empty( $params['accent_color'] ) ? '' : 'color' . esc_attr( $params['accent_color'] ); ?>">
		<?php while ( $popular_posts->have_posts() ) : $popular_posts->the_post(); ?>
			<li <?php post_class( 'media' ); ?>>
				<?php if ( has_post_thumbnail() && $params['thumbnail'] ) : ?>
					<a href="<?php the_permalink(); ?>" class="media-left media-middle">
						<?php echo get_the_post_thumbnail( get_the_ID(), 'thumbnail' ); ?>
					</a>
				<?php endif; //has_post_thumbnail ?>
				<div class="media-body media-middle <?php echo ( has_post_thumbnail() && $params['thumbnail'] ) ? 'text-left' : ''; ?>">
                    <p>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </p>
                    <?php if ( in_array('post_categories', $params['post_meta'] )
                           || in_array('post_author', $params['post_meta'] )
                           || in_array('post_date', $params['post_meta'] ) ) : ?>
                        <div class="entry-meta inline-content with_dividers small-text highlight2links">
	                        <?php if ( in_array('post_author', $params['post_meta']) ) : ?>
                                <span>
                                    <?php the_author_posts_link(); ?>
                                </span>
	                        <?php endif; ?>

                            <?php if ( in_array('post_date', $params['post_meta']) ) : ?>
                            <span>
                                <?php finvision_posted_on( true ); ?>
                            </span>
                            <?php endif; ?>

                            <?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && in_array('post_categories', $params['post_meta']) ) : ?>

                                <span class="categories-links">
                                    <?php echo get_the_category_list( esc_html_x( ' ', 'Used between list items, there is a space after the comma.', 'mwt-widgets' ) ); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
				</div>
			</li>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); // reset the query ?>
	</ul>
<?php echo wp_kses_post( $after_widget ); ?>
