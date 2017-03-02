<?php

class Todo {
	public $id;
	public $title;

	public function init($id , $title){
		$this->id = $id;
		$this->title = $title;
	}
}