<?php

namespace Florish;

class Util
{
	public static function add_body_class()
	{
		add_filter('body_class', 'custom_body_class');
		function custom_body_class($classes)
		{
			$classes[] = 'new-class';
			return $classes;
		}
	}
}
