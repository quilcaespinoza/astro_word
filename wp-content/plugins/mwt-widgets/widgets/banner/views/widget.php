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
echo wp_kses_post( $before_widget );
if ( !empty ( $params['title'] ) ) {
	echo wp_kses_post( $before_title . $params['title'] . $after_title );
}
?>

<div class="banner-wrap">
    <div class="banner text-center">
        <?php echo wp_kses_post( $params['content'] ); ?>
    </div>
	<?php
	if ( !empty ( $params['url'] ) ) : ?>
    <div class="media-links">
        <a href="<?php echo esc_url( $params['url'] ); ?>" class="abs-link"></a>
    </div>
    <?php endif; //url ?>
</div>

<?php echo wp_kses_post( $after_widget );