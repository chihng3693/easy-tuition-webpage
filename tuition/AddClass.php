<!DOCTYPE html>
<html>
  <head>
    <title>Add Class</title>
    <link rel="stylesheet" type="text/css" href="styleAddClass.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                  <li> <a href="../payment/payment.php">Payment</a> </li>
                  <li> <a href="../tuition/AddClass.php">Add Class</a> </li>
                  <li> <a href="../tuition/editTuitionProfile.php">Edit Profile</a> </li>
                </ul>
            </nav>
        </header>

    </div>
    <form action="AddClassMethod.php" method="post">
      <div class="container">
        <h1>Add Class</h1>
        <p>To add class, please fill in</p>
        <label>Class Subject Name</label>
        <input type="text" name="subjName" placeholder="Subject Name">
        <br>

        <label>Class Start Time</label>
        <input type="text" name="startime" placeholder="Start Time">
        <br>

        <label>Class End Time</label>
        <input type="text" name="endtime" placeholder="End Time">
        <br>
        <label>Class Day</label>
        <input type="text" name="cday" placeholder="Day">
        <br>
        <label>Class Price</label>
        <input type="text" name="cprice" placeholder="Price">
        <br>
        <label>Class Teacher</label>
        <input type="text" name="cteacher" placeholder="Teacher">
        <br>
        <?php if(isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if(isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>
        <button type="submit" name='submit' class="submitbtn">Submit</button>
      </div>


    </form>
    <!--footer-->
    <div class="row">
        <footer>
            <p>Copyright © 2019 - Universiti Sains Malaysia</p>
        </footer>
    </div>
  </body>
</html>
