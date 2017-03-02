<?php

class Todo {
	public $id;
	public $title;
	public $priority;
	public $description;
	public $dueDate;

	public function init($title , $priority ,$description , $dueDate){
		$this->title = $title;
		$this->priority = $priority;
		$this->description = $description;
		$this->dueDate = $dueDate;
	}


}