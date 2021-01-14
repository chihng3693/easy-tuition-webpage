<!DOCTYPE html>
<html>

<?php
    session_start();

    if (isset($_SESSION['userEmail']) && isset($_SESSION['userPassword'])) {

?>

<head>
    <title>Assignment 2 CPT211</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="announcementStyle.css?v=<?php echo time(); ?>">
</head>

<body>

    <div id="navbar" class="row">

        <!--header-->
        <header>
            <nav>
                <ul>
                    <li><img src="../images/tuition-logo.png" alt="tuition-logo" class="logo"></li>
                    <li> <a href="../userhome/userhome.php">Home</a> </li>
                    <li> <a href="announcement.php">Announcement</a> </li>
                    <li> <a href="../payment/payment.php">Payment</a> </li>
                    <li> <a href="../userprofile/profile.php">Profile</a> </li>
                    <li><button>Hi, <?php echo $_SESSION['userID']; ?><br><br><a href="../logout.php">Logout</a></button></li>
                </ul>
            </nav>
        </header>

    </div>

    <!--announcement-body-->
    <section>
        <div id="announcement" class="row">

        <?php

            include("../login/connection.php");

            $userID = $_SESSION['userID'];

            $getAnnounceId = "SELECT * FROM annoucementbridge WHERE userID='$userID'";
            
            $getAnnounceId = mysqli_query($conn, $getAnnounceId);
            $announceRows = mysqli_num_rows($getAnnounceId);

            if($announceRows > 0){
                while($announceRows = mysqli_fetch_assoc($getAnnounceId)) {
                
                    $announceID = $announceRows['announcementID'];
                    
                    $query = "SELECT * FROM announcement WHERE announcementID='$announceID'";

                    $query = mysqli_query($conn, $query);
                    $rows = mysqli_num_rows($query);

                    if($rows > 0){
                        while($rows = mysqli_fetch_assoc($query)) {
                
                            $detail = $rows['announcementDetail'];
                            $date = $rows['announcementDate'];
                            $time = $rows['announcementTime'];
        ?>

            <div class="card">
                <div class="container">
                    <ul>
                        <li>Kumon Tuition Centre</li>
                        <li> <?php echo $date ?> </li>
                        <li> <?php echo $time ?> </li>
                    </ul>
                    <p> <?php echo $detail ?> </p>
                </div>
            </div>
        
        <?php
                        }
                    }
                    else {

        ?>
                        <div class="card">
                            <div class="container">
                                <ul>
                                    <li style="padding-left: 370px;">No results</li>
                                </ul>
                            </div>
                        </div>

        <?php
                    }
                }
            }
        ?>

        </div>
    </section>

    <!--footer-->
    <div class="row">
        <footer>
            <p>Copyright © 2019 - Universiti Sains Malaysia</p>
        </footer>
    </div>

    <script src="announcementFunc.js"></script>
</body>
</html>

<?php
    } else {
        header("Location: index.php");
        exit();
    }
?>