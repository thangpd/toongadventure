<?php

if($display_category === 'yes') {
	$product            = setsail_select_return_woocommerce_global_variable();
	$product_categories = wc_get_product_category_list( $product->get_id(), ', ' );
	
	if (!empty($product_categories)) { ?>
		<p class="qodef-<?php echo esc_attr($class_name); ?>-category"><?php echo wp_kses_post($product_categories); ?></p>
	<?php } ?>
<?php } ?>