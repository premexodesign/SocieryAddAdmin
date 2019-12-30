<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

	<?php include('include/head.php'); ?>


	
		
		<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
<script>



</script>

<script type="text/javascript" src="jquery-1.2.6.min.js"></script>

<link rel="stylesheet" type="text/css" href="style.css" />

<SCRIPT type="text/javascript">




$(document).ready(function(){

$("#username").change(function() { 

var usr = $("#username").val();

if(usr.length >= 4)
{
$("#status").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');

    $.ajax({  
    type: "POST",  
    url: "check.php",  
    data: "username="+ usr,  
    success: function(msg){  
   
   $("#status").ajaxComplete(function(event, request, settings){ 

	if(msg == 'OK')
	{ 
        $("#username").removeClass('object_error'); // if necessary
		$("#username").addClass("object_ok");
		$(this).html('&nbsp;<img src="tick.gif" align="absmiddle">');
	}  
	else  
	{  
		$("#username").removeClass('object_ok'); // if necessary
		$("#username").addClass("object_error");
		$(this).html(msg);
	}  
   
   });

 } 
   
  }); 

}
else
	{
	$("#status").html('<font color="red">The username should have at least <strong>4</strong> characters.</font>');
	$("#username").removeClass('object_ok'); // if necessary
	$("#username").addClass("object_error");
	}

});

});


//-->
</SCRIPT>
</head>
<body>
	<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="login-box bg-white box-shadow pd-30 border-radius-5">
			<img src="images/logo1.png"   alt="login" class="login-img">
			<h2 class="text-center mb-30">Login</h2>
			<!--<form action="function.php" method="post">-->
			<form action="api/User/login.php" method="post">
				<div class="input-group custom input-group-lg">
					<input type="email" class="form-control" placeholder="Username" name="username">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="input-group custom input-group-lg">
					<input type="password" class="form-control" placeholder="**********" name="password">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="input-group">
							<!--
								use code for form submit
								<input class="btn btn-outline-primary btn-lg btn-block" type="submit" value="Sign In">
							-->
							<input type="hidden" name="reg" value="login" />
							<input type="submit" class="btn btn-outline-primary btn-lg btn-block" value='Sign In'>
						</div>
					</div>


					<div class="col-sm-6">
						<div class="forgot-password padding-top-10"><a href="forgot-password.php">Forgot Password</a></div>
					</div>
				</div>
				<div >
						<div ><a href="#" data-toggle="modal" data-target="#registration">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Registration</a></div>
					</div>

					<div class="social-or-login center">
												<span class="bigger-110">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Or Login Using</span>											</div>

											<div class="space-6"></div>

											<div class="social-login center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<a class="btn btn-primary">
													<i class="ace-icon fa fa-facebook"></i>												</a>

												<a class="btn btn-info">
													<i class="ace-icon fa fa-twitter"></i>												</a>

												<a class="btn btn-danger">
													<i class="ace-icon fa fa-google-plus"></i>												</a>											</div>
										</div>
			</form>



			<div class="modal fade" id="registration">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h2 class="modal-title"><span style="color:orange;font-family:'typo' "><fornt size=15>Register</font></span></h2>
      </div>
      <div class="modal-body title1">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<!--<form role="form" method="post" enctype="multipart/form-data" action="function.php">-->
<form action="api/User/signup.php"  role="form" method="post" enctype="multipart/form-data">
<section>
								
										<div class="form-group">
											
											<input type="text" class="form-control" name="username" id="username" placeholder="Username">
										</div>
								
										<div class="form-group">
											
											<input type="email" class="form-control" name="email" placeholder="Email">
										</div>
									
									
										<div class="form-group">
											
											<input type="password" class="form-control" name="password" placeholder="Password">
										</div>
									
										
										<div class="form-group">
											
											<input type="text" class="form-control" name="contact" placeholder="Contact Number">
										</div>
									
								
										<div class="form-group">
											
											<input type="text" class="form-control" name="address" placeholder="address">
										</div>
									
									
										<div class="form-group">
											
											<select class="custom-select form-control" name="usertype">
												<option >Select User Type</option>
												
												<option value='Seceratery'>Seceratery</option>
												<option value='member'>Member</option>
											</select>
										</div>
									
							</section>

							<section>
								
									
										<div class="form-group">
											<label>Select Profile Pics :</label>
											<input type="file" name="file" id="file" required/>
											 <img src="" id="profile-img-tag" width="100px" />

                                  			  <script type="text/javascript">
                                   				     function readURL(input) {
													if (input.files && input.files[0]) {
                                            		    var reader = new FileReader();
                                                
                                              		  reader.onload = function (e) {
                                               		     $('#profile-img-tag').attr('src', e.target.result);
                                              			  }
                                               			 reader.readAsDataURL(input.files[0]);
                                           				 }
                                       				 }
                                      		  $("#profile-img").change(function(){
                                          		  readURL(this);
                                       		 });
                                   			 </script>
										</div>
									
								
								
								
							</section>
<div class="form-group" align="center">
<input  type="hidden" name="reg" value="registartion" />
<input  type="submit" name="" value="Registration" />
</div>
</form>
</div><div class="col-md-3"></div></div>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
		</div>
	</div>
	<?php include('include/script.php'); ?>
</body>
</html>