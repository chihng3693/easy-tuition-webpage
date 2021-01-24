<!DOCTYPE html>
<html>
  <head>
    <title>Edit Tuition Profile</title>
    <link rel="stylesheet" type="text/css" href="styleEditTuitionProfile.css">
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
                  <li> <a href="../tuition/viewPayment.php">Payment</a> </li>
                  <li> <a href="../tuition/AddClass.php">Add Class</a> </li>
                  <li> <a href="../tuition/editTuitionProfile.php">Edit Profile</a> </li>
                  <li><button onclick="document.location.href='../logout.php'">Logout</button></li>
                </ul>
            </nav>
        </header>

    </div>
    <form action="editTuitionProfileMethod.php" method="post">
      <div class="container">
        <h1>Edit Tuition Profile</h1>
        <p>Please fill in this form to edit the profile.</p>
        <label>Tuition Name</label>
        <input type="text" name="Tuiname" placeholder="Name">
        <br>

        <label>Phone Number</label>
        <input type="text" name="phone" placeholder="Phone Number">
        <br>

        <label>Street</label>
        <input type="text" name="street" placeholder="Street Name">
        <br>
        <label>Poscode</label>
        <input type="text" name="poscode" placeholder="Poscode">
        <br>
        <label>City</label>
        <input type="text" name="city" placeholder="City">
        <br>
        <label>State</label>
        <select id="state" name="state">
            <option value="Pulau Pinang">Pulau Pinang</option>
            <option value="Melaka">Melaka</option>
            <option value="Sabah">Sabah</option>
            <option value="Sarawak">Sarawak</option>
            <option value="Johor">Johor</option>
            <option value="Kelantan">Kelantan</option>
            <option value="Kedah">Kedah</option>
            <option value="Negeri Sembilan">Negeri Sembilan</option>
            <option value="Pahang">Pahang</option>
            <option value="Perak">Perak</option>
            <option value="Perlis">Perlis</option>
            <option value="Selangor">Selangor</option>
            <option value="Terengganu">Terengganu</option>
            <option value="Kuala Lumpur">Kuala Lumpur</option>
            <option value="Labuan">Labuan</option>
            <option value="Putrajaya">Putrajaya</option>
        </select>
        <br>
        <?php if(isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if(isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>
        <button type="submit" class="submitbtn">Submit</button>
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
