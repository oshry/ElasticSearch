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
//echo "<pre>",print_r($config),"</pre>";
$db = Search\Repository\DataRepository::instance($config, 'dev');
//$app = new App\Manager($config);
//echo "<pre>",print_r($db),"</pre>";die();

// Load app-specific routes
$routes = include APPPATH.'config/routes.php';
//echo "<pre>",print_r($routes),"</pre>";
//var_dump($app);
//die('sdsd');
echo (new Search\Delivery\Request([
		'app' => $db,
		'base_url' => '/Search/src/http',
		'routes' => $routes
	]))
	->execute();
	//->body();
//Question 1: how execute() to request and body() to response