<?php 
$conn = mysqli_connect("Localhost","root","","colibri");
$number = count($_POST['name']);
//$str = $_POST['name']; 
//$ins = preg_match('/^=a-z$&/i', $str,$arr);
// print_r($arr);

// echo trim($_POST['name']);
// if($number>0){
// 	for($i=0;$i<$number;$i++){
// 		if(trim($_POST["name"]) != "")
// 		{
// 			$sql = "INSERT INTO input(name) VALUES('".mysqli_real_escape_string($conn,$_POST["name"][$i])."')";
// 			mysqli_query($conn,$sql);
// 		}
// 	}

// 	echo $sql;
// }
// else{
// echo "ENTER NAME";
// }





?>