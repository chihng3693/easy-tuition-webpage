<?php
    session_start();
    include("connection.php");

    if(isset($_POST['email']) && isset($_POST['pswd']) && isset($_POST['subjName']) && isset($_POST['startime'])
    && isset($_POST['endtime']) && isset($_POST['cday']) && isset($_POST['cprice']) && isset($_POST['cteacher'])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }

        $tuitionemail = validate($_POST['email']);
        $tpassword = validate($_POST['pswd']);
        $tsubj = validate($_POST['subjName']);
      //  $identNum = validate($_POST['uic']);
        $tstartime = validate($_POST['startime']);
      //  $gender = validate($_POST['gender']);
        $tEndtime = validate($_POST['endtime']);
        $tcday = validate($_POST['cday']);
        $tcprice = validate($_POST['cprice']);
        $tcteacher = validate($_POST['cteacher']);
        $numOfSubjects = 0;


        if(empty($tuitionemail) || empty($tpassword) || empty($tsubj) || empty($tstartime)  || empty($tEndtime)
            || empty($tcday) || empty($tcprice) || empty($tcteacher)){
            header("Location: AddClass.php?error=Cannot Leave any Field Blank");
            exit();
        } else {

            //hashing tpassword
            $tpassword = md5($tpassword);

            $sql = "SELECT * FROM tuition_centers WHERE tuitionEmail='$tuitionemail' ";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0) {

                header("Location: AddClass.php?error=Email Taken");
                exit();

            } else {
                $sqlpush = "INSERT INTO tuition_centers (tuitionEmail, tuitionPassword, classesSubject, classesStartTime, classesEndTime, classesDay, classesPrice, classesTeacher)
                VALUES('$tuitionemail', '$tpassword', '$tsubj', '$tstartime', '$tEndtime', '$tcday', '$tcprice', '$tcteacher')";
                $resultpush = mysqli_query($conn, $sqlpush);

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
