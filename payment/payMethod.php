<?php
    session_start();
    $userID = $_SESSION['userID'];
    $classID = $_POST['classid'];

    if(empty($classID)) {
        header("Location: userPay.php?error=Class ID is required");
        exit();
    }

    include("../login/connection.php");

    if (isset($_POST["pay"])) {
        
        $sqlpush = "UPDATE payment SET paymentStatus = 'Paid' WHERE userID='$userID' AND classesID='$classID'";
        $resultpush = mysqli_query($conn, $sqlpush);

        if($resultpush){
            header("Location: userPay.php?success=Successfull Payment");
            exit();
        } else {
            header("Location: userPay.php?error=Fail Payment");
            exit();
        }
        
    
                                
    } else {
        header("Location: userPay.php?error=Unknown Error Occur");
        exit();
    }
                   
?>