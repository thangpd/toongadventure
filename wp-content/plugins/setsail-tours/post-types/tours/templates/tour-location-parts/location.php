<?php
$location_excerpt              = get_post_meta(get_the_ID(), 'tour_location_excerpt', true);
$location_content              = get_post_meta(get_the_ID(), 'tour_location_content', true);
$custom_snazzy_code =
$custom_snazzy_code = '[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#5d7e9e"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#fefefe"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"weight":"0.92"},{"saturation":"-23"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#c9e2f8"},{"visibility":"on"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45},{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"visibility":"simplified"},{"color":"#f37949"}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"color":"#4e4e4e"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#f4f4f4"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#787878"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#eaf6f8"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#eaf6f8"}]}]';

$google_map_params             = array(
	'snazzy_map_style' => 'yes',
	'location_map' => 'yes',
	'snazzy_map_code' => esc_attr( $custom_snazzy_code )
);
$google_map_params['address1'] = get_post_meta(get_the_ID(), 'tour_location_address1', true);
$google_map_params['address2'] = get_post_meta(get_the_ID(), 'tour_location_address2', true);
$google_map_params['address3'] = get_post_meta(get_the_ID(), 'tour_location_address3', true);
$google_map_params['address4'] = get_post_meta(get_the_ID(), 'tour_location_address4', true);
$google_map_params['address5'] = get_post_meta(get_the_ID(), 'tour_location_address5', true);
?>

<div class="qodef-location-part">

    <h3 class="qodef-tour-location">
        <?php esc_html_e('Tour Location', 'setsail-tours'); ?>
    </h3>

    <p class="qodef-location-excerpt">
        <?php echo esc_html($location_excerpt) ?>
    </p>

    <div class="qodef-location-addresses">
        <?php
        if(count($google_map_params)) {
            echo setsail_select_execute_shortcode('qodef_google_map', $google_map_params);
        }
        ?>
    </div>

    <div class="qodef-location-content">
        <?php echo do_shortcode($location_content); ?>
    </div>

</div>