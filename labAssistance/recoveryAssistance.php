<?php
require ('../Connections/laboratory.php');
// require_once('Connections/functions.php');
session_start();

if (isset($_GET['assistid']))
	{
	$id = $_GET["assistid"];

	$query = "SELECT * FROM `lab_assistance` WHERE `labAssistID` = '$id'";
	$result = mysql_query($query) or die('Error');
	$reset = mysql_fetch_array($result, MYSQL_ASSOC);

	if (mysql_num_rows($result) == 1)
		{
			header("Location:recoAnswerAssistance.php?assistid=$id");
		}
	  else
		{
			print "<script type=\"text/javascript\">";
			print "alert('Staff ID not found, please try again.')";
			print "</script>";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lab Assistance Recovery</title>
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
				<form class="login100-form validate-form" method="get">
					<span class="login100-form-title p-b-49">PASSWORD RECOVERY</span>

					<p>You can use this form to recover your password if you have forgotten it. Enter your lab assistance id below to get started.</p>
					<br>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Lab Assistance ID is required">
						<span class="label-input100">Lab Assistance ID</span>
						<input class="input100" type="text" name="assistid" placeholder="Insert your lab assistance id">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<br>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="reset">Reset my password</button>
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