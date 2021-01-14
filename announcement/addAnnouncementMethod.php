<?php
    session_start();
    include("connection.php");

    if(isset($_POST['subject']) && isset($_POST['title']) && isset($_POST['details'])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }

        $subject = validate($_POST['subject']);
        $title = validate($_POST['title']);
        $details = validate($_POST['details']);
        $date = date('m/d/Y');
        $time = date('H:i:s');

        if(empty($subject) || empty($title) || empty($details)){
            header("Location: registerPage.php?error=Cannot Leave any Field Blank");
            exit();
        } else {
              $sqlpush = "INSERT INTO announcement(announcementTitle, announcementDetails, announcementDate, announcementTime)
              VALUES('$subject', '$title', '$details', '$date', '$time')";
              $resultpush = mysqli_query($conn, $sqlpush);

              if($resultpush){
                  header("Location: registerPage.php?success=Announcement has been posted!");
                  exit();
              } else{
                  header("Location: registerPage.php?error=Unknown error occurred");
                  exit();
              }
        }
    }
    else {
        header("Location: addAnnouncement.php");
            exit();
    }

?>
