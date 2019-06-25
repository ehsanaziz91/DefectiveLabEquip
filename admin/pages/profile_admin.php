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
	$row = mysql_fetch_array($res, MYSQL_ASSOC);

	$fullname = $row['labAssistName'];
	$position = $row['position'];
	$question = $row['recoQuestion1'];
	$answer = $row['recoAnswer1'];
    $labname = $row['labName'];
	
	
}
if (isset($_POST['update']))
{
    header("Location: profile_admin_update.php?assistid=$id");
}

if (isset($_POST['del_admin']))
{
    header("Location: profile_admin_delete.php?assistid=$id");
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

    <title>LA Profile</title>

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
                    <h1 class="page-header">My Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <form role="form" method="post">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Lab Assistance Identification
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <tr>
                                            <td>Lab Assistance ID</td>
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>
                                            <td>:</td>
                                            <td><?php echo $id;?></td>
                                        </tr><br><br>
                                        <tr>
                                            <td>Full Name</td>
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;
                                            </td>
                                            <td>:</td>
                                            <td><?php echo $fullname;?></td>
                                        </tr><br><br>
                                        <tr>
                                            <td>Position</td>
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>
                                            <td>:</td>
                                            <td><?php echo $position;?></td>
                                        </tr><br><br>
                                        <tr>
                                            <td>Laboratory Name</td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td>:</td>
                                            <td><?php echo $labname;?></td>
                                        </tr><br><br>
                                        <tr>
                                            <td>Recovery Question</td>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td>:</td>
                                            <td><?php echo $question;?></td>
                                        </tr><br><br>
                                        <tr>
                                            <td>Recovery Answer</td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td>:</td>
                                            <td><?php echo $answer;?></td>
                                        </tr><br><br>
                                        <tr>
                                            <button type="submit" class="btn btn-primary" name="update">Update Account</button>
                                            <button type="submit" class="btn btn-danger" name="del_admin">Delete Account</button>
                                        </tr>
                                    </div>
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
