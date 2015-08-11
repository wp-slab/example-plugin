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


	// $req = $slab->make('Slab\Core\Http\Request');
	// $req = Slab\Core\Http\Request::create('POST', 'https://test.com:8080/foo/bar?this=that');
	// _print_r($req);
	// die();



	$slab->router->get('test',
		function(\Slab\Core\Http\RequestInterface $request, \Closure $next){
			return 'ab' . $next() . 'aa';
		},
		function(\Slab\Core\Http\RequestInterface $request, \Closure $next){
			return 'bb' . $next() . 'ba';
		},
		function(\Slab\Core\Http\RequestInterface $request, \Closure $next){
			return ' cont ';
		}
	);


	$authFn = function($req, $next) {
		header('X-Auth: true');
		return $next();
	};

	$slab->router->get('test2', $authFn, 'Example\Controller\TestController@action_index');



	$slab->router->get('hotels', function(){
		echo 'hotels collection';
	});

	$slab->router->post('hotels', function(){
		echo 'create hotel';
	});

	$slab->router->get('hotels/foo', function(){
		echo 'hotel entity';
	});

	$slab->router->get('news', function(){
		echo 'news archive';
	});

	$slab->router->get('news/single', function(){
		echo 'news single';
	});


	// $slab->make('Slab\Cli\Dispatcher')->addCommand(new Slab\Cli\Command('example:command'));


});
