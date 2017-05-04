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
	form{float: left;width: 100%}
	img{margin-top: 20px;}
</style>
	<title></title>
</head>
<body>

<form  enctype="multipart/form-data" method="POST" id="upload" >
	<input type="file" name="file" id="file"/>
	
</form>

<script>

$(document).ready(function(){

	function filePreview(input){
	if(input.files && input.files[0]){
		//console.log(input.files[1]);
		var reader = new FileReader();
		reader.onload = function(e){
			$("#upload + img").remove();
			$("#upload").after('<img src="'+e.target.result+'" width="450" height="300">');
		}
		reader.readAsDataURL(input.files[0]);
	}
}	




	$('#file').change(function(event) {
	filePreview(this);
	});
})

</script>
</body>
</html>