<?php
    session_start();
    include("connection.php");

    if(isset($_POST['email']) && isset($_POST['pswd']) && isset($_POST['Tuiname']) && isset($_POST['phone'])
    && isset($_POST['street']) && isset($_POST['poscode']) && isset($_POST['city']) && isset($_POST['state'])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }

        $tuitionemail = validate($_POST['email']);
        $tpassword = validate($_POST['pswd']);
        $tname = validate($_POST['Tuiname']);
      //  $identNum = validate($_POST['uic']);
        $tphone = validate($_POST['phone']);
      //  $gender = validate($_POST['gender']);
        $tstreet = validate($_POST['street']);
        $tposcode = validate($_POST['poscode']);
        $tcity = validate($_POST['city']);
        $tstate = validate($_POST['state']);
        $numOfSubjects = 0;


        if(empty($tuitionemail) || empty($tpassword) || empty($tname) || empty($tphone)  || empty($tstreet)
            || empty($tposcode) || empty($tcity) || empty($tstate)){
            header("Location: TregisterPage.php?error=Cannot Leave any Field Blank");
            exit();
        } else {

            //hashing tpassword
            $tpassword = md5($tpassword);

            $sql = "SELECT * FROM users WHERE tuitionEmail='$tuitionemail' ";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0) {

                header("Location: TregisterPage.php?error=Email Taken");
                exit();

            } else {
                $sqlpush = "INSERT INTO users(tuitionEmail, tuitionPassword, tuitionName, tuitionPhone, tuitionStreet, tuitionPoscode, tuitionCity, tuitionState, numOfSubjects)
                VALUES('$tuitionemail', '$tpassword', '$tname', '$identNum', '$tphone', '$gender', '$tstreet', '$tposcode', '$tcity', '$tstate', '$numOfSubjects')";
                $resultpush = mysqli_query($conn, $sqlpush);

                if($resultpush){
                    header("Location: TregisterPage.php?success=Account has been created!");
                    exit();
                } else{
                    header("Location: TregisterPage.php?error=Unknown error occurred");
                    exit();
                }
            }

        }
    }
    else {
        header("Location: TregisterPage.php");
            exit();
    }

?>
