<?php
    session_start();
    include("connection.php");

    if(isset($_POST['Tuiname']) && isset($_POST['phone']) && isset($_POST['street']) && isset($_POST['poscode']) && isset($_POST['city']) && isset($_POST['state'])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }

        $tname = validate($_POST['Tuiname']);
        $tphone = validate($_POST['phone']);
        $tstreet = validate($_POST['street']);
        $tposcode = validate($_POST['poscode']);
        $tcity = validate($_POST['city']);
        $tstate = validate($_POST['state']);
        $tuitionID = $_SESSION('userID');

        echo "asdasd";

    }
    else {
        header("Location: editTuitionProfile.php");
            exit();
    }

?>
