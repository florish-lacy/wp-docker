<?php


///forgot password

function send_email_otp()
{

	//Step 1
	$email = $_POST['forgot_email'];
	$user = get_user_by('email', $email);
	if ($user) {
		$userId = $user->ID;

		$vericationcode = mt_rand(100000, 999999);
		update_user_meta($userId, '_user_otp', $vericationcode);
		if (!(isset($from) && is_email($from))) {
			$sitename = strtolower($_SERVER['SERVER_NAME']);
			if (substr($sitename, 0, 4) == 'www.') {
				$sitename = substr($sitename, 4);
			}
			$from = 'admin@' . $sitename;
		}
		$subject = "Forgot Password";
		$headers .= "MIME-Version: 1.0" . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From:Florish <' . $from . '>' . "\r\n";
		$ms .= "<html></body><div><div>Dear User,</div></br></br>";
		$ms .= "<div style='padding-top:8px;'>OTP for for Account Verification is $vericationcode</div><div></div></body></html>";
		mail($email, $subject, $ms, $headers);
		echo json_encode(array('error' => false, 'message' => 'OTP Successful send your register email address', 'user_id' => $userId));
	} else {
		echo json_encode(array('error' => true, 'message' => 'Your email has not been registered', 'user_id' => ''));
	}

	die();
}


function verify_email_otp()
{

	//Step 2
	$enterotp = $_POST['otp'];
	$user_id = $_POST['user_id'];
	$emailotp = get_user_meta($user_id, '_user_otp', true);
	if ($enterotp == $emailotp) {
		echo json_encode(array('error' => false, 'message' => 'OTP Successful verified', 'user_id' => $user_id));
	} else {
		echo json_encode(array('error' => true, 'message' => 'Enter Your Correct OTP', 'user_id' => $user_id));
	}

	die();
}

function change_user_password()
{

	//Step 3
	$new_password = $_POST['new_password'];
	$user_id = $_POST['user_id'];
	$result = wp_set_password($new_password, $user_id);
	if ($result) {
		echo json_encode(array('error' => false, 'message' => 'Password Successful updates', 'user_id' => $user_id));
	} else {
		echo json_encode(array('error' => true, 'message' => 'Something went to wrong! ', 'user_id' => $user_id));
	}
	//update_user_meta($user_id, 'user_pass', $new_password);
	//wp_update_user( array ('ID' => $user_id, 'user_pass' => $newpassword) ) ;

	die();
}
