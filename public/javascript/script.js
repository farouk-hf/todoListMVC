
$(document).ready(function(){
	console.log("loggen");

});

$(document).delegate('.trow', 'click', function(){
    $('.trow').removeClass("active");
	$(this).addClass("active");
	selected = $(this).attr('id');
	setButtonsLink(selected);
	console.debug(selected);
});

$('#closeButton').click(function(){
	$('#alert').hide('slow');
	console.log('closed');
});

var selected;

$('').click(function(){
	
});



$('#deleteBtn').click(function(){
	$.get('http://todoList/home/delete/'+selected, {} , function(data){
		$('#tableContainer').html(data);
	});
});

$("#searchBox").on("input", function() {
	if($(this).val().length > 0){
	   $.get('http://todoList/home/search/'+$(this).val(), {} , function(data){
			$('#tableContainer').html(data);
		});
   }
});




function fetchTodos(id){
	$.get('http://todoList/home/deleteById/'+id, {} , function(data){
		$('#tableContainer').load(data);
	});
}

function setButtonsLink(id){
	$('#viewBtn').attr('href' , 'http://todoList/viewTodo/index/'+id);
	$('#editBtn').attr('href' , 'http://todoList/editTodo/index/'+id);
}