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

//reported_complaints.php
if (isset($_POST['del']))
{
	$compid = $_GET["complaintID"];
	
	$query = "DELETE FROM `complaints` WHERE `complaintID` = '$compid'";
	$res = mysql_query($query)or die('Error');
    
    if($res)
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('Deleted data successfully'),location.href='reported_complaints.php?assistid=$id'";
        echo "</script>";
    }
    else
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('Could not delete data !')";
        echo "</script>";
    }
}

//profile_admin.php
if (isset($_POST['del_admin']))
{
	$id = $_POST["assistid"];
	
	$query = "DELETE FROM ` lab_assistance` WHERE `labAssistID` = '$id'";
	$res = mysql_query($query)or die('Error');
    
    if($res)
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('Deleted data successfully'),location.href='profile_admin.php'";
        echo "</script>";
    }
    else
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('Could not delete data !')";
        echo "</script>";
    }
}

//list_staff.php
if (isset($_POST['del_staff']))
{
	$staffid = $_POST["staffID"];
	
	$query = "DELETE FROM `staff` WHERE `staffID` = '$staffid'";
	$res = mysql_query($query)or die('Error');
    
    if($res)
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('Deleted data successfully'),location.href='list_staff.php'";
        echo "</script>";
    }
    else
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('Could not delete data !')";
        echo "</script>";
    }
}
?>