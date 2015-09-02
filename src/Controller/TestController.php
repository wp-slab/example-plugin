<?php

namespace Example\Controller;

/**
 * Test Controller
 *
 * @package default
 * @author Luke Lanchester
 **/
class TestController {


	/**
	 * Constructor
	 *
	 * @return void
	 **/
	public function __construct(\Slab\Router\RouteCollection $routes) {

	}



	/**
	 * Hello!
	 *
	 * @return void
	 **/
	public function getIndex(\Slab\Core\Http\RequestInterface $req, $name = 'Name') {

		// _print_r($req->query->all());
		// _print_r($req->attributes->all());

		// return "Hello, $name!";

		$json = new \Slab\Core\Http\JsonResponse;

		$json->setData(['this' => 'that']);

		$json->setJsonpEnabled(true);
		$json->setJsonpKey('callback');

		return $json;


		return new \Slab\Core\Http\JsonResponse(['foo' => 'bar']);

		return new \Slab\View\View;

	}



}
