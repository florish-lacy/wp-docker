<?php

function fl_add_cors_headers($value)
{
	$origin = get_http_origin();
	$allowed_origins = ['localhost', 'localhost:3000', 'http://localhost:5173'];

	if ($origin && in_array($origin, $allowed_origins)) {
		header('Access-Control-Allow-Origin: ' . esc_url_raw($origin));
		header('Access-Control-Allow-Methods: GET');
		header('Access-Control-Allow-Credentials: true');
	}

	return $value;
}
