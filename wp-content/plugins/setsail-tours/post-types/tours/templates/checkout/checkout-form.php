<div class="qodef-grid-row">
	<div class="qodef-grid-col-12">
		<form id="qodef-tour-booking-form" method="post">
			<?php wp_nonce_field('setsail_tours_booking_form', 'setsail_tours_booking_form'); ?>

			<div class="qodef-tour-booking-field-holder">
				<input type="text" placeholder="<?php esc_attr_e('Name *', 'setsail-tours'); ?>" value="<?php echo esc_attr(setsail_tours_get_current_user_name()); ?>" name="user_name">

			<span class="qodef-tour-booking-field-icon">
				<i class="lnr lnr-pencil"></i>
			</span>
			</div>

			<div class="qodef-tour-booking-field-holder">
				<input type="text" value="<?php echo esc_attr(setsail_tours_get_current_user_email()); ?>" placeholder="<?php esc_attr_e('Email *', 'setsail-tours'); ?>" name="user_email">

			<span class="qodef-tour-booking-field-icon">
				<i class="lnr lnr-envelope"></i>
			</span>
			</div>

			<div class="qodef-tour-booking-field-holder">
				<input type="text" placeholder="<?php esc_attr_e('Phone', 'setsail-tours'); ?>" name="user_phone">

			<span class="qodef-tour-booking-field-icon">
				<i class="lnr lnr-phone-handset"></i>
			</span>
			</div>

			<div class="qodef-tour-booking-field-holder">
				<input type="text" class="qodef-tour-period-picker" placeholder="<?php echo esc_attr('MM dd, yy *'); ?>" name="date">

			<span class="qodef-tour-booking-field-icon">
				<i class="lnr lnr-calendar-full"></i>
			</span>
			</div>

			<div id="qodef-tour-booking-time-picker"></div>

			<div class="qodef-tour-booking-field-holder">
				<input type="number" name="number_of_tickets" placeholder="<?php esc_attr_e('Number of tickets *', 'setsail-tours'); ?>">

			<span class="qodef-tour-booking-field-icon">
				<i class="lnr lnr-user"></i>
			</span>
			</div>

			<div class="qodef-tour-booking-field-holder">
				<textarea name="message" placeholder="<?php esc_attr_e('Message', 'setsail-tours'); ?>"></textarea>
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
				<div class="qodef-tour-booking-field-holder">
					<select name="time">
						<% _.each(times, function(time) { %>
						<option value="<%= time.time %>"><%= time.time %></option>
						<% }) %>
					</select>

					<span class="qodef-tour-booking-field-icon">
						<i class="lnr lnr-clock"></i>
					</span>
				</div>
				<% } %>
			</script>

			<?php if(setsail_tours_theme_installed()) : ?>
				<?php echo setsail_select_execute_shortcode('qodef_button', array(
					'html_type' => 'input',
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
</div>