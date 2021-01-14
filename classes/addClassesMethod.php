<?php
    session_start();
    include("connection.php");

    if(isset($_POST['classesSubject']) && isset($_POST['classesTeacher']) && isset($_POST['classesDay']) && isset($_POST['startTime'])  && isset($_POST['endTime'])
    && isset($_POST['classesPrice'])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }

        $classesSubject = validate($_POST['classesSubject']);
        $classesTeacher = validate($_POST['classesTeacher']);
        $classesDay = validate($_POST['classesDay']);
        $startTime = validate($_POST['startTime']);
        $endTime = validate($_POST['endTime']);
        $classesPrice = validate($_POST['classesPrice']);

        if(empty($classesSubject) || empty($classesTeacher) || empty($classesDay) || empty($startTime) || empty($endTime) || empty($classesPrice)){
            header("Location: registerPage.php?error=Cannot Leave any Field Blank");
            exit();
        } else {

            $sql = "SELECT * FROM tuition_classes WHERE classesSubject='$classesSubject' ";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0) {

                header("Location: registerPage.php?error=Subject existed.");
                exit();

            } else {
                $sqlpush = "INSERT INTO tuition_classes(classesSubject, classesTeacher, classesDay, classesStartTime, classesEndTime, classesPrice)
                VALUES('$classesSubject', '$classesTeacher', '$classesDay', '$startTime', '$endTime', '$classesPrice')";
                $resultpush = mysqli_query($conn, $sqlpush);

                if($resultpush){
                    header("Location: registerPage.php?success=Class has been added!");
                    exit();
                } else{
                    header("Location: registerPage.php?error=Unknown error occurred");
                    exit();
                }
            }

        }
    }
    else {
        header("Location: addClasses.php");
            exit();
    }

?>
