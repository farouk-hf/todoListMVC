<?php

require_once ('services/TodoService.php');
/**
* Controller of the createNew view.
*/
class createNew extends Controller{
	
	private $todoService;

	/**
	* default method to be run, renders the view
	*/
	public function index(){
		$this->todoService = new TodoService;
		$this->processNewTodo();
		$this->renderView('createNew');
	}

	/**
	* saves a new todo in the database using the service and redirects to home.
	* returns : false if the todo is not persisted.
	*/
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