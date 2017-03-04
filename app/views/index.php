
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
			<?php 
			$current = 0;
			foreach ($data as $todo) { 
				if(!is_bool($todo) && !is_null($todo)){ 
			?>
			<tr>
				<th scope="row"><?=$todo->id?></th> 
				<td><?=$todo->title?></td>
				<td><?=$todo->due_date?></td>
				<td>
					<a href="" class="btn btn-success">View</a>
					<a href="" class="btn btn-default">Edit</a>
					<a href="" class="btn btn-danger">Delete</a>
				</td>
				
			</tr>
			<?php

				$current++;
				}
			}
			?>
		</tbody> 
	</table>
		<?php 
		if(isset($data['notification'])){
			if($data['notification']){
				echo '<div class="alert alert-success">Todo sucessfully added!</div>';
			}
		}
	?>
</div>

<?php require_once 'home/footer.php';?>