
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
<?php
require 'core.php';
require 'connect.php';

if(isset($_POST['ans']) && !empty($_POST['ans'])){


	date_default_timezone_set('Asia/Dhaka');
	$datetime = date('m/d/Y h:i:s a', time());


	$query = sprintf("UPDATE enroll SET Student_Ans = '%s', Submission_Time = '%s'
					  WHERE Assignment_ID='%d' AND Student_ID='%d'",
					    mysqli_real_escape_string($link,$_POST['ans']),
					    mysqli_real_escape_string($link,$datetime),
					    mysqli_real_escape_string($link,$_SESSION['submit_id']),
					    mysqli_real_escape_string($link,$_SESSION['user_id']));

					$query_run = mysqli_query($link,$query);


					if($query_run){
						echo nl2br("Your answer was submitted successfully!\n\n");
						echo nl2br("Your Submission Time : ".$datetime."\n\n");
					}
					else{
						echo mysqli_error($link);
						echo nl2br("Sorry, Submission unsuccessfull. Try again later.\n");
					}
}



?>


<form action="submit_answer.php" method="POST">
Your Answer <br> <input type="text" name ="ans" size = "25" required><br><br>
<button type="submit" value="submit">Submit</button><br><br>
<a href="student_core.php">Home</a>
</form>

</body>
</html>