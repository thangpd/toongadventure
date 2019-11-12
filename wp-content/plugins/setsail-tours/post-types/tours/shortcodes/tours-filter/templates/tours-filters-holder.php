<div <?php setsail_tours_class_attribute($filter_class); ?>>
	<?php if($filter_type === 'vertical') : ?>
		<?php echo setsail_tours_get_search_main_filters_html($show_tour_types, $number_of_tour_types); ?>
	<?php else: ?>
		<?php
			$tour_types = get_terms(array(
				'taxonomy' => 'tour-category'
			));
		?>

		<?php if($display_container_inner) : ?>
			<div class="qodef-grid">
		<?php endif; ?>
		
		<div class="qodef-tours-search-filters-holder">
			
			<?php if($filter_type === 'vertical-small') { ?>
				<?php if($title !== '' || $subtitle !== '') { ?>
				<div class="qodef-title-and-description-holder">
					<<?php echo esc_attr($title_tag); ?> class="qodef-tsf-title"> <?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
					<span class="qodef-tsf-subtitle"> <?php echo esc_attr($subtitle); ?></span>
				</div>
			<?php }
			}?>
			<form action="<?php echo esc_url(setsail_tours_get_search_page_url()); ?>" method="GET">
				<div class="qodef-tours-filters-fields-holder">
					<div class="qodef-tours-filter-field-holder qodef-tours-filter-col">
						<div class="qodef-tours-input-with-icon">
							<span class="qodef-tours-input-icon">
								<span class="icon_compass"></span>
							</span>
							<input type="text" value="" class="qodef-tours-destination-search" name="destination" placeholder="<?php esc_attr_e('Where to?', 'setsail-tours'); ?>">
						</div>
					</div>
					
					<div class="qodef-tours-filter-field-holder qodef-tours-filter-col">
						<div class="qodef-tours-input-with-icon">
							<span class="qodef-tours-input-icon">
								<span class="icon_calendar"></span>
							</span>
							<select class="qodef-tours-select-placeholder" name="month">
								<option value=""><?php esc_html_e('Month', 'setsail-tours'); ?></option>
								<option value="1"><?php esc_html_e('January', 'setsail-tours'); ?></option>
								<option value="2"><?php esc_html_e('February', 'setsail-tours'); ?></option>
								<option value="3"><?php esc_html_e('March', 'setsail-tours'); ?></option>
								<option value="4"><?php esc_html_e('April', 'setsail-tours'); ?></option>
								<option value="5"><?php esc_html_e('May', 'setsail-tours'); ?></option>
								<option value="6"><?php esc_html_e('June', 'setsail-tours'); ?></option>
								<option value="7"><?php esc_html_e('July', 'setsail-tours'); ?></option>
								<option value="8"><?php esc_html_e('August', 'setsail-tours'); ?></option>
								<option value="9"><?php esc_html_e('September', 'setsail-tours'); ?></option>
								<option value="10"><?php esc_html_e('October', 'setsail-tours'); ?></option>
								<option value="11"><?php esc_html_e('November', 'setsail-tours'); ?></option>
								<option value="12"><?php esc_html_e('December', 'setsail-tours'); ?></option>
							</select>
						</div>
					</div>
					
					<div class="qodef-tours-filter-field-holder qodef-tours-filter-col">
						<div class="qodef-tours-input-with-icon">
							<span class="qodef-tours-input-icon">
								<span class="icon_pushpin"></span>
							</span>
							<select class="qodef-tours-select-placeholder" name="type[]">
								<option value=""><?php esc_html_e('Travel Type','setsail-tours'); ?></option>
								<?php if(is_array($tour_types) && count($tour_types)) : ?>
									<?php foreach($tour_types as $tour_type) : ?>
										<option value="<?php echo esc_attr($tour_type->slug); ?>"><?php echo esc_html($tour_type->name); ?></option>
									<?php endforeach; ?>
								<?php endif; ?>
							</select>
						</div>
					</div>

					<div class="qodef-tours-filter-field-holder qodef-tours-filter-submit-field-holder qodef-tours-filter-col">
						<?php if(setsail_tours_theme_installed()) : ?>
							<?php echo setsail_tours_execute_shortcode('qodef_button', array(
								'html_type'  => 'input',
								'input_name' => 'setsail_tours_search_submit',
								'text'       => esc_attr__('FIND NOW', 'setsail-tours'),
								'custom_attrs' => array(
									'data-searching-label' => esc_attr__('Searching...', 'setsail-tours')
								)
							)); ?>
						<?php else: ?>
							<input type="submit" data-searching-label="<?php esc_attr_e('Searching...', 'setsail-tours'); ?>" name="setsail_tours_search_submit" value="<?php esc_attr_e('FIND NOW', 'setsail-tours') ?>">
						<?php endif; ?>
					</div>
					
					<?php if(setsail_tours_is_wpml_installed()) { ?>
						<?php
							$lang = ICL_LANGUAGE_CODE;
						?>
						<input type="hidden" name="lang" value="<?php echo esc_attr($lang); ?>">
					<?php } ?>
				</div>
			</form>
		</div>

		<?php if($display_container_inner) : ?>
			</div>
		<?php endif; ?>

	<?php endif; ?>
</div>