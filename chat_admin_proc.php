<?php 
$conn = mysqli_connect("Localhost","root","","colibri") or die("CANT CONNECT");
$sql = "SELECT * FROM chat WHERE status=0 ORDER BY id DESC";
$exec = mysqli_query($conn,$sql) or die("CANT EXECUTE SQL");
$res = mysqli_fetch_all($exec,MYSQLI_ASSOC);
$table = "<table class='table table-bordered'>";
	$table.=	"<tr>
				<th width=''>IMG</th>
				<th width=''>NAME</th>
				<th width=''>EMAIL</th>
				<th width=''>COMM</th>
				<th width=''>STATUS</th>
				<th width=''>DATA</th>
				<th width=''>+</th>
				<th width=''>DELETE</th>
			</tr>";
				
				if(mysqli_num_rows($exec)>0){

				
					 foreach($res as $row){
					 
				$table.="<tr>
						<td id='oimg' data-id=".$row['id'].">".
							  '<img src="img/'.$row['img'].'" width="30px" alt="">'.
							  
						"</td>
						<td id='oname' data-id=".$row['id'].">".
							  $row['name'].
						"</td>
						<td id='oemail' data-id=".$row['id'].">"
							 .$row['email']. 
						"</td>
						<td id='ocomm' data-id=".$row['id'].">"
							 .$row['comm']. 
						"</td>
						<td id='ostatus' data-id=".$row['id'].">"
							 .$row['status']. 
						"</td>
						<td id='oemail' data-id=".$row['id'].">"
							 .$row['data']. 
						"</td>
						<td><button class='btn btn-warning' id='edit' data-id=".$row['id'].">+</button>
						</td>
						<td><button class='btn btn-danger' id='del' data-id=".$row['id'].">DELETE</button></td>
					</tr>";
					}
				}else{
				 
					$table.="<tr>
						<td colspan='8' class='alert-danger'>NO RESULT FOR SHOWING</td>
					</tr>";
				}
		$table.="</table>";

echo $table;
?>