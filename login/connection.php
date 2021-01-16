<?php

    //Host server

    //get data from json

    $data = file_get_contents(__DIR__ . '/database.json');

    $json = json_decode($data);

    $conn = mysqli_connect($json->dbhost,$json->dbuser,$json->dbpass,$json->dbname);

    if(!$conn){

        die("failed to connect!");
    }

    /*
    $dbhost = "us-cdbr-east-03.cleardb.com";
    $dbuser = "b674c79cb4cf70";
    $dbpass = "8a7d3b35";
    $dbname = "heroku_6aed07d9c46d786";
    */

    //Local server
    /*
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "easy-tuition";

    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    if(!$conn){

        die("failed to connect!");
    }
    */

?>
