<?php

class home extends Controller {

	public function index(){

		$todos = [
			$this->createModelInstance('Todo'),
			$this->createModelInstance('Todo'),
			$this->createModelInstance('Todo')
		];

		$todos[0]->init(0 ,'make lunch');
		$todos[1]->init(1 , 'do homework');
		$todos[2]->init(2 , 'hang out with Kelly');

		$this->renderView('index', $todos);
	}
}