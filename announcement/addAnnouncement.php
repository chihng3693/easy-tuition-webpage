<!DOCTYPE html>
<html>

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
            <h1>Add Annoucement</h1>
            <div class="feedback">
              <p>Subject:
                <select id="subject" name="subject">
                  <option value="Internet Explorer">English</option>
                  <option value="Firefox">Mathematics</option>
                  <option value="Chrome">Bahasa Malaysia</option>
                  <option value="Opera">Science</option>
                  <option value="Safari">Chinese</option>
                </select>
              </p>
              <p>Annoucement Notice</p>
              <textarea rows="6" cols="60" name="details"></textarea>
              <br></br>
              <button type="submit">Submit Annoucement</button>
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
