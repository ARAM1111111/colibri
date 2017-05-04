<?php
session_start();
if(!isset($_SESSION['admin'])) header('Location:chat.php');

// print_r($res);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="chat.css">
  <link rel="stylesheet" href="login.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style>
  td,th{
    text-align: center;
    border: 1px solid black;
  }
</style>
	<title>CHAT</title>
</head>
<body>
<div class="container">
  <div class="row">
    <button type="button" id="out" class="btn btn-danger">LOGOUT</button>
  </div>
  <div class="row">
    <div class="table-responsive">
      
    </div>
  </div>
</div>





<script>
  $(document).ready(function(){

//======== LOGOUT ================
$('#out').on('click',function(event) {
  $.post('chat_admin_login.php', {'del':'del'}, function(d) {
      location.href = 'chat.php';
  });
});
//===============================

// ============= Function Reload Page ================
function reload(){
  $.post('chat_admin_proc.php', function(data) {
      $(".table-responsive").html(data);
  });
}
//======================================================
reload();

//======================= + ==========================
  $(document).on('click',"#edit",function(){
    var id = $(this).attr('data-id');
    $.post('chat_admin_edit.php', {action: 'edit',id:id}, function(data){
        reload();
    });
  })

//====================================================


//======================= DELETE ====================
$(document).on('click',"#del",function(){
    var id = $(this).attr('data-id');
    $.post('chat_admin_edit.php', {action:'del',id:id}, function(data){
        reload();
    });
  })
//====================================================

});
</script>
</body>
</html>