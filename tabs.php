<?php
$conn = mysqli_connect("localhost","root","","colibri");
$sql = "SELECT * FROM category ORDER BY category_id ASC";
$query = mysqli_query($conn,$sql);
$categ = mysqli_fetch_all($query,MYSQLI_ASSOC);
$con = "";
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
		<?php foreach ($categ as $k => $c):?>
			<li class="<?php echo ($k==0)?"active":" " ?>">
				<a href="#<?php echo $c['category_id'] ?>" data-toggle="tab">
				<?php echo $c['category_name'] ?></a>
			</li>
		<?php
			if($k == 0)
			{
				$con.= '<div id="'.$c['category_id'].'" class="tab-pane fade in active">';
			}
			else
			{
				$con.= '<div id="'.$c['category_id'].'" class="tab-pane fade">';
			}

			$sql2 = "SELECT * FROM product WHERE category_id='".$c['category_id']."'";
			$query2 = mysqli_query($conn,$sql2);
			$product = mysqli_fetch_all($query2,MYSQLI_ASSOC);

			foreach ($product as $p) {
				$con.='<div class="col-md-3" style="margin-bottom:36px;">
							<img src="img/'.$p['product_img'].'" class="img-responsive img-thumbnail" />
							<h4>'.$p["product_name"].'</h4>
						</div>';
			}
			$con.='<div style="clear:both"></div></div>';
		?>	
		<?php endforeach ?>
		</ul>
	<div class="tab-content">
	 	<?php echo $con ?>
	</div>
</div>






</body>
</html>