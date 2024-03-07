<?php
// USER LOGIN
function user_ajax_login()
{

	check_ajax_referer('ajax-login-nonce', 'security');

	$user_login = $_POST['email'];
	$password = $_POST['password'];

	$info = array();
	$info['user_login'] = $user_login;
	$info['user_password'] = $password;
	//$user = get_user_by( 'login', $info['user_login'] );
	$user_signon = wp_signon($info, false);
	if (is_wp_error($user_signon)) {
		$error = $user_signon->get_error_codes();

		if ($error[0] == 'Please verify your mail ID') {
			echo json_encode(array('error' => true, 'message' => 'Your Account is inactive. Contact Your Site Administrator.'));
		} else {
			echo json_encode(array('error' => true, 'message' => __($error[0], 'default')));
		}
		//print_r($error);

	} else {
		wp_set_current_user($user_signon->ID);
		echo json_encode(array('error' => false, 'message' => ' Successful, redirecting...', 'role' => $user_signon->roles));
	}

	die();
}
