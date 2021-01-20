<?php
    session_start();
    include("connection.php");

    isset($_POST['Tuiname']) && isset($_POST['phone'])
    && isset($_POST['street']) && isset($_POST['poscode']) && isset($_POST['city']) && isset($_POST['state'])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }

        $tname = validate($_POST['Tuiname']);
      //  $identNum = validate($_POST['uic']);
        $tphone = validate($_POST['phone']);
      //  $gender = validate($_POST['gender']);
        $tstreet = validate($_POST['street']);
        $tposcode = validate($_POST['poscode']);
        $tcity = validate($_POST['city']);
        $tstate = validate($_POST['state']);


        ifempty($tname) || empty($tphone)  || empty($tstreet)
            || empty($tposcode) || empty($tcity) || empty($tstate)){
            header("Location: editTuitionProfile.php?error=Cannot Leave any Field Blank");
            exit();
        } else {

            //hashing tpassword
            $tpassword = md5($tpassword);

            $sql = "SELECT * FROM tuition_centers WHERE tuitionEmail='$tuitionemail' ";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0) {

                header("Location: editTuitionProfile.php?error=Email Taken");
                exit();

            } else {
                $sqlpush = "UPDATE tuition_centers SET tuitionName = '$tname', tuitionPhone = '$tphone', tuitionStreet = '$tstreet', tuitionPoscode = '$tposcode', tuitionCity = '$tcity', tuitionState = '$tstate'
                WHERE tuitionID = '$_SESSION['userID']' ";
                $resultpush = mysqli_query($conn, $sqlpush);

                if($resultpush){
                    //header("Location: TregisterPage.php?success=Account has been created!");
                    exit();
                } else{
                    //header("Location: TregisterPage.php?error=Unknown error occurred");
                    exit();
                }
            }

        }
    }
    else {
        header("Location: editTuitionProfile.php");
            exit();
    }

?>
