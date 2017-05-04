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
	<title>Ajax live data search</title>
</head>
<body>
	<div class="container">
		<br>
		<h2 align="center">Ajax live data search</h2>
			<div class="form-group" ><span class="input-group-addon">SEARCH</span>
			<input type="text" name="search_text" id="search_text" placeholder="Search by Name" class="form-control">
		</div>
	</div>
	<br>
	<div id="result"></div>




<script>
$(document).ready(function(){
	$("#search_text").keyup(function(event) {
		var txt = $(this).val();
		if(txt != '')
		{
			$.ajax({
				url:'fetch.php',
				type:"POST",
				data:{search:txt},
				success:function(d){

					$("#result").html(d);
				}
			})
		}
		else
		{
			$("#result").html(" ");
		}
	});
})	
</script>
</body>
</html>