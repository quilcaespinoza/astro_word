<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Template for displaying content of post format fw-event
 *
 * Used for archive/search/shortcodes
 */

$terms          = get_the_terms( get_the_ID(), 'fw-event-taxonomy-name' );
$filter_classes = '';
if ( !empty($terms) ) {
	foreach ( $terms as $term ) {
		$filter_classes .= ' filter-' . $term->slug;
	}
}

global $post;
$options = ( function_exists( 'fw_get_db_post_option' ) ) ? fw_get_db_post_option( $post->ID, fw()->extensions->get( 'events' )->get_event_option_id() ) : false;

$event_location_array = array( $options['event_location']['venue'], $options['event_location']['city'], $options['event_location']['state'], $options['event_location']['country'], $options['event_location']['zip'] );

$event_location = implode( ', ', array_filter($event_location_array) );
?>
<article <?php post_class( "side-item content-padding big-padding with_shadow" . $filter_classes ); ?>>

    <div class="row">
        <?php finvision_post_thumbnail( true, true, 'col-xs-12 col-sm-5'); ?>
        <?php if ( has_post_thumbnail() ) : ?>
        <div class="col-xs-12 col-sm-7">
        <?php else: ?>
        <div class="col-xs-12">
        <?php endif; //has_post_thumbnail ?>

            <div class="item-content">
                <header class="entry-header">
                    <div class="entry-meta highlight">
                        <?php
                        if ( ! empty( $options['event_children'][0] ) ) :
                            if ( $options['event_children'][0]['event_date_range']['from'] ) : ?>
                                <?php echo date_i18n(get_option('date_format') . '  ' . get_option('time_format') ,strtotime( $options['event_children'][0]['event_date_range']['from'] )) ?>
                            <?php endif;
                        endif; ?>
                    </div>

                    <?php
                    the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
                    ?>
                </header><!-- .entry-header -->

                <div class="entry-content content-3lines-ellipsis">
                    <?php the_excerpt(); ?>
                </div><!-- .entry-content -->

            </div>

        </div>
    </div>

</article><!-- eof vertical-item -->
