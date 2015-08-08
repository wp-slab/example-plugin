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

