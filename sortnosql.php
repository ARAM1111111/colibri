<?php
$conn = mysqli_connect("Localhost",'root','','colibri');
$query = "SELECT * FROM sort ";
$result = mysqli_query($conn,$query);
$res = mysqli_fetch_all($result,MYSQLI_ASSOC);

 
// echo "<pre>";
// print_r($res)
?>
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
	<br>
	<div class="container" style="width:700px;" align="center"> 
		<h3 class="text-center">Ajax Jqury Column Sort With Php & Mysql</h3>
		<br>
		<div id="main_table">
		 <table class="table table-bordered">
			<tr>
				<th>
					<a href="#" class="column_sort" id="id" data-order="asc">
						ID
					</a>
				</th>
				<th>
					<a href="#" class="column_sort" id="name" data-order="asc">
						NAME
					</a>
				</th>
				<th>
					<a href="#" class="column_sort" id="gender" data-order="asc">
						GENDER
					</a>
				</th>
				<th>
					<a href="#" class="column_sort" id="position" data-order="asc">
						POSITION
					</a>
				</th>
				<th>
					<a href="#" class="column_sort" id="age" data-order="asc">
						AGE
					</a>
				</th>
			</tr>
			<?php foreach($res as $r): ?>
			<tr>
				<td><?php echo $r['id'] ?></td>
				<td><?php echo $r['name'] ?></td>
				<td><?php echo $r['gender'] ?></td>
				<td><?php echo $r['position'] ?></td>
				<td><?php echo $r['age'] ?></td>
			</tr>
			<?php endforeach ?>
			</table>
		</div>

	</div>
	<br>
<script>
$(document).ready(function(){
	$(document).on('click', '.column_sort', function(event) {
		event.preventDefault();
		var column_name = $(this).attr("id");
		var order = $(this).data("order");
		var arrow = '';
		console.log(order);
		if(order == 'desc'){
			arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-up"></span>';
		}
		else
		{
			arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-down"></span>';
		}	

		$.ajax({
			url:"sortnosql_proc.php",
			type:"POST",
			data:{column_name:column_name,order:order},
			success:function(d){
				$("#main_table").html(d);
				$("#"+column_name+"").append(arrow);
			}
		})
	});




})
</script>	
</body>
</html>