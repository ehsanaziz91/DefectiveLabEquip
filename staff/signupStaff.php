<?php
require_once ('../Connections/laboratory.php');
// require_once('Connections/functions.php');
session_start();

if (isset($_POST['signup']))
	{
	$rstaffid = $_POST['rstaffid'];
	$fullname = $_POST['fullname'];
	$rpass = md5($_POST['rpassword']);
	$position = $_POST['position'];
	$question = $_POST['question'];
	$answer = $_POST['answer'];
	$sql = mysql_query("INSERT INTO staff (staffID, staffName, password, position, recoQuestion1, recoAnswer1) 
  		VALUES ('$rstaffid', '$fullname', '$rpass', '$position', '$question', '$answer')");

	if ($sql)
		{
		print "<script type=\"text/javascript\">";
		print "alert('Successfully Registered'),location.href='loginStaff.php'";
		print "</script>";
		}
	  else
		{
		print "<script type=\"text/javascript\">";
		print "alert('Problem Occured')";
		print "</script>";
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Staff Signup</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-49">SIGNUP</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Staff ID is required">
						<span class="label-input100">Staff ID</span>
						<input class="input100" type="text" name="rstaffid" placeholder="Type your staff id">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
                    
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Full Name is required">
						<span class="label-input100">Full Name</span>
						<input class="input100" type="text" name="fullname" placeholder="Type your full name">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="rpassword" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
                    <br>
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Position is required">
						<span class="label-input100">Position</span>
                        <select class="input100" style="border:hidden" name="position" placeholder="Your position">
                     		<option>---Position---</option>
                     		<option value="Lab Assistance">Lab Assistance</option>
                     		<option value="Lecturer">Staff / Lecturer</option>
                     	</select>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
                    
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Secret Question is required">
						<span class="label-input100">Secret Question</span>
                        <select class="input100" style="border:hidden" name="question" placeholder="Secret Question">
                     		<option>---Secret Question---</option>
                     		<option value="What is your favourite children book?">What is your favourite children's book?</option>
                     		<option value="What is your dream job?">What is your dream job?</option>
                     		<option value="What was your childhood nickname?">What was your childhood nickname?</option>
                     		<option value="What was the model of your first car?">What was the model of your first car?</option>
                     		<option value="Who was your favourite singer or band in high school?">Who was your favourite singer or band in high school?</option>
                     		<option value="Who was your favourite film star or character in school?">Who was your favourite film star or character in school?</option>
                     	</select>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Answer is required">
						<span class="label-input100">Answer</span>
						<input class="input100" type="text" name="answer" placeholder="Your answer">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="loginStaff.php">Already have Account?</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="signup">Register</button>
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