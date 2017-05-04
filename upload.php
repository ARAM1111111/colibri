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
	<title>UPLOAD</title>
</head>
<body>


	<div class="container" style="width:500px">
		<form id="submit_form" action="upload_proc.php"  method="POST">
			<div class="form-group">
				<label for="">SELECT IMAGE</label>
				<input type="file" name="file" id="image_file">
				<span class="help-block">Allowed file type</span>
			</div>
			<input type="submit" name="upl_button" class="btn btn-info" value="UPLOAD">
		</form>
		<br>
		<h3>IMAGE PREVIEW</h3>
		<div id="image_preview">
			
		</div>
	</div>
	

 <script>  
 $(document).ready(function(){  
      $('#submit_form').on('submit', function(e){  

           e.preventDefault();  
           $.ajax({  
                url:"upload_proc.php",  
                method:"POST",  
                data:new FormData(this),  
                contentType:false,  
                //cache:false,  
                processData:false,  
                success:function(data)  
                {  
                     $('#image_preview').html(data);  
                     $('#image_file').val('');  
                }  
           })  
      });  

      $(document).on('click', '#remove_button', function(){  
           if(confirm("Are you sure you want to remove this image?"))  
           {  
                var path = $('#remove_button').data("path");  
                $.ajax({  
                     url:"upload_proc.php",  
                     type:"POST",  
                     data:{path:path},  
                     success:function(data){  
                          if(data != '')  
                          {  
                               $('#image_preview').html('');  
                          }  
                     }  
                });  
           }  
           else  
           {  
                return false;  
           }  
      });  
 });  
 </script>  



</body>
</html>