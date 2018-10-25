<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 */

get_header();

global $post;
$pID = get_the_ID();
$project_options =  fw_get_db_post_option( $post->ID );

$fw_ext_projects_gallery_image = fw()->extensions->get( 'portfolio' )->get_config( 'image_sizes' );
$fw_ext_projects_gallery_image = $fw_ext_projects_gallery_image['gallery-image'];
//no columns on single gallery page
$column_classes = finvision_get_columns_classes( true );
$has_sidebar = !empty( get_categories() ) || !empty( $project_options['project_info'] ) || !empty( $project_options['project_services'] ) || !empty( get_tags() );

$content_class = $has_sidebar ? 'col-xs-12 col-md-8 col-lg-8' : 'col-xs-12';

// Start the Loop.
while ( have_posts() ) : the_post();
?>
	<div id="content" class="<?php echo esc_attr( $content_class ); ?>">

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item' ); ?>>
                <div class="item-media-wrap bottommargin_35">
                    <div class="item-media">
                        <?php
                        $thumbnails = fw_ext_portfolio_get_gallery_images();
                        if ( has_post_thumbnail() ) {
                            $thumbnail_id = get_post_thumbnail_id();
                            $thumbnail = array(
                                'attachment_id' => $thumbnail_id,
                                'url'            => wp_get_attachment_url( $thumbnail_id )
                            );
                            array_unshift ( $thumbnails, $thumbnail );
                        }
                        $captions   = array();
                        if ( sizeof($thumbnails) > 1 ) :
                            $loop = ( count( $thumbnails ) > 1 ) ? "true" : "false";
                            ?>
                            <div id="owl-carousel-<?php echo esc_attr( $pID ); ?>" class="owl-carousel"
                                 data-margin="0"
                                 data-nav="false"
                                 data-dots="true"
                                 data-themeclass="owl-theme entry-thumbnail-carousel"
                                 data-center="false"
                                 data-items="1"
                                 data-responsive-xs="1"
                                 data-responsive-sm="1"
                                 data-responsive-md="1"
                                 data-responsive-lg="1"
                            >
                                <?php
                                $gallery_id = uniqid();
                                foreach ( $thumbnails as $thumbnail ) :
                                    $attachment = get_post( $thumbnail['attachment_id'] );
                                    $captions[ $thumbnail['attachment_id'] ] = $attachment->post_title;
                                    $image = fw_resize( $thumbnail['attachment_id'], $fw_ext_projects_gallery_image['width'], $fw_ext_projects_gallery_image['height'], $fw_ext_projects_gallery_image['crop'] );
                                    ?>
                                    <div class="item">
                                        <a href="<?php echo wp_get_attachment_image_src( $thumbnail['attachment_id'], 'finvision-full-width')['0']; ?>" class="prettyPhoto" data-gal="prettyPhoto[gal-<?php echo esc_attr( $gallery_id ); ?>]">
		                                    <?php echo wp_get_attachment_image( $thumbnail['attachment_id'], 'finvision-full-width' ); ?>
                                        </a>
                                    </div>
                                <?php endforeach ?>
                            </div>
                            <?php
                        else: ?>

                            <a href="<?php echo get_the_post_thumbnail_url( null, 'finvision-full-width'); ?>" class="prettyPhoto" data-gal="prettyPhoto[gal-<?php echo esc_attr( uniqid() ); ?>]">
                                <?php the_post_thumbnail( 'finvision-full-width' ); ?>
                            </a>
                            <?php
                        endif; //more than one thumbnail check
                        ?>
                    </div><!-- .item-media -->
                </div>
                <div class="item-content entry-content">

                    <h1 class="entry-title"><?php the_title(); ?></h1>

                    <?php if ( !empty( get_the_content() ) ) : ?>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                    <?php endif; ?>

                    <?php
                    //buttons_share
                    finvision_share_this( true, false, 'color-icon border-icon rounded-icon' )
                    ?>
                </div>
                <!-- .entry-content -->
			</article><!-- #post-## -->

		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}

		?>

	</div><!--eof #content -->
    <?php if ( $has_sidebar ): ?>
        <!-- main aside sidebar -->
        <aside class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0 col-lg-4">
            <div class="widget widget_text">
                <h3 class="widget-title">
                    <?php echo esc_html__( 'Project Info', 'finvision' ); ?>
                </h3>
                <ul class="list1 feature-list">
                    <?php foreach ( $project_options['project_info'] as $item ) : ?>
                    <li>
                        <div class="grey"><?php echo wp_kses_post( $item['label'] ) ?></div>
                        <div><?php echo wp_kses_post( $item['content'] ) ?></div>
                    </li>
                    <?php endforeach; ?>
                    <li>
                        <div class="grey"><?php echo esc_html__( 'Category', 'finvision' ); ?>:</div>
                        <div>
                            <?php echo get_the_term_list( $pID, 'fw-portfolio-category', '', ' ', '' ); ?>
                        </div>
                    </li>
                </ul>
            </div>

	        <?php if ( !empty( $project_options['project_services'] ) ) : ?>
                <div class="widget widget_text">
                    <h3 class="widget-title"><?php echo esc_html__( 'Services', 'finvision' ); ?></h3>
                    <ul class="list2 grey">
	                    <?php foreach ( $project_options['project_services'] as $service ) : ?>
                            <li><?php echo wp_kses_post( $service['content'] ) ?></li>
	                    <?php endforeach; ?>
                    </ul>
                </div>
	        <?php endif; ?>

            <?php if ( !empty( get_tags() ) ) : ?>
                <div class="widget widget_tag_cloud">
                    <h3 class="widget-title"><?php echo esc_html__( 'Tags', 'finvision' ); ?></h3>
                    <?php echo get_the_term_list( $pID, 'fw-portfolio-tag', '<div class="tagcloud">', ' ', '</div>' ) ?>
                </div>
            <?php endif; ?>
        </aside>
        <!-- eof main aside sidebar -->
        <?php
    endif;
endwhile;
get_footer();