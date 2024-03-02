<?php

function autoload($className)
{
	$className = ltrim($className, '\\');
	$fileName  = '';
	$namespace = '';
	if ($lastNsPos = strrpos($className, '\\')) {
		$namespace = substr($className, 0, $lastNsPos);
		$className = substr($className, $lastNsPos + 1);
		$fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
	}
	$fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
	var_dump($fileName);
	require $fileName;
}
spl_autoload_register('autoload');

// /**
//  * WordPress Theme Autoload
//  * Place on Root Theme
//  * Create a folder as classes
//  * This peace of code adds a autoloader into any wordpress theme you have
//  * to use this only follow the simple steps bellow
//  * create all your class files inside the folder named class
//  * and then just include this autoloader.php file in your theme functions.php
//  * require_once TEMPLATEPATH . '/autoloader.php';
//  * https://github.com/knoonrx
//  * https://gist.github.com/knoonrx
//  **/
// spl_autoload_register('template_autoload');
// function template_autoload($class)
// {
// 	try {
// 		$extension = '.php';
// 		$separator = '\\';
// 		$class = str_replace($separator, DIRECTORY_SEPARATOR, $class);
// 		$filepath = get_template_directory() . DIRECTORY_SEPARATOR . $class . $extension;
// 		var_dump($filepath);
// 		if (file_exists($filepath))
// 			require_once $filepath;
// 	} catch (Error $ex) {
// 		return 'Error: ' . $ex->getMessage();
// 	}
// }
