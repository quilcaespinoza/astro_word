<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
get_header();
global $post;

$options        = fw_get_db_post_option( $post->ID, fw()->extensions->get( 'events' )->get_event_option_id() );
$event_location_array = array( $options['event_location']['venue'], $options['event_location']['city'], $options['event_location']['state'], $options['event_location']['country'], $options['event_location']['zip'] );
$event_location = implode( ', ', array_filter($event_location_array) );

$column_classes = finvision_get_columns_classes();
$has_sidebar = $column_classes['main_column_class'] === 'col-xs-12';

$option_events =  fw_get_db_post_option( $post->ID );
$gallery_images =  $option_events['post-featured-gallery'];

?>
<div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
    <?php
    // Start the Loop.
    while ( have_posts() ) : the_post(); ?>

        <?php //layout with sidebar
        if ( $column_classes['sidebar_class'] ): ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <?php finvision_post_thumbnail(); ?>

            <div class="item-content">
                <header class="entry-header">
                    <div class="entry-meta">
                        <?php
                        if ( ! empty( $options['event_children'][0] ) ) :
                            if ( $options['event_children'][0]['event_date_range']['from'] ) : ?>
                            <div class="grey">
                                <?php echo date_i18n(get_option('date_format') . '  ' . get_option('time_format') ,strtotime( $options['event_children'][0]['event_date_range']['from'] )) ?>
                            </div>
                            <?php endif;
                        endif;

                        if ( $options['event_location']['venue'] ) : ?>
                            <div class="highlight">
                                <?php echo esc_html( $event_location  ); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header><!-- .entry-header -->

                <?php
                //tags
                echo get_the_term_list( $post->ID, 'fw-event-tag', '<span class="categories-links theme_buttons small_buttons inverse">', ' ', '</span>' );
                ?>
                <?php the_content(); ?>

                <?php
                $map = fw_ext_events_render_map();
                if ( $map ):
                    ?>
                    <div class="event-map topmargin_40">
                        <?php echo fw_ext_events_render_map(); ?>
                    </div>
                    <?php
                endif; //map
                ?>

                <?php do_action( 'finvision_ext_events_after_content' ); ?>

            </div><!-- .item-content -->
        </article>
        <?php
        //layout without sidebar
        else: ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'row columns_padding_30' ); ?>>
	        <?php finvision_post_thumbnail( true, false, 'col-xs-12 col-sm-5 col-lg-4' ); ?>
            <div class="col-xs-12 col-sm-7 col-lg-8">

                <header class="entry-header">
                    <div class="entry-meta">
                        <?php
                        if ( ! empty( $options['event_children'][0] ) ) :
                            if ( $options['event_children'][0]['event_date_range']['from'] ) : ?>
                                <div class="grey">
                                    <?php echo date_i18n(get_option('date_format') . '  ' . get_option('time_format') ,strtotime( $options['event_children'][0]['event_date_range']['from'] )) ?>
                                </div>
                            <?php endif;
                        endif;

                        if ( $options['event_location']['venue'] ) : ?>
                            <div class="highlight">
                                <?php echo esc_html( $event_location  ); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header><!-- .entry-header -->

                <?php
                //tags
                echo get_the_term_list( $post->ID, 'fw-event-tag', '<span class="categories-links theme_buttons small_buttons inverse">', ' ', '</span>' );
                ?>
                <?php the_content(); ?>

                <?php
                $map = fw_ext_events_render_map();
                if ( $map ):
                    ?>
                    <div class="event-map topmargin_40">
                        <?php echo fw_ext_events_render_map(); ?>
                    </div>
                    <?php
                endif; //map
                ?>

                <?php do_action( 'finvision_ext_events_after_content' ); ?>

            </div>
        </article>
        <?php endif;

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
    endwhile; ?>

</div><!--eof #content -->
<?php if ( $column_classes['sidebar_class'] ): ?>
    <!-- main aside sidebar -->
    <aside class="<?php echo esc_attr( $column_classes['sidebar_class'] ); ?>">
        <?php get_sidebar(); ?>
    </aside>
    <!-- eof main aside sidebar -->
    <?php
endif;

get_footer();