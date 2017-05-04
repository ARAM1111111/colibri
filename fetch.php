<?php  
$conn = mysqli_connect("Localhost",'root','','colibri');
$search = $_POST['search'];
$sql = "SELECT * FROM sort WHERE name LIKE '%$search%'";
$result = mysqli_query($conn,$sql);
$table = "";
if(mysqli_num_rows($result)>0){
	$table.='<h4 align="center">Search Result</h4>
				<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<th>NAME</th>
							<th>GENDER</th>
							<th>POSITION</th>
							<th>AGE</th>
						</tr>';
			foreach ($result as $key => $row) {
				$table.='<tr>
							<td>'.$row['name'].'</td>
							<td>'.$row['gender'].'</td>
							<td>'.$row['position'].'</td>
							<td>'.$row['age'].'</td>
						</tr>';
			}

			$table.='</table></div>';
			echo $table;
}
else
{
	echo "Data Not Found";
}
$table="";




?>