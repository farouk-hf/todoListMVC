
<?php require_once 'home/header.php'; ?>

<div class="container">
	<br><br>
	<h2 class="page-header">ALL YOUR TODOS</h2>
	<p class="text-muted">Dont forget to check them!</p>
	<form class="navbar-form" role="search" class="col-xs-5">
		<div class="form-group">
		    <input type="text" class="form-control" placeholder="Search" id="searchBox">
		</div>
		<div type="submit" class="btn btn-default" disabled="disabled"><span class="glyphicon glyphicon-search"></span></div>
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
</div>

<?php require_once 'home/footer.php';?>