<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id = uniqid( 'testimonials-' );

$has_avatars = true;
if ( !empty( $atts['testimonials'] ) ) {
    foreach ( $atts['testimonials'] as $testimonial ) {
        if ( empty( $testimonial['review_avatar'] ) ) {
            $has_avatars = false;
            break;
        }
    }
}
?>

<?php // if all testimonials has avatars
if ( $has_avatars ) : ?>
    <div class="row testimonials-two-owls">
        <div class="col-xs-12 col-sm-7 col-lg-6 col-sm-push-5 col-lg-push-6 text-center text-sm-left">
            <div class="owl-carousel tml-content bottom-nav"
                 data-responsive-lg="1"
                 data-responsive-md="1"
                 data-responsive-sm="1"
                 data-nav="true"
                 data-autoplay="true"
                 data-autoplay-timeout="5000"
                 data-loop="true"
            >
                <?php
                foreach ( $atts['testimonials'] as $testimonial ): ?>
                    <blockquote>
                        <?php if ( !empty( $testimonial['review_name'] ) || !empty( $testimonial['review_position'] ) ) : ?>
                            <cite>
                                <?php echo esc_html( implode( ' / ', array(
	                                $testimonial['review_name'],
	                                $testimonial['review_position']
                                ) ) ); ?>
                            </cite>
                        <?php endif; ?>
                        <p><?php echo wp_kses_post( $testimonial['review_content'] ); ?></p>
                    </blockquote>
	            <?php
	            endforeach; ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-5 col-lg-6 col-sm-pull-7 col-lg-pull-6 bottommargin_0">
            <div class="owl-carousel tml-avatars"
                 data-responsive-lg="1"
                 data-responsive-md="1"
                 data-responsive-sm="1"
                 data-animate-in="fadeIn"
                 data-animate-out="fadeOut"
                 data-mouse-drag="false"
                 data-touch-drag="false"
            >
	            <?php
	            foreach ( $atts['testimonials'] as $testimonial ):
		            $avatar = $testimonial['review_avatar']['url'];

		            $alt = get_post_meta( $testimonial['review_avatar']['attachment_id'], '_wp_attachment_image_alt', true );

		            $img_attributes = array(
			            'src' => $avatar,
			            'alt' => $alt ? $alt : $avatar
		            );
                    ?>
                    <div class="avatar">
	                    <?php echo fw_html_tag('img', $img_attributes); ?>
                    </div>
		            <?php
	            endforeach; ?>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="row">
        <div class="col-xs-6 col-sm-4">
            <div class="tml-quote-sign-wrap">
                <div class="tml-quote-sign"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-8">
            <div class="owl-carousel tml-content bottom-nav"
                 data-responsive-lg="1"
                 data-responsive-md="1"
                 data-responsive-sm="1"
                 data-nav="true"
            >
	            <?php
	            foreach ( $atts['testimonials'] as $testimonial ): ?>
                    <blockquote>
			            <?php if ( !empty( $testimonial['review_name'] ) || !empty( $testimonial['review_position'] ) ) : ?>
                            <cite>
					            <?php echo esc_html( implode( ' / ', array(
						            $testimonial['review_name'],
						            $testimonial['review_position']
					            ) ) ); ?>
                            </cite>
			            <?php endif; ?>
                        <p><?php echo wp_kses_post( $testimonial['review_content'] ); ?></p>
                    </blockquote>
		            <?php
	            endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>


