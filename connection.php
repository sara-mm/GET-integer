<?php
    
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "smartMethods";

    $con = mysqli_connect($host,$user,$password,$db);

    if(mysqli_connect_errno()>0)
        mysqli_connect_error($con);
    else
    
?>