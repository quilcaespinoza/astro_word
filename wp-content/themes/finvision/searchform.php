<?php
/**
 * Template for displaying search forms
 *
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="form-group-wrap">
	<div class="form-group">
        <input type="search" class="search-field form-control"
			       placeholder="<?php echo esc_attr_x( 'Search keyword', 'placeholder', 'finvision' ); ?>"
			       value="<?php echo get_search_query(); ?>" name="s"
			       title="<?php echo esc_attr_x( 'Search for:', 'label', 'finvision' ); ?>" size="10"/>
	</div>
	<button type="submit" class="search-submit theme_button no_bg_button">
		<?php echo esc_html_x( 'ok', 'submit button', 'finvision' ); ?>
	</button>
    </div>
</form>