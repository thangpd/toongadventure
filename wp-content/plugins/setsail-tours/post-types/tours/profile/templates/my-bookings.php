<div class="qodef-tours-my-bookings-holder">
	<h3 class="qodef-mb-title"><?php esc_html_e( 'My Bookings', 'setsail-membership' ); ?></h3>
	<?php if(is_array($user_bookings) && count($user_bookings)) : ?>
		<ul class="qodef-tours-my-bookings-list">
			<?php foreach($user_bookings as $user_booking) : ?>
				<li class="qodef-tours-my-booking-item">
					<div class="qodef-tours-booking-item-image-holder">
						<a target="_blank" href="<?php echo esc_url(get_the_permalink($user_booking->ID)); ?>">
							<?php echo get_the_post_thumbnail($user_booking->ID); ?>
						</a>
					</div>
					<div class="qodef-tours-info-items">
						<div class="qodef-tours-booking-info-item">
							<span class="qodef-tours-booking-info-title"><?php esc_html_e('Name:', 'setsail-tours'); ?></span>
							<span class="qodef-tb-content"><?php echo esc_html(get_the_title($user_booking->ID)); ?></span>
						</div>

						<div class="qodef-tours-booking-info-item">
							<span class="qodef-tours-booking-info-title"><?php esc_html_e('Booking ID:', 'setsail-tours'); ?></span>
							<span class="qodef-tb-content"><?php echo esc_html($user_booking->id); ?></span>
						</div>


						<div class="qodef-tours-booking-info-item">
							<span class="qodef-tours-booking-info-title"><?php esc_html_e('Departure Date:', 'setsail-tours'); ?></span>
							<span class="qodef-tb-content"><?php echo esc_html(date(get_option('date_format'), strtotime($user_booking->booking_date))); ?></span>
						</div>

						<?php if(!empty($user_booking->booking_time)) : ?>
							<div class="qodef-tours-booking-info-item">
								<span class="qodef-tours-booking-info-title"><?php esc_html_e('Departure Time:', 'setsail-tours'); ?></span>
								<span class="qodef-tb-content"><?php echo esc_html($user_booking->booking_time); ?></span>
							</div>
						<?php endif; ?>

						<?php if(!empty($user_booking->amount)) : ?>
							<div class="qodef-tours-booking-info-item">
								<span class="qodef-tours-booking-info-title"><?php esc_html_e('Number of Tickets:', 'setsail-tours'); ?></span>
								<span class="qodef-tb-content"><?php echo esc_html($user_booking->amount); ?></span>
							</div>
						<?php endif; ?>

						<?php if(!empty($user_booking->payment_status)) : ?>
							<div class="qodef-tours-booking-info-item">
								<span class="qodef-tours-booking-info-title"><?php esc_html_e('Payment Status:', 'setsail-tours'); ?></span>
								<span class="qodef-tb-content"><?php echo esc_html($user_booking->payment_status); ?></span>
							</div>
						<?php endif; ?>

						<div class="qodef-tours-booking-info-item qodef-membership-desc">
							<span class="qodef-tours-booking-info-title"><?php esc_html_e('Description:', 'setsail-tours'); ?></span>
							<span class="qodef-tb-content"><?php echo get_the_excerpt($user_booking->ID); ?></span>
						</div>

						<div class="qodef-tours-booking-info-item">
							<span class="qodef-tours-booking-info-title"><?php esc_html_e('Total Price:', 'setsail-tours'); ?></span>
							<span class="qodef-tb-content qodef-tours-booking-price"><?php echo esc_html($user_booking->price); ?></span>
						</div>

                        <?php
                        if(!isset($user_booking->payment_status) && $user_booking->status == 'pending') {
                            $facilitator = setsail_tours_get_paypal_facilitator_id();
                            $currency    = setsail_tours_get_paypal_currency();
                            //Data for later use after completing payment
                            $form_custom_data = array(
                                'booking_hash' => $user_booking->unique_hash,
                                'tour_id'      => $user_booking->ID
                            );

                            $form_data_string = json_encode($form_custom_data);
                            ?>
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                                <input type="hidden" name="first_name" value="<?php echo esc_attr($user_booking->user_name); ?>">
                                <input type="hidden" name="email" value="<?php echo esc_attr($user_booking->user_email); ?>">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="item_name" value="<?php echo esc_attr(get_the_title($user_booking->ID)); ?>">
                                <input type="hidden" name="amount" value="<?php echo esc_attr($user_booking->raw_price); ?>">
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
                        <?php } ?>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php else: ?>
		<p><?php esc_html_e("You still don't have any bookings.", 'setsail-tours'); ?></p>
	<?php endif; ?>
</div>

