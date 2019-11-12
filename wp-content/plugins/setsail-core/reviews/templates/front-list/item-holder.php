<li>
	<div class="<?php echo esc_attr( $comment_class ); ?>">
		<?php if ( ! $is_pingback_comment ) { ?>
			<div class="qodef-comment-image"> <?php echo setsail_select_kses_img( get_avatar( $comment, 'thumbnail' ) ); ?> </div>
		<?php } ?>
		<div class="qodef-comment-text">
			<div class="qodef-comment-heading">
				<h5 class="qodef-comment-name vcard">
					<?php if ( $is_pingback_comment ) {
						esc_html_e( 'Pingback:', 'setsail-core' );
					} ?>
					<?php echo wp_kses_post( get_comment_author_link() ); ?>
				</h5>
			
			</div>
			<?php if ( ! $is_pingback_comment ) { ?>
				<div class="qodef-text-holder" id="comment-<?php echo comment_ID(); ?>">
					<?php comment_text(); ?>
				</div>
			<?php } ?>
			<div class="qodef-review-rating">
				<?php foreach($rating_criteria as $rating) { ?>
					<?php if(!isset($rating['show']) || (isset($rating['show']) && $rating['show'])) { ?>
						<span class="qodef-rating-inner">
                                <?php if ( isset( $rating['label'] ) && ! empty( $rating['label'] ) ) { ?>
	                                <span class="qodef-rating-label">
						                <?php echo esc_html( $rating['label'] ); ?>
						            </span>
                                <?php } ?>
							<span class="qodef-rating-value">
                                    <?php
                                    $review_rating = get_comment_meta( $comment->comment_ID, $rating['key'], true );

                                    for ( $i = 1; $i <= 5; $i ++ ) {
	                                    if ( $i <= $review_rating ) { ?>
		                                    <i class="fa fa-star" aria-hidden="true"></i>
	                                    <?php } else { ?>
		                                    <i class="far fa-star" aria-hidden="true"></i>
	                                    <?php }
                                    } ?>
                                </span>
                            </span>
					<?php } ?>
				<?php } ?>
			</div>
			<h6 class="qodef-comment-date">
				<?php
				comment_time( get_option( 'date_format' ) );
				esc_html_e( ' at ', 'setsail-core' );
				comment_time();
				?>
			</h6>
		</div>
	</div>
	<!-- li is closed by wordpress after comment rendering -->