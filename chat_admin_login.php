<?php 
session_start();
if(isset($_POST['user']) && isset($_POST['pass'])){
	if($_POST['user'] =='a' && $_POST['pass']=='1'){
		echo "+";
		$_SESSION['admin'] = $_POST['user'];
	}
	else{
		echo "wrong login or pass";
	}
	
}

if(isset($_POST['del'])){
	unset($_SESSION['admin']);
}







?>