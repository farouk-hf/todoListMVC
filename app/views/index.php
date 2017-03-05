
<?php require_once 'home/header.php'; ?>

<div class="container">
	<br><br>
	<h2 class="page-header">ALL YOUR TODOS</h2>
	<p class="text-muted">Dont forget to check them!</p>
		<div class="row pull-right"> 
			<a id="viewBtn" href="" class="btn btn-success">View</a>
			<a id="editBtn" href="" class="btn btn-default">Edit</a>
			<a id="deleteBtn" href="" class="btn btn-danger">Delete</a>
		</div>
	<div if="tableContainer">
			<?php require_once 'todoTable.php'; ?>
	</div>
</div>

<?php require_once 'home/footer.php';?>