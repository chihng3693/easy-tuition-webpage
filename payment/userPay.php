<?php
    session_start();

    if (isset($_SESSION['userEmail']) && isset($_SESSION['userPassword'])) {
                
    $userID = $_SESSION['userID'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="userPayStyle.css?v=<?php echo time(); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<form action="payMethod.php" method="post">
        <h2> Payment Transaction </h2>
        <?php if(isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <?php if(isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>
        <br>
        <label>User ID: <?php echo $userID ?> </label>
        <br><br><br>
        <label>Class ID</label>
        <input type="text" name="classid" placeholder="Class ID">
        <br><br>
        <a  style="margin-left:18px; text-decoration: none;" href="payment.php">Back</a>
        <button type="pay" name="pay">Pay</button>
    </form>
</body>
</html>

<?php
    } else {
        header("Location: index.php");
        exit();
    }
?>