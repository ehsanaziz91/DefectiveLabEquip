<?php
require ('../../Connections/laboratory.php');

{
    $data_points = array();
    
    $result = mysql_query("SELECT MONTHNAME(maintDateTime) AS MONTH, SUM(maintCosting) AS Total FROM maintenance GROUP BY MONTH(maintDateTime)");
    
    while($row = mysql_fetch_array($result))
    {        
        $point = array("label" => $row["MONTH"] , "y" => $row["Total"]);
        array_push($data_points, $point);        
    }
    
    echo json_encode($data_points, JSON_NUMERIC_CHECK);
}
?>

