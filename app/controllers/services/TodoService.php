<?php


require_once (dirname(__FILE__).'/../../models/Todo.php');

class TodoService{

	public function __construct(){
		
	}

	public function fetchAll(){
		$query = "SELECT * FROM todo";
		$output = [];
		if($result = mysql_query($query)){
			while($row = mysql_fetch_assoc($result)){
				$todo = new Todo;
				$todo->init($row['id'], $row['title'], $row['description'], $row['priority'], $row['due_date']);
				array_push($output, $todo);
			}
			return $output;
		}
		else die(mysql_error());
	}

	public function addElement($todo){
		$mysqldate = date( 'Y-m-d H:i:s', strtotime(str_replace('-', '/', $todo->due_date)));
		$query = " INSERT INTO todo (title, description, priority, due_date) VALUES ('$todo->title' , '$todo->description' , '$todo->priority' , '$mysqldate')";

		if(mysql_query($query) === TRUE){
			return TRUE;
		} else return mysql_error();
	}

	public function fetchById($id){
		$query = "SELECT * FROM todo WHERE id = $id";
		if($result = mysql_query($query)){
			while($row = mysql_fetch_assoc($result)){
				$todo = new Todo;
				$todo->init($row['id'], $row['title'], $row['description'], $row['priority'], $row['due_date']);
				return $todo;
			}
		} else die(mysql_error());
	}

	public function deleteById($id){
		$query = "DELETE FROM todo WHERE id=$id";
		if(mysql_query($query) === TRUE){
			return TRUE;
		} else return mysql_error();
	}

	public function searchByKey($key){
		$query = "SELECT * FROM todo WHERE title LIKE '%$key%'";
		$output = [];
		if($result = mysql_query($query)){
			while($row = mysql_fetch_assoc($result)){
				$todo = new Todo;
				$todo->init($row['id'], $row['title'], $row['description'], $row['priority'], $row['due_date']);
				array_push($output, $todo);
			}
			return $output;
		}
		else die(mysql_error());
	}
}