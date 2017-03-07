<?php
/**
* performs all the database queries
*/

require_once (dirname(__FILE__).'/../../models/Todo.php');

class TodoService{

	public function __construct(){
		
	}

	/**
	* fetches all the todos from the database
	*/
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

	/**
	* fetches todos depending on  the given filters
	* $starting : from which element ( in the database )
	* $count : how many element
	* $order : asc or desc
	* $sort : priority to sort by
	*/
	public function fetchTodos($starting, $count, $sort=NULL, $order = NULL){

		$query = "SELECT * FROM todo";

		if(!is_null($sort)){
			$query.=" WHERE priority = '$sort'";
		}
		
				if(!is_null($order)){
			$query.=" ORDER BY due_date $order";
		}

		$query.=" LIMIT $starting, $count";

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

	/**
	* persists a new todo in the database
	* $todo : todo to be persisted
	*/
	public function addElement($todo){
		$mysqldate = date( 'Y-m-d H:i:s', strtotime(str_replace('-', '/', $todo->due_date)));
		$query = " INSERT INTO todo (title, description, priority, due_date) VALUES ('$todo->title' , '$todo->description' , '$todo->priority' , '$mysqldate')";

		if(mysql_query($query) === TRUE){
			return TRUE;
		} else return mysql_error();
	}

	/**
	* fetches a todo having the given id
	* $id:
	*/
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

	/**
	* deletes the todo having the given id
	* $id:
	*/
	public function deleteById($id){
		$query = "DELETE FROM todo WHERE id=$id";
		if(mysql_query($query) === TRUE){
			return TRUE;
		} else return mysql_error();
	}

	/**
	* fetches all todos with a title containing the key.
	* $key:
	*/
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