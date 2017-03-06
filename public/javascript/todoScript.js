
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

$('#selectOrder').on('change', function() {
		console.log($(this).val()+'/');
  		$.get('http://todoList/home/getCurrentTodos/null/'+currentCount+'/'+$('#selectSort').val()+'/'+$('#selectOrder').val() , {} , function(data){
  			$('#tableContainer').html(data);
  		});
});
$('#selectSort').on('change', function() {
		console.log($(this).val()+'/');
  		$.get('http://todoList/home/getCurrentTodos/null/'+currentCount+'/'+$('#selectSort').val()+'/'+$('#selectOrder').val() , {} , function(data){
  			$('#tableContainer').html(data);
  		});
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


$('#deleteBtn').click(function(){
	$.get('http://todoList/home/delete/'+selected, {} , function(data){
		$('#tableContainer').html(data);
		$('#alert').fadeIn('slow');
		$('#alertClose').click(function(){
		$('#alert').hide('slow');
	});
	});
});

$('#viewBtn').click(function(){
	console.log('clicked');
	$.get('http://todoList/viewTodo/index/'+selected, {} , function(data){
		$('#container').html(data);
	});
});
/*
$('#editBtn').click(function(){
	console.log('clicked');
	$.get('http://todoList/editTodo/index/'+selected, {} , function(data){
		$('#container').html(data);
	});
});
*/

var currentCount = 0;
$('#nextArr').click(function(){
	if($('tbody').find('tr').length == 10){
		currentCount = currentCount +10;
		$.get('http://todoList/home/getCurrentTodos/Null/'+currentCount, {} , function(data){
			$('#tableContainer').html(data);
			console.log('got');
		});
		;
	}

	if($('tbody').find('tr').length < 10){
		$('#nextArr').attr('disabled','disabled');
	}
	$('#prevArr').removeAttr('disabled');
});

$('#prevArr').click(function(){
	if(currentCount>=10){
		currentCount = currentCount -10;
		$.get('http://todoList/home/getNextInList//'+currentCount, {} , function(data){
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