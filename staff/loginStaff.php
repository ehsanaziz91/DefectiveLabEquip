<?php
require ('../Connections/laboratory.php');

if (isset($_POST['login']))
	{
	$id = $_POST["staffid"];
	$pass = md5($_POST["password"]);
	$query = "SELECT * FROM `staff` WHERE `staffID` = '$id' And `password` = '$pass' ";
	$result = mysql_query($query) or die('Error');
	$login = mysql_fetch_array($result, MYSQL_ASSOC);
	$que = "select * from staff where staffID='$id'";
	$res = mysql_query($que) or die('error');

	// If result matched $myusername and $mypassword, table row must be 1 row

	if (mysql_num_rows($result) == 1)
		{
            session_start();

            $_SESSION['staffid'] = $id;
            header("Location:../admin/pages/staff_index.php?staffid=$id");
		}
	  else
		{
		if (mysql_num_rows($res) == 1)
			{
			print "<script type=\"text/javascript\">";
			print "alert('Incorrect password, please try again.')";
			print "</script>";
			}
		  else
			{
			print "<script type=\"text/javascript\">";
			print "alert('Staff ID not found, please signup.')";
			print "</script>";
			}
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Staff Login</title>
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
                    <span class="login100-form-title p-b-49">LOGIN</span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "StaffID is required">
                        <span class="label-input100">Staff ID</span>
                        <input class="input100" type="text" name="staffid" placeholder="Type your staff id">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Type your password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>

                    <div class="text-right p-t-8 p-b-31">
                        <a href="recoveryStaff.php">Forgot password?</a>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" name="login">Login</button>
                        </div>
                    </div>

                    <div class="flex-col-c p-t-155-l">
                        <a href="signupStaff.php" class="txt2">Sign Up</a>
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