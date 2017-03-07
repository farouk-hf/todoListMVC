<?php

/**
* parent class of controller
*/
class Controller{
	
	/**
	* creates an instance of a given model.
	*/
	public function createModelInstance($model, $params =[]){

		if(file_exists('../app/models/'. $model . '.php')){
			require_once '../app/models/'. $model . '.php';
			return new $model();
		}
		
		throw new Exception("File ". $model ." does not exist", 1);
	}

	/**
	* renders the given view.
	*/
	public function renderView($view, $data = []){
		if(file_exists('../app/views/'. $view .'.php')){
			require_once '../app/views/'. $view .'.php';
		} else throw new Exception("File ". $view ." does not exist", 1);

	}
}