<?php 

if ( !function_exists('setsail_membership_dashboard_edit_profile_fields') ) {
	function setsail_membership_dashboard_edit_profile_fields($params){

		extract($params);

		$edit_profile = setsail_select_add_dashboard_fields(array(
			'name' => 'edit_profile',
		));

		$edit_profile_form = setsail_select_add_dashboard_form(array(
			'name' => 'edit_profile_form',
			'form_id'   => 'qodef-membership-update-profile-form',
			'form_action' => 'setsail_membership_update_user_profile',
			'parent' => $edit_profile,
			'button_label' => esc_html__('UPDATE PROFILE','setsail-membership'),
			'button_args' => array(
				'data-updating-text' => esc_html__('UPDATING PROFILE', 'setsail-membership'),
				'data-updated-text' => esc_html__('PROFILE UPDATED', 'setsail-membership'),
			)
		));

		setsail_select_add_dashboard_field(array(
			'type' => 'text',
			'name' => 'first_name',
			'label' => esc_html__('First Name','setsail-membership'),
			'parent' => $edit_profile_form,
			'value' => $first_name
		));
		
		setsail_select_add_dashboard_field(array(
			'type' => 'text',
			'name' => 'last_name',
			'label' => esc_html__('Last Name','setsail-membership'),
			'parent' => $edit_profile_form,
			'value' => $last_name
		));

		setsail_select_add_dashboard_field(array(
			'type' => 'text',
			'name' => 'email',
			'label' => esc_html__('Email','setsail-membership'),
			'parent' => $edit_profile_form,
			'value' => $email,
			'args' => array(
				'input_type' => 'email'
			)
		));

		setsail_select_add_dashboard_field(array(
			'type' => 'text',
			'name' => 'url',
			'label' => esc_html__('Website','setsail-membership'),
			'parent' => $edit_profile_form,
			'value' => $website
		));

		setsail_select_add_dashboard_field(array(
			'type' => 'text',
			'name' => 'description',
			'label' => esc_html__('Description','setsail-membership'),
			'parent' => $edit_profile_form,
			'value' => $description
		));

		setsail_select_add_dashboard_field(array(
			'type' => 'text',
			'name' => 'password',
			'label' => esc_html__('Password','setsail-membership'),
			'parent' => $edit_profile_form,
			'args' => array(
				'input_type' => 'password'
			)
		));

		setsail_select_add_dashboard_field(array(
			'type' => 'text',
			'name' => 'password2',
			'label' => esc_html__('Repeat Password','setsail-membership'),
			'parent' => $edit_profile_form,
			'args' => array(
				'input_type' => 'password'
			)
		));

		do_action('setsail_membership_action_additional_edit_profile_fields', $edit_profile_form);

		$edit_profile->render();
	}
}
?>

<div class="qodef-membership-dashboard-page">
	<h3 class="qodef-ep-title"><?php esc_html_e( 'Edit Profile', 'setsail-membership' ); ?></h3>
	<div>
		<?php setsail_membership_dashboard_edit_profile_fields($params); ?>
		<?php do_action( 'setsail_membership_action_login_ajax_response' ); ?>
	</div>
</div>