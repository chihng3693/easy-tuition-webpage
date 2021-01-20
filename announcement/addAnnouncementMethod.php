<?php
    session_start();
    include("connection.php");

    if(isset($_POST['submit'])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }

        $details = validate($_POST['details']);
        $date = date('m/d/Y');
        $time = date('H:i a');

        if(empty($details)){
            header("Location: registerPage.php?error=Cannot Leave any Field Blank");
            exit();
        } else {
              $sqlpush = "INSERT INTO announcement(announcementDetails, announcementDate, announcementTime)
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
