<<?php echo esc_attr( $title_tag ); ?> class="qodef-custom-font-holder <?php echo esc_attr( $holder_classes ); ?>" <?php setsail_select_inline_style( $holder_styles ); ?> <?php echo setsail_select_get_inline_attrs( $holder_data ); ?>>
	<?php echo wp_kses_post( $title ); ?>
</<?php echo esc_attr( $title_tag ); ?>>