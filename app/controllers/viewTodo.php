<?php

require_once ('services/TodoService.php');

/**
* Controller for the viewTodo view 
*/
class viewTodo extends Controller {

	private $todoService;

	/**
	* default method to be run, renders the view
	*/
	public function index($id=NULL){
		$this->todoService = new TodoService;
		if($todo = $this->todoService->fetchById($id)){
			$this->renderView('viewTodo',$todo);
		}
	}
}