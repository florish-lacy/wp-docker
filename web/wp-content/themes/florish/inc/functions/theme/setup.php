<?php
// Theme Setup
if (!function_exists('florish_theme_setup')) {
	function florish_theme_setup()
	{

		//Woocokomerce
		add_theme_support('woocommerce');

		add_theme_support('wc-product-gallery-zoom');
		add_theme_support('wc-product-gallery-lightbox');
		add_theme_support('wc-product-gallery-slider');

		/*
		 * Let WordPress manage the document title.
		 */
		add_theme_support('title-tag');
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 */
		add_theme_support('post-thumbnails');
		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary' => __('Primary Menu', 'florish'),
				'secondary' => __('Secondary Menu', 'florish'),
			)
		);
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			)
		);


		/**
		 * Add support for core custom logo.
		 *
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height' => 75,
				'width' => 372,
				'flex-width' => true,
				'flex-height' => true,
			)
		);
	}
}
