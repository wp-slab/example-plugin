<?php

namespace Example\Controllers;

use Slab\View\ViewFactory;

/**
 * Test Controller
 *
 * @package default
 * @author Luke Lanchester
 **/
class TestController {


	/**
	 * @var Slab\View\ViewFactory
	 **/
	protected $views;


	/**
	 * Constructor
	 *
	 * @return void
	 **/
	public function __construct(ViewFactory $views) {

		$this->views = $views;

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

		// $view = $this->views->make('test', ['foo' => 'bar']);
		$view = $this->views->make('example:test', ['foo' => 'bar']);

		$view->set('name', $name);

		return $view;


		$json = new \Slab\Core\Http\JsonResponse;

		$json->setData(['this' => 'that']);

		$json->setJsonpEnabled(true);
		$json->setJsonpKey('callback');

		return $json;

	}



}
