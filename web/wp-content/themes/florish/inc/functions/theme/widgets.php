<?php

/**
 * Register widget area.
 */
function florish_widgets_init()
{
	register_sidebar(
		array(
			'name' => __('Shop Sidebar', 'florish'),
			'id' => 'shop-sidebar',
			'description' => __('Add widgets here to appear in your sidebar.', 'florish'),
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		)
	);


}
