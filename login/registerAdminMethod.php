<?php
    session_start();
    include("connection.php");

    if(isset($_POST['email']) && isset($_POST['pswd']) && isset($_POST['name']) && isset($_POST['phone'])  && isset($_POST['gender'])
    && isset($_POST['street']) && isset($_POST['poscode']) && isset($_POST['city']) && isset($_POST['state'] && isset($_POST['numOfSubjects'])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }

        $useremail = validate($_POST['email']);
        $password = validate($_POST['pswd']);
        $name = validate($_POST['name']);
        $phone = validate($_POST['phone']);
        $street = validate($_POST['street']);
        $poscode = validate($_POST['poscode']);
        $city = validate($_POST['city']);
        $state = validate($_POST['state']);
        $numOfSubjects = validate($_POST['numOfSubjects']);


        if(empty($useremail) || empty($password) || empty($name) || empty($phone) || || empty($street)
            || empty($poscode) || empty($city) || empty($state) || empty($numOfSubjects)){
            header("Location: registerAdminPage.php?error=Cannot Leave any Field Blank");
            exit();
        } else {

            //hashing password
            $password = md5($password);

            $sql = "SELECT * FROM tuition_centers WHERE tuitionEmail='$useremail' ";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0) {

                header("Location: registerPage.php?error=Email Taken");
                exit();

            } else {
                $sqlpush = "INSERT INTO tuition_centers(tuitionEmail, tuitionPassword, tuitionName, tuitionPhone, tuitionStreet, tuitionPoscode, tuitionCity, tuitionState, numOfSubjects)
                VALUES('$useremail', '$password', '$name', '$phone', '$street', '$poscode', '$city', '$state', '$numOfSubjects')";
                $resultpush = mysqli_query($conn, $sqlpush);

                if($resultpush){
                    header("Location: registerAdminPage.php?success=Account has been created!");
                    exit();
                } else{
                    header("Location: registerAdminPage.php?error=Unknown error occurred");
                    exit();
                }
            }

        }
    }
    else {
        header("Location: registerAdminPage.php");
            exit();
    }

?>
