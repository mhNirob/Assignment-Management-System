<!DOCTYPE html>
<html>
<head>
<title>Heading Example</title>
</head>
<body>
	You have successfully Registered.
	<br>
	Log In again to continue.
	<br>
	<?php
		require 'core.php';
		require 'connect.php';
		echo '<a href="logout.php">Log In</a>';
		//header('Location: logout.php');
	?>
</body>
</html>
