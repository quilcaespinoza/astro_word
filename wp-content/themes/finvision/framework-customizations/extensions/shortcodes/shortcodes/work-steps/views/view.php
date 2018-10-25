<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>
<div class="row flex-wrap v-center-content steps-row">
	<?php foreach ( $atts['teasers'] as $teaser ): ?>
		<div class="col-xs-12 col-sm-4">
            <div class="teaser text-center">
                <?php
                    if ( $teaser['icon']['type'] !== 'none' ) {
                        echo '<div class="teaser_icon">';
	                    finvision_get_icon_v2( $teaser['icon'] );
	                    echo '</div>';
                    }
                    echo wp_kses_post( $teaser['content'] );
                    foreach ( $teaser['buttons'] as $button ) {
	                    echo fw_ext( 'shortcodes' )->get_shortcode( 'button' )->render( $button );
                    }
                ?>
            </div>
		</div><!-- eof teaser -->
	<?php endforeach; //progress_teaser ?>
</div> <!-- eof teasers row -->