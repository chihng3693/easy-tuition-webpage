<!DOCTYPE html>
<html>
<?php
    session_start();
    include("connection.php");
?>

<head>
    <title>Assignment 2 CPT211</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="addAnnouncementStyle.css?v=<?php echo time(); ?>">
</head>

<body>

    <div id="navbar" class="row">
        <!--header-->
        <header>
            <nav>
                <ul>
                    <li><img src="../images/tuition-logo.png" alt="tuition-logo" class="logo"></li>
                    <li> <a href="userhome.php">Home</a> </li>
                    <li> <a href="">Add Announcement</a> </li>
                    <li> <a href="">Payment</a> </li>
                    <li> <a href="">Profile</a> </li>
                </ul>
            </nav>
        </header>

    </div>

    <!--announcement-body-->
    <section>
        <div id="announcement" class="row">
          <form action="addAnnouncementMethod.php" method="post">
            <h1>Add Annoucement</h1>
            <div class="feedback">
              <label>Tuition Class ID</label>
              <input type="text" name="tuitionID" placeholder="Tuition Class ID">
              </p>
              <label>Selection</label>
              <select>
                <?php
                  include("connection.php");
                  $command = "SELECT classesName FROM tuitionClasses t1
                  INNER JOIN tuition_class_bridge t2 ON t1.tuitionID = t2.tuitionID
                  WHERE t2.tuitionID = '$_SESSION['userID']'";
                  $sql = mysqli_query($conn, $command);

                  if($sql){
                      header("Location: addAnnouncementPage.php?success=Announcement has been posted!");
                      exit();
                  } else{
                      header("Location: addAnnouncementPage.php?error=Unknown error occurred");
                      exit();
                  }
                ?>
              </select>
              <br>
              <label>Annoucement Notice</label>
              <textarea rows="6" cols="60" name="details"></textarea>
              <br></br>
              <button type="submit">Submit Annoucement</button>
              </form>
            </div>
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
