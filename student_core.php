<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
<?php
	require 'core.php';

	echo nl2br("<h1>Hello, ".$_SESSION['name']."!</h1>");
	echo '<br><a href="profile_student.php">Profile</a><br>';
	echo nl2br("<br><a href='student_enroll.php'>Enroll to an assignment</a><br>");
	echo nl2br("<br><a href='assignment_details.php'>Your assignments</a><br>");
	echo '<br><a href="logout.php">Log Out</a>';

?>


</body>
</html>