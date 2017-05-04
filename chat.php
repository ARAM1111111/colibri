<?php
session_start();
$conn = mysqli_connect("Localhost",'root','','colibri') or die("CANT CONNECT");
$sql = "SELECT * FROM chat WHERE status=1";
$query = mysqli_query($conn,$sql);
$res = $res = mysqli_fetch_all($query,MYSQLI_ASSOC);
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
	
</style>
	<title>CHAT</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> Chat.
                    <button class="btn-sm btn btn-default" id="sname">BY NAME</button>
                    <button class="btn-sm btn btn-success">BY EMAIL</button>
                    <button class="btn-sm btn btn-warning" id="sdata">BY DATA</button>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </button>
                        <ul class="dropdown-menu slidedown">
                            <li id="admin" data-toggle="modal" data-target="#login-modal"><a href="#" ><span class="glyphicon glyphicon-user">
                            </span>Admin</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="chat">
                  <?php foreach($res as $k=>$r): ?>
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <!-- <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" /> -->
                            <img src="img/<?php echo $r['img'] ?>" width="50px" alt="">
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font"><?php echo $r['name'] ?><br><?php echo $r['email'] ?></strong> 

                                    <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>  <?php
                                        $d=strtotime($r['data']);
                                         echo date("H:i:s",$d) ?>   
                                    </small>
                                </div>
                                <p><?php echo $r['comm'] ?></p>               
                            </div>
                        </li>
                  <?php endforeach ?>
                    </ul>
                </div>
                <div class="panel-footer">

<div class="input-group">			
	<form  enctype="multipart/form-data" method="POST" action="chat_proc.php" id="upload" class="form-control" style="height: 140px;">	
			<div class="input-group col-md-12">
                <input id="btn-input" type="text" name="comm" class="form-control input-sm" placeholder="Type your message here..." /> 
            </div>           
            <div class="input-group">
				
               <input id="btn-name" type="text" name="name" class="form-control input-sm" placeholder="Your Name..." />
                <input id="btn-email" type="email" name="email"  class="form-control input-sm" placeholder="Your Email..." />   
            </div>
            <div class="input-group">    
				<input type="file" name="file" id="file" class="col-md-9" />
				<input type="submit" class="btn btn-success col-md-3" name="submit" value="SEND"> 				
            </div>
	</form>
</div>
<div class="clearfix"></div>	
			<span class="input-group-btn">
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal" id="btn-prev">
                        Previev</button>
             </span>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">

        <div class="col-md-6">
        	 <p>CHAT</p>
        <p>NAME:<b id="mname"></b><br/>EMAIL :<b id="memail"></b></p>
        <p>
			<textarea name="comment" id="comment" cols="30" rows="5" placeholder="COMMENT ..."></textarea>
        </p>
        </div>
		<div id="mimg" class="pull-right col-md-6"><img src="" alt="" width="250px"></div>
		<div class="clearfix"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!-- modal login -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
        <div class="loginmodal-container">
          <h1>Login to Your Account</h1><br>
          <form>
          <input type="text" id="user" placeholder="Username">
          <input type="password" id="pass" placeholder="Password">
          <input type="submit" id="login" class="login loginmodal-submit" value="Login">
          </form>
          
          <div class="login-help">
          </div>
        </div>
      </div>
      </div>



<!--end login  -->








<div id="aaa"><?php 
if(isset($_SESSION['msg']) && !empty($_SESSION['msg'])){
  $msg = $_SESSION['msg'];
    echo $msg;
}
    
 ?></div>


<script>
$(document).ready(function(){

//================= REVIEW IMAGE FUNCTION ============
function filePreview(input){
	if(input.files && input.files[0]){
		
		var reader = new FileReader();
		reader.onload = function(e){
			var img = $("#mimg");
			img.html('<img src="'+e.target.result+'" width="250" height="200">');
		}
		reader.readAsDataURL(input.files[0]);
	}
}

//===================================================


//================ POPUP IN SHOW WRITTEN ===================
$('#file').change(function(event) {
	filePreview(this);
	});


$("#btn-prev").on('click',function(){
	var comm = $("#btn-input").val();
	var email = $("#btn-email").val();
	var name = $("#btn-name").val();
	
	$("#mname").html(name);
	$("#memail").html(email);
	$("#comment").html(comm);

})

// ==========================================================


//====================== SEND INFO TO PHP ====================
	
	

	 // $("#submit_form").on('submit', function(e){
	 // 	e.preventDefault();  
	 // 	var formdata = new FormData(this);
	 // 	var comm = $("#btn-input").val();
		// var email = $("#btn-email").val();
		// var name = $("#btn-name").val();
	 	 
  //          $.ajax({  
  //               url:"chat_proc.php",  
  //               method:"POST",  
  //               // data:{'file':formdata,'name':name,'email':email,'comm':comm},
  //               data:new FormData(this),
  //               contentType:false,  
  //               cache:false,  
  //               processData:false,  
  //               success:function(data)  
  //               {  
  //               	$('#aaa').html(data);
  //                    // $('#image_preview').html(data);  
  //                    // $('#image_file').val('');  
  //                    console.log(data);
  //               }  
  //          })

	 // })



//=============================================================


// =============================== ADMIN ============================
$("#login").on('click',function(e) {
    e.preventDefault();
    
    var user = $("#user").val();
    var pass = $("#pass").val();
    // console.log(user);
   $.post('chat_admin_login.php',{'user':user,'pass':pass}, function(d) {
      if(d=="+"){
          location.href = 'chat_admin.php';
      }
      else $(".login-help").html(d);
    });
   
});


// ===================================================================

//================ SORT ==========================
  $("#sdata").on('click',function(){
    var mylist = $("ul");
    var d = mylist.children('li.left').children('div').children('div').children('small');
    var listitems = mylist.children('li.left').get();
    var l = d.get();


// listitems.sort(function(a, b) {
//    return $(a).text().toUpperCase().localeCompare($(b).text().toUpperCase());
// });

// $.each(listitems, function(index, item) {
//    mylist.append(item); 
// });

l.sort(function(a, b) {
   return -$(a).text().toUpperCase().localeCompare($(b).text().toUpperCase());
});

$.each(l, function(index, item) {
   // mylist.append(item); 
    //l[index].innerHTML = item.innerText; 
    
  //console.log(index+"::"+item.innerText);
  $('ul>li small').eq(index).text(item.innerText);
  console.log($('ul>li small').eq(index).html(item.innerText));
});

   //console.log(l);
  })


//===============================================


})
</script>
</body>
</html>