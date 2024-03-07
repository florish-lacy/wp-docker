<?php

function email_activation_msg_nocache()
{
	$code = filter_input(INPUT_GET, 'keys');
	if ($code) {

		$act_users = get_users(
			array(
				"meta_key" => "code_to_be_activated",
				"meta_value" => $code,
				"fields" => "ID"
			)
		);

		$user_id = $act_users[0];

		if ($user_id) {
			$status = get_user_meta($user_id, '_member_status', true);
			$code = get_user_meta($user_id, 'code_to_be_activated', true);
			if ($code && $status == 'inactive') {
				update_user_meta($user_id, '_member_status', 'active');
				delete_user_meta($user_id, 'code_to_be_activated');
			}
			echo '<div class="alert alert-success" role="alert">Your account is now activated.</div>';

		} else {
			echo '<div class="alert alert-danger" role="alert">Invalid activation code / your account has been activated.</div>';
		}
	}
}
