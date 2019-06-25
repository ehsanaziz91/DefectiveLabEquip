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

if (isset($_GET['complaintID']))
{
    $compid = $_GET["complaintID"];
	
	//$query = "SELECT * FROM `complaints` WHERE `complaintID` = '$compid'";
    $query = "SELECT l.labName, et.equipTypeName FROM complaints c, lab l, equipment_type et WHERE c.complaintID = '$compid' AND c.labNo = l.labNo AND c.equipTypeID = et.equipTypeID";
    
    //$query = "Select `complaints`.*, `staff`.`staffName` FROM `staff` JOIN `complaints` ON `complaints`.`staffID` = `staff`.`staffID` WHERE `complaintID` = '$compid'"; /*to display 2 table*/
    
    //$query = "SELECT complaints.*, staff.staffName, equipment_type.equipTypeName FROM complaints, lab_equipment JOIN staff ON staff.staffID JOIN equipment_type ON equipment_type.equipTypeID = lab_equipment.equipTypeID WHERE `complaintID` = '$compid'";
    
    //$query = "SELECT complaints.*, staff.staffName, equipment_type.equipTypeName FROM complaints JOIN staff ON complaints.complaintID = staff.staffName JOIN equipment_type ON complaints.complaintID = equipment_type.equipTypeName WHERE `complaintID` = '$compid'"; /*display 3 table*/
    
    //$query = "SELECT complaints.*, staff.staffName, equipment_type.equipTypeName FROM complaints JOIN staff ON complaints.complaintID = staff.staffName JOIN lab_equipment ON complaints.complaintID = lab_equipment.labEquipmentID JOIN equipment_type ON complaints.complaintID = equipment_type.equipTypeName";
    
	$res = mysql_query($query) or die('Error');
	$row = mysql_fetch_array($res, MYSQL_ASSOC);
	
	$labname = $row['labName'];
    $labequip = $row['equipTypeName'];
	
}

if (isset($_POST['maintenance']))
{
    $timedate = $_POST['maintDateTime'];
    $solution = $_POST['maintSolution'];
    $costing = $_POST['maintCosting'];
    $status = $_POST['maintStatus'];
    $id = $_POST['labAssistID'];
    
    $compid = $_POST["complaintID"];

    $sql = mysql_query("INSERT INTO maintenance (maintDateTime, maintSolution, maintCosting, maintStatus, labAssistID, complaintID) 
        VALUES ('$timedate', '$solution', '$costing', '$status', '$id', '$compid')");
    
    $sql .= mysql_query("UPDATE `complaints` SET `complaintStatus`='2' WHERE `complaintID` = '$compid'");

    if ($sql)
        {
            print "<script type=\"text/javascript\">";
            print "alert('Successfully Update Maintenance Details'),location.href='defective_equip_maintenance.php?assistid=$id'";
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
    header("Location: defective_equip_maintenance.php?assistid=$id");
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

    <title>LA DE Maintain Update</title>

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
                    <h1 class="page-header">Maintenance Submission</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <form role="form" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Submit Maintenance Problems
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="disabledSelect">Maintenance ID</label>
                                            <input class="form-control" type="text"  name="" placeholder="Auto generated ID" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledSelect">Lab Name</label>
                                            <input class="form-control" id="disabledInput" type="text" name="date" value="<?php echo $labname; ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledSelect">Lab Equipment</label>
                                            <input class="form-control" id="disabledInput" type="text" name="labequip" value="<?php echo $labequip; ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledSelect">Maintenance Date & Time</label>
                                            <input class="form-control" type="datetime-local" name="maintDateTime">
                                        </div>
                                        <input type="hidden" name="complaintID" value="<?php echo $compid;?> ">
                                        
                                        <button type="submit" class="btn btn-primary" name="maintenance">Submit</button>
                                        <button type="cancel" class="btn btn-default" name="cancel">Cancel</button>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="disabledSelect">Lab Assistance ID</label>
                                            <input class="form-control" type="text" name="labAssistID" placeholder="Capital letters">
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledSelect">Costing (RM)</label>
                                            <input class="form-control" type="number" name="maintCosting" placeholder="99.20">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="maintStatus">
                                                <option></option>
                                                <option value="2">Completed</option>
                                                <option value="3">Failed</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledSelect">Complaint Solutions</label>
                                            <textarea class="form-control" rows="2" name="maintSolution"></textarea>
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
