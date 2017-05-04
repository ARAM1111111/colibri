<?php
$conn = mysqli_connect("localhost","root","","colibri");
$sql = "SELECT * FROM category ORDER BY category_id ASC";
$res = mysqli_query($conn,$sql);
$tab_menu="";
$count=0;
$tab_content = '';
while ($row=mysqlI_fetch_array($res))
{
	if($count == 0)
	{
		$tab_menu .='<li class="active">
			<a href="#'.$row["category_id"].'" data-toggle="tab">'.$row['category_name'].'</a></li>';
		$tab_content.='
			<div id="'.$row['category_id'].'" class="tab-pane fade in active">
		';
	}
	else
	{
		$tab_menu .='<li>
			<a href="#'.$row["category_id"].'" data-toggle="tab">'.$row['category_name'].'</a></li>';
		$tab_content.='
			<div id="'.$row['category_id'].'" class="tab-pane fade">
		';
	}
	$product_query = "SELECT * FROM product WHERE category_id='".$row['category_id']."'";
	$product_res = mysqli_query($conn,$product_query);
	while($sub_row = mysqlI_fetch_array($product_res))
	{
		$tab_content.='
			<div class="col-md-3" style="margin-bottom:36px;">
			<img src="img/'.$sub_row['product_img'].'" class="img-responsive img-thumbnail" />
			<h4>'.$sub_row["product_name"].'</h4>
		</div>';
	}
	$tab_content .= '<div style="clear:both"></div></div>';
	$count++;
}

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
	td{
		text-align: center;
		border: 1px solid black;
	}
</style>
	<title>Dynamic tabs</title>
</head>
<body>
	<div class="container">
		<h2 align="center">Dynamic tabs</h2>
		<br/>
		<ul class="nav nav-tabs">
			<?php echo $tab_menu ?>
		</ul>
		<div class="tab-content">
			<?php echo $tab_content ?>
		</div>
	</div>
</body>
</html>