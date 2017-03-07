<?php require_once 'home/header.php'; ?>

	<h2 class="page-header">TODO : <?=$data->title?></h2>
	<p class="text-muted">Your can view this todo here.</p>
	<ul class="list-group">
		<li class="list-group-item">
			<div class="form-group" style="margin-bottom:15px">
		    <h4 class="mb-1">Title</h4>
		    <p class="text-muted"><?=$data->title?></p>
			</div>
		</li>
		<li class="list-group-item">
			<div class="form-group" style="margin-bottom:15px">
			<h4 class="mb-1">Priority</h4>
			<p class="text-muted"><?=$data->priority?></p>
			</div>
		</li>
		<li class="list-group-item">
			<div class="form-group" style="margin-bottom:15px">
		    <h4 class="mb-1">Description</h4>
		    <p class="text-muted"><?=$data->description?></p>
			</div>
		</li>
		<li class="list-group-item">
			<div class="form-group" style="margin-bottom:15px">
		    <h4 class="mb-1">Due date</h4>
		    <p class="text-muted"><?=$data->due_date?></p>
			</div>
		</li>
		</ul>


<?php require_once 'home/footer.php';?>