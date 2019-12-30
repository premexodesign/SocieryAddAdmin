<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
	<?php
session_start();
$code=$_SESSION['code'];
?>

	
</head>
<body>
	<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="login-box bg-white box-shadow pd-50 border-radius-5">
			<img src="images/Logo250X81.png"   alt="login" class="login-img">
			
			<!--<h2 class="text-center mb-30">Please check Your Mail</h2>-->
			<h2 class="text-center mb-30">Please Enter code below<?php echo $code ?></h2>
			<form action="function.php" method="post">
				<div class="input-group custom input-group-lg">
					<input type="text" class="form-control" placeholder="Enter code" name="usercode">
					<div class="input-group-append custom">
						<span class="input-group-text"></span>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-6">
						<div class="input-group">
							<!--
								use code for form submit
								<input class="btn btn-outline-primary btn-lg btn-block" type="submit" value="Sign In">
							-->
							<input type="hidden" name="reg" value="verify" />
							<input type="submit" class="btn btn-outline-primary btn-lg btn-block" value='Verify'>
						</div>
					</div>


					
			</form>



			
	<?php include('include/script.php'); ?>
</body>
</html>