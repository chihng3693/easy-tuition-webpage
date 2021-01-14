<?php

    $dbhost = "us-cdbr-east-03.cleardb.com";
    $dbuser = "b674c79cb4cf70";
    $dbpass = "8a7d3b35";
    $dbname = "heroku_6aed07d9c46d786";

    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    if(!$conn){

        die("failed to connect!");
    }

?>
