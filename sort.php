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
	<title></title>
</head>
<body>

	




<script>

	var arr = [];

	for(var n =0;n<6;n++){
		arr.push(Math.floor(Math.random()*10));
	}
	var i,j,k,flag=true;

// for(j=0;j<arr.length;j++){
// 	for(i=0;i<arr.length-1;i++){
// 		if(arr[i]>arr[i+1]){
// 			k = arr[i];
// 			arr[i] = arr[i+1];
// 			arr[i+1]=k;
// 		}
// 	}
// }



// while(flag){
// 	flag =false;
// 	for(i=0;i<arr.length-1;i++){
// 		if(arr[i]>arr[i+1]){
// 			flag = true;
// 			k = arr[i];
// 			arr[i] = arr[i+1];
// 			arr[i+1] = k;
// 			flag = true;
// 		}
// 	}
// }

function mysort(arr){
	for(i=0;i<arr.length;i++){
		if(arr[i]>arr[i+1]){
			k = arr[i];
			arr[i] = arr[i+1];
			arr[i+1] = k;
			mysort(arr);
		}
	}
}

mysort(arr);

	console.log(arr);
</script>
</body>
</html>