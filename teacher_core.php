<!DOCTYPE html>
<html>
<head>
	<title>Main Menu</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
<?php
	require 'core.php';

	echo nl2br("<h1>Hello, ".$_SESSION['name']."!</h1>");
	
	echo '<br><a href="profile_teacher.php">Profile</a><br>';

	echo '<br><a href="create_assignment.php">Create An Assignment</a><br>';
	echo nl2br("<br><a href='assignment_state.php'>Your assignments</a><br>");
	
	echo '<br><a href="logout.php">Log Out</a>';

?>

</body>
</html>