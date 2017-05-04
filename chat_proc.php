<?php 
session_start();
$conn = mysqli_connect("Localhost",'root','','colibri') or die("CANT CONNECT");

if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$comm = $_POST['comm'];
	// SECURITI CODE


	$imgfolder = 'img/'. basename($_FILES['file']['name']);
	$file_name = basename($_FILES['file']['name']);
	$tmp = $_FILES['file']['tmp_name'];
	// header('Location:chat.php');
	if(move_uploaded_file($tmp,$imgfolder)){
		$sql = "INSERT INTO chat(name,email,img,comm,status) VALUES('$name','$email','$file_name','$comm',0)";
		if(mysqli_query($conn,$sql)){
			$_SESSION['msg'] = "SPASEQ ADMINI VOROSHMAN@";
			header('Location:chat.php');
		}
	}
}




?>