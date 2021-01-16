<?php
    session_start();
    $userID = $_SESSION['userID'];
    $classID = $_POST['classid'];

    if(empty($classID)) {
        header("Location: tuitionRegister.php?error=Class ID is required");
        exit();
    }

    include("../login/connection.php");

    if (isset($_POST["register"])) {

        //validate user register or not at tuition
        $queryValidate = "SELECT * FROM user_class_bridge WHERE userID='$userID'";
		$queryValidate = mysqli_query($conn, $queryValidate);
        $getRows = mysqli_num_rows($queryValidate);

        $i=1;
        
        if($getRows > 0){
            while($getRows = mysqli_fetch_assoc($queryValidate)) {
                
                if($getRows['userID'] === $userID && $getRows['classesID'] === $classID){
                    header("Location: tuitionRegister.php?error=Already Registered");
                    exit();
                    $i=0;
                }
            }
        }

        if($i === 1){
            $sqlpush1 = "INSERT INTO user_class_bridge(userClassID, userID, classesID) 
            VALUES(NULL, '$userID', '$classID')";
            $resultpush1 = mysqli_query($conn, $sqlpush1);
    
            $payStats = "Not Paid";
    
            $sqlpush2 = "INSERT INTO payment(paymentID, userID, classesID, paymentStatus) 
            VALUES(NULL, '$userID', '$classID', '$payStats')";
            $resultpush2 = mysqli_query($conn, $sqlpush2);
    
            if($resultpush1 && $resultpush2){
                header("Location: tuitionRegister.php?success=Successfully Registered");
                exit();
            } else {
                header("Location: tuitionRegister.php?error=Fail Registration");
                exit();
            }
        }
                                
    } else {
        header("Location: tuitionRegister.php?error=Unknown Error Occur");
        exit();
    }
                   
?>