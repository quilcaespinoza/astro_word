<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 * @var array $posts
 */

$unique_id = uniqid();

//if no posts - display message and return
if ( ! $posts->have_posts() ) :
	esc_html_e('No posts found', 'finvision');
    return;
endif;
?>

<div class="row vertical-tabs">
    <div class="col-sm-4">
        <ul class="nav" role="tablist">
            <?php

            $post_count = 0;
            while ( $posts->have_posts() ) : $posts->the_post();
            ?>
                <li class="<?php if ( $post_count === 0 ) { echo 'active'; } ?>">
                    <a href="#tab-<?php echo esc_attr( $unique_id ) . '-' . $post_count ?>" role="tab" data-toggle="tab">
                        <?php the_title( '', '' ); ?>
                    </a>
                </li>
            <?php
            $post_count++;
            endwhile; ?>
            <?php wp_reset_postdata(); // reset the query ?>
        </ul>
    </div>
    <div class="col-sm-8">
        <div class="tab-content">
            <?php
            $post_count = 0;
            while ( $posts->have_posts() ) : $posts->the_post();
             ?>
                <div class="tab-pane fade <?php if ( $post_count === 0 ) { echo 'in active'; } ?>"
                     id="tab-<?php echo esc_attr( $unique_id ) . '-' . $post_count ?>">
                    <?php
                        if (has_post_thumbnail()) {
                            finvision_post_thumbnail(false);
                        }
                        else {
                            esc_html_e('No post thumbnail', 'finvision');
                        }
                    ?>
                </div><!-- .eof tab-pane -->
            <?php
            $post_count++;
            endwhile; ?>
            <?php wp_reset_postdata(); // reset the query ?>
        </div>
    </div>
</div>
