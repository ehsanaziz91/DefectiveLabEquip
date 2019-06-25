<?php
    # FileName="Connection_php_mysql.htm"
    # Type="MYSQL"
    # HTTP="true"
    $hostname_laboratory = "localhost";
    $database_laboratory = "laboratory";
    $username_laboratory = "root";
    $password_laboratory = "";
    $laboratory = mysql_connect($hostname_laboratory, $username_laboratory, $password_laboratory);
    mysql_select_db($database_laboratory);
?>