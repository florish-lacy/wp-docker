<?php
// USER REGISTRATION
function user_ajax_register()
{

	// First check the nonce, if it fails the function will break
	//check_ajax_referer( 'ajax-register-nonce', 'security' );

	//Step 1
	$user_role = $_POST['user_role'];
	$first_name = $_POST['first_name'];

	$last_name = $_POST['last_name'];

	$email = $_POST['email'];
	$phone_number = $_POST['mobile'];

	$password = $_POST['password'];
	$user_location = $_POST['user_location'];
	$user_location_lat = $_POST['user_location_lat'];
	$user_location_long = $_POST['user_location_long'];

	// Nonce is checked, get the POST data and sign user on
	$info = array();
	$info['user_nicename'] = $info['nickname'] = $info['display_name'] = $info['first_name'] = sanitize_user($first_name);
	$info['last_name'] = sanitize_user($last_name);
	$info['user_login'] = sanitize_user($email);
	$info['user_pass'] = sanitize_text_field($password);
	$info['user_email'] = sanitize_email($email);
	$info['role'] = $user_role;

	// Register the user
	$user_register = wp_insert_user($info);
	if (is_wp_error($user_register)) {
		$error = $user_register->get_error_codes();

		if (in_array('empty_user_login', $error)) {

			echo json_encode(array('error' => true, 'message' => __($user_register->get_error_message('empty_user_login'))));

		} elseif (in_array('existing_user_login', $error)) {

			echo json_encode(array('error' => true, 'message' => __('This email is already registered.')));

		} elseif (in_array('existing_user_email', $error)) {

			echo json_encode(array('error' => true, 'message' => __('This email address is already registered.')));
		}

	} else {

		$user_id = $user_register;

		update_user_meta($user_id, 'user_location', $user_location);
		update_user_meta($user_id, 'user_location_lat', $user_location_lat);
		update_user_meta($user_id, 'user_location_long', $user_location_long);



		///////////////////////////Mail SEND///////////////////////////////////

		$code = sha1($user_id . time());
		$user_active_link = add_query_arg(array('keys' => $code), site_url());
		$activation_link = '<a href="' . $user_active_link . '" target="_blank">';
		$activation_link .= $user_active_link;
		$activation_link .= '</a>';
		add_user_meta($user_id, 'code_to_be_activated', $code, true);
		update_user_meta($user_id, '_member_status', 'inactive');

		$from = get_field("sender_email", "option"); // Set whatever you want like mail@yourdomain.com

		if (!(isset($from) && is_email($from))) {
			$sitename = strtolower($_SERVER['SERVER_NAME']);
			if (substr($sitename, 0, 4) == 'www.') {
				$sitename = substr($sitename, 4);
			}
			$from = 'admin@' . $sitename;
		}

		$to = $email;
		$subject = 'Activate your account';
		//$site_name = get_bloginfo( 'name' );
		// $site_name = "Florish - Plant Care Companion";
		$sender = 'From: ' . get_bloginfo('name') . ' <' . $from . '>' . "\r\n";

		$message_content = 'To activate your account please click on the following link : ' . $activation_link;
		//Emil Template Start


		$custom_logo_id = get_theme_mod('custom_logo');
		$image = wp_get_attachment_image_src($custom_logo_id, 'full');

		//$logo = $image[0];
		$logo = get_field("footer_logo", "option");
		$site_url = site_url();
		$wbst = preg_replace('#^https?://#', '', $site_url);
		$wbst_url = str_replace("/", "", $wbst);


		$message =
			'<table border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#5fb526" width="800" class="main_tbl">
			   <tr>
				 <td width="52">&nbsp;</td>
				 <td width="696">
					 <table border="0" cellspacing="0" cellpadding="0" width="100%">
					   <tr>
						 <td>
							 <table border="0" cellspacing="0" cellpadding="0" style="background:#fff;" width="100%">
							   <tr>
								 <td width="36">&nbsp;</td>
								 <td>
									 <table border="0" cellspacing="0" cellpadding="0">
									   <tr height="25">
										 <td>&nbsp;</td>
									   </tr>
									   <tr>
										 <td><a href=' . $site_url . '><img src=' . $logo . ' alt="logo" width="140" height="" class="logo"/></a></td>
									   </tr>
									   <tr>
										 <td>&nbsp;</td>
									   </tr>
									   <tr>
										 <td style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#011d32; padding:0; margin:0 0 20px;">
										  <p>Dear ' . $first_name . '</p>
										  ' . $message_content . '
										  <p style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#011d32; padding:0; margin:0;"><br><br>Florish Team</p>
										  <p style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#011d32; padding:0; margin:0;">Why not follow us on :   <a href="#" target="_blank" style="color:#3d6d91; text-decoration:underline;">Facebook</a>, <a href="#" target="_blank" style="color:#3d6d91; text-decoration:underline;">Twitter</a>, or <a href="#" target="_blank" style="color:#3d6d91; text-decoration:underline;">LinkedIn</a></p>
										 </td>
									   </tr>
									   <tr height="25">
										 <td>&nbsp;</td>
									   </tr>
									 </table>
								 </td>
								 <td width="36">&nbsp;</td>
							   </tr>
							 </table>
						 </td>
					   </tr>
					   <tr>
						 <td>&nbsp;</td>
					   </tr>
					   <tr>
						 <td>

							<p style="font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#fff; padding:0; margin:0 0 15px; text-align:center;"><a href=' . site_url() . ' style="color:#fff; text-decoration:none;">Privacy Policy</a> | <a href=' . site_url() . ' style="color:#fff; text-decoration:none;">Terms and Conditions</a></p>

							<p style="font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#fff; padding:0; margin:0 0 15px; text-align:center;">You are receiving this email because this email address has been used to join <a href=' . $site_url . ' style="color:#fff; text-decoration:none;">' . $wbst_url . '</a><br />
							To ensure you receive our emails please add <a href="mailto:info@florish.gmail.com" target="_blank" style="color:#fff; text-decoration:none;">info@florish.gmail.com</a> to your safe senders list</p>

						 </td>
					   </tr>
					   <tr>
						 <td>&nbsp;</td>
					   </tr>
					 </table>
				 </td>
				 <td width="52">&nbsp;</td>
			   </tr>
			 </table>';
		//Emil Template End
		$headers[] = 'MIME-Version: 1.0' . "\r\n";
		$headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers[] = "X-Mailer: PHP \r\n";
		$headers[] = $sender;

		$mail = wp_mail($to, $subject, $message, $headers);
		if ($mail) {
			$message = 'You have successfully created your account! To begin using this site you will need to activate your account via the email we have just sent to your address.';
		} else {
			$message = 'You have successfully created your account! System is unable to send you mail containg your activation link. Please contact Site Administrator';
		}

		///////////////////////////Mail SEND///////////////////////////////////


		echo json_encode(array('error' => false, 'message' => __($message), 'user_id' => $user_id));
	}

	die();
}
