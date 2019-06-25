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

if (isset($_POST['complaints']))
{
    //$compid = $_POST["complaintid"];
    //$id = $_GET["staffid"];
    $staffid = $_POST['staffID'];
    $labno = $_POST['labNo'];
    $labequipid = $_POST['equipTypeID'];
    //$equipid = $_POST['labEquipmentID'];
    $prob = $_POST['complaintProblem'];
    $timedate = $_POST['compDateTime'];

    $sql = mysql_query("INSERT INTO complaints (staffID, labNo, equipTypeID, complaintProblem, complaintDateTime) 
        VALUES ('$staffid', '$labno', '$labequipid', '$prob', '$timedate')");

    if ($sql)
        {
            print "<script type=\"text/javascript\">";
            print "alert('Successfully Reports a Problem'),location.href='staff_complaints_list.php?staffid=$id'";
            print "</script>";
        }
      else
        {
            print "<script type=\"text/javascript\">";
            print "alert('Problem Occured')";
            print "</script>";
        }
}

if (isset($_POST['cancel']))
{
    header("Location: staff_index.php?staffid=$id");
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

    <title>Staff Complaints</title>

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
                <!-- /.dropdown -->
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
                    <h1 class="page-header">Complaints</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <form role="form" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Make a complaints
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="disabledSelect">Complaints ID</label>
                                            <input class="form-control" id="disabledInput" type="text"  name="" placeholder="Auto generated ID" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Lab Equipment</label>
                                            <select class="form-control" name="equipTypeID">
                                                <option></option>
                                                <!--<option value="Projector">Projector</option>
                                                <option value="Desktop Table">Desktop Table</option>
                                                <option value="Lab Chair">Lab Chair</option>
                                                <option value="Dell Desktop">Dell Desktop</option>
                                                <option value="Whiteboard">Whiteboard</option>
                                                <option value="Wifi Router">Wifi Router</option>
                                                <option value="Printer and Scanner">Printer and Scanner</option>-->
                                                <option value="1">Projector</option>
                                                <option value="2">Desktop Table</option>
                                                <option value="3">Lab Chair</option>
                                                <option value="4">Dell Desktop</option>
                                                <option value="5">Whiteboard</option>
                                                <option value="6">Wifi Router</option>
                                                <option value="7">Printer and Scanner</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledSelect">Complaint Problems</label>
                                            <textarea class="form-control" rows="2" name="complaintProblem" placeholder="Enter the lab equipment problem"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="complaints">Submit</button>
                                        <button type="submit" class="btn btn-default" name="cancel">Cancel</button>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="disabledSelect">Staff ID</label>
                                            <input class="form-control" id="disabledInput" type="text" name="staffID">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Lab Name</label>
                                            <select class="form-control" name="labNo">
                                                <option></option>
                                                <!--<option value="Artifical Intelligent Lab">Artifical Intelligent Lab</option>
                                                <option value="Computer Security Lab">Computer Security Lab</option>
                                                <option value="Database Lab">Database Lab</option>
                                                <option value="Gaming Lab">Gaming Lab</option>
                                                <option value="Multimedia Lab">Multimedia Lab</option>
                                                <option value="Networking Lab">Networking Lab</option>
                                                <option value="Programming Lab">Programming Lab</option>
                                                <option value="Software Engineering Lab">Software Engineering Lab</option>
                                                <option value="Virtual Reality Lab">Virtual Reality Lab</option>
                                                <option value="Wireless Lab">Wireless Lab</option>-->
                                                <option value="1">Artifical Intelligent Lab</option>
                                                <option value="2">Computer Security Lab</option>
                                                <option value="3">Database Lab</option>
                                                <option value="4">Gaming Lab</option>
                                                <option value="5">Multimedia Lab</option>
                                                <option value="6">Networking Lab</option>
                                                <option value="7">Programming Lab</option>
                                                <option value="8">Software Engineering Lab</option>
                                                <option value="9">Virtual Reality Lab</option>
                                                <option value="10">Wireless Lab</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledSelect">Date & Time</label>
                                            <input class="form-control" id="disabledInput" type="datetime-local" name="compDateTime">
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
                <!-- /.row -->
            </form>
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
