
<?php require_once 'home/header.php'; ?>

<div class="container">
		<div class="container">
			<br><br>
		<h2 class="page-header">ALL YOUR TODOS</h2>
		<p class="text-muted">Dont forget to check them!</p>
		<form class="navbar-form " role="search" class="col-xs-5" >
			<div class="form-group">
			    <input type="text" class="form-control" placeholder="Search" id="searchBox">
			</div>
			<div type="submit" class="btn btn-default" disabled="disabled"><span class="glyphicon glyphicon-search"></span></div>
			
			<div class="form-group pull-right col-md-4 col-sm-6" >
				<label class="text-muted">Sort by priority :</label>
				<select class="form-control" name="priority" id="selectSort">
				  <option>--</option>
				  <option>Low</option>
				  <option>Medium</option>
				  <option>High</option>
				</select>
			</div>

			<div class="form-group pull-right" >
				<label class="text-muted">Order by due date:</label>
				<select class="form-control" name="priority" id="selectOrder">
				  <option>--</option>
				  <option>ASC</option>
				  <option>DESC</option>
				</select>
			</div>
		</form>

	    </div>
	    
			<div class="row pull-right"> 
				<button id="viewBtn" class="btn btn-success">View</button>
				<button id="editBtn" class="btn btn-default">Edit</button>
				<button id="deleteBtn" class="btn btn-danger">Delete</button>
			</div>
		<div id="tableContainer">
				<?php require_once 'todoTable.php'; ?>
		</div>
		<nav aria-label="Page navigation">
  <ul class="pagination">
    <li >
      <button id="prevArr" class="btn btn-default" aria-label="Previous" id="prev" disabled="disabled"/>
        <span aria-hidden="true" >&laquo;</span>

    </li>
    <li >
      <button id="nextArr" class="btn btn-default" aria-label="Next" id="next"/>
        <span aria-hidden="true" >&raquo;</span>

    </li>
  </ul>
</nav>
	</div>
</div>

<?php require_once 'home/footer.php';?>