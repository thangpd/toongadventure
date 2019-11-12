<div class="qodef-fss-item <?php echo esc_attr($holder_classes); ?>" <?php echo setsail_select_get_inline_attrs($holder_data); ?> <?php setsail_select_inline_style($holder_styles); ?>>
	<div class="qodef-fss-item-inner" <?php setsail_select_inline_style($item_inner_styles); ?>>
		<?php echo do_shortcode($content); ?>
	</div>
	<?php if(!empty($link)) { ?>
		<a itemprop="url" class="qodef-fss-item-link" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($link_target); ?>"></a>
	<?php } ?>
</div>