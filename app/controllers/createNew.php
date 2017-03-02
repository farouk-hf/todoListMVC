<?php

class createNew extends Controller{
	
	public function index(){
		$this->renderView('createNew');
		$this->processNewTodo();
	}

	public function processNewTodo(){
		if(isset($_POST['title']) && isset($_POST['priority']) && isset($_POST['description']) && isset($_POST['dueDate'])){
			$newTodo = $this->createModelInstance('Todo');
			$newTodo->init($_POST['title'], $_POST['priority'], $_POST['description'], $_POST['dueDate']);
			var_dump($newTodo);
		}
	}
}