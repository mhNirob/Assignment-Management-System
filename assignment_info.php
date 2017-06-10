<!DOCTYPE html>
<html>
<head>
	<title>Assignment Information</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
<a href="student_core.php">Home</a><br><br><br>
<?php
require 'core.php';
require 'connect.php';

$ID = $_SESSION['submit_ID'];
/*if(isset($_POST['submit'])){
		$ID = $_POST['ID'];
		$_SESSION['submit_id'] = $ID;*/
		if(!empty($ID)){
			$query = sprintf("SELECT Teacher_ID,Set_ID FROM enroll
  		    WHERE Assignment_ID='%d' AND Student_ID='%d'",
            mysqli_real_escape_string($link,$ID),
            mysqli_real_escape_string($link,$_SESSION['user_id']));

			$query_run = mysqli_query($link,$query);

			if($query_run){
				$query_num_rows = mysqli_num_rows($query_run);
				if($query_num_rows==0){
					echo nl2br("You are not enrolled in this assignment.\n\n\n");
					echo nl2br("<a href='student_enroll.php'>Enroll</a>\n\n\n");
				}
				else{
					
					echo nl2br("\n\n");
					$trow= mysqli_fetch_row($query_run);

					$query = sprintf("SELECT Assignment_ID,Teacher_ID,Name,Topic,Problem,Resource_Link,Starting_Time,Ending_Time,Sets 
									  FROM assignment
				  		    		  WHERE Assignment_ID='%d' AND Set_ID='%d'",
				            	      mysqli_real_escape_string($link,$ID),
				            		  mysqli_real_escape_string($link,$trow[1]));

					$query_run = mysqli_query($link,$query);

					if($query_run){
						if($query_num_rows==0){
							echo nl2br("No such assignment.\n");
						}
						else{			
							$row = mysqli_fetch_row($query_run);

							$query = sprintf("SELECT Name FROM teacher 
	  		    						  WHERE ID='%d'",
	                                      mysqli_real_escape_string($link,$row[1]));
							$query_run = mysqli_query($link,$query);
							if($query_run){
								$query_num_rows = mysqli_num_rows($query_run);
								if($query_num_rows==0){
									echo "No teacher with this ID\n";
								}
								else{
									$tea_row = mysqli_fetch_row($query_run);
								}
							}
							else{
								echo nl2br("Error!\n");
							}
							
							// echo nl2br("Assignment Details\n\n");
							echo nl2br("Assignment ID : ".$row[0]."\n\n");
							echo nl2br("Teacher Name : ".$tea_row[0]."\n\n");
							echo nl2br("Name of assignment : ".$row[2]."\n\n");
							echo nl2br("Topic : ".$row[3]."\n\n");
							echo nl2br("Problem Or Link : ".$row[4]."\n\n");
							echo nl2br("Resource Link : ".$row[5]."\n\n");
							echo nl2br("Starting Time : ".$row[6]."\n\n");
							echo nl2br("Ending Time : ".$row[7]."\n\n");
							$set_number = $trow[1];
							echo nl2br("Set Number : ".$set_number."\n\n");
							
							$_SESSION['submit_id']=$row[0];
							$_SESSION['submit_set_id'] = $set_number;

							$query = sprintf("SELECT Variable,Ans FROM assignment 
	  		    						  WHERE Assignment_ID='%d' AND Set_ID='%d'",
	  		    						  mysqli_real_escape_string($link,$row[0]),
	                                      mysqli_real_escape_string($link,$set_number));

							$query_run = mysqli_query($link,$query);
							if($query_run){
								$query_num_rows = mysqli_num_rows($query_run);
								if($query_num_rows==0){
									echo nl2br("Error!\n");
								}
								else{
									$vrow = mysqli_fetch_row($query_run);
								}
							}
							else{
								echo nl2br("Error!\n");
							}

							echo nl2br("Value of Variables : ".$vrow[0]."\n\n");
							echo nl2br("<a href='submit_answer.php'>Submit Your Answer</a>\n\n\n");

					}
				}
			}
		}
	}	
//}
?>
</body>
</html>