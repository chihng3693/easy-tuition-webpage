<?php
    session_start();
    include("connection.php");

    if(isset($_POST['email']) && isset($_POST['pswd'])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }

        $useremail = validate($_POST['email']);
        $password = validate($_POST['pswd']);

        //hashing password
        $password = md5($password);

        if(empty($useremail)){
            header("Location: loginPage.php?error=Email is required");
            exit();
        }
        else if(empty($password)){
            header("Location: loginPage.php?error=Password is required");
            exit();
        } else {
          if($_POST['userType'] === "student"){
            $sql = "SELECT * FROM users WHERE userEmail='$useremail' AND userPassword='$password'";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);

                if($row['userEmail'] === $useremail && $row['userPassword'] === $password){
                    $_SESSION['userID'] = $row['userID'];
                    $_SESSION['userEmail'] = $row['userEmail'];
                    $_SESSION['userPassword'] = $row['userPassword'];
                    header("Location: ../userhome/userhome.php");
                    exit();
                } else {
                    header("Location: loginPage.php?error=Incorrect Email or Password");
                    exit();
                }
            } else {
                header("Location: loginPage.php?error=Incorrect Email or Password");
                exit();
            }

          } else if($_POST['userType'] === "tuitionCenter"){
            $sql = "SELECT * FROM tuition_centers WHERE tuitionEmail='$useremail' AND tuitionPassword='$password'";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);

                if($row['tuitionEmail'] === $useremail && $row['tuitionPassword'] === $password){
                    $_SESSION['userID'] = $row['tuitionID'];
                    $_SESSION['userEmail'] = $row['tuitionEmail'];
                    $_SESSION['userPassword'] = $row['tuitionPassword'];
                    header("Location: ../userhome/userhome.php");
                    exit();
                } else {
                    header("Location: loginPage.php?error=Incorrect Email or Password");
                    exit();
                }
            } else {
                header("Location: loginPage.php?error=Incorrect Email or Password");
                exit();
            }
          }
        }
    } else {
        header("Location: loginPage.php");
            exit();
    }

?>
