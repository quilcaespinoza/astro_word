<?php
/**
 * The template for displaying image attachments
 */

get_header();

// Retrieve attachment metadata.
$metadata       = wp_get_attachment_metadata();
$column_classes = finvision_get_columns_classes(); ?>
	<div id="content" class="col-xs-12 col-lg-10 col-lg-offset-1 content-area image-attachment">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item content-padding big-padding with_shadow' ); ?>>
                <div class="item-media-wrap text-center">
                    <div class="item-media">
	                    <?php
	                    $attachment_id = $post->ID;
	                    printf( '<a href="%1$s" rel="attachment" class="prettyPhoto" data-gal="prettyPhoto[gal-<?php echo esc_attr( uniqid() ); ?>]">%2$s</a>',
		                    wp_get_attachment_image_src( $attachment_id, 'full' )[0],
		                    wp_get_attachment_image( $attachment_id, 'finvision-full-width' )
	                    );
	                    ?>
                    </div>
                </div>
				<div class="item-content">
					<header class="entry-header">
						<div class="entry-meta highlightlinks">
                            <span>
							    <?php finvision_posted_on( true, true ); ?>
	                            <?php esc_html_e( 'in', 'finvision' ); ?> <span class="parent-post-link"><a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>"><?php echo get_the_title( $post->post_parent ); ?></a></span>
                            </span>
						</div><!-- .entry-meta -->
						<?php if ( get_the_title() ) : ?>
                            <h1 class="entry-title topmargin_0"><?php the_title(); ?></h1>
						<?php endif; ?>
					</header><!-- .entry-header -->

                    <div class="entry-content">
	                    <?php the_excerpt(); ?>
                    </div>

					<div class="full-size-link tag-links topmargin_30"><a href="<?php echo esc_url( wp_get_attachment_url() ); ?>"><?php echo esc_html( $metadata['width'] ); ?> &times; <?php echo esc_html( $metadata['height'] ); ?></a></div>

                    <?php
					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'finvision' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					) );
					?>
				</div><!-- .entry-content -->
			</article><!-- #post-## -->

			<?php comments_template(); ?>

		<?php endwhile; // end of the loop. ?>
	</div><!--eof #content -->
<?php
get_footer();