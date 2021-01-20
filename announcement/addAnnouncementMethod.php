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
        $tuitionID = $_POST['userID'];
        $date = date('m/d/Y');
        $time = date('H:i a');

        if(empty($details)){
            header("Location: addAnnouncementPage.php?error=Cannot Leave any Field Blank");
            exit();
        } else {
              $check = "SELECT * FROM tuition_class_bridge WHERE tuitionID = '$tuitionID' AND classesID = '$classesID'";
              $result = mysqli_query($conn, $check);

              if(!$result) {
                header("Location: addAnnouncementPage.php?error=Wrong Tuition Class ID!");
                exit();
              }

              $sqlpush = "INSERT INTO announcement(announcementDetail, announcementDate, announcementTime)
              VALUES('$details', '$date', '$time')";
              $resultpush = mysqli_query($conn, $sqlpush);

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
