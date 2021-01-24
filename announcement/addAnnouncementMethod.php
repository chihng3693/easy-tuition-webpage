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
        $classesID = validate($_POST['classesID']);
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
                $announcementID = mysqli_insert_id($conn);

                if($resultpush){
                    $queryGetUID = "SELECT * FROM user_class_bridge WHERE classesID='$classesID'";
                    $queryGetUID = mysqli_query($conn, $queryGetUID);
                    $rows = mysqli_num_rows($queryGetUID);

                    if($rows > 0){
                        while($rows = mysqli_fetch_assoc($queryGetUID)) {
                            $userID = $rows['userID'];

                            $sql = "INSERT INTO announcementbridge(announcementID, userID, classesID)
                            VALUES('$announcementID', '$userID', '$classesID')";
                            $result = mysqli_query($conn, $sql);
                        }
                    }

                    header("Location: ../tuition/tuitionhome.php");
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
