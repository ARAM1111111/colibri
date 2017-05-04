<?php 
$conn = mysqli_connect("Localhost","root","","colibri") or die("CANT CONNECT");
$sql = "SELECT * FROM crud1 ORDER BY id DESC";
$exec = mysqli_query($conn,$sql) or die("CANT EXECUTE SQL");
$res = mysqli_fetch_all($exec,MYSQLI_ASSOC);
$table = "<table class='table table-bordered' id='data-table'>";
	$table.=	"<thead><tr>
				<th width='10%'>Id</th>
				<th width='35%'>NAME</th>
				<th width='35%'>LNAME</th>
				<th width='20%'>EDIT | DELETE</th>
			</tr></thead>";
				$i=0;
				if(mysqli_num_rows($exec)>0){

				
					 foreach($res as $row){
					 $i++ ;
				$table.="<tr>
						<td data-id=".$row['id'].">$i</td> 
						<td id='oname' data-id=".$row['id']." contenteditable>".
							  $row['name'].
						"</td>
						<td id='olname' data-id=".$row['id']." contenteditable>"
							 .$row['lname']. 
						"</td>
						<td><button class='btn btn-warning' id='edit' data-id=".$row['id'].">EDIT</button>
						<button class='btn btn-danger' id='del' data-id=".$row['id'].">DELETE</button></td>

					</tr>";
					}
				}else{
				 
					$table.="<tr>
						<td colspan='4' class='alert-danger'>NO RESULT FOR SHOWING</td>
					</tr>";
				}
			$table.="<tr class='alert-warning' id='addtr'>
					<td></td>
					<td id ='name' contenteditable></td>
					<td id ='lname' contenteditable></td>
					<td><button class='btn btn-success' id='add'>+</button></td>
				</tr>";
		$table.="</table>";

echo $table;
?>