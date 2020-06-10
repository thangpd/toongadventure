<?php ?>

    <form id="qodef-tour-booking-form" method="POST">
		<?php wp_nonce_field( 'setsail_tours_booking_form', 'setsail_tours_booking_form' ); ?>
        <div class="cf-hanh-trinh">
            <h3 class="qodef-tour-booking-title"><?php esc_html_e( 'ĐĂNG KÝ TOUR', 'setsail-tours' ); ?></h3>

            <div class="qodef-tour-booking-field-holder qodef-tours-input-with-icon">
                <input type="text" placeholder="<?php esc_attr_e( 'Tên *', 'setsail-tours' ); ?>"
                       value="<?php echo esc_attr( setsail_tours_get_current_user_name() ); ?>" name="user_name">
            </div>

            <div class="qodef-tour-booking-field-holder qodef-tours-input-with-icon">
                <input type="text" value="<?php echo esc_attr( setsail_tours_get_current_user_email() ); ?>"
                       placeholder="<?php esc_attr_e( 'Email *', 'setsail-tours' ); ?>" name="user_email">
			</span>
            </div>

            <div class="qodef-tour-booking-field-holder qodef-tours-input-with-icon">
                <input type="text" placeholder="<?php esc_attr_e( 'Số Điện Thoại', 'setsail-tours' ); ?>" name="user_phone">

            </div>

            <div class="qodef-tour-booking-field-holder qodef-tours-input-with-icon">
                <input type="text" class="qodef-tour-period-picker" autocomplete="off"
                       placeholder="<?php echo esc_attr( 'dd-mm-yy *' ); ?>" name="date">


            </div>

            <div id="qodef-tour-booking-time-picker"></div>

            <div class="qodef-tour-booking-field-holder qodef-tours-input-with-icon">
                <input type="number" name="number_of_tickets" min="1"
                       placeholder="<?php esc_attr_e( 'Số Vé *', 'setsail-tours' ); ?>">

			</span>
            </div>

            <input type="hidden" name="tour_id" value="<?php echo esc_attr( get_the_ID() ); ?>">

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



			<?php if ( setsail_tours_theme_installed() ) : ?>
				<?php echo setsail_select_execute_shortcode( 'qodef_button', array(
					'html_type'    => 'input',
					'input_name'   => 'submit',
					'text'         => esc_html__( 'ĐẶT VÉ NGAY', 'setsail-tours' ),
					'custom_attrs' => array(
						'data-loading-label'     => esc_attr__( 'Đang Xử Lý...', 'setsail-tours' ),
						'data-redirecting-label' => esc_attr__( 'Đang Chuyển Hướng...', 'setsail-tours' ),
						'disabled'               => 'disabled'
					)
				) ) ?>
			<?php else : ?>
                <input disabled data-redirecting-label="<?php esc_attr_e( 'Đang Chuyển Hướng...', 'setsail-tours' ) ?>"
                       data-loading-label="<?php esc_attr_e( 'Đang Xử Lý...', 'setsail-tours' ); ?>" type="submit"
                       value="<?php echo esc_attr( 'ĐẶT VÉ NGAY', 'setsail-tours' ); ?>">
			<?php endif; ?>
        </div>
    </form>
