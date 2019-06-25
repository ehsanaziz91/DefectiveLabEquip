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

?>

<?php
require ('../../Connections/laboratory.php');

    //$query = "SELECT * FROM `complaints` WHERE complaintStatus=0 AND disposal=0";
    $query = "SELECT c.complaintID, c.complaintProblem, c.complaintDateTime, c.complaintStatus, s.staffName, l.labName, et.equipTypeName FROM complaints c, staff s, lab l, equipment_type et WHERE c.complaintID = c.complaintID AND c.staffID = s.staffID AND c.labNo = l.labNo AND c.equipTypeID = et.equipTypeID AND complaintStatus=0";
    $res = mysql_query($query) or die('Error');
?>

<?php
require ('../../Connections/laboratory.php');

    //$querys = "SELECT c.complaintID, c.labName, c.complaintProblem, m.maintStatus, m.maintSolution, m.maintCosting, m.maintDateTime FROM maintenance m, complaints c WHERE m.complaintID = c.complaintID AND c.complaintStatus = 3";
    $querys = "SELECT m.maintDateTime, m.maintSolution, m.maintCosting, m.maintStatus, c.complaintID, c.complaintProblem, l.labName FROM complaints c, maintenance m, lab l WHERE m.maintID = m.maintID AND m.complaintID = c.complaintID AND c.labNo = l.labNo AND c.complaintStatus = '3'";
    $ress = mysql_query($querys) or die('Error');
?>

<?php
require ('../../Connections/laboratory.php');

    //$sql = "SELECT SUM(maintCosting) FROM maintenance";
    //$sql = "SELECT maintCosting FROM maintenance";
    $sql = "SELECT SUM(maintCosting) FROM complaints c, maintenance m WHERE m.maintID = m.maintID AND m.complaintID = c.complaintID AND c.complaintStatus = 3";
    $result = mysql_query($sql) or die('Error');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LA Defective Equipments</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

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

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">List of Lab Equipment Problems</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of Lab Equipment Problems
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Complaint No.</th>
                                        <th>Lab Name</th>
                                        <th>Problems</th>
                                        <th>Date & Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                        while ($row = mysql_fetch_array($res))
                                        {
                                            echo '<tr>
                                                    <td align="center">'.$row['complaintID'].'</td>
                                                    <td>'.$row['labName'].'</td>
                                                    <td>'.$row['complaintProblem'].'</td>
                                                    <td>'.$row['complaintDateTime'].'</td>
                                                    <td>';

                                                    $status = $row['complaintStatus'];

                                                    if($status == 0)
                                                    {
                                                        echo "<span class='label label-warning'>PENDING</span>";
                                                    }else
                                                    {
                                                         echo "success";
                                                    }

                                                    echo '</td>
                                                    <td>
                                                        <form method="post" action="defective_equip_maintenance_disposal-action.php">

                                                            <a href="defective_equip-details.php?complaintID='.$row['complaintID'].'&staffid='.$id.'" class="btn btn-primary"><i class="fa fa-share fa-fw"></i></a>

                                                            <input type="hidden" name="complaintID" value='.$row['complaintID'].'></input>

                                                            <button class="btn btn-info" name="maintain" onclick="document.submit();"><i class="fa fa-wrench fa-fw"></i></button>

                                                            <button class="btn btn-danger" name="disposal" onclick="document.submit();"><i class="fa fa-trash-o fa-fw"></i></button>

                                                        </form>
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
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of Lab Equipment Maintenance
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTabless-example">
                                <thead>
                                    <tr>
                                        <th>Complaint No</th>
                                        <th>Lab Name</th>
                                        <th>Problems</th>
                                        <th>Solution</th>
                                        <th>Status</th>
                                        <th>Date & Time</th>
                                        <th>Costing (RM)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while ($row = mysql_fetch_array($ress))
                                        {
                                            echo '<tr>
                                                    <td align="center">'.$row['complaintID'].'</td>
                                                    <td>'.$row['labName'].'</td>
                                                    <td>'.$row['complaintProblem'].'</td>
                                                    <td>'.$row['maintSolution'].'</td>
                                                    <td>';

                                                    $status = $row['maintStatus'];

                                                    if($status == 2)
                                                    {
                                                        echo "<span class='label label-success'>SUCCESSFUL</span>";
                                                    }else
                                                    {
                                                         echo "<span class='label label-danger'>FAILED</span>";
                                                    }

                                                    echo '</td>
                                                    <td>'.$row['maintDateTime'].'</td>
                                                    <td align="center">'.$row['maintCosting'].'</td>
                                                </tr>';
                                        }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <td colspan="6" style="text-align:right;">TOTAL :</td>
                                    <td style="text-align:center;"> 
                                        <?php
                                            while ($row = mysql_fetch_array($result))
                                            {
                                                echo $row['SUM(maintCosting)'];
                                            }
                                        ?>
                                    </td>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
        <script>
    $(document).ready(function() {
        $('#dataTabless-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
