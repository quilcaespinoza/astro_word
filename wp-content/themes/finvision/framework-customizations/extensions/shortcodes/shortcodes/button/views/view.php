<?php
if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$button_type = ( isset( $atts['button_types']['button_type'] ) ) ? $atts['button_types']['button_type'] : 'simple_link';

$complex_button = ( strpos( $button_type, 'complex_button' ) !== false ) ? true : false;

$min_width = ( isset( $atts['button_types'][$button_type]['min_width'] ) && $atts['button_types'][$button_type]['min_width'] ) ? ' min_width_button' : '';

$small_button = ( isset( $atts['button_types'][$button_type]['small_button'] ) && $atts['button_types'][$button_type]['small_button'] ) ? ' small_button' : '';

$icon_side = ( isset( $atts['button_types'][$button_type]['button_icon']['use_icon'] ) && $atts['button_types'][$button_type]['button_icon']['use_icon'] ) ? $atts['button_types'][$button_type]['button_icon']['icon']['icon_side'] : '';

$icon = ( isset( $atts['button_types'][$button_type]['button_icon']['use_icon'] ) && $atts['button_types'][$button_type]['button_icon']['use_icon'] ) ? $atts['button_types'][$button_type]['button_icon']['icon']['icon_source'] : '';
?>

<a href="<?php echo esc_url( $atts['link'] ) ?>" target="<?php echo esc_attr( $atts['target'] ) ?>"
   class="<?php echo esc_attr( $button_type . $min_width . $small_button . ' ' . $icon_side ); ?>">
    <?php if ( $icon_side === 'left' && $icon['type'] !== 'none' ) : ?>
        <?php if ( !empty( $styled_icon ) ) : ?>
            <span class="icon">
        <?php endif; ?>
	    <?php if ( $icon['type'] === 'icon-font') : ?>
            <i class="<?php echo esc_attr( $icon['icon-class'] ); ?> rightpadding_10"></i>
	    <?php else:
		    echo wp_get_attachment_image( $icon['attachment-id'] );
	    endif; ?>
        <?php if ( !empty( $styled_icon ) ) : ?>
            </span>
        <?php endif; ?>
    <?php endif; ?>


    <?php echo wp_kses_post( $atts['label'] ); ?>


	<?php if ( $icon_side === 'right' && $icon['type'] !== 'none' ) : ?>
        <?php if ( !empty( $styled_icon ) ) : ?>
            <span class="icon">
        <?php endif; ?>
		<?php if ( $icon['type'] === 'icon-font') : ?>
            <i class="<?php echo esc_attr( $icon['icon-class'] ); ?> leftpadding_10"></i>
		<?php else:
			echo wp_get_attachment_image( $icon['attachment-id'] );
		endif; ?>
		<?php if ( !empty( $styled_icon ) ) : ?>
            </span>
		<?php endif; ?>
	<?php endif; ?>
</a>