
<?php require_once 'home/header.php'; ?>



<div class="container">
	<br><br>
	<h2 class="page-header">LATEST TODOS</h2>
	<table class="table"> 
		<caption>Optional table caption.</caption>
		<thead> 
			<tr> 
				<th>#</th> 
				<th>Title</th> 
				<th>Due date</th> 
				<th></th> 
			</tr> 
		</thead> 
		<tbody>
			<?php foreach ($data as $todo) { ?>
			<tr> 
				<th scope="row"><?=$todo->id?></th> 
				<td><?=$todo->title?></td> 
				<td>
					<a href="" class="btn btn-success">View</a>
					<a href="" class="btn btn-default">Edit</a>
					<a href="" class="btn btn-danger">Delete</a>
				</td> 
			</tr>
			<?php } ?>
		</tbody> 
	</table>
</div>

<?php require_once 'home/footer.php';?>