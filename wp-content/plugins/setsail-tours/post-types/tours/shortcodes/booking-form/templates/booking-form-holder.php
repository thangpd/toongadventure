<div class="widget qodef-tours-booking-form-holder">
	<?php if ( setsail_tours_is_tour_bookable() ) : ?>
		<?php echo setsail_tours_get_tour_module_template_part( 'single/booking-form-temp', 'tours', 'templates', '', $params ); ?>
	<?php else: ?>
		<?php echo setsail_tours_get_tour_module_template_part( 'single/booking-form-temp', 'tours', 'templates', '', $params ); ?>

	<?php endif; ?>
</div>