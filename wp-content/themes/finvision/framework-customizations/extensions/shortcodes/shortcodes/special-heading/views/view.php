<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var $atts
 */

if ( ! $atts['headings'] ) {
	return;
}

$counter = 0;

//check for single p element
if ( sizeof( $atts['headings'] ) === 1 && $atts['headings'][0]['heading_variant']['heading_tag'] === 'p' ) {
	$heading = $atts['headings'][0];
    ?>
    <p class="section_excerpt grey <?php echo esc_attr( $atts['heading_align'] ); ?> <?php echo esc_attr( $heading['heading_text_color'] ); ?>">
	    <?php echo wp_kses_post( $heading['heading_text'] ) ?>
    </p>
<?php
} else {

	foreach ( $atts['headings'] as $heading ) :

        $heading_tag = $heading['heading_variant']['heading_tag'];

        $heading_class = implode( ' ', array(
            $atts['heading_align'],
            $heading['heading_text_color'],
            $heading['heading_text_weight'],
            $heading['heading_text_transform']
        ) );

	    if ( $heading_tag !== 'p' ) {
	        $heading_class .= ' section_header';
        }
        if ( $heading_tag === 'p' && $counter === 0 ) {
	        $heading_class .= ' above_heading';
        }

        if ( $heading_tag === 'p' && $counter !== 0 ) {
	        $heading_class .= ' under_heading';
        } ?>

            <<?php echo esc_html( $heading_tag ); ?> class="<?php echo esc_attr( $heading_class ); ?>">
	            <?php echo wp_kses_post( $heading['heading_text'] ) ?>
            </<?php echo esc_html( $heading_tag ); ?>>

		<?php
        $counter++;
	endforeach;
}
?>