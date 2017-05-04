<?php 
$conn = mysqli_connect("Localhost","root","","colibri") or die("CANT CONNECT");

if(isset($_POST['name']) && isset($_POST['lname'])){
	$name = $_POST['name'];
	$lname = $_POST['lname'];
	$sql = "INSERT INTO crud1(name,lname) VALUES('$name','$lname')";
}

if(isset($_POST['action']) && $_POST['action']=='del'){
	$del_item = $_POST['del_item'];
	$sql = "DELETE FROM crud1 WHERE id='$del_item'";
}

if(isset($_POST['action']) && $_POST['action']=='edit'){
	$edit_item = $_POST['edit_item'];
	$name = $_POST['name'];
	$lname = $_POST['lname'];
	echo $sql = "UPDATE  crud1 SET name='$name',lname='$lname' WHERE id=$edit_item";
}


mysqli_query($conn,$sql);




?>