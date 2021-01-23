<?php
    session_start();
    include("connection.php");

    if(isset($_POST['submit'])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }

        $tsubj = validate($_POST['subjName']);
        $tstartime = validate($_POST['startime']);
        $tEndtime = validate($_POST['endtime']);
        $tcday = validate($_POST['cday']);
        $tcprice = validate($_POST['cprice']);
        $tcteacher = validate($_POST['cteacher']);
        $tuitionID = $_SESSION('userID');


        if(empty($tsubj) || empty($tstartime)  || empty($tEndtime)
            || empty($tcday) || empty($tcprice) || empty($tcteacher)){
            header("Location: AddClass.php?error=Cannot Leave any Field Blank");
            exit();
        } else {
                $sqlpush = "INSERT INTO tuition_classes (classesSubject, classesStartTime, classesEndTime, classesDay, classesPrice, classesTeacher)
                VALUES('$tsubj', '$tstartime', '$tEndtime', '$tcday', '$tcprice', '$tcteacher')";

                //$resultpush = mysqli_query($conn, $sqlpush);

                if(mysqli_query($conn, $sqlpush)){
                    $classID = mysqli_insert_id($conn);
                    $push = "INSERT INTO tuition_class_bridge (classesID, tuitionID)
                    VALUES ('$classID', '$tuitionID')";

                    //$result = mysqli_query($conn, $push);
                    header("Location: AddClass.php?success=Classes has been added!");
                    exit();
                } else{
                    header("Location: AddClass.php?error=Unknown error occurred");
                    exit();
                }
            }
    }
    else {
        header("Location: AddClass.php");
            exit();
    }

?>
