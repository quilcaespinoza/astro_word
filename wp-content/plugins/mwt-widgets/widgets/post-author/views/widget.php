<?php if ( ! defined( 'ABSPATH' ) ) {
	die();
}
$author_id = get_the_author_meta('ID');
$author_bio      = get_the_author_meta( 'description', $author_id );
if ( ! defined( 'FW' ) || !( is_single() && 'post' === get_post_type() ) || !$author_bio ) {
	return;
}
/**
 * @var string $before_widget
 * @var string $after_widget
 * @var array $params
 */
$unique_id = uniqid();
$twitter_url     = get_the_author_meta( 'twitter', $author_id );
$facebook_url    = get_the_author_meta( 'facebook', $author_id );
$google_plus_url = get_the_author_meta( 'google_plus', $author_id );
$youtube         = get_the_author_meta( 'youtube', $author_id );
$author_position = get_the_author_meta( 'position', $author_id );

echo wp_kses_post( $before_widget );

echo wp_kses_post( $title ); ?>

<div class="post-author vertical-item content-padding with_background rounded overflow_hidden bottom_color_border">
    <div class="item-meta">
	    <?php echo get_avatar( $author_id, 500 ); ?>
    </div>
    <div class="item-content">
        <?php if ( $author_bio ) : ?>
            <p class="author-bio">
                <?php echo wp_kses_post( $author_bio ); ?>
            </p>
        <?php endif; //author_bio ?>
        <h4>
		    <?php the_author_posts_link(); ?>
        </h4>
	    <?php if ( $author_position ) : ?>
            <span class="small-text highlight2">
			    <?php echo wp_kses_post( $author_position ); ?>
            </span>
	    <?php endif;
        if ( $twitter_url || $facebook_url || $google_plus_url || $google_plus_url ) : ?>
            <p class="author-social topmargin_20">
                <?php if ( $twitter_url ) : ?>
                    <a href="<?php echo esc_url( $twitter_url ) ?>"
                       class="social-icon socicon-twitter"></a>
                <?php endif; ?>
                <?php if ( $facebook_url ) : ?>
                    <a href="<?php echo esc_url( $facebook_url ) ?>"
                       class="social-icon socicon-facebook"></a>
                <?php endif; ?>
                <?php if ( $google_plus_url ) : ?>
                    <a href="<?php echo esc_url( $google_plus_url ) ?>"
                       class="social-icon socicon-google"></a>
                <?php endif; ?>
                <?php if ( $youtube ) : ?>
                    <a href="<?php echo esc_url( $youtube ) ?>"
                       class="social-icon socicon-youtube"></a>
                <?php endif; ?>
            </p><!-- eof .author-social -->
	    <?php endif; //author social ?>
    </div>
</div>

<?php echo wp_kses_post( $after_widget );