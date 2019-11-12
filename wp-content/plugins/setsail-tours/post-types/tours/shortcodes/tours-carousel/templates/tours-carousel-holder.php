<div class="qodef-tours-carousel-holder qodef-carousel-pagination">
	<div <?php setsail_tours_class_attribute($list_classes);?>>
	    <?php if($query->have_posts()) : ?>
	        <div class="qodef-tours-carousel qodef-tours-row-inner-holder qodef-owl-slider" <?php echo setsail_tours_get_inline_attrs($carousel_data); ?>>

	            <?php while($query->have_posts()) : ?>
	                <?php $query->the_post(); ?>
                    <?php $caller->getItemTemplate($tour_type, $params); ?>
	            <?php endwhile; ?>

	        </div>
	    <?php else: ?>
	        <p><?php esc_html_e('No tours match your criteria', 'setsail-tours'); ?></p>
	    <?php endif; ?>
	    <?php wp_reset_postdata(); ?>
	</div>
</div>