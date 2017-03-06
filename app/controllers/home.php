<?php

require_once ('services/TodoService.php');

class home extends Controller {

	private $todoService;

	public function index($notification = NULL, $current = 0){
		$data = $this->fetchTodos($current,10);
		if($notification == true){
			$data['notification'] = "Todo successfully added!";
			echo 'notification';
		}
		$this->renderView('index', $data);
	}

	public function getCurrentTodos($notification = NULL, $current = 0, $sort = NULL , $order = NULL){
		if(!$this->checkQueryParam($order)){
			$order = NULL;
			
		}

		if(!$this->checkQueryParam($sort)){
			$sort = NULL;
		}

		$data = $this->fetchTodos($current,10, $sort , $order);
		if($notification === true){
			$data['notification'] = "Todo successfully added!";
		}
		$this->renderView('todoTable', $data);
	}

	public function delete($id){
		if($id != NULL){
			$this->todoService = new TodoService;
			if($this->todoService->deleteById($id)){
				$data = $this->fetchTodos(0,10);
				$data['notification'] = "Todo successfully deleted!";
			}else die('delete dailed');
			$this->renderView('todoTable', $data);
		}
	}

	public function fetchAllTodos(){
		$this->todoService = new TodoService;
		$data = $this->todoService->fetchAll();
		return $data;
	}

	public function fetchTodos($starting, $limit, $sort=null , $order=null){
		$this->todoService = new TodoService;
		$data = $this->todoService->fetchTodos($starting, $limit , $sort , $order);
		return $data;
	}

	public function search($key){
		$this->todoService = new TodoService;
		if($data = $this->todoService->searchByKey($key)){
			$data['notification'] = "results found.";
		}else die('search failed');
		
		$this->renderView('todoTable', $data);
	}

	private function checkQueryParam($param){
		if($param != "--"){
			return true;
		} else return false;
	}

}