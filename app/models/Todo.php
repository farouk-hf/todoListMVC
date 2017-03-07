<?php

/**
* Model class to represent a todo
*/
class Todo {
	public $id;
	public $title;
	public $description;
	public $priority;
	public $due_date;

	public function init($id, $title, $description , $priority  , $due_date){
		$this->id = $id;
		$this->title = $title;
		$this->description = $description;
		$this->priority = $priority;
		$this->due_date = $due_date;
	}
}