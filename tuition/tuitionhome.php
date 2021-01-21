<!DOCTYPE html>
<html>

<head>
    <title>Assignment 322</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="tuitionhomeStyle.css?v=<?php echo time(); ?>">
</head>

<body>

    <div id="navbar" class="row">
        <!--header-->
        <header>
            <nav>
                <ul>
                  <li><img src="images/tuition-logo.png" alt="tuition-logo" class="logo"></li>
                  <li> <a href="tuitionhome.php">Home</a> </li>
                  <li> <a href="addAnnouncement.php">Add Announcement</a> </li>
                  <li> <a href="viewPayment.php">View Payment</a> </li>
                  <li> <a href="AddClass.php">Add Class</a> </li>
                  <li> <a href="editTuitionProfile.php">Profile</a> </li>
                </ul>
            </nav>
        </header>

    </div>

    <!--announcement-body-->
    <section>
      <div id="tuitionhome" class="row">
        <h1>View Payment</h1>
          <table>
            <tr>
              <th>Class ID</th>
              <th>Course</th>
              <th>Teacher</th>
              <th>Price</th>
            </tr>

            <?php
            session_start();
            include("login/connection.php");

            //change the tuitionID get from session
            $tuitionID = $_SESSION['userID'];

            $query1 = "SELECT * FROM tuition_class_bridge WHERE tuitionID='$tuitionID'";

            $query1 = mysqli_query($conn, $query1);
            $rows1 = mysqli_num_rows($query1);

            if($rows1 > 0){
              while($rows1 = mysqli_fetch_assoc($query1)) {

                $classesID = $rows1['classesID'];

                //get classes ID
                $query2 = "SELECT * FROM tuition_classes WHERE classesID='$classesID'";
                $query2 = mysqli_query($conn, $query2);
                $rows2 = mysqli_num_rows($query2);

                if($rows2 > 0){
                    while($rows2 = mysqli_fetch_assoc($query2)) {

                      $subj = $rows2['classesSubject'];
                      $teacher = $rows2['classesTeacher'];
                      $price = $rows2['classesPrice'];

                      //get class info
                      //$queryGetStudNumber = "SELECT * FROM user_class_bridge WHERE classesID='$classesID'";
                      //$queryGetStudNumber = mysqli_query($conn, $queryGetClass);
                      //$row = mysqli_fetch_assoc($queryGetStudNumber);
                      //$studNum = $row['classesID'];
          ?>

            <tr>
              <td><?php echo $classesID ?></td>
              <td><?php echo $subj?></td>
              <td><?php echo $teacher?></td>
              <td><?php echo $price?></td>
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
