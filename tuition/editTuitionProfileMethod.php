<?php
    session_start();
    include("connection.php");

    if(isset($_POST['Tuiname']) && isset($_POST['phone'])
    && isset($_POST['street']) && isset($_POST['poscode']) && isset($_POST['city']) && isset($_POST['state'])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }

        $tname = validate($_POST['Tuiname']);
        $tphone = validate($_POST['phone']);
        $tstreet = validate($_POST['street']);
        $tposcode = validate($_POST['poscode']);
        $tcity = validate($_POST['city']);
        $tstate = validate($_POST['state']);
        $tuitionID = $_SESSION['userID'];

        if(empty($tname) || empty($tphone)  || empty($tstreet)
            || empty($tposcode) || empty($tcity) || empty($tstate)){
            header("Location: editTuitionProfile.php?error=Cannot Leave any Field Blank");
            exit();
        } else {
            $sqlpush = "UPDATE tuition_centers SET tuitionName='$tname', tuitionPhone='$tphone', tuitionStreet='$tstreet', tuitionPoscode='$tposcode', tuitionCity='$tcity', tuitionState='$tstate'
            WHERE tuitionID='$tuitionID'";
            $resultpush = mysqli_query($conn, $sqlpush);

            if($resultpush){
                header("Location: editTuitionProfile.php?success=Profile has been updated!");
                exit();
            } else{
                header("Location: editTuitionProfile.php?error=Unknown error occurred");
                exit();
            }
        }
    }
    else {
        header("Location: editTuitionProfile.php");
            exit();
    }

?>
