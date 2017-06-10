
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
<a href="student_core.php">Home</a><br><br><br>
<?php
require 'core.php';
require 'connect.php';
if(isset($_POST['ID']) && isset($_POST['password'])){
		$ID = $_POST['ID'];
		$password = $_POST['password'];

		if(!empty($ID) && !empty($password)){
			$query = sprintf("SELECT Assignment_ID,Password FROM assignment
  		    WHERE Assignment_ID='%d' AND Password='%s'",
            mysqli_real_escape_string($link,$ID),
            mysqli_real_escape_string($link,$password));

            $ver_query = sprintf("SELECT Assignment_ID FROM enroll
  		    WHERE Assignment_ID='%d' AND Student_ID='%d'",
            mysqli_real_escape_string($link,$ID),
            mysqli_real_escape_string($link,$_SESSION['user_id']));

			$query_run = mysqli_query($link,$query);
			$ver_query_run = mysqli_query($link,$ver_query);

			if($query_run){
				$query_num_rows = mysqli_num_rows($query_run);
				$ver_query_num_rows = mysqli_num_rows($ver_query_run);

				if($query_num_rows==0){
					echo nl2br("Invalid Assignment ID or password. Try again.\n"); }
				else if($ver_query_num_rows>0){
					echo nl2br("You are already enrolled in this assignment.\n\n"); }
					//$_SESSION['current_assign'] = $ID;
					//echo nl2br("Check Assignment Details. <a href='assignment_details.php'>check</a>\n\n\n");
				else{

					echo nl2br("You have enrolled this assignment successfully!\n\n\n");
					
					$query = sprintf("SELECT Assignment_ID,Teacher_ID,Name,Topic,Problem,Resource_Link,Starting_Time,Ending_Time,Sets 
									  FROM assignment
				  		    		  WHERE Assignment_ID='%d' AND Password='%s' AND Set_ID=1",
				            	      mysqli_real_escape_string($link,$ID),
				            		  mysqli_real_escape_string($link,$password));

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
									$trow = mysqli_fetch_row($query_run);
								}
							}
							else{
								echo nl2br("Error!\n");
							}
							
							echo nl2br("Assignment Details\n\n");
							echo nl2br("Assignment ID : ".$row[0]."\n\n");
							echo nl2br("Teacher Name : ".$trow[0]."\n\n");
							echo nl2br("Name of assignment : ".$row[2]."\n\n");
							echo nl2br("Topic : ".$row[3]."\n\n");
							echo nl2br("Problem Or Link : ".$row[4]."\n\n");
							echo nl2br("Resource Link : ".$row[5]."\n\n");
							echo nl2br("Starting Time : ".$row[6]."\n\n");
							echo nl2br("Ending Time : ".$row[7]."\n\n");
							$set_number = rand(1,$row[8]);
							echo nl2br("Set Number : ".$set_number."\n\n");
							
							$query = sprintf("SELECT Reg FROM student 
	  		    						  WHERE ID='%d'",
	                                      mysqli_real_escape_string($link,$_SESSION['user_id']));
							$query_run = mysqli_query($link,$query);
							if($query_run)
								$srow = mysqli_fetch_row($query_run);

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


					$query = sprintf("INSERT INTO enroll(Assignment_ID,Teacher_ID,Student_ID,Student_Reg,Set_ID,Ans) VALUES('%d','%d','%d','%s','%d','%s')",
								mysqli_real_escape_string($link,$row[0]),
								mysqli_real_escape_string($link,$row[1]),
								mysqli_real_escape_string($link,$_SESSION['user_id']),
								mysqli_real_escape_string($link,$srow[0]),
								mysqli_real_escape_string($link,$set_number),
								mysqli_real_escape_string($link,$vrow[1]));

					$query_run = mysqli_query($link,$query);

					if($query_run){
						//echo "Success";
					}
					else{
						echo nl2br("\n\n\nError!!!\n");
					}

						}
					}
				}
			}
		}
		else{
			echo "You must give a username and password.\n";
		}
}

?>

<form action="student_enroll.php" method="POST">
</br>
Enroll to a new assignment 
</br></br>
Assignment ID <br> <input type="text" name ="ID" required><br><br>
Password <br> <input type="password" name ="password" required><br><br>

<!-- value ="<?php echo $name;?>" -->
<!-- value = "<?php echo $email; ?>" -->
<!-- value = "<?php echo $username; ?>" -->
<!-- value = "<?php echo $department; ?>"  -->

<button type="submit" value="Enroll">Enroll</button>
</br></br>

</form>

</body>
</html>