<!DOCTYPE html>
<html>
<head>
	<title>Sign Up Form</title>
	<link rel="stylesheet" type="text/css" href="addClassesStyle.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<form action="registerMethod.php" method="post">
        <h2> Add New Class </h2>
        <?php if(isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if(isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>
        <br>
        <label>Name of Subject</label>
        <input type="text" name="classesSubject" placeholder="Name of Subject">
        <br>
        <label>Teacher's Name</label>
        <input type="text" name="classesTeacher" placeholder="Teacher's Name">
        <br>
        <label>Day of Tuition</label>
        <select id="classesDay" name="classesDay">
            <option value="monday">Monday</option>
            <option value="tuesday">Tuesday</option>
            <option value="wednesday">Wednesday</option>
            <option value="thursday">Thursday</option>
            <option value="friday">Friday</option>
            <option value="saturday">Saturday</option>
            <option value="sunday">Sunday</option>
        </select>
        <br>
        <label>Start Time</label>
        <input type="text" name="startTime" placeholder="Start Time">
        <br>
        <label>End Time</label>
        <input type="text" name="endTime" placeholder="End Time">
        <br>
        <label>Tuition Price</label>
        <input type="text" name="classesPrice" placeholder="Tuition Price">
        <br>
        <a  style="margin-left:18px; text-decoration: none;" href="../index.php">Back</a>
        <button type="submit">Sign Up</button>
    </form>
</body>
</html>
