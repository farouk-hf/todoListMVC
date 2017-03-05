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
	if(!is_bool($todo) && !is_null($todo)){ 
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
<?php if(isset($data['notification'])){ ?>
		<div class="alert alert-success" id="alert" style="display: none;">
			<?=$data['notification']?>
			<button type="button" class="close" id="closeButton" aria-label="Close"><span aria-hidden="true">x</span></button>
		</div>
		
<?php	}?>


