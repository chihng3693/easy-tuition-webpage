<?php
    session_start();
    include("connection.php");

    if(isset($_POST['details'])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }

        $details = validate($_POST['details']);
        $classesID = validate($_POST['clasesID']);
        $tuitionID = $_SESSION['userID'];
        $date = date('m/d/Y');
        $time = date('H:i a');

        if(empty($details)){
            header("Location: addAnnouncementPage.php?error=Cannot Leave any Field Blank");
            exit();
        } else {
                $sqlpush = "INSERT INTO announcement(announcementDetail, announcementDate, announcementTime)
                VALUES('$details', '$date', '$time')";
                $resultpush = mysqli_query($conn, $sqlpush);

                $sqlpush1 = "SELECT userID FROM user_class_bridge WHERE classesID='$classesID'";
                $resultpush1 = mysqli_query($conn, $sqlpush1);
                $row = mysqli_num_rows($sqlpush1);
                  while($row = mysqli_fetch_assoc($sqlpush1)) {
                    $push = "INSERT INTO announcement_bridge(userID, classesID)
                    VALUES('$row[userID]','$classesId')";
                  }

                if($resultpush){
                    header("Location: addAnnouncementPage.php?success=Announcement has been posted!");
                    exit();
                } else{
                    header("Location: addAnnouncementPage.php?error=Unknown error occurred");
                    exit();
                }
        }
    }
    else {
        header("Location: addAnnouncement.php");
            exit();
    }

?>
