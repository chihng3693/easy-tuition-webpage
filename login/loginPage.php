<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="login.css?v=<?php echo time(); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<form action="loginMethod.php" method="post">
        <h2> User Log In </h2>
        <?php if(isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <br>
        <label>Email</label>
        <input type="text" name="email" placeholder="Email">
        <br>
        <label>Password</label>
        <input type="password" name="pswd" placeholder="Password">
        <br>
				<label>User Type</label>
        <select id="userType" name="userType">
            <option value="student">Student</option>
            <option value="tuition_center">Tuition Center</option>
        </select>
        <br>
        <a  style="margin-left:18px; text-decoration: none;" href="../index.php">Back</a>
        <button type="submit">Login</button>
    </form>
</body>
</html>
