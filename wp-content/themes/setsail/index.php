<?php
$qodef_blog_type = setsail_select_get_archive_blog_list_layout();
setsail_select_include_blog_helper_functions( 'lists', $qodef_blog_type );
$qodef_holder_params = setsail_select_get_holder_params_blog();

get_header();
setsail_select_get_title();
do_action('setsail_select_action_before_main_content');
?>

<div class="<?php echo esc_attr( $qodef_holder_params['holder'] ); ?>">
	<?php do_action( 'setsail_select_action_after_container_open' ); ?>
	
	<div class="<?php echo esc_attr( $qodef_holder_params['inner'] ); ?>">
		<?php setsail_select_get_blog( $qodef_blog_type ); ?>
	</div>
	
	<?php do_action( 'setsail_select_action_before_container_close' ); ?>
</div>

<?php do_action( 'setsail_select_action_blog_list_additional_tags' ); ?>
<?php get_footer(); ?>