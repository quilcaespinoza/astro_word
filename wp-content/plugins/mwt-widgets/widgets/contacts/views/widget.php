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

<ul class="list-unstyled darklinks">
<?php foreach ( $params['contacts'] as $contact ) : ?>

    <li>
        <div class="media small-media">
	        <?php if ( $contact['icon']['type'] !== 'none' ) : ?>
                <div class="media-left">
	                <?php if ( $contact['icon']['type'] === 'icon-font') : ?>
                        <i class="<?php echo esc_attr( $contact['icon']['icon-class'] . ' ' . $contact['icon_color'] ); ?> cons-width highlight rightpadding_5"></i>
	                <?php else:
		                echo wp_get_attachment_image( $contact['icon']['attachment-id'] );
	                endif; ?>
                </div>
	        <?php endif; ?>
            <div class="media-body">
	            <?php if ( !empty( $contact['link'] ) ) : ?>
                <a href="<?php echo esc_url( $contact['link'] ); ?>">
		            <?php endif;
		            echo wp_kses_post( $contact['contact_info'] );
		            if ( !empty( $contact['link'] ) ) : ?>
                </a>
            <?php endif; ?>
            </div>
        </div>
    </li>
<?php endforeach; ?>
</ul>
<?php echo wp_kses_post( $after_widget );