<!DOCTYPE html>
<html>
<head>
	<title>Sign Up Form</title>
	<link rel="stylesheet" type="text/css" href="login.css?v=<?php echo time(); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<form action="registerMethod.php" method="post">
        <h2> User Sign Up </h2>
        <?php if(isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if(isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>
        <br>
        <label>Email</label>
        <input type="text" name="email" placeholder="Email">
        <br>
        <label>Password</label>
        <input type="password" name="pswd" placeholder="Password">
        <br>
        <label>Name</label>
        <input type="text" name="name" placeholder="Name">
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
        <label>Number of Subjects</label>
        <input type="text" name="numOfSubjects" placeholder="Number of Subjects">
        <br>
        <br>
        <a  style="margin-left:18px; text-decoration: none;" href="../index.php">Back</a>
        <button type="submit">Sign Up</button>
    </form>
</body>
</html>
