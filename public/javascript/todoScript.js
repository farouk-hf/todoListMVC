
$(document).ready(function(){
	console.log("loggen");
	if($('tbody').find('tr').length < 10){
		$('#nextArr').attr("disabled", "disabled");
	}
	$('#alert').fadeIn('slow');
	$('#alertClose').click(function(){
		$('#alert').hide('slow');
	});
	
});

/**
* sends a get request to the server when the selectbox order is changed.
*/
$('#selectOrder').on('change', function() {
		console.log($(this).val()+'/');
  		$.get('http://todoList/home/getCurrentTodos/null/'+currentCount+'/'+$('#selectSort').val()+'/'+$('#selectOrder').val() , {} , function(data){
  			$('#tableContainer').html(data);
  		});
});

/**
* sends a get request to the server when the selectbox sort is changed.
*/
$('#selectSort').on('change', function() {
		console.log($(this).val()+'/');
  		$.get('http://todoList/home/getCurrentTodos/null/'+currentCount+'/'+$('#selectSort').val()+'/'+$('#selectOrder').val() , {} , function(data){
  			$('#tableContainer').html(data);
  		});
});

/**
* highlights the cliqued row on the table
*/
$(document).delegate('.trow', 'click', function(){
    $('.trow').removeClass("active");
	$(this).addClass("active");
	selected = $(this).attr('id');
	setButtonsLink(selected);
	console.debug(selected);
});

/**
* close button of the notification
*/
$('#closeButton').click(function(){
	$('#alert').hide('slow');
	console.log('closed');
});

/**
* stores the id of the selected todo.
*/
var selected;

/**
* on click listener for the delete button to send a get request to delete the selected todo
*/
$('#deleteBtn').click(function(){
	$.get('http://todoList/home/delete/'+selected, {} , function(data){
		$('#tableContainer').html(data);
		$('#alert').fadeIn('slow');
		$('#alertClose').click(function(){
		$('#alert').hide('slow');
	});
	});
});

/**
* on click listener for the view button to send a get request to render the view of the selected todo
*/
$('#viewBtn').click(function(){
	console.log('clicked');
	$.get('http://todoList/viewTodo/index/'+selected, {} , function(data){
		$('#container').html(data);
	});
});

/**
* current page count
*/
var currentCount = 0;

/**
* on click listener to loads the next 10 todos
*/
$('#nextArr').click(function(){
	if($('tbody').find('tr').length == 10){
		currentCount = currentCount +10;
		$.get('http://todoList/home/getCurrentTodos/NULL/'+currentCount, {} , function(data){
			$('#tableContainer').html(data);
			console.log('got');
		});
		;
	} else {
		$('#nextArr').attr('disabled','disabled');
	}

	if($('tbody').find('tr').length < 10){
		$('#nextArr').attr('disabled','disabled');
	}
	$('#prevArr').removeAttr('disabled');
});

/**
* on click listener to loads the previous 10 todos
*/
$('#prevArr').click(function(){
	if(currentCount>=10){
		currentCount = currentCount -10;
		$.get('http://todoList/home/getCurrentTodos/NULL/'+currentCount, {} , function(data){
			$('#tableContainer').html(data);
		});
		if(currentCount<=10){
			$('#prevArr').attr('disabled','disabled');
		}
		console.log('count : '+currentCount);
	}
	console.log('count : '+currentCount);
	$('#nextArr').removeAttr('disabled');
});

/**
* on change listener for the search box to load the todos containing the given key
*/
$("#searchBox").on("change", function() {
	if($(this).val().length > 0){
	   $.get('http://todoList/home/search/'+$(this).val(), {} , function(data){
			$('#tableContainer').html(data);
		});
   }
});