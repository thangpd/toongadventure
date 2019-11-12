<?php if(is_array($tour_types) && count($tour_types)) : ?>
	<div class="qodef-tours-type-filters">
		<h5><?php esc_html_e('Tour Type', 'setsail-tours'); ?></h5>

		<div class="qodef-tours-type-filters-inputs">
			<?php foreach($tour_types as $type) : ?>
				<?php
				$checked = in_array($type->slug, $checked_types);
				$checked_attr = $checked ? 'checked' : '';
				?>

				<div class="qodef-tours-type-filter-item">
					<input <?php echo esc_attr($checked_attr); ?> type="checkbox" id="qodef-tour-type-filter-<?php echo esc_attr($type->slug); ?>" name="type[]" value="<?php echo esc_attr($type->slug); ?>">
					<label for="qodef-tour-type-filter-<?php echo esc_attr($type->slug); ?>">
						<span>
							<?php echo esc_html($type->name); ?>
						</span>
					</label>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>
