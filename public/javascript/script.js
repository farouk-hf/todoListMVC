
$(document).ready(function(){
	fetchTodos();
	console.log("loggen");
});

$('#closeButton').click(function(){
	$('#alert').hide('slow');
	console.log('closed');
});

var selected;

$('.trow').click(function(){
	$('.trow').removeClass("active");
	$(this).addClass("active");
	selected = $(this).attr('id');
	setButtonsLink(selected);
	console.debug(selected);
});

function setButtonsLink(id){
	$('#viewBtn').attr('href' , 'http://todoList/viewTodo/index/'+id);
	$('#editBtn').attr('href' , 'http://todoList/editTodo/index/'+id);
}

$('#deleteBtn').click(function(){
	$.get('http://todoList/home/delete/'+selected, {} , function(data){
		$('#tableContainer').load(data);
	});
});

function fetchTodos(){
	$.get('http://todoList/home/deleteById/'+selected, {} , function(data){
		$('#tableContainer').load(data);
	});
}