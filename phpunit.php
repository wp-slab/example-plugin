<?php

include 'vendor/autoload.php';
include 'vendor/wp-slab/slab-core/src/Autoloader.php';

$autoloader = new Slab\Core\Autoloader;
$autoloader->registerNamespace('Slab\Core', 'vendor/wp-slab/slab-core/src');
$autoloader->registerNamespace('Slab\Cli', 'vendor/wp-slab/slab-cli/src');
$autoloader->registerNamespace('Slab\DB', 'vendor/wp-slab/slab-db/src');
$autoloader->registerNamespace('Slab\Router', 'vendor/wp-slab/slab-router/src');
$autoloader->registerNamespace('Slab\View', 'vendor/wp-slab/slab-view/src');
$autoloader->registerNamespace('Slab\Router', __DIR__ . '/src');
