<?php
require ('../../Connections/laboratory.php');

if (isset($_POST['del']))
{
	$labno = $_GET["labNo"];
	
	$query = "DELETE FROM `lab` WHERE `labNo` = '$labno'";
	$res = mysql_query($query)or die('Error');
    
    if($res)
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('Deleted data successfully'),location.href='defective_equip.php?";
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

