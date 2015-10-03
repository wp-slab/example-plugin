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
	public function getIndex(\Slab\DB\DatabaseManager $db, \Slab\Core\Http\RequestInterface $req, $name = 'Name') {



		// $conn = $db->connection();
		// $result = $conn->select('select * from test_table where name = %s order by age asc limit 5', ['kate']);
		// $result = $conn->insert('insert into test_table (name, age, created) values (%s, %d, %s)', ['adam', 19, '2015-10-03 12:41']);
		// $result = $conn->update('update test_table set name = %s where age = %d', ['Adam', 19]);
		// $result = $conn->delete('delete from test_table where age = %d limit 1', [19]);

		// $result = $db->selectRaw('select * from test_table where name = %s order by age asc limit 5', ['kate']);
		// _var_dump($result);


		$query = $db->select('name')->from('test_table')->where('age', '>', 19);



		$result = $query->col('age', 'name');
		_var_dump($result);


		die();



		$query = $db
			// ->select(['p.ID', 'post_id'], 'p.post_name', 'post_title')
			->select(function(){ return 'count(*) as total'; })
			->from(['wp_posts', 'p'])
			// ->join('wp_postmeta')->on('foo', 'bar')
			// ->where('foo', 'bar')
			->orderBy('post_date', 'desc')
			// ->groupBy('some')
			->limit(10)
			->offset(0);

		// _var_dump($query);

		// _var_dump($query->sql());
		_var_dump($query->col('post_name', 'ID'));

		die();



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
