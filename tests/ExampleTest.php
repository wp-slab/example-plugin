<?php

use Mockery as m;

/**
 * Example Test
 *
 * @package default
 * @author Luke Lanchester
 **/
class ExampleTest extends PHPUnit_Framework_TestCase {


	/**
	 * An example test
	 *
	 * @return void
	 **/
	public function testExample() {

		$this->assertTrue(true);

	}



	/**
	 * Tear down tests
	 *
	 * @return void
	 **/
	public function tearDown() {

		m::close();

	}



}
