<?php
require ('../Connections/laboratory.php');
// require_once('Connections/functions.php');
session_start();

if (isset($_POST['submit']))
	{
		$newpass = md5($_POST["newpass"]);
		$confrmpass = md5 ($_POST["confrmpass"]);
		$staffid = $_GET["staffid"];
		
		if($newpass != $confrmpass)
		{
			print "<script type=\"text/javascript\">";
			print "alert('The new passwords must match and must not be empty.')";
			print "</script>";
		}
		
		else 
		{
			$update = "UPDATE staff SET password = '$confrmpass' WHERE staffID = '$staffid'";
			$resetpass = mysql_query ($update);
			
			if($resetpass)
			{
				print "<script type=\"text/javascript\">";
				print "alert('Update Successful'),location.href='loginStaff.php'";
				print "</script>";
				
			}
		}
	}	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reset Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-49">NEW PASSWORD</span>

					<p>In the fields below, enter your new password :</p>
					<br>

					<div class="wrap-input100 validate-input" data-validate="New Password is required">
						<span class="label-input100">New Password</span>
						<input class="input100" type="password" name="newpass" placeholder="Enter your new password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					<br>

					<div class="wrap-input100 validate-input" data-validate="Confirm Password is required">
						<span class="label-input100">Confirm Password</span>
						<input class="input100" type="password" name="confrmpass" placeholder="Enter your confirm password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					<br>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="submit">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>