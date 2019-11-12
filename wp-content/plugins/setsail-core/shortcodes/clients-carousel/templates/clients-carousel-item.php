<div class="qodef-cc-item qodef-item-space <?php echo esc_attr( $holder_classes ); ?>">
	<?php if(!empty($link)) { ?>
		<a itemprop="url" class="qodef-cc-link qodef-block-drag-link" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>">
	<?php } ?>
		<?php if(!empty($image)) { ?>
			<img itemprop="image" class="qodef-cc-image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
		<?php } ?>
		<?php if(!empty($hover_image)) { ?>
			<img itemprop="image" class="qodef-cc-hover-image" src="<?php echo esc_url($hover_image['url']); ?>" alt="<?php echo esc_attr($hover_image['alt']); ?>" />
		<?php } ?>
		<?php if ( ! empty( $info_title ) || ! empty( $info_text ) ) { ?>
			<div class="qodef-cc-info">
				<h6 class="qodef-cc-info-title"><?php echo esc_html( $info_title ); ?></h6>
				<p class="qodef-cc-info-text"><?php echo esc_html( $info_text ); ?></p>
			</div>
		<?php } ?>
	<?php if(!empty($link)) { ?>
		</a>
	<?php } ?>
</div>