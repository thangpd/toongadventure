<?php if($booking) : ?>

	<div class="qodef-tours-checkout-content">
		<?php if($is_payment && $is_payment_sucessfull) : ?>
			<div class="qodef-tours-success-payment-content">
				<p><?php esc_html_e('You have succcessfully completed payment process. Enjoy your tour!','setsail-tours'); ?></p>

				<div class="qodef-tours-success-payment-button-holder">
					<?php if(setsail_tours_theme_installed()) : ?>
						<?php echo setsail_select_get_button_html(array(
							'link' => home_url('/'),
							'text' => esc_html__('Return to home', 'setsail-tours')
						)); ?>
					<?php else: ?>
						<a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Pay with paypal', 'setsail-tours') ?></a>
					<?php endif; ?>
				</div>

			</div>
		<?php else : ?>
			<div class="qodef-tours-checkout-content-inner">
				<div class="qodef-tours-image-holder">
					<?php echo get_the_post_thumbnail($booking->ID,'setsail_select_image_square'); ?>
				</div>
				<div class="qodef-tours-info-holder">
					<h3 class="qodef-tours-info-title"><?php echo get_the_title($booking->ID); ?></h3>

					<h6 class="qodef-tours-info-message">
						<?php esc_html_e('You have successfully booked ','setsail-tours');
						echo setsail_select_get_module_part($booking->amount); esc_html_e(' ticket(s) for ','setsail-tours'); echo get_the_title($booking->ID); ?>
					</h6>
					<div class="qodef-tci-item qodef-tours-info-description">
						<span class="qodef-tours-info-checkout-title"><?php esc_html_e('Tour Description:','setsail-tours');?></span>
						<span class="qodef-tours-info-checkout-content qodef-tours-booking-description"><?php echo get_the_excerpt($booking->ID); ?></span>
					</div>
					<div class="qodef-tci-item">
						<span class="qodef-tours-info-checkout-title"><?php esc_html_e('Departure Date:', 'setsail-tours'); ?></span>
						<span class="qodef-tours-info-checkout-content qodef-tours-booking-date"><?php echo esc_html(date(get_option('date_format'), strtotime($booking->booking_date))); ?></span>
					</div>
					<div class="qodef-tci-item">
						<span class="qodef-tours-info-checkout-title"><?php esc_html_e('Total Price:', 'setsail-tours'); ?></span>
						<span class="qodef-tours-info-checkout-content qodef-tours-booking-price"><?php echo esc_html($booking->price); ?></span>
					</div>
					<?php if(setsail_tours_paypal_enabled()) : ?>

						<?php

						$facilitator = setsail_tours_get_paypal_facilitator_id();
						$currency    = setsail_tours_get_paypal_currency();
						//Data for later use after completing payment
						$form_custom_data = array(
							'booking_hash' => $booking->unique_hash,
							'tour_id'      => $booking->ID
						);

						$form_data_string = json_encode($form_custom_data);
						?>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="first_name" value="<?php echo esc_attr($booking->user_name); ?>">
							<input type="hidden" name="email" value="<?php echo esc_attr($booking->user_email); ?>">
							<input type="hidden" name="quantity" value="1">
							<input type="hidden" name="item_name" value="<?php echo esc_attr(get_the_title($booking->ID)); ?>">
							<input type="hidden" name="amount" value="<?php echo esc_attr($booking->raw_price); ?>">
							<input type="hidden" name="cmd" value="_xclick">
							<input type="hidden" name="charset" value="<?php bloginfo('charset'); ?>">
							<?php if($facilitator) { ?>
								<input type="hidden" name="business" value="<?php echo esc_attr($facilitator); ?>">
							<?php } ?>
							<input type="hidden" name="currency_code" value="<?php echo esc_attr($currency); ?>">
							<input type="hidden" name="custom" value="<?php echo esc_attr($form_data_string); ?>">
							<input type="hidden" name="notify_url" value="<?php echo plugins_url().'/qodef-tours/payment/paypal/ipn_listener.php'; ?>"/>
							<input type="hidden" name="return" value="<?php echo esc_url(add_query_arg(array('returned_from_payment' => 'true'), $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"])); ?>">

							<?php if(setsail_tours_theme_installed()) : ?>
								<?php echo setsail_select_get_button_html(array(
									'html_type' => 'button',
									'text'      => esc_html__('Pay with paypal', 'setsail-tours')
								)); ?>
							<?php else: ?>
								<button><?php esc_html_e('Pay with paypal', 'setsail-tours') ?></button>
							<?php endif; ?>
						</form>
					</div>
				</div>

			<?php endif; ?>

		<?php endif; ?>
	</div>
<?php endif; ?>