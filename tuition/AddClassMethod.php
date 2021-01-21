<?php
    session_start();
    include("connection.php");

    if(isset($_POST['subjName']) && isset($_POST['startime'])
    && isset($_POST['endtime']) && isset($_POST['cday']) && isset($_POST['cprice']) && isset($_POST['cteacher'])){

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

                $sqlpush1 = "INSERT INTO tuition_class_bridge (classesID, tuitionID)
                VALUES('6', '$tuitionID')";
                
                $resultpush = mysqli_query($conn, $sqlpush);
                $resultpush = mysqli_query($conn, $sqlpush1);

                if($resultpush){
                    header("Location: AddClass.php?success=Account has been created!");
                    exit();
                } else{
                    header("Location: AddClass.php?error=Unknown error occurred");
                    exit();
                }
            }

        }
    }
    else {
        header("Location: AddClass.php");
            exit();
    }

?>
