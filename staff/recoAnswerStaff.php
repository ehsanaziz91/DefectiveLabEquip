<?php
require ('../Connections/laboratory.php');
// require_once('Connections/functions.php');
session_start();

if (isset($_GET['staffid']))
	{
	$staffid = $_GET["staffid"];

	$query = "SELECT * FROM `staff` WHERE `staffID` = '$staffid'";

	$result = mysql_query($query) or die('Error');
	$reset = mysql_fetch_array($result, MYSQL_ASSOC);

	$question = $reset['recoQuestion1'];

		if (isset($_POST['answer']))
		{
			$answer = $_POST["answer"];
			$que = "SELECT * FROM `staff` WHERE `recoAnswer1` = '$answer'";
			$result = mysql_query($que) or die('Error');

			if (mysql_num_rows($result) == 1)
			{
				header("Location:resetPassStaff.php?staffid=$staffid");
			}
		    else
			{
				print "<script type=\"text/javascript\">";
				print "alert('You must answer the security question correctly to reset your new password.')";
				print "</script>";
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Recovery:Question</title>
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
					<span class="login100-form-title p-b-49">PASSWORD RECOVERY</span>

					<p>Please answer the security question below :</p>
					<br>

					<div class="wrap-input100 validate-input m-b-23">
						<span class="label-input100">Question</span>
						<input class="input100" type="text" name="question" disabled="" value="<?php echo $question; ?>">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Answer is required">
						<span class="label-input100">Answer</span>
						<input class="input100" type="text" name="answer" placeholder="Type your answer">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

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