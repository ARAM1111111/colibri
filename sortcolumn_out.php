<?php 
$conn = mysqli_connect("Localhost",'root','','colibri');
$table = '';
$order = $_POST['order'];

if($order == 'desc'){
	$order = 'asc';
}else{
	$order = 'desc';
}
$query = "SELECT * FROM sort ORDER BY ".$_POST['column_name']." ".$_POST['order']."";
$result = mysqli_query($conn,$query);
$res = mysqli_fetch_all($result,MYSQLI_ASSOC);

$table.='<table class="table table-bordered">
	 
			<tr>
				<th>
					<a href="#" class="column_sort" id="id" data-order="'.$order.'">
						ID
					</a>
				</th>
				<th>
					<a href="#" class="column_sort" id="name" data-order="'.$order.'">
						NAME
					</a>
				</th>
				<th>
					<a href="#" class="column_sort" id="gender" data-order="'.$order.'">
						GENDER
					</a>
				</th>
				<th>
					<a href="#" class="column_sort" id="position" data-order="'.$order.'">
						POSITION
					</a>
				</th>
				<th>
					<a href="#" class="column_sort" id="age" data-order="'.$order.'">
						AGE
					</a>
				</th>
			</tr>';

			 foreach($res as $r){
	$table.='<tr>
				<td>'.$r['id'].' </td>
				<td>'.$r['name'].' </td>
				<td>'.$r['gender'].' </td>
				<td>'.$r['position'].' </td>
				<td>'.$r['age'].' </td>
			</tr>';
			}
	$table.='</table>';

echo $table;
?>