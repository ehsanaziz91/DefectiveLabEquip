<?php
require ('../../Connections/laboratory.php');

{
    $data_points = array();

    $result = mysql_query("SELECT l.labName AS LabName, count(*) AS complaintID FROM complaints c, lab l  WHERE c.complaintID = c.complaintID AND c.labNo = l.labNo GROUP BY l.labName");

    while($row = mysql_fetch_array($result))
    {        
        $point = array("label" => $row["LabName"] , "y" => $row["complaintID"]);
        array_push($data_points, $point);        
    }

    echo json_encode($data_points, JSON_NUMERIC_CHECK);
}
?>