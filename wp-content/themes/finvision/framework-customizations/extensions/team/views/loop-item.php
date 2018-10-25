<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Single service loop item layout
 * also using as a default service view in a shortcode
 */

$ext_team_settings = fw()->extensions->get( 'team' )->get_settings();
$taxonomy_name = $ext_team_settings['taxonomy_name'];

$pID = get_the_ID();
$atts = fw_get_db_post_option($pID);

?>
<article <?php post_class( "side-item side-md justify-content content-padding big-padding ds text-center text-md-left" ); ?> >
    <div class="row">
	    <?php if ( has_post_thumbnail() ) : ?>
            <div class="col-xs-12 col-md-6">
                <div class="item-media">
		            <?php the_post_thumbnail( 'finvision-square-width' ); ?>
                    <div class="media-links">
                        <a class="abs-link" href="<?php the_permalink(); ?>"></a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
	    <?php else: //has_post_thumbnail ?>
            <div class="col-xs-12">
        <?php endif; ?>
            <div class="item-content">
                <header class="entry-header">
                    <h3 class="entry-title highlight">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    <?php if ( ! empty( $atts['member_position'] ) ) : ?>
                        <p class="small-text grey"><?php echo wp_kses_post( $atts['member_position'] ); ?></p>
                    <?php endif; //position ?>
                </header>

                <?php if ( ! empty( $atts['social_icons'] ) ) : ?>
                    <div class="member-social">
                        <?php
                        //get icons-social shortcode to render icons in team member item
                        $shortcodes_extension = fw()->extensions->get( 'shortcodes' );
                        if ( ! empty( $shortcodes_extension ) ) {
                            echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $atts['social_icons'] ) );
                        }
                        ?>
                    </div><!-- eof social icons -->
                <?php endif; //social icons ?>
            </div>
        </div> <!-- col -->
    </div>
</article><!-- eof .vertical-item -->
