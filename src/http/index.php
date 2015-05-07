<?php

require realpath(dirname(__FILE__) . '/../../app/config') . '/env.php';
require DOCROOT . 'vendor/autoload.php';

define('APP_START_TIME', microtime(TRUE));
define('APP_START_MEMORY', memory_get_usage());

ob_start();
set_exception_handler([ 'Search\Classes\Exception', 'handler' ]);
set_error_handler([ 'Search\classes\Exception', 'error_handler' ]);
register_shutdown_function([ 'Search\classes\Exception', 'shutdown_handler' ]);

$config = include APPPATH.'config/database.php';
$db = Search\Repository\DataRepository::instance($config, 'dev');

// Load app-specific routes
$routes = include APPPATH.'config/routes.php';
echo (new Search\Delivery\Request([
		'app' => $db,
		'base_url' => '/Search/src/http',
		'routes' => $routes
	]))
	->execute();
