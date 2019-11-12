<?php

require_once 'meta-boxes/tour-booking/tour-time-storage.php';

//load admin
if ( ! function_exists( 'setsail_tours_load_admin' ) ) {
	function setsail_tours_load_admin() {
		require_once 'meta-boxes/tour-booking/booking-meta-box.php';
	}
	
	add_action( 'setsail_select_action_before_options_map', 'setsail_tours_load_admin' );
}

require_once 'functions.php';
require_once 'booking-dashboard/booking-table.php';
require_once 'booking-dashboard/booking-dashboard.php';