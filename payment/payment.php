<?php
    session_start();

    if (isset($_SESSION['userEmail']) && isset($_SESSION['userPassword'])) {

?>

<!DOCTYPE html>
<html>

<head>
    <title>Assignment 2 CPT211</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="paymentStyle.css?v=<?php echo time(); ?>">
</head>

<body>
    
    <div id="navbar" class="row">
        <!--header-->
        <header>
            <nav>
                <ul>
                    <li><img src="../images/tuition-logo.png" alt="tuition-logo" class="logo"></li>
                    <li> <a href="../userhome/userhome.php">Home</a> </li>
                    <li> <a href="../announcement/announcement.php">Announcement</a> </li>
                    <li> <a href="../payment/payment.php">Payment</a> </li>
                    <li> <a href="../userprofile/profile.php">Profile</a> </li>
                    <!--li><button>Hi, <//?php echo $_SESSION['userID']; ?><br><br><a href="../logout.php">Logout</a></button></li-->
                    <!--li> <p> Hi, </p><a href="../logout.php">Logout</a> </li-->
                </ul>
            </nav>
        </header>

    </div>
    
    <section>
        <div id="payment" class="row">
            <?php

                include("../login/connection.php");

                $userID = $_SESSION['userID'];

                $query = "SELECT * FROM payment WHERE userID='$userID'";

                $query = mysqli_query($conn, $query);
                $payRows = mysqli_num_rows($query);

                if($payRows > 0){
                    while($payRows = mysqli_fetch_assoc($query)) {
                    
                        $classesID = $payRows['classesID'];
                        $payStats = $payRows['paymentStatus'];

                        //get tuition info
                        $getClass = "SELECT * FROM tuition_classes WHERE classesID='$classesID'";

                        $getClass = mysqli_query($conn, $getClass);
                        $classRow = mysqli_num_rows($getClass);

                        if($classRow > 0){
                            while($classRow = mysqli_fetch_assoc($getClass)) {
                                $subject = $classRow['classesSubject'];
                                $price = $classRow['classesPrice'];

                                //get tuition_class_bridge
								$queryGetTID = "SELECT * FROM tuition_class_bridge WHERE classesID='$classesID'";
								$queryGetTID = mysqli_query($conn, $queryGetTID);
								$bridgeRow = mysqli_fetch_assoc($queryGetTID);
								$tuitionID = $bridgeRow['tuitionID'];

								//get tuition_centers
								$queryGetTName = "SELECT * FROM tuition_centers WHERE tuitionID='$tuitionID'";
								$queryGetTName = mysqli_query($conn, $queryGetTName);
								$tuitionRow = mysqli_fetch_assoc($queryGetTName);
											
								$tuitionName = $tuitionRow['tuitionName'];
            ?>

                <div class="card">
                    <div class="container">
                        <ul>
                            <li> Class ID: <?php echo $classesID ?> </li>
                            <li> <?php echo $tuitionName ?> </li>
                            <li> <?php echo $subject ?> </li>
                            <li> <?php echo $price ?> </li>
                            <li> <?php echo $payStats ?> </li>
                            <li>
                                <?php if($payStats == "Not Paid") { ?>
                                <button onclick="document.location.href='userPay.php'">Pay</button>
                                <?php } else { ?>
                                    <!-- No button -->
                                <?php } ?>
                            </li>

                        </ul>
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

    <?php
    
    /*
    if (isset($_GET["register"])) {

        echo $_SESSION['userID'];
        echo "Success";
                } else {
                    echo "Failed";
                }
    */
    ?>

    <div class="row">
        <footer>
            <p>Copyright © 2019 - Universiti Sains Malaysia</p>
        </footer>
    </div>

    <script src="userhomeFunc.js"></script>

</body>
</html>

<?php
    } else {
        header("Location: index.php");
        exit();
    }
?>