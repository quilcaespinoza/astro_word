<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var $atts The shortcode attributes
 */

$items          = $atts['items'];
$margin         = $atts['margin'];

//1 - col-*-12
//2 - col-*-6
//3 - col-*-4
//4 - col-*-3
//6 - col-*-2

//bootstrap col-lg-* class
$lg_class = '';
switch ( $atts['responsive_lg'] ) :
	case ( 1 ) :
		$lg_class = 'col-lg-12';
		break;

	case ( 2 ) :
		$lg_class = 'col-lg-6';
		break;

	case ( 3 ) :
		$lg_class = 'col-lg-4';
		break;

	case ( 4 ) :
		$lg_class = 'col-lg-3';
		break;
	//6
	default:
		$lg_class = 'col-lg-2';
endswitch;

//bootstrap col-md-* class
$md_class = '';
switch ( $atts['responsive_md'] ) :
	case ( 1 ) :
		$md_class = 'col-md-12';
		break;

	case ( 2 ) :
		$md_class = 'col-md-6';
		break;

	case ( 3 ) :
		$md_class = 'col-md-4';
		break;

	case ( 4 ) :
		$md_class = 'col-md-3';
		break;
	//6
	default:
		$md_class = 'col-md-2';
endswitch;

//bootstrap col-sm-* class
$sm_class = '';
switch ( $atts['responsive_sm'] ) :
	case ( 1 ) :
		$sm_class = 'col-sm-12';
		break;

	case ( 2 ) :
		$sm_class = 'col-sm-6';
		break;

	case ( 3 ) :
		$sm_class = 'col-sm-4';
		break;

	case ( 4 ) :
		$sm_class = 'col-sm-3';
		break;
	//6
	default:
		$sm_class = 'col-sm-2';
endswitch;

//bootstrap col-xs-* class
$xs_class = '';
switch ( $atts['responsive_xs'] ) :
	case ( 1 ) :
		$xs_class = 'col-xs-12';
		break;

	case ( 2 ) :
		$xs_class = 'col-xs-6';
		break;

	case ( 3 ) :
		$xs_class = 'col-xs-4';
		break;

	case ( 4 ) :
		$xs_class = 'col-xs-3';
		break;
	//6
	default:
		$xs_class = 'col-xs-2';
endswitch;

//column paddings class
//margin values:
//0
//1
//2
//10
//30
$padding_class = '';
$margin_class = '';
switch ( $atts['margin'] ) :
	case ( 0 ) :
		$padding_class = 'columns_padding_0';
		break;

	case ( 1 ) :
		$padding_class = 'columns_padding_1';
		break;

	case ( 2 ) :
		$padding_class = 'columns_padding_2';
		break;

	case ( 10 ) :
		$padding_class = 'columns_padding_5';
		$margin_class = 'columns_margin_bottom_0';
		break;

	case ( 60 ) :
		$padding_class = 'columns_padding_30';
		$margin_class = 'columns_margin_bottom_50';
		break;
	//6
	default:
		$padding_class = '';
		$margin_class = 'columns_margin_bottom_20';
endswitch;

?>

<?php if ( !empty( $items ) ) : ?>

<div class="isotope_container images-grid isotope row <?php echo esc_attr( $padding_class . ' ' . $margin_class ); ?> masonry-layout" >
	<?php
	foreach ( $items as $item ) :
		?>
        <div class="isotope-item <?php echo esc_attr( $lg_class . ' ' . $md_class . ' ' . $sm_class . ' ' . $xs_class ); ?>">
			<?php if ( $item['url'] ): ?>
            <a href="<?php echo esc_url( $item['url'] ); ?>" class="<?php echo esc_attr( $item['class'] ); ?>">
				<?php endif; ?>
                <img src="<?php echo esc_url( $item['image']['url'] ); ?>"
                     alt="<?php echo esc_attr( $item['title'] ); ?>">
				<?php if ( $item['url'] ): ?>
            </a>
		<?php endif; ?>
        </div>
		<?php
	endforeach;
	?>
</div><!-- eof .isotope_container -->
<?php endif;
