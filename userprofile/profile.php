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
                </ul>
            </nav>
        </header>

    </div>

    <!--profile-body-->
    <section id="profile">
		<div class="profile-main">
			<div class="profile-header">
				<div class="user-detail">
					<div class="user-image">
					<img src="user1.png"> 
					</div>
					<div class="user-data">
						<br><br>
						<h2>Nurul Adlina Ibrahim</h2>
					</div>
				</div>
				<div class="tab-panel-main">
					<ul class="tabs">
						<li class="tab-link current" data-tab="Class-detail">Enroll Classes</li>
						<li class="tab-link current" data-tab="User-detail">Details</li>
					</ul>
					
					<div id="Class-detail" class="tab-content current">
						<div class="class-box">
							<form method="post" action="#">
								<h4>My Enroll Course(s) </h4>
								<div>
									<input type="checkbox" name="math-class" id="math">
									<label for="math">Mathematics</label>
									<div class="reveal-if-active">
										<ul>
											<li><strong>Tuition Center:</strong> Gemilang Tuition Center</li>
											<li><strong>Teacher Name:</strong> Miss Amy</li>
											<li><strong> Last Day Attended:</strong> 2/12/2020</li>
										</ul>
									</div>
								</div> 

								<div>
									<input type="checkbox" name="science-class" id="science">
									<label for="science">Sciences</label>
									<div class="reveal-if-active">
										<ul>
											<li><strong>Tuition Center:</strong> Gemilang Tuition Center</li>
											<li><strong>Teacher Name:</strong> Madam Pameela</li>
											<li><strong> Last Day Attended:</strong> 5/12/2020</li>
										</ul>
									</div>
								</div>
							</form>
						</div>
					</div>

					<div id="User-detail" class="tab-content">
						<div class="detail-box">
							<h4>CONTACT INFORMATION</h4>
							<div class="title">Phone: </div>
							<div class="info">010-1123458</div><br>
							<div class="title">E-mail: </div>
							<div class="info"><a href="mailto:adlina@mail.com">adlina@mail.com</a></div><br>
							<div class="title">Address: </div>
							<div class="info">Kampung Dua Bukit, Gelugor, 11700, Penang</div>

							<h4>BASIC INFORMATION</h4>
							<div class="title">IC Number: </div>
							<div class="info">990723-07-6702</div><br>
							<div class="title">Age: </div>
							<div class="info">21</div><br>
							<div class="title">Gender: </div>
							<div class="info">Female</div><br>
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