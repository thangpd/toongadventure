<?php if ( is_array( $post_ratings ) && count( $post_ratings ) ) { ?>
	<?php $average_rating_total = setsail_core_get_total_average_rating( $post_ratings ); ?>
	<span class="qodef-item-reviews-rating-icon">
        <?php echo setsail_core_reviews_get_icon_for_rating( $average_rating_total ); ?>
    </span>
	<div class="qodef-item-reviews-average-rating">
		<?php echo esc_html( setsail_core_reviews_format_rating_output( $average_rating_total ) ); ?>
	</div>
	<span class="qodef-item-reviews-rating-description">
        <?php echo esc_html( setsail_core_reviews_get_description_for_rating( $average_rating_total ) ); ?>
    </span>
<?php }