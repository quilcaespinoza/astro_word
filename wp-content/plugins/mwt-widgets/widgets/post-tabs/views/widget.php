<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * @var string $before_widget
 * @var string $after_widget
 * @var array $recent_posts
 * @var array $popular_posts
 */
$unique_id = uniqid();

echo wp_kses_post( $before_widget );
?>
<div class="tabs small-tabs">
	<ul class="nav nav-tabs one-third-tabs" role="tablist">
		<li><a href="#popular_posts_<?php echo esc_attr( $unique_id ); ?>" role="tab"
		       data-toggle="tab"><?php esc_html_e( 'Popular', 'mwt-widgets' ); ?></a></li>
		<li><a href="#recent_<?php echo esc_attr( $unique_id ); ?>" role="tab"
		       data-toggle="tab"><?php esc_html_e( 'Recent', 'mwt-widgets' ); ?></a></li>
	</ul>
</div>
<div class="tab-content top-color-border">
	<div id="popular_posts_<?php echo esc_attr( $unique_id ); ?>" class="tab-pane fade">
		<?php while ( $popular_posts->have_posts() ) : $popular_posts->the_post(); ?>
			<article <?php post_class( 'vertical-item' ); ?>>
				<?php if ( has_post_thumbnail() ) : ?>
                    <div class="item-media bottommargin_20">
                        <a href="<?php the_permalink(); ?>">
		                    <?php echo get_the_post_thumbnail( get_the_ID() ); ?>
                        </a>
                    </div>
				<?php endif; //has_post_thumbnail ?>
                <div class="item-content">
                    <span class="entry-meta small-text highlightlinks">
                        <?php
                        finvision_posted_on( true);
                        ?>
                    </span>
                    <h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                </div>
			</article>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); // reset the query ?>
	</div>
	<div id="recent_<?php echo esc_attr( $unique_id ); ?>" class="tab-pane fade">
		<?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
            <article <?php post_class( 'vertical-item' ); ?>>
				<?php if ( has_post_thumbnail() ) : ?>
                    <div class="item-media bottommargin_20">
                        <a href="<?php the_permalink(); ?>">
							<?php echo get_the_post_thumbnail( get_the_ID() ); ?>
                        </a>
                    </div>
				<?php endif; //has_post_thumbnail ?>
                <div class="item-content">
                    <span class="entry-meta small-text highlightlinks">
                        <?php
                        finvision_posted_on( true);
                        ?>
                    </span>
                    <h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                </div>
            </article>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); // reset the query ?>
	</div>
</div>
<?php echo wp_kses_post( $after_widget ); ?>
