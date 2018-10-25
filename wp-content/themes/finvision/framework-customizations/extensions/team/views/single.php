<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * The template for displaying single service
 *
 */

get_header();
$pID = get_the_ID();

//no columns on single service page
$column_classes = fw_ext_extension_get_columns_classes( true );

//getting taxonomy name
$ext_team_settings = fw()->extensions->get( 'team' )->get_settings();
$taxonomy_name = $ext_team_settings['taxonomy_name'];

$atts = fw_get_db_post_option(get_the_ID());

$shortcodes_extension = fw()->extensions->get( 'shortcodes' );

$unique_id = uniqid();
?>
    <div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?> topmargin_0 bottommargin_0">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="row flex-wrap columns_padding_30">
                    <?php if ( has_post_thumbnail() || ! empty( $atts['skills'] ) ) : ?>
                        <div class="col-xs-12 col-sm-6">
	                        <?php the_post_thumbnail( 'solarify-square-width' ); ?>
                        </div>
                    <?php endif; ?>
                    <div class="col-xs-12 col-sm-6">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

                        <p class="member-social">
                            <?php
                            //overriding icon style for single team member page
                            function changeSocIconStyle($icon) {
                                $icon['icon_class'] = 'color-icon border-icon rounded-icon';
                                return $icon;
                            }
                            $social_icons = array_map( 'changeSocIconStyle', $atts['social_icons'] );

                            //get icons-social shortcode to render icons in team member item
                            $shortcodes_extension = fw()->extensions->get( 'shortcodes' );
                            if ( ! empty( $shortcodes_extension ) ) {
                                echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $social_icons ) );
                            }
                            ?>
                        </p><!-- eof social icons -->

	                    <?php if ( !empty( $atts['member_info'] ) ) : ?>
                            <ul class="list1 no-bullets feature-list topmargin_40 bottommargin_0">
			                    <?php foreach ( $atts['member_info'] as $info_item ) : ?>
                                    <li>
                                        <span class="grey"><?php echo wp_kses_post( $info_item['info_item_label'] ); ?></span>
                                        <div class="inline-block">
						                    <?php echo wp_kses_post( $info_item['info_item_content'] ); ?>
                                        </div>
                                    </li>
			                    <?php endforeach; ?>
                            </ul>
	                    <?php endif; ?>
                    </div>
                </div>

	            <?php the_content(); ?>

	            <?php if ( ! empty( $atts['skills'] ) ) :
		            foreach($atts['skills'] as $skill) :
			            echo fw_ext( 'shortcodes' )->get_shortcode( 'progress_bar' )->render( $skill );
		            endforeach;
	            endif; //skills check ?>

            </article><!-- #post-## -->
		<?php endwhile; ?>
    </div><!--eof #content -->

<?php if ( ! empty( json_decode($atts['form']['json'])[1] ) ) { ?>

            </div> <!--eof .row-->
        </div> <!--eof .container-->
    </section> <!--eof section-->

    <section class="ls ms section_padding_bottom_150">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 topmargin_0">
                    <?php echo fw_ext( 'shortcodes' )->get_shortcode( 'contact_form' )->render( $atts ); ?>
                </div>

<?php
} //form check ?>

<?php if ( $column_classes['sidebar_class'] ): ?>
    <!-- main aside sidebar -->
    <aside class="<?php echo esc_attr( $column_classes['sidebar_class'] ); ?>">
		<?php get_sidebar(); ?>
    </aside>
    <!-- eof main aside sidebar -->
	<?php
endif;
get_footer();