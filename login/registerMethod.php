<?php
    session_start();
    include("connection.php");

    if(isset($_POST['email']) && isset($_POST['pswd']) && isset($_POST['uname']) && isset($_POST['phone'])  && isset($_POST['gender']) 
    && isset($_POST['street']) && isset($_POST['poscode']) && isset($_POST['city']) && isset($_POST['state'])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }

        $useremail = validate($_POST['email']);
        $password = validate($_POST['pswd']);
        $name = validate($_POST['uname']);
        $identNum = validate($_POST['uic']);
        $phone = validate($_POST['phone']);
        $gender = validate($_POST['gender']);
        $street = validate($_POST['street']);
        $poscode = validate($_POST['poscode']);
        $city = validate($_POST['city']);
        $state = validate($_POST['state']);

        
        if(empty($useremail) || empty($password) || empty($name) || empty($phone) || empty($identNum) || empty($gender) || empty($street)
            || empty($poscode) || empty($city) || empty($state)){
            header("Location: registerPage.php?error=Cannot Leave any Field Blank");
            exit();
        } else {
            
            //hashing password
            $password = md5($password);

            $sql = "SELECT * FROM users WHERE userEmail='$useremail' ";

            $result = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($result) > 0) {

                header("Location: registerPage.php?error=Email Taken");
                exit();
                
            } else {
                $sqlpush = "INSERT INTO users(userEmail, userPassword, userName, userIC, userPhone, userGender, userStreet, userPoscode, userCity, userState) 
                VALUES('$useremail', '$password', '$name', '$identNum', '$phone', '$gender', '$street', '$poscode', '$city', '$state')";
                $resultpush = mysqli_query($conn, $sqlpush);

                if($resultpush){
                    header("Location: registerPage.php?success=Account has been created!");
                    exit();
                } else{
                    header("Location: registerPage.php?error=Unknown error occurred");
                    exit();
                }
            }

        }
    } 
    else {
        header("Location: registerPage.php");
            exit();
    }
    
?>