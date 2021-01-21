<!DOCTYPE html>
<html>

<head>
    <title>Assignment 2 CPT211</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="viewPaymentStyle.css?v=<?php echo time(); ?>">
</head>

<body>

    <div id="navbar" class="row">
        <!--header-->
        <header>
            <nav>
                <ul>
                  <li><img src="../images/tuition-logo.png" alt="tuition-logo" class="logo"></li>
                  <li> <a href="tuitionhome.php">Home</a> </li>
                  <li> <a href="../announcement/addAnnouncement.php">Add Announcement</a> </li>
                  <li> <a href="viewPayment.php">Payment</a> </li>
                  <li> <a href="../tuition/AddClass.php">Add Class</a> </li>
                  <li> <a href="../tuition/editTuitionProfile.php">Edit Profile</a> </li>
                </ul>
            </nav>
        </header>

    </div>

    <!--announcement-body-->
    <section>
      <div id="announcement" class="row">
        <h1>View Payment</h1>
          <table>
            <tr>
              <th>Student ID</th>
              <th>Course</th>
              <th>Payment Status</th>
            </tr>

            <?php

            include("login/connection.php");

            //change the tuitionID get from session
            $tuitionID = $_SESSION['userID'];

            $query1 = "SELECT * FROM tuition_class_bridge WHERE tuitionID='$tuitionID'";

            $query1 = mysqli_query($conn, $query1);
            $rows1 = mysqli_num_rows($query1);

            if($rows1 > 0){
              while($rows1 = mysqli_fetch_assoc($query1)) {

                $classesID = $rows1['classesID'];

                //get payment info
                $query2 = "SELECT * FROM payment WHERE classesID='$classesID'";
                $query2 = mysqli_query($conn, $query2);
                $rows2 = mysqli_num_rows($query2);

                if($rows2 > 0){
                    while($rows2 = mysqli_fetch_assoc($query2)) {

                      $userID = $rows2['userID'];
                      $payStats = $rows2['paymentStatus'];

                      //get class info
                      $queryGetClass = "SELECT * FROM tuition_classes WHERE classesID='$classesID'";
                      $queryGetClass = mysqli_query($conn, $queryGetClass);
                      $row = mysqli_fetch_assoc($queryGetClass);
                      $subject = $row['classesSubject'];
          ?>

            <tr>
              <td><?php echo $userID ?></td>
              <td><?php echo $subject?></td>
              <td><?php echo $payStats?></td>
            </tr>

            <?php
                            }
                        }
                    }
                }
            ?>
          </table>

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
