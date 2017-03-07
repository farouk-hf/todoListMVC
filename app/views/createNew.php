
<?php require_once 'home/header.php'; ?>
<div class="container">
	<div class="container">
		<br><br>
	<h2 class="page-header">CREATE NEW TODO</h2>
	<p class="text-muted">Create a new Todo here.</p>
	<form action="/createNew" method="POST">
		<div class="form-group" style="margin-bottom:15px">
		    <label for="title">Title</label>
		    <input type="text" class="form-control" name="title" placeholder="title" required>
  		</div>
		<div class="form-group" style="margin-bottom:15px">
			<label for="priority">Priority</label>
			<select class="form-control" name="priority">
			  <option>Low</option>
			  <option>Medium</option>
			  <option>High</option>
			</select>
		</div>
		<div class="form-group" style="margin-bottom:15px">
		    <label for="description">Description</label>
		    <textarea class="form-control" rows="3" name="description" required></textarea>
  		</div>
  		<div class="form-group" style="margin-bottom:15px">
		    <label for="dueDate">Due date</label>
		    <input class="form-control" type="datetime-local" name="due_date" id="datePicker">
  		</div>
		<button type="submit" class="btn btn-primary">Create</button>
	</form>

<?php require_once 'home/footer.php';?>