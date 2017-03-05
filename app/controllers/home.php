<?php

require_once ('services/TodoService.php');

class home extends Controller {

	private $todoService;

	public function index($notification = NULL){
		$data = $this->fetchAllTodos();
		if($notification === true){
			echo 'true';
			$data['notification'] = "Todo successfully added!";
		}
		$this->renderView('index', $data);
	}

	public function delete($id){
		$this->todoService = new TodoService;
		if($this->todoService->deleteById($id)){
			$data = $this->fetchAllTodos();
			$data['notification'] = "Todo successfully deleted!";
		}else die('delete dailed');
		$this->renderView('todoTable', $data);
	}

	public function fetchAllTodos(){
		$this->todoService = new TodoService;
		$data = $this->todoService->fetchAll();
		return $data;
	}

	public function search($key){
		if($data = $this->todoService->searchByKey($key)){
			$data['notification'] = "results found.";
		}else die('search failed');
		
		$this->renderView('todoTable', $data);
	}

}