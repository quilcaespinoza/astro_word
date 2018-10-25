<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}


// share buttons
if ( ! function_exists( 'mwt_share_this' ) ) :
	/**
	 * Share article through social networks.
	 * bool $only_buttons
	 */
	function mwt_share_this( $only_buttons = false, $share_word = '', $icon_style = 'color-bg-icon' ) {

		$share_buttons                      = array();
		$share_buttons['share_facebook']    = '<a href="https://www.facebook.com/sharer.php?u=' . esc_url( get_permalink() ) . '" class="social-icon ' . esc_attr( $icon_style ) . ' socicon-facebook" target="_blank"></a>';
		$share_buttons['share_twitter']     = '<a href="https://twitter.com/intent/tweet?url=' . esc_url( get_permalink() ) . '" class="social-icon ' . esc_attr( $icon_style ) . ' socicon-twitter" target="_blank"></a>';
		$share_buttons['share_google_plus'] = '<a href="https://plus.google.com/share?url=' . esc_url( get_permalink() ) . '" class="social-icon ' . esc_attr( $icon_style ) . ' socicon-googleplus" target="_blank"></a>';
		$share_buttons['share_pinterest']   = '<a href="https://pinterest.com/pin/create/bookmarklet/?url=' . esc_url( get_permalink() ) . '" class="social-icon ' . esc_attr( $icon_style ) . ' socicon-pinterest" target="_blank"></a>';
		$share_buttons['share_linkedin']    = '<a href="https://www.linkedin.com/shareArticle?url=' . esc_url( get_permalink() ) . '" class="social-icon ' . esc_attr( $icon_style ) . ' socicon-linkedin" target="_blank"></a>';
		$share_buttons['share_tumblr']      = '<a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=' . esc_url( get_permalink() ) . '" class="social-icon ' . esc_attr( $icon_style ) . ' socicon-tumblr" target="_blank"></a>';
		$share_buttons['share_reddit']      = '<a href="https://reddit.com/submit?url=' . esc_url( get_permalink() ) . '" class="social-icon ' . esc_attr( $icon_style ) . ' socicon-reddit" target="_blank"></a>';

		if ( function_exists( 'fw_get_db_customizer_option' ) ) {
			if ( ! fw_get_db_customizer_option( 'share_facebook' ) ) {
				unset( $share_buttons['share_facebook'] );
			}

			if ( ! fw_get_db_customizer_option( 'share_twitter' ) ) {
				unset( $share_buttons['share_twitter'] );
			}

			if ( ! fw_get_db_customizer_option( 'share_google_plus' ) ) {
				unset( $share_buttons['share_google_plus'] );
			}

			if ( ! fw_get_db_customizer_option( 'share_pinterest' ) ) {
				unset( $share_buttons['share_pinterest'] );
			}

			if ( ! fw_get_db_customizer_option( 'share_linkedin' ) ) {
				unset( $share_buttons['share_linkedin'] );
			}

			if ( ! fw_get_db_customizer_option( 'share_tumblr' ) ) {
				unset( $share_buttons['share_tumblr'] );
			}

			if ( ! fw_get_db_customizer_option( 'share_reddit' ) ) {
				unset( $share_buttons['share_reddit'] );
			}
		}

		if ( ! empty ( $share_buttons ) ) :
			$unique_id = uniqid();

			if ( ! $only_buttons ) :
				?>
				<div class="dropdown inline-block">
				<a href="#" data-target="#" class="theme_button color4 share_button" id="share_button_<?php echo esc_attr( $unique_id ); ?>"
				   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
						class="fa fa-share"></i></a>
				<div class="dropdown-menu" aria-labelledby="share_button_<?php echo esc_attr( $unique_id ); ?>">
			<?php endif; //only_buttons
			?>
			<div class="share_buttons">
                <?php if ( !empty( $share_word ) ) : ?>
                    <span><?php echo esc_html__( $share_word, 'mwt-addons' ); ?></span>
                <?php endif; ?>
				<?php
				foreach ( $share_buttons as $share_button ) :
					echo wp_kses_post( $share_button );
				endforeach;
				?>
			</div><!-- eof .share_buttons -->
			<?php if ( ! $only_buttons ) : ?>
			</div><!-- eof .dropdown-menu -->
			</div><!-- eof .dropdown -->
		<?php endif; //only_buttons
		endif; // share_buttons

	} //mwt_share_this()
endif; //function_exists