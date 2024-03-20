<?php

function redirect()
{
	$user = wp_get_current_user();
	if (is_user_logged_in()) {
		if (in_array('administrator', (array) $user->roles) || in_array('customer', (array) $user->roles)) {
			wp_safe_redirect(home_url('/my-account'));
			exit;
		} else if (in_array('nursery', (array) $user->roles)) {
			wp_safe_redirect(home_url('/vendor-dashboard'));
			exit;
		} else {
			wp_safe_redirect(home_url());
			exit;
		}

	}
	//die();
}
