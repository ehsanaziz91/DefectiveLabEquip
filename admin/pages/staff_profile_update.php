<?php
require ('../../Connections/laboratory.php');

session_start();
if (isset($_SESSION['staffid']))
{
    $id = $_SESSION['staffid'];
}else
{
    header ('location:../../staff/loginStaff.php');
}

if (isset($_GET['staffid']))
{
	$id = $_GET["staffid"];
	
	$query = "SELECT * FROM `staff` WHERE `staffID` = '$id'";
	$res = mysql_query($query) or die('Error');
	$_row = mysql_fetch_array($res, MYSQL_ASSOC);
}

if (isset($_POST['update']))
{
    $id = $_GET["staffid"];
    //update data

    $fullname = $_POST['staffName'];
    $position = $_POST['position'];
    $question = $_POST['recoQuestion1'];
    $answer = $_POST['recoAnswer1'];

    $sql = "UPDATE `staff` SET `staffName`='$fullname', `position`='$position', `recoQuestion1`='$question', `recoAnswer1`='$answer' WHERE `staffID` = '$id'";
    $update = mysql_query ($sql);

    if($update)
    {
        print "<script type=\"text/javascript\">";
        print "alert('Record Update Successful'),location.href='staff_profile.php?staffid=$id'";
        print "</script>";
    }
    else
    {
        print "<script type=\"text/javascript\">";
        print "alert('Error Updating Record !')";
        print "</script>";
    }
}

if (isset($_POST['cancel']))
{
    header("Location: staff_profile.php?staffid=$id");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update Staff Profile</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Defective FTMK Lab Equipment Controls</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="staff_profile.php?staffid=<?php echo $id ?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="/laboratory/staff/resetPassStaff.php?staffid=<?php echo $id ?>"><i class="fa fa-key fa-fw"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                            <!-- nav-left-side -->
                        <li>
                            <a href="staff_index.php?staffid=<?php echo $id ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="staff_lab.php?staffid=<?php echo $id ?>"><i class="fa fa-university fa-fw"></i> Laboratories</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-file-text fa-fw"></i> Complaints<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="staff_complaints_list.php?staffid=<?php echo $id ?>">My Complaints</a>
                                </li>
                                <li>
                                    <a href="staff_make_complaints.php?staffid=<?php echo $id ?>">Make Complaints</a>
                                </li>
                                <li>
                                    <a href="staff_complaints_feedback.php?staffid=<?php echo $id ?>">Complaints Feedback</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">My Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <form role="form" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Staff Identification (Update)
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="disabledSelect">Staff ID</label>
                                            <input class="form-control" type="text" name="staffid" value= "<?php echo $id;?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledSelect">Full Name</label>
                                            <input class="form-control" type="text" name="staffName" value= "<?php echo $_row['staffName']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledSelect">Position</label>
                                            <input class="form-control" type="text" name="position" value= "<?php echo $_row['position']?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="update">Update Account</button>
                                        <button type="submit" class="btn btn-default" name="cancel">Cancel</button>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Recovery Questions</label>
                                            <select class="form-control" name="recoQuestion1">
                                                <option value="<?php echo $_row['recoQuestion1']?>"><?php echo $_row['recoQuestion1']?></option>
                                                <option value="What is your favourite children book?">What is your favourite children's book?</option>
                                                <option value="What is your dream job?">What is your dream job?</option>
                                                <option value="What was your childhood nickname?">What was your childhood nickname?</option>
                                                <option value="What was the model of your first car?">What was the model of your first car?</option>
                                            </select>
                                        </div>
                                        <!--<div class="form-group">
                                            <label for="disabledSelect">Laboratory Name</label>
                                            <input class="form-control" type="text" name="" value= "" disabled>
                                        </div>-->
                                        <div class="form-group">
                                            <label for="disabledSelect">Recovery Answer</label>
                                            <input class="form-control" type="text" name="recoAnswer1" value= "<?php echo $_row['recoAnswer1']?>">
                                        </div>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </form>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
