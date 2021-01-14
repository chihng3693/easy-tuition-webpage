<!DOCTYPE html>
<html>

<head>
    <title>Assignment 2 CPT211</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="mainStyle.css?v=<?php echo time(); ?>">
</head>

<body>

    <div id="main" class="row">

        <!--header-->
        <header>
            <nav>
                <ul>
                    <li><img src="images/tuition-logo.png" alt="tuition-logo" class="logo"></li>
                    <li> <a href="#main">Home</a> </li>
                    <li> <a href="#intro">Introduction</a> </li>
                    <li> <a href="#review">Reviews</a> </li>
                    <!--li> <a href="#about">About Us</a> </li-->
                    <li>
                        <button onclick="document.location.href='login/registerPage.php'">Sign Up</button>
                    </li>
                    <li>
                        <button onclick="document.location.href='login/loginPage.php'">Log In</button>
                    </li>
                </ul>
            </nav>
        </header>


        <div class="row">

            <div class="eleven">
                <!--image-->
                <img src="images/main-image.jpg" alt="main-image" class="main-img"> 
            </div>

            <div class="six">
                <!--image-->
                <img src="images/main-2.jpg" alt="main-image" class="side-img"> 
            </div>

            <div class="five">
                <img src="images/main-3.jpg" alt="main-image" class="side-img"> 
            </div>

        </div>

        <div class="row">
            <a href="#intro">
                <input type="image" src="images/arrow-down.png" id="arrow-down" Title="See More">
            </a>
        </div>

    </div>

    <!--Mission-->
    <section>
        <div id="intro" class="row">

            <div class="eleven">
                <h1 style="text-align: center; font-family: 'Lucida Sans'; padding-left:20px">Introduction</h1>
            </div>
            <div class="four">
                <div class="flip-card-container">
                    <div class="flip-card">
                        <div class="flip-card-front">
                            <img src="icons/question-icon.png" alt="question-icon" style="height:150px; width:150px; padding-right:20px;">
                            <p>Who are We?</p>
                        </div>
                        
                        <div class="flip-card-back">
                            <p> We are a team of dedicated members from Universiti Sains Malaysia in attempting to help and
                                solve issue regarding to educational constraints during the pandemic especially in tuition
                                centers.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="seven">
                <div class="flip-card-container" style="margin-left:300px">
                    <div class="flip-card">
                        <div class="flip-card-front">
                            <img src="icons/job-icon.png" alt="job-icon" style="height:150px; width:150px; padding-right:20px;">
                            <p>What we do?</p>
                        </div>
                        
                        <div class="flip-card-back">
                            <p> We are attempting to provide the best tuition booking system to ease parents and students 
                                in finding tuition centers during this pandemic and providing a proper platform for users
                                to communicate with tuition centers easily.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="four">
                <div class="flip-card-container">
                    <div class="flip-card">
                        <div class="flip-card-front">
                            <img src="icons/mission-icon.png" alt="mission-icon" style="height:150px; width:180px; padding-right:20px;">
                            <p>Our Mission</p>
                        </div>
                        
                        <div class="flip-card-back">
                            <p> To Provide the best tuition booking system in Town and help in student educational
                                development during the pandemic. <br>
                                This is what we are, as per our name - Easy Tuition!
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="seven">
                <div class="flip-card-container" style="margin-left:300px">
                    <div class="flip-card">
                        <div class="flip-card-front">
                            <img src="icons/teacher-icon.png" alt="teachers-icon" style="height:150px; width:150px; padding-right:20px;">
                            <p>Tuition Centers</p>
                        </div>
                        
                        <div class="flip-card-back">
                            <p> Tuition Centers registered with us are the best in their field and equipped with good 
                                facilities with passionate teachers and tutors in the region. </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    
    <!--Reviews-->
    <section>
        <div id="review" class="row">

            <div class="eleven" style="margin-left:70px">
                <h1 style="text-align: center; font-family: 'Lucida Sans'; padding-left:20px">Reviews</h1>
            </div>

            <div id="slide1" class="slideshow-container">
                <div class="mySlides fade">
                    <img src="images/zamil.jpg" alt="user1" style="height:150px; width:150px; padding-right:20px; border-radius:50%;">
                    <p>"My tutor in Easy Tuition was very thorough and took careful measures in helping me grasp a concept 
                        that I had forgotten." </p>
                    <p style="text-align:right;">- Ahmad Zamil</p>
                </div>
                <div class="mySlides fade">
                    <img src="images/farhana.jpg" alt="user2" style="height:150px; width:150px; padding-right:20px; border-radius:50%;">
                    <p>"The tutor in Easy Tuition was very encouraging and helped me through the entire process step by step!"</p>
                    <p style="text-align:right;">- Farhana</p>
                </div>

                <!--Next/prev buttons-->
                <a class="prev" onclick="plusSlides(-1,slide1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1,slide1)">&#10095;</a>

            </div>

        </div>
    </section>

    <!--About US
    <section>
        <div id="about" class="row">

            <div class="eleven">
                <h1 style="text-align: center; font-family: 'Lucida Sans'; padding-left:20px">About Us</h1>
            </div>

        </div>
    </section>
    -->

    <!--footer-->
    <div class="row">
        <footer>
            <p>Copyright © 2019 - Universiti Sains Malaysia</p>
        </footer>
    </div>

    <script src="mainFunc.js"></script>
</body>
</html>