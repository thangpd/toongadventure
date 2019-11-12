<div class="qodef-section-title-holder <?php echo esc_attr( $holder_classes ); ?>" <?php echo setsail_select_get_inline_style( $holder_styles ); ?>>
	<div class="qodef-st-inner">
		<?php if ( ! empty( $tagline ) ) { ?>
			<<?php echo esc_attr( $tagline_tag ); ?> class="qodef-st-tagline" <?php echo setsail_select_get_inline_style( $tagline_styles ); ?>>
				<?php echo wp_kses( $tagline, array( 'br' => true ) ); ?>
			</<?php echo esc_attr( $tagline_tag ); ?>>
		<?php } ?>
		<?php if ( ! empty( $title ) ) { ?>
			<<?php echo esc_attr( $title_tag ); ?> class="qodef-st-title" <?php echo setsail_select_get_inline_style( $title_styles ); ?>>
				<?php echo wp_kses( $title, array( 'br' => true, 'span' => array( 'class' => true ) ) ); ?>
			</<?php echo esc_attr( $title_tag ); ?>>
		<?php } ?>
		<?php if ( ! empty( $text ) ) { ?>
			<<?php echo esc_attr( $text_tag ); ?> class="qodef-st-text" <?php echo setsail_select_get_inline_style( $text_styles ); ?>>
				<?php echo wp_kses( $text, array( 'br' => true ) ); ?>
			</<?php echo esc_attr( $text_tag ); ?>>
		<?php } ?>
	</div>
</div>