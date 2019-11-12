<?php  ?>

<div class="qodef-tour-booking-form-holder qodef-boxed-widget">
	<h4 class="qodef-tour-booking-title"><?php esc_html_e('Book This Tour', 'setsail-tours'); ?></h4>
	<span class="qodef-tour-booking-description"><?php esc_html_e('Arrange your trip in advance - book this tour now!', 'setsail-tours'); ?></span>
	<form id="qodef-tour-booking-form" method="POST">
		<?php wp_nonce_field('setsail_tours_booking_form', 'setsail_tours_booking_form'); ?>

		<div class="qodef-tour-booking-field-holder qodef-tours-input-with-icon">
			<input type="text" placeholder="<?php esc_attr_e('Name *', 'setsail-tours'); ?>" value="<?php echo esc_attr(setsail_tours_get_current_user_name()); ?>" name="user_name">

			<span class="qodef-tours-input-icon">
				<i class="icon_profile"></i>
			</span>
		</div>

		<div class="qodef-tour-booking-field-holder qodef-tours-input-with-icon">
			<input type="text" value="<?php echo esc_attr(setsail_tours_get_current_user_email()); ?>" placeholder="<?php esc_attr_e('Email *', 'setsail-tours'); ?>" name="user_email">

			<span class="qodef-tours-input-icon">
				<i class="icon_mail_alt"></i>
			</span>
		</div>

		<div class="qodef-tour-booking-field-holder qodef-tours-input-with-icon">
			<input type="text" autocomplete="off"  value="" placeholder="<?php esc_attr_e('Confirm Email *', 'setsail-tours'); ?>" name="user_confirm_email">

			<span class="qodef-tours-input-icon">
				<i class="icon_mail_alt"></i>
			</span>
		</div>

		<div class="qodef-tour-booking-field-holder qodef-tours-input-with-icon">
			<input type="text" placeholder="<?php esc_attr_e('Phone', 'setsail-tours'); ?>" name="user_phone">

			<span class="qodef-tours-input-icon">
				<i class="icon_phone"></i>
			</span>
		</div>

		<div class="qodef-tour-booking-field-holder qodef-tours-input-with-icon">
			<input type="text" class="qodef-tour-period-picker" placeholder="<?php echo esc_attr('dd-mm-yy *'); ?>" name="date">

			<span class="qodef-tours-input-icon">
				<i class="icon_calendar"></i>
			</span>
		</div>

		<div id="qodef-tour-booking-time-picker"></div>

		<div class="qodef-tour-booking-field-holder qodef-tours-input-with-icon">
			<input type="number" name="number_of_tickets" min="1" placeholder="<?php esc_attr_e('Number of tickets *', 'setsail-tours'); ?>">

			<span class="qodef-tours-input-icon">
				<i class="icon_tags_alt"></i>
			</span>
		</div>

		<div class="qodef-tour-booking-field-holder qodef-tours-input-with-icon">
			<textarea name="message" placeholder="<?php esc_attr_e('Message', 'setsail-tours'); ?>"></textarea>
			<span class="qodef-tours-input-icon message-icon">
				<i class="icon_chat"></i>
			</span>
		</div>

		<input type="hidden" name="tour_id" value="<?php echo esc_attr(get_the_ID()); ?>">

		<div id="booking-validation-messages-holder"></div>

		<script type="text/html" id="booking-validation-messages">
			<% if(typeof messages !== 'undefined' && messages.length) { %>
				<ul class="qodef-tour-booking-validation-list qodef-tour-message-<%= type %>">
					<% _.each(messages, function(message) { %>
						<li><%= message %></li>
					<% }) %>
				</ul>
			<% } %>
		</script>

		<script type="text/html" id="booking-time-template">
			<% if(typeof times !== 'undefined' && times.length) { %>
				<div class="qodef-tour-booking-field-holder qodef-tours-input-with-icon">
					<select name="time">
						<% _.each(times, function(time) { %>
							<option value="<%= time.time %>"><%= time.time %></option>
						<% }) %>
					</select>

					<span class="qodef-tours-input-icon">
						<i class="lnr lnr-clock"></i>
					</span>
				</div>
			<% } %>
		</script>

		<?php if(setsail_tours_theme_installed()) : ?>
			<?php echo setsail_select_execute_shortcode('qodef_button', array(
				'text' => esc_html__('Check Availability', 'setsail-tours'),
				'type' => 'grey',
				'custom_attrs' => array(
					'data-loading-label' => esc_attr__('Checking...', 'setsail-tours')
				),
				'custom_class' => 'qodef-tours-check-availability'
			)); ?>
		<?php else: ?>
			<a href="#" class="qodef-tours-check-availability"><?php esc_html_e('Check Availability', 'setsail-tours'); ?></a>
		<?php endif; ?>

		<?php if(setsail_tours_theme_installed()) : ?>
			<?php echo setsail_select_execute_shortcode('qodef_button', array(
				'html_type' => 'input',
				'input_name' => 'submit',
				'text' => esc_html__('Book now', 'setsail-tours'),
				'custom_attrs' => array(
					'data-loading-label' => esc_attr__('Working...', 'setsail-tours'),
					'data-redirecting-label' => esc_attr__('Redirecting...', 'setsail-tours'),
					'disabled' => 'disabled'
				)
			)) ?>
		<?php else : ?>
			<input disabled data-redirecting-label="<?php esc_attr_e('Redirecting...', 'setsail-tours') ?>" data-loading-label="<?php esc_attr_e('Working...', 'setsail-tours'); ?>" type="submit" value="<?php echo esc_attr('Book now', 'setsail-tours'); ?>">
		<?php endif; ?>
	</form>
</div>
