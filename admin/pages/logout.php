<?php

    session_start();

    session_unset();

    session_destroy();

    /*header("location:../../labAssistance/loginAssistance.php");*/
    header("location:../../index.php");

    exit();
?>