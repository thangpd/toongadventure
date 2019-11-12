<?php get_header(); ?>
<div class="qodef-page-not-found">
	<?php
	$qodef_title_image_404 = setsail_select_options()->getOptionValue( '404_page_title_image' );
	$qodef_title_404       = setsail_select_options()->getOptionValue( '404_title' );
	$qodef_text_404        = setsail_select_options()->getOptionValue( '404_text' );
	$qodef_button_label    = setsail_select_options()->getOptionValue( '404_back_to_home' );
	$qodef_button_style    = setsail_select_options()->getOptionValue( '404_button_style' );
	
	if ( ! empty( $qodef_title_image_404 ) ) { ?>
		<div class="qodef-404-title-image">
			<img src="<?php echo esc_url( $qodef_title_image_404 ); ?>" alt="<?php esc_attr_e( '404 Title Image', 'setsail' ); ?>" />
		</div>
	<?php } ?>
	
	<h1 class="qodef-404-title">
		<?php if ( ! empty( $qodef_title_404 ) ) {
			echo esc_html( $qodef_title_404 );
		} else {
			esc_html_e( '404 - Page not found', 'setsail' );
		} ?>
	</h1>
	
	<p class="qodef-404-text qodef-grid-col-8">
		<?php if ( ! empty( $qodef_text_404 ) ) {
			echo esc_html( $qodef_text_404 );
		} else {
			esc_html_e( 'Oops! The page you are looking for does not exist. It might have been moved or deleted. Return to our home page.', 'setsail' );
		} ?>
	</p>
	
	<?php
		$button_params = array(
			'link' => esc_url( home_url( '/' ) ),
			'text' => ! empty( $qodef_button_label ) ? $qodef_button_label : esc_html__( 'Back to home', 'setsail' )
		);
	
		if ( $qodef_button_style == 'light-style' ) {
			$button_params['custom_class'] = 'qodef-btn-light-style';
		}
		
		echo setsail_select_return_button_html( $button_params );
	?>
</div>
<?php get_footer(); ?>