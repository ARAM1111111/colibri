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
	td{
		text-align: center;
		border: 1px solid black;
	}
</style>
	<title></title>
</head>
<body>
	<div class="container">
		<br>
		<br>
		<h2>Dynimac Add Remove Input fields</h2>
		<div class="form-group">
			<form action="" name="add_name" id="add_name">
				<table class="table table-bordered" id="dynamic_field">
					<tr>
						<td><input type="text" name="name[]" id="name" placeholder="Enter Name"></td>
						<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
					</tr>
				</table>
				<input type="button" name="submit" id="submit" value="Submit">
			</form>
		</div>
	</div>
	<div class="r"></div>
	<button class="bb" type="button">B</button>

<script>
$(document).ready(function(){
	var i = 1;
	$('#add').click(function(event) {
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" id="name" placeholder="Enter Name"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});

	$(document).on('click','.btn_remove',function(e){
		// e.preventDefault();
		var button_id = $(this).attr('id');
		$("#row"+button_id+"").remove();
	})

	$("#submit").click(function(event) {
		
		// $('.r').html($('#add_name').serialize());

		$.post('input_php.php',{name:$("#add_name").serialize()},function(d){
			console.log(d);
			//$("#add_name")[0].reset();

		});




	});

	





})	
</script>





</body>
</html>