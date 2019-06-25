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

if (isset($_POST['maintain']))
{
	$compid = $_POST["complaintID"];
	
	$query = "UPDATE `complaints` SET `complaintStatus`='1' WHERE `complaintID` = '$compid'";
	$res = mysql_query($query)or die('Error');
	
    if($res)
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('Are you sure?'),location.href='defective_equip.php?assistid=$id'";
        echo "</script>";
    }
};

if (isset($_POST['cancel']))
{
	$compid = $_POST["complaintID"];
	
	$query = "UPDATE `complaints` SET `complaintStatus`='0' WHERE `complaintID` = '$compid'";
	$res = mysql_query($query)or die('Error');
	
    if($res)
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('Are you sure?'),location.href='defective_equip_maintenance.php?assistid=$id'";
        echo "</script>";
    }
    else
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('Failed!')";
        echo "</script>";
    }
};

if (isset($_POST['disposal']))
{
	$compid = $_POST["complaintID"];
	
	$query = "UPDATE `complaints` SET `disposal`='1' WHERE `complaintID` = '$compid'";
	$res = mysql_query($query)or die('Error');
	
    if($res)
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('Are you sure?'),location.href='defective_equip.php?assistid=$id'";
        echo "</script>";
    }
}

if (isset($_POST['success']))
{
	$compid = $_POST["complaintID"];
	
	$query = "UPDATE `complaints` SET `complaintStatus`='3' WHERE `complaintID` = '$compid'";
	$res = mysql_query($query)or die('Error');
	
    if($res)
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('Are you sure?'),location.href='defective_equip.php?assistid=$id'";
        echo "</script>";
    }
}
?>