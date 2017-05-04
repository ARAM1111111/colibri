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

var arr = [8,2,6,8,1];
var i,j,k;len = arr.length;
// for(var a=0;a<6;a++){
// 	arr.push(Math.floor(Math.random()*10));
// }

for(i=1;i<len;i++){
	
	for(j=i;j>0 && arr[j-1]>arr[j];j--){
			k = arr[j-1];
			arr[j-1] = arr[j];
			arr[j] = k;
	}


	//k = arr[i];
	// for(j=i-1;j >= 0 && arr[j]>k;j--){
	// 		// k = arr[j-1];
	// 		arr[j+1] = arr[j];	
	// }
	// arr[j+1] = k;

}

	console.log(arr);

</script>
</body>
</html>