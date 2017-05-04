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
	.highlight{
		background-color: black;
		color: white;
	}
</style>
	<title>SEARCH JS</title>
</head>
<body>
	<div class="container">
		<div class="row ">
			<input type="text" id="search"><button class="btn btn-success" id="find">SEARCH</button>
		</div>
		<div class="row text">
		<br><br><br>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi nihil esse magnam, nulla voluptas dolorem, nam, accusantium at nesciunt ratione sequi eligendi consequatur laborum illo sit, a temporibus suscipit nostrum.</p>
		</div>
	</div>

<script>
	$(document).ready(function(){
		$("#search").keyup(function(event) {
			var text = $(".text").text();
			var searchtext = $(this).val();
			var reg = new RegExp(searchtext,"ig");
			var matches = text.match(reg);

			$("p").html(text.replace(reg,function(match){
				return "<span class='highlight'>"+match+"</span>";
			}))
			// $("p").html(text.replace(reg,"<span class='highlight'>"+searchtext+"</span>"));
		});

		// =======================================
		// 			SEARCH BUTTON
		// =======================================

		// $(document).on('click','#find',function(event) {
		// 	var text = $(".text").text();
		// 	var search = $('#search').val();
		// 	var reg = new RegExp(search,"ig");
		// 	var matches = text.match(reg);
		// 	console.log(matches);
		// 	if(matches){
		// 		$("p").html(text.replace(reg,"<span class='highlight'>"+$('#search').val()+"</span>"));
		// 	}
		// });

	});
</script>	
</body>
</html>

