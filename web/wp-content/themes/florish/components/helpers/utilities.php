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
