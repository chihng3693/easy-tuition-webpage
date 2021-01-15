<?php
    session_start();

    if (isset($_SESSION['userEmail']) && isset($_SESSION['userPassword'])) {

		include("../login/connection.php");

		$userID = $_SESSION['userID'];
        $query = "SELECT * FROM users WHERE userID='$userID'";
        $query = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Assignment 2 CPT211</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="profileStyle.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

    <div id="navbar" class="row">

        <!--header-->
        <header>
            <nav>
                <ul>
                    <li><img src="../images/tuition-logo.png" alt="tuition-logo" class="logo"></li>
                    <li> <a href="../userhome/userhome.php">Home</a> </li>
                    <li> <a href="../announcement/announcement.php">Announcement</a> </li>
                    <li> <a href="../payment/payment.php">Payment</a> </li>
                    <li> <a href="profile.php">Profile</a> </li>
					<li><button><a href="../logout.php">Logout</a></button></li>
                </ul>
            </nav>
        </header>

    </div>

    <!--profile-body-->
    <section id="profile">
		<div class="profile-main">
			<div class="profile-header">
				<div class="user-detail">
					<div class="user-data">
						<h2> <?php echo $row['userName']; ?> </h2>
						<p> User ID: <?php echo $row['userID']; ?> </p>
					</div>
				</div>
				<div class="tab-panel-main">
					<ul class="tabs">
						<li class="tab-link current" data-tab="Class-detail">Enroll Classes</li>
						<li class="tab-link current" data-tab="User-detail">Details</li>
					</ul>
					
					<div id="Class-detail" class="tab-content current">
						<div class="class-box">
							<h4>My Enroll Course(s) </h4>
								
								<?php

									$queryGetTuition = "SELECT * FROM user_class_bridge WHERE userID='$userID'";
									$queryGetTuition = mysqli_query($conn, $queryGetTuition);
									$getRows = mysqli_num_rows($queryGetTuition);

									if($getRows > 0){
										while($getRows = mysqli_fetch_assoc($queryGetTuition)) {
											$classID = $getRows['classesID'];
											
											//get class info
											$queryGetTID = "SELECT * FROM tuition_classes WHERE classesID='$classID'";
											$queryGetTID = mysqli_query($conn, $queryGetTID);
											$row1 = mysqli_fetch_assoc($queryGetTID);

											$subject = $row1['classesSubject'];
											$teacher = $row1['classesTeacher'];
											$day = $row1['classesDay'];
											$time = $row1['classesStartTime'] . " - " . $row1['classesEndTime'];;
											$price = $row1['classesPrice'];
											
											//get tuition_class_bridge
											$queryGetTID = "SELECT * FROM tuition_class_bridge WHERE classesID='$classID'";
											$queryGetTID = mysqli_query($conn, $queryGetTID);
											$row2 = mysqli_fetch_assoc($queryGetTID);
											$tuitionID = $row2['tuitionID'];

											//get tuition_centers
											$queryGetTName = "SELECT * FROM tuition_centers WHERE tuitionID='$tuitionID'";
											$queryGetTName = mysqli_query($conn, $queryGetTName);
											$row3 = mysqli_fetch_assoc($queryGetTName);
											
											$tuitionName = $row3['tuitionName'];
								?>
								
									<div>
										<input type="checkbox">
										<label> <?php echo $subject ?> </label>
										<div class="reveal-if-active">
											<ul>
												<li><strong>Tuition Center:</strong> <?php echo $tuitionName ?> </li>
												<li><strong>Teacher Name:</strong> <?php echo $teacher ?> </li>
												<li><strong>Teacher Name:</strong> <?php echo $day ?> </li>
												<li><strong>Class Time:</strong> <?php echo $time ?> </li>
												<li><strong>Price:</strong> <?php echo $price ?> </li>
											</ul>
										</div>
									</div>
								
								<?php
										}
									}
									else {
										echo "Result not found";
									}
								?>
						
						</div>
					</div>

					<div id="User-detail" class="tab-content">
						<div class="detail-box">
							<h4>BASIC INFORMATION</h4>
							<div class="title">IC Number: </div>
							<div class="info"> <?php echo $row['userIC'] ?> </div><br>
							<div class="title">Gender: </div>
							<div class="info"> <?php echo $row['userGender'] ?> </div><br>
							<br>
							<h4>CONTACT INFORMATION</h4>
							<div class="title">Phone: </div>
							<div class="info"> <?php echo $row['userPhone']; ?> </div><br>
							<div class="title">E-mail: </div>
							<div class="info"> <?php echo $_SESSION['userEmail'] ?> </div><br>
							<div class="title">Address: </div>
							<?php $address = $row['userStreet'] . ", " . $row['userPoscode'] . ", " . $row['userCity'] . ", " 
							. $row['userState']; ?>
							<div class="info"> <?php echo $address ?> </div>
						</div>
					</div>
					
				</div>
			</div>
			<div class="footer-box"></div>
		</div>
    </section>

    <!--footer-->
    <div class="row">
        <footer>
            <p>Copyright © 2019 - Universiti Sains Malaysia</p>
        </footer>
    </div>

	<script src="profileFunc.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('ul.tabs li').click(function(){
				var tab_id = $(this).attr('data-tab');

				$('ul.tabs li').removeClass('current');
				$('.tab-content').removeClass('current');

				$(this).addClass('current');
				$("#"+tab_id).addClass('current');
			});
		});

		var FormStuff = {
			init: function() {
				this.applyConditionalRequired();
				this.bindUIActions();
			},
			
			bindUIActions: function() {
				$("input[type='radio'], input[type='checkbox']").on("change", this.applyConditionalRequired);
			},
			
			applyConditionalRequired: function() {
          		$(".require-if-active").each(function() {
          		var el = $(this);
          		if ($(el.data("require-pair")).is(":checked")) {
            		el.prop("required", true);
          		} else {
            		el.prop("required", false);
          		}
          		});
        	}
		};
		FormStuff.init();
	</script>
</body>
</html>

<?php
    } else {
        header("Location: index.php");
        exit();
    }
?>