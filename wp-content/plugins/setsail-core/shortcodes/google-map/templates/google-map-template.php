<div class="qodef-google-map-holder">
	<?php if ( ! empty( $address1 ) && $enable_direction_link === 'yes' ) {
		$get_direction_link = 'https://maps.google.com?q=' . esc_attr( str_replace( array( ' ', ',' ), array( '+', '' ), $address1 ) );
		?>
		<a itemprop="url" class="qodef-google-map-direction" href="<?php echo esc_url( $get_direction_link ); ?>" target="_blank"><?php esc_html_e( 'Get direction', 'setsail-core' ); ?></a>
	<?php } ?>
	<div class="qodef-google-map" id="<?php echo esc_attr( $map_id ); ?>" <?php echo wp_kses( $map_data, array( 'data' ) ); ?>></div>
	<?php if ( $params['snazzy_map_style'] === 'yes' ) { ?>
		<input type="hidden" class="qodef-snazzy-map" value="<?php echo str_replace( '<br />', '', $params['snazzy_map_code'] ); ?>"/>
	<?php } ?>
	<?php if ( $scroll_wheel == 'no' ) { ?>
		<div class="qodef-google-map-overlay"></div>
	<?php } ?>
</div>