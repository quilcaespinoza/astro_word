<?php if ( ! defined( 'ABSPATH' ) ) {
	die();
}
if ( ! defined( 'FW' ) ) {
	return;
}
/**
 * @var string $before_widget
 * @var string $after_widget
 * @var array $params
 */
$unique_id = uniqid();
$custom_buttons = isset( $params['custom_buttons'] ) ? $params['custom_buttons'] : false;

echo wp_kses_post( $before_widget );

echo wp_kses_post( $title );

if ( $params['show_logo'] ) {
	get_template_part( 'template-parts/footer/footer-logo' );
}

if ( $params['about'] ) { ?>

    <div class="topmargin_25">
	    <?php echo wp_kses_post( $params['about'] ); ?>
    </div>

<?php } ?>

<?php if ( !empty($params['social_icons']) ) : ?>
<p class="social-icons topmargin_30">
	<?php
	foreach ( $params['social_icons'] as $icon ) :
		?>
        <a href="<?php echo esc_url( $icon['icon_url'] ) ?>"
           class="<?php echo esc_attr( $icon['icon'] ); ?> <?php echo esc_attr( $icon['icon_class'] ); ?>"></a>
		<?php
	endforeach;
	?>
</p>
<?php endif; ?>

<?php if ( !empty( $custom_buttons ) ) : ?>
<p class="inline-content v-spacing topmargin_25">
    <?php foreach( $custom_buttons as $button ) : ?>
        <?php echo fw()->extensions->get('shortcodes')->get_shortcode('button')->render($button); ?>
    <?php endforeach; ?>
</p>
<?php endif; ?>

<?php echo wp_kses_post( $after_widget );