<?php if(comments_open()) { ?>
	<div class="qodef-post-info-comments-holder">
		<a itemprop="url" class="qodef-post-info-comments" href="<?php comments_link(); ?>">
			<?php echo setsail_select_icon_collections()->renderIcon( 'lnr-bubble', 'linear_icons', array( 'icon_attributes' => array( 'class' => 'qodef-post-info-comments-icon' ) ) ); ?>
			<?php comments_number('0 ' . esc_html__('Comments','setsail'), '1 '.esc_html__('Comment','setsail'), '% '.esc_html__('Comments','setsail') ); ?>
		</a>
	</div>
<?php } ?>