<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

$container_class = !empty( $atts['icons_wrapper_class'] ) ? $atts['icons_wrapper_class'] : '';

?>
<span class="social-icons <?php echo esc_attr( $container_class ); ?>">
	<?php
	foreach ( $atts['social_icons'] as $icon ) :
		?>
        <?php if ( !empty( $container_class ) ) : ?>
        <span>
        <?php endif; ?>
            <a href="<?php echo esc_url( $icon['icon_url'] ) ?>"
               class="<?php echo esc_attr( $icon['icon'] ); ?> <?php echo esc_attr( $icon['icon_class'] ); ?>" target="_blank">
                <?php if ( $icon['icon_class'] === 'text-icon' ) {
                    echo esc_html( $icon['icon_text'] );
                } ?>
            </a>
        <?php if ( !empty( $container_class ) ) : ?>
        </span>
        <?php endif; ?>
		<?php
	endforeach;
	?>
</span>
