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
    <link rel="stylesheet" href="userhomeStyle.css?v=<?php echo time(); ?>">
</head>

<body>
    
    <div id="navbar" class="row">
        <!--header-->
        <header>
            <nav>
                <ul>
                    <li><img src="../images/tuition-logo.png" alt="tuition-logo" class="logo"></li>
                    <li> <a href="userhome.php">Home</a> </li>
                    <li> <a href="../announcement/announcement.php">Announcement</a> </li>
                    <li> <a href="../payment/payment.php">Payment</a> </li>
                    <li> <a href="../userprofile/profile.php">Profile</a> </li>
                    <li><button>Hi, <?php echo $_SESSION['userID']; ?><br><br><a href="../logout.php">Logout</a></button></li>
                    <!--li> <p> Hi, </p><a href="../logout.php">Logout</a> </li-->
                </ul>
            </nav>
        </header>

    </div>

    <!--home-body-->
    <section>
        <div id="home" class="row">
            <form method="get">
                <input type="text" placeholder="Enter Subject" name="search">
                <input type="submit" name="submit" value="Search">
            </form>
        </div>
    </section>
    
    <section>
        <div id="sugesstion" class="row">
    <?php

    include("../login/connection.php");

    if (isset($_GET["submit"])) {

        $keyword = $_GET['search'];

        $terms = explode(" ", $keyword);
        
        $query = "SELECT * FROM tuition_classes WHERE ";

        $i = 0;

        //if user search multiple terms
        foreach($terms as $each){
            $i = $i + 1;
            if($i == 1){
                $query .= "classesSubject LIKE '$each'";
            }
            else {
                $query .= "OR classesSubject LIKE '$each'";
            }
        }

        $query = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($query);

        if($rows > 0){
            while($rows = mysqli_fetch_assoc($query)) {
                
                $subject = $rows['classesSubject'];
                $price = $rows['classesPrice'];

                $classID = $rows['classesID'];
                $queryGetTID = "SELECT * FROM tuition_class_bridge WHERE classesID='$classID'";
                $queryGetTID = mysqli_query($conn, $queryGetTID);
                $row1 = mysqli_fetch_assoc($queryGetTID);

                $tuitionID = $row1['tuitionID'];
                $queryGetTName = "SELECT * FROM tuition_centers WHERE tuitionID='$tuitionID'";
                $queryGetTName = mysqli_query($conn, $queryGetTName);
                $row2 = mysqli_fetch_assoc($queryGetTName);
                
                $tuitionName = $row2['tuitionName']
    ?>
                <div class="card">
                    <div class="container">
                        <ul>
                            <li> <?php echo $tuitionName ?> </li>
                            <li> <?php echo $subject ?> </li>
                            <li> <?php echo $price ?> </li>
                            <li><button>Register</button></li>
                        </ul>
                    </div>
                </div>

    <?php
            }
        }
        else {
            echo "Result not found";
        }

    } else {
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

    ?>
        </div>
    </section>

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