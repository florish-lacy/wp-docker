<?php

/**
 * Enqueue scripts and styles.
 */
function florish_scripts()
{
	// Load our main theme stylesheet.
	// wp_enqueue_style('florish-style', get_stylesheet_uri()); // style.css
	// wp_enqueue_style('florish-style', get_template_directory_uri() . '/assets/css/style.css'); // style.css

	//bootstrap toggle css include
	//wp_enqueue_style( 'florish-bootstrap-toggle-style', 'https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css', array() );
	wp_enqueue_style('florish-bootstrap-toggle-style', 'https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.0.4/css/bootstrap5-toggle.min.css', array());

	//fontawesome include
	wp_enqueue_style('florish-fontawesome-all-css', get_template_directory_uri() . '/assets/fontawesome/css/all.css', array());

	//magnific style
	wp_enqueue_style('florish-magnific-popup-css', get_template_directory_uri() . '/assets/css/magnific-popup.css', array());

	//slick include
	wp_enqueue_style('florish-slick-style', get_template_directory_uri() . '/assets/css/slick.css', array());
	wp_enqueue_style('florish-slick-theme-style', get_template_directory_uri() . '/assets/css/slick-theme.css', array());

	//aos include
	wp_enqueue_style('florish-aos-theme-style', get_template_directory_uri() . '/assets/css/aos.css', array());


	//bootstrap min js
	wp_enqueue_script('florish-bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '20151811', true);

	//bootstrap bootstrap-toggle
	//wp_enqueue_script( 'florish-bootstrap-toggle-script',  'https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js', array( 'jquery' ), '20151811', true );
	wp_enqueue_script('florish-bootstrap-toggle-script', 'https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.0.4/js/bootstrap5-toggle.jquery.min.js', array('jquery'), '20151811', true);

	//bootstrap popper min js
	wp_enqueue_script('florish-slick-script', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '20151811', true);

	//theme aos js
	wp_enqueue_script('florish-aos-script', get_template_directory_uri() . '/assets/js/aos.js', array('jquery'), '20151811', true);

	///magnific popup js
	wp_enqueue_script('florish-magnific-popup-js', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.js', array('jquery'), '20151811', true);

	///validate js
	wp_enqueue_script('florish-jquery-validate', 'https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js', array('jquery'), '20151811', true);
	wp_enqueue_script('florish-jquery-validate-aditional', 'https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js', array('jquery'), '20151811', true);

	wp_enqueue_script('florish-mask-phone-number', 'https://unpkg.com/jquery-input-mask-phone-number@1.0.14/dist/jquery-input-mask-phone-number.js', array('jquery'), '20151811', true);
	///google location
	wp_enqueue_script('florish-google-place-location-front', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBqxHeRDjgzm72wXzGKE1oxS4lgyT3K6uM&libraries=places', array('jquery'), '20135344611', true);

	///masonry pkgd js
	wp_enqueue_script('florish-masonry-pkgd-js', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', array('jquery'), '20151811', true);

	///jquery cookie js
	wp_enqueue_script('florish-jquery-cookie-js', get_template_directory_uri() . '/assets/js/jquery.cookie.js', array('jquery'), '204641811', true);

	///map js
	wp_enqueue_script('florish-map-place-js', get_template_directory_uri() . '/assets/js/map.js', array('jquery'), '20468768711', true);

	// Theme main Function js
	// wp_enqueue_script('florish-main-script', get_template_directory_uri() . '/assets/js/functions.js', array('jquery'), '20151811', true);

	if (is_array(wp_remote_get('http://localhost:5173/'))) {

		wp_enqueue_script('vite', 'http://localhost:5173/@vite/client', [], null);
		wp_enqueue_script('main-js', 'http://localhost:5173/assets/dist/assets/main.js', ['jquery'], null, true);
		wp_enqueue_style('style-css', 'http://localhost:5173/assets/dist/assets/style.css', [], 'null');
	} else {
		wp_enqueue_script('florish-main-script', get_template_directory_uri() . '/assets/dist/main.js', array('jquery'), '1.0', true);
		wp_enqueue_style('florish-style', get_template_directory_uri() . '/assets/css/style.css'); // style.css
	}


	// todo?
	global $wp;
	wp_localize_script('florish-main-script', 'ajax_florish_object', array('ajax_url' => admin_url('admin-ajax.php'), 'home_url' => site_url(), 'vendor_url' => get_page_link(1529), 'current_url' => home_url($wp->request)));

}
