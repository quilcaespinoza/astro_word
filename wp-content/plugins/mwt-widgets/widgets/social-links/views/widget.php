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
 * @var $title
 */
$unique_id = uniqid();
echo wp_kses_post( $before_widget );
echo wp_kses_post( $title );
?>

<span class="social-icons">
	<?php
	foreach ( $params['social_icons'] as $icon ) :
		?>
        <a href="<?php echo esc_url( $icon['icon_url'] ) ?>"
           class="<?php echo esc_attr( $icon['icon'] ); ?> <?php echo esc_attr( $icon['icon_class'] ); ?>"></a>
		<?php
	endforeach;
	?>
</span>
<?php echo wp_kses_post( $after_widget );