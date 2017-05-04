<?php 
$conn = mysqli_connect("Localhost",'root','','colibri') or die("CANT CONNECT");
// $sql = "SELECT * FROM chat WHERE status=1";
// $query = mysqli_query($conn,$sql);
// $res = $res = mysqli_fetch_all($query,MYSQLI_ASSOC);
if(isset($_POST['action'])){
	if($_POST['action'] == "edit"){
		$id = $_POST['id'];
		$sql = "UPDATE chat SET status=1 WHERE id='$id'";
	}

	if($_POST['action'] == "del"){
		$id = $_POST['id'];
		$sql = "DELETE FROM chat WHERE id='$id'";
	}

	$query = mysqli_query($conn,$sql);
}

?>