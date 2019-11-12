<?php if ( ! setsail_select_post_has_read_more() && ! post_password_required() ) { ?>
	<div class="qodef-post-read-more-button">
		<?php
			$button_params = array(
				'type'         => 'simple',
				'link'         => get_the_permalink(),
				'text'         => esc_html__( 'Read More', 'setsail' ),
				'custom_class' => 'qodef-blog-list-button'
			);
			
			echo setsail_select_return_button_html( $button_params );
		?>
	</div>
<?php } ?>