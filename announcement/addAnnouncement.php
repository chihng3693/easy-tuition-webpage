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
                    <li> <a href="">Announcement</a> </li>
                    <li> <a href="">Payment</a> </li>
                    <li> <a href="">Profile</a> </li>
                </ul>
            </nav>
        </header>

    </div>

    <!--announcement-body-->
    <section>
        <div id="announcement" class="row">
            <h1>Post Annoucement</h1>
            <div class="feedback">
              <p>Subject:
                <select id="subject" name="subject">
                  <option value="Internet Explorer">test</option>
                  <option value="Firefox">test</option>
                  <option value="Chrome">test</option>
                  <option value="Opera">test</option>
                  <option value="Safari">test</option>
                </select>
              </p>
              <p>Annoucement Title</p>
              <input type="text" name="title" placeholder="Annoucement Title">
              <p>Annoucement Notice</p>
              <textarea rows="6" cols="60" name="details"></textarea>
              <br></br>
              <button>Submit Annoucement</button>
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