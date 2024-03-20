<?php

function authenticate_user($user)
{
	if ($user->has_cap('administrator')) {
		return $user;
	}
	if (get_user_meta($user->ID, '_member_status', true) == 'active') {
		return $user;
	}

	return new WP_Error('Please verify your mail ID', 'Your Account is inactive. Contact Your Site Administrator.');
}
