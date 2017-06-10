<?php
require 'core.php';
require 'connect.php';

$tset=1;

$query = sprintf("SELECT MAX(Assignment_ID) FROM assignment");
$query_run = mysqli_query($link,$query);
if($query_run){
	$row = mysqli_fetch_array($query_run);
}

$tproblem = $_SESSION['assign_problem'];

for(;$tset<=$_SESSION['assign_set'];$tset++){

	$query = sprintf("INSERT INTO assignment VALUES('','%d','%d','%s','%s','%b','%s','%b','%s','%s','%s','%d','%d','%s','%s','%s')",
		mysqli_real_escape_string($link,$row[0]+1),
		mysqli_real_escape_string($link,$_SESSION['user_id']),
		mysqli_real_escape_string($link,$_SESSION['assign_name']),
		mysqli_real_escape_string($link,$_SESSION['assign_topic']),
		mysqli_real_escape_string($link,$_SESSION['Flink']),
		mysqli_real_escape_string($link,$_SESSION['assign_problem']),
		mysqli_real_escape_string($link,$_SESSION['Rlink']),
		mysqli_real_escape_string($link,$_SESSION['assign_resource'] ),
		mysqli_real_escape_string($link,$_SESSION['assign_starting_time']),
		mysqli_real_escape_string($link,$_SESSION['assign_ending_time']),
		mysqli_real_escape_string($link,$_SESSION['assign_set']),
		mysqli_real_escape_string($link,$tset),
		mysqli_real_escape_string($link,$_SESSION['assign_variable'.$tset]),
		mysqli_real_escape_string($link,$_SESSION['assign_ans'.$tset]),
		mysqli_real_escape_string($link,$_SESSION['assign_password']));

		//echo $_SESSION['assign_problem'];

		$query_run = mysqli_query($link,$query);
		if(!$query_run){
			echo $row[0];
			//echo $_SESSION['assign_problem'];
			break;
		}
					
}

if($tset==$_SESSION['assign_set']+1){
	echo nl2br("Assignment created successfully\n\n\n");
	echo nl2br("Your Assignment ID : ".($row[0]+1)."\n");
	echo nl2br("And Password : ".$_SESSION['assign_password']."\n\n\n");
	echo 'Return to main menu   :   <a href="teacher_core.php">Main Menu</a>';
}
else{
	echo nl2br("Sorry, try again\n");
}

?>