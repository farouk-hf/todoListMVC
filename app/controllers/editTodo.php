<?php

require_once ('services/TodoService.php');

class editTodo extends Controller{

	private $todoService;
	public function index($id=NULL){
		$this->todoService = new TodoService;
		if($todo = $this->todoService->fetchById($id)){
			$this->renderView('editTodo',$todo);
		}
	}
}