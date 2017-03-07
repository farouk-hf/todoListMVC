<?php

require_once ('services/TodoService.php');

/**
* Controller for the index view.
*/
class home extends Controller {

	private $todoService;

	/**
	* default method to be run, renders the view.
	* $notification : if true a notification will be displayed
	*/
	public function index($notification = NULL, $current = 0){
		$data = $this->fetchTodos($current,10);
		if($notification == true){
			$data['notification'] = "Todo successfully added!";
			echo 'notification';
		}
		$this->renderView('index', $data);
	}

	/**
	* get the next ( 10 or less ) todos to be displayed.
	* $notification : will be displayed
	* $current , $sort , $order : query filters
	*/
	public function getCurrentTodos($notification = NULL, $current = 0, $sort = NULL , $order = NULL){
		if(!$this->checkQueryParam($order)){
			$order = NULL;
		}

		if(!$this->checkQueryParam($sort)){
			$sort = NULL;
		}

		$data = $this->fetchTodos($current,10, $sort , $order);
		if($notification === true){
			$data['notification'] = "Next todos ...";
		}
		$this->renderView('todoTable', $data);
	}

	/**
	* deletes the todo having the given id and refreshes the table.
	* $id:
	*/
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

	/**
	* fetches all todos from the database.
	*/
	public function fetchAllTodos(){
		$this->todoService = new TodoService;
		$data = $this->todoService->fetchAll();
		return $data;
	}

	/**
	* fetches todos with filter
	*/
	public function fetchTodos($starting, $limit, $sort=null , $order=null){
		$this->todoService = new TodoService;
		$data = $this->todoService->fetchTodos($starting, $limit , $sort , $order);
		return $data;
	}

	/**
	* refreshes the table with all todos containing the given key
	* $key:
	*/
	public function search($key){
		$this->todoService = new TodoService;
		if($data = $this->todoService->searchByKey($key)){
			$data['notification'] = "results found.";
		}else die('search failed');
		
		$this->renderView('todoTable', $data);
	}

	/**
	* checks if the given param is given
	*/
	private function checkQueryParam($param){
		if($param != "--"){
			return true;
		} else return false;
	}

}