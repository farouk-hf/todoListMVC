<?php

require_once ('services/TodoService.php');

class createNew extends Controller{
	
	private $todoService;

	public function index(){
		$this->todoService = new TodoService;
		$this->processNewTodo();
		$this->renderView('createNew');
	}

	public function processNewTodo(){
		if(isset($_POST['title']) && isset($_POST['priority']) && isset($_POST['description']) && isset($_POST['due_date'])){
			$newTodo = $this->createModelInstance('Todo');
			$newTodo->init(0 ,$_POST['title'],$_POST['description'], $_POST['priority'], $_POST['due_date']);
			$result = $this->todoService->addElement($newTodo);
			if($result === TRUE){
				header("Location: http://todolist/home/index/true");
			}
		}
		return FALSE;
	}
}