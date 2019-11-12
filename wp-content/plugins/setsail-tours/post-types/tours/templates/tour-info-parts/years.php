<?php if(setsail_tours_get_tour_duration()) : ?>
	<div class="qodef-tours-single-info-item">
		<?php echo setsail_tours_get_tour_duration_html(); ?>
	</div>
<?php endif; ?>

<?php if(setsail_tours_get_tour_min_age()) : ?>
	<div class="qodef-tours-single-info-item">
		<?php echo setsail_tours_get_tour_min_age_html(get_the_ID(), true); ?>
	</div>
<?php endif; ?>
