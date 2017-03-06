<table class="table table-hover"> 
		
		<thead> 
			<tr> 
				<th>#</th> 
				<th>Title</th>
				<th>Priority</th> 
				<th>Due date</th> 
				<th></th> 
			</tr> 
		</thead> 
		<tbody>
			
<?php 

require_once 'todoTable.php';

$count = 0;
foreach ($data as $todo) {
	if(is_a($todo, 'Todo')){ 
?>
		<tr class="trow" id="<?=$todo->id?>">
			<th scope="row" id="id"><?=$count?></th> 
			<td><?=$todo->title?></td>
			<td><?=$todo->priority?></td>
			<td><?=$todo->due_date?></td>
		</tr>
<?php 
$count++;}
}

?>
	
		</tbody> 
	</table>
<?php 
	if(isset($data['notification'])){
		if($data['notification'] != ""){ ?>
		<div class="alert alert-success" id="alert" style="display: none;">
			<?=$data['notification']?>
			<button type="button" class="close" id="alertClose" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
		
<?php } 
	} ?>


