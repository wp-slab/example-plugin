<?php
/*
Plugin Name: Slab Example Plugin
Plugin URI: http://www.wp-slab.com
Description: An example plugin using Slab components.
Version: 1.0.0
Author: Slab
Author URI: http://www.wp-slab.com
Created: 2014-06-30
Updated: 2015-08-08
Repo URI: github.com/wp-slab/example-plugin
Requires: slab-core, slab-db, slab-router, slab-view
*/


// Define
define('HL_EXAMPLE_INIT', true);
define('HL_EXAMPLE_DIR', plugin_dir_path(__FILE__));
define('HL_EXAMPLE_URL', plugin_dir_url(__FILE__));


// Init
add_action('slab_loaded', function($slab){

	$slab->autoloader->registerNamespace('Example', HL_EXAMPLE_DIR . 'src');

});


// Routes
add_action('slab_router_routes', function($routes){

	$routes->get('hello', function(\Slab\Core\Http\RequestInterface $req){
		_print_r($req->query->all());
		return 'Hello, World!';
	});

	$routes->get('hello/{name}', 'Example\Controllers\TestController@getIndex');
	$routes->get('one/{num?}', 'Example\Controllers\TestController@getIndex');

});


// Commands
add_action('slab_cli_commands', function($commands){
	$commands->resolve('Example\Commands\TestCommand@doSomething');
});


// Views
add_action('slab_view_directories', function($views){
	$views->addDirectory(HL_EXAMPLE_DIR . 'views', 'example');
});
