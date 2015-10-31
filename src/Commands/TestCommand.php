<?php

namespace Example\Commands;

use Slab\Cli\Command;

/**
 * Test Command
 *
 * @package default
 * @author Luke Lanchester
 **/
class TestCommand extends Command {


	/**
	 * @var string Command name
	 **/
	protected $name = 'example:test';


	/**
	 * Execute command
	 *
	 * @return void
	 **/
	public function doSomething() {

		$this->write('doing something');

	}



}
