<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

?>
<div class="bootstrap-tabs <?php echo esc_attr( $atts['small_tabs'] ); ?>">
	<ul class="nav nav-tabs <?php echo esc_attr( $atts['half_width'] ); ?>" role="tablist">
		<?php foreach ( $atts['tabs'] as $index => $tab ) : ?>
			<li class="<?php if ( $index === 0 ) { echo 'active'; } ?>">
				<a href="#tab-<?php echo esc_attr( $atts['id'] ) . '-' . $index ?>" role="tab" data-toggle="tab">
					<?php if ( $tab['tab_icon'] ) : ?>
						<i class="<?php echo esc_attr( $tab['tab_icon'] ); ?>"></i>
					<?php endif; //tab icon ?>
					<?php echo esc_html( $tab['tab_title'] ); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
	<div class="tab-content big-padding <?php echo esc_attr( $atts['top_border'] ); ?>">
		<?php foreach ( $atts['tabs'] as $index => $tab ) : ?>
			<div class="tab-pane fade <?php if ( $index === 0 ) { echo 'in active'; } ?>"
			     id="tab-<?php echo esc_attr( $atts['id'] ) . '-' . $index ?>">
				<?php
				if ( $tab['tab_featured_image'] ) :
					?>
					<p class="featured-tab-image">
						<img src="<?php echo esc_url( $tab['tab_featured_image']['url'] ); ?>"
						     alt="<?php echo esc_attr( $tab['tab_title'] ); ?>">
					</p>
					<?php
				endif; //tab featured image
				?>
				<?php

				if ( !empty( $tab['tab_accordion']['tabs'] ) && $tab['tab_accordion']['position'] ) {
					echo fw()->extensions->get('shortcodes')->get_shortcode('accordion')->render($tab['tab_accordion']);
				}

                echo wp_kses_post( $tab['tab_content'] );

                if ( !empty( $tab['tab_accordion']['tabs'] ) && !$tab['tab_accordion']['position'] ) {
	                echo fw()->extensions->get('shortcodes')->get_shortcode('accordion')->render($tab['tab_accordion']);
                }

                ?>

			</div><!-- .eof tab-pane -->
		<?php endforeach; ?>
	</div>
</div>