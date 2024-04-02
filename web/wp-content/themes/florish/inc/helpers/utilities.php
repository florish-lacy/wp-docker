<?php

namespace Florish;

function add_body_class($class)
{
	// add_filter is a WP filter hook
	// We use an anonymous function because the filter references non-namespaced functions
	add_filter(
		'body_class',
		function ($classes) use ($class) { // Use the 'use' keyword to inherit $class from the parent scope
			$classes[] = $class;
			return $classes;
		}
	);
}

// https://usersinsights.com/create-wordpress-users-programmatically/
// wc is the "WooCommerce way"
function create_user($username = '', $password = '', $email = '', $args = array(), $type = 'wc')
{

	if ('wc' != $type) {
		//use the default method
		$id = wp_create_user($username, $password, $email);

	} else {
		//or the WC method
		$id = wc_create_new_customer($email, $username, $password, $args);
	}

	if (!is_wp_error($id)) {
		update_user_meta($id, 'programmatically', 1);
	}

	return $id;
}
