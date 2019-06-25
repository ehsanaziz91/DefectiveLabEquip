<?php
require ('../../Connections/laboratory.php');

session_start();
if (isset($_SESSION['assistid']))
{
    $id = $_SESSION['assistid'];
}else
{
    header ('location:../../labAssistance/loginAssistance.php');
}
    
if (isset($_GET['assistid']))
{
    $id = $_GET["assistid"];

    //$query = "SELECT * FROM `lab_assistance` WHERE `labAssistID` = '$id'";
    $query = "SELECT la.labAssistID, la.labAssistName, la.position, la.recoQuestion1, la.recoAnswer1, l.labName FROM lab_assistance la, lab l WHERE la.labAssistID = '$id' AND la.labNo = l.labNo";
    $res = mysql_query($query) or die('Error');
    $_row = mysql_fetch_array($res, MYSQL_ASSOC);	
}

if (isset($_POST['update']))
{
    $id = $_GET["assistid"];
    //update data

    $fullname = $_POST['labAssistName'];
    $position = $_POST['position'];
    $question = $_POST['recoQuestion1'];
    $answer = $_POST['recoAnswer1'];
    
    $labno = $_POST['labNo'];

    $sql = "UPDATE `lab_assistance` SET `labAssistName`='$fullname', `position`='$position', `recoQuestion1`='$question', `recoAnswer1`='$answer', `labNo`='$labno' WHERE `labAssistID` = '$id'";
    $update = mysql_query ($sql);

    if($update)
    {
        print "<script type=\"text/javascript\">";
        print "alert('Record Update Successful'),location.href='profile_admin.php?assistid=$id'";
        print "</script>";
    }
    else
    {
        print "<script type=\"text/javascript\">";
        print "alert('Error updating record !')";
        print "</script>";
    }
}

if (isset($_POST['cancel']))
{
    header("Location: profile_admin.php?assistid=$id");
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

    <title>LA Update Profile</title>

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
                        <li><a href="profile_admin.php?assistid=<?php echo $id ?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="/laboratory/labAssistance/resetPassAssistance.php?assistid=<?php echo $id ?>"><i class="fa fa-key fa-fw"></i> Change Password</a>
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
                            <a href="index.php?assistid=<?php echo $id ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-university fa-fw"></i> Laboratories<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="list_labAssistance.php?assistid=<?php echo $id ?>">Lab Assistance</a>
                                </li>
                                <li>
                                    <a href="list_lab.php?assistid=<?php echo $id ?>">Laboratory</a>
                                </li>
                                <li>
                                    <a href="list_staff.php?assistid=<?php echo $id ?>">Staff</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="reported_complaints.php?assistid=<?php echo $id ?>"><i class="fa fa-file-text fa-fw"></i> Reported Complaints</a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-flask fa-fw"></i> Defective Equipment<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="defective_equip.php?assistid=<?php echo $id ?>"> Defective Equipment List</a>
                                </li>
                                <li>
                                    <a href="defective_equip_disposal.php?assistid=<?php echo $id ?>">Disposal</a>
                                </li>
                                <li>
                                    <a href="defective_equip_maintenance.php?assistid=<?php echo $id ?>">Maintenance</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="analysis.php?assistid=<?php echo $id ?>"><i class="fa fa-bar-chart-o fa-fw"></i> Analysis</a>
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
                    <h1 class="page-header">Update My Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <form role="form" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Lab Assistance Identification (Update)
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="disabledSelect">Lab Assistance ID</label>
                                            <input class="form-control" type="text" name="id" value="<?php echo $id;?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input class="form-control" type="text" name="labAssistName" value="<?php echo $_row['labAssistName']?>">
                                        </div>
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
                                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                                        <button type="submit" class="btn btn-default" name="cancel">Cancel</button>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Position</label>
                                            <select class="form-control" name="position">
                                                <option value="<?php echo $_row['position']?>"><?php echo $_row['position']?></option>
                                                <option value="Lecturer">Lecturer</option>
                                                <option value="Lab Assistance">Lab Assistance</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Laboratory Name</label>
                                            <select class="form-control" name="labNo">
                                                <option value="<?php echo $_row['labNo']?>"><?php echo $_row['labName']?></option>
                                                <option value="1">Artifical Intelligent Lab</option>
                                                <option value="2">Computer Security Lab</option>
                                                <option value="3">Database Lab</option>
                                                <option value="4">Gaming Lab</option>
                                                <option value="5">Multimedia Lab</option>
                                                <option value="6">Networking Lab</option>
                                                <option value="7">Programming Lab</option>
                                                <option value="8">Software Engineering Lab</option>
                                                <option value="9">Virtual Riality Lab</option>
                                                <option value="10">Wireless Lab</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Recovery Answer</label>
                                            <input class="form-control" type="text" name="recoAnswer1" value="<?php echo $_row['recoAnswer1']?>">
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
