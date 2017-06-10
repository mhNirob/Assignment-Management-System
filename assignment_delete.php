
<!DOCTYPE html>
<html>
<head>
	<title>Confirm Delete</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
<div style="display:flex; justify-content:center; align-items:center;">
<?php
require 'core.php';
require 'connect.php';


	if(isset($_POST['dsubmit'])){
		$query = sprintf("DELETE
						  FROM assignment
				  		  WHERE Assignment_ID='%d'",
				          mysqli_real_escape_string($link,$_SESSION['delete_id']));



		$query_run = mysqli_query($link,$query);

		$query = sprintf("DELETE
						  FROM enroll
				  		  WHERE Assignment_ID='%d'",
				          mysqli_real_escape_string($link,$_SESSION['delete_id']));

		$query_run_enroll = mysqli_query($link,$query);

		if($query_run && $query_run_enroll){
			echo nl2br("<p>Assignment was deleted successfully!</p>\n");
			echo '<a href="assignment_state.php">Return to your assignments</a>';

		}
	}else{

?>
<form action="assignment_delete.php" method="POST">
	<button type="submit" name="dsubmit">Confirm Delete</button>
</form>
<?php
}
?>
</div>
</body>
</html>