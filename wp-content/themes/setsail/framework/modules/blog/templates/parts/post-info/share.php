<?php
$share_type = isset( $share_type ) ? $share_type : 'list';
?>
<?php if ( setsail_select_core_plugin_installed() && setsail_select_options()->getOptionValue( 'enable_social_share' ) === 'yes' && setsail_select_options()->getOptionValue( 'enable_social_share_on_post' ) === 'yes' ) { ?>
	<div class="qodef-blog-share">
		<?php echo setsail_select_get_social_share_html( array( 'type' => $share_type ) ); ?>
	</div>
<?php } ?>