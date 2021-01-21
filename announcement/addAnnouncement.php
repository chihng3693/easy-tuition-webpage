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
                  <li> <a href="../tuition/tuitionhome.php">Home</a> </li>
                  <li> <a href="../announcement/addAnnouncement.php">Add Announcement</a> </li>
                  <li> <a href="../tuition/viewPayment.php">Payment</a> </li>
                  <li> <a href="../tuition/AddClass.php">Add Class</a> </li>
                  <li> <a href="../tuition/editTuitionProfile.php">Edit Profile</a> </li>
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
              <input type="text" name="classesID" placeholder="Tuition Class ID">
              </p>
              <br>
              <label>Annoucement Notice</label>
              <textarea rows="6" cols="60" name="details"></textarea>
              <br>
              <button type="submit">Submit Annoucement</button>
              <?php if(isset($_GET['error'])) { ?>
                  <p class="error"><?php echo $_GET['error']; ?></p>
              <?php } ?>

              <?php if(isset($_GET['success'])) { ?>
                  <p class="success"><?php echo $_GET['success']; ?></p>
              <?php } ?>
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
