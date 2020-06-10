<?php

get_header();

setsail_select_get_title();

do_action('setsail_select_action_before_main_content');

setsail_tours_get_single_tour_item();

get_footer();

?>