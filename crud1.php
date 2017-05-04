
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style>
	td,th{
		text-align: center;
		border: 1px solid black;
	}
</style>
	<title></title>
</head>
<body>
<?php

?>	

<div class="table-responsive"></div>
		

		




<script>
$(document).ready(function(){

	function reload(){
		$.post('select.php', function(data) {
				$('.table-responsive').html(data);
		});
	}

	reload();

	$(document).on('mouseenter',"#name",function(event){
			if($(this).text() == "")
			$(this).text(" New Name");
	}).on('mouseleave', '#name', function( event ) {
   			if($(this).text() == " New Name")
			 $(this).text("");
		else{
			$("#name").addClass('alert-success');
		}	
});

	$(document).on('mouseenter',"#lname",function(event){
			if($(this).text() == "")
			$(this).text(" New Lname");
	}).on('mouseleave', '#lname', function( event ) {
   			if($(this).text() == " New Lname")
			 $(this).text("");
		else{
			$("#lname").addClass('alert-success');
		}	
});
    
   
	$(document).on('click', '#add', function() {
		var name = $("#name").text();
		var lname = $("#lname").text();
		
		if(name == "" || lname == ""){ return false;}

		$.ajax({
			url:"insert.php",
			type:"POST",
			data:{name:name,lname:lname},
			success:function(d){
				reload();
				//location.reload();
			}
		})
	});

	$(document).on('click', '#del', function(event) {
		var del_item = $(this).attr('data-id');
		//console.log($(this).attr('data-id'));
		$.post('insert.php', {action: 'del',del_item:del_item}, function(data) {
				reload();
		});
	});




	$(document).on('click','#edit',function(){
	var edit_item = $('#edit').attr('data-id');
	var name = $("#oname").text();
	var lname = $("#olname").text();
	$.post('insert.php',{action:'edit',edit_item:edit_item,name:name,lname:lname},function(d){
			reload();
		//console.log(edit_item);
	});

	});


});






</script>
</body>
</html>