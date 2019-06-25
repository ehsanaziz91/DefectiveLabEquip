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
	$row = mysql_fetch_array($res, MYSQL_ASSOC);
}

    $query = "SELECT c.complaintID, c.complaintDateTime, c.complaintStatus, l.labName FROM complaints c, lab l WHERE c.complaintID = c.complaintID AND c.labNo = l.labNo AND c.staffID = '$id'";
    $res = mysql_query($query) or die('Error');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff Home Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

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

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">My Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        My Complaints List
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Complaint No.</th>
                                    <th>Lab Name</th>
                                    <th>Date and Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php
                                    while ($row = mysql_fetch_array($res))
                                    {
                                        echo '<tr>
                                                <td width="15%" align="center">'.$row['complaintID'].'</td>
                                                <td width="25%">'.$row['labName'].'</td>
                                                <td width="25%">'.$row['complaintDateTime'].'</td>
                                                <td>';

                                                $status = $row['complaintStatus'];

                                                if($status == 0)
                                                {
                                                    echo "<span class='label label-warning'>PENDING</span>";
                                                }
                                                elseif($status == 1)
                                                {
                                                    echo "<span class='label label-warning'>MAINTENANCE</span>";
                                                }
                                                elseif($status == 3)
                                                {
                                                    echo "<a href='staff_complaints_feedback.php?staffid=$id'><span class='label label-success'>SUCCESSFUL</span></a>";
                                                }else
                                                {
                                                     echo "<span class='label label-danger'>FAILED</span>";
                                                }

                                                echo '</td>
                                                <td width="20%"> <a href="staff_complaints_list-details.php?complaintID='.$row['complaintID'].'&staffid='.$id.'" class="btn btn-primary"><i class="fa fa-share fa-fw"></i>Details</a>
                                                </td>
                                            </tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h5><span class="color">**</span>You can click successful status for more details about maintenance</h5>
            </div>
        </div>
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
    
    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
    
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>
<style>
    .color{
        color: red;
    }
</style>
</html>
