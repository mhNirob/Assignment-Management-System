<?php
require 'core.php';
require 'connect.php';

$ID = $_SESSION['submit_ID'];

$query = sprintf("SELECT s.Reg,s.Name,e.Set_ID,e.Student_Ans,e.Ans,e.Submission_Time
					FROM enroll as e, student as s
					WHERE e.Assignment_ID = '%d' AND e.Student_ID = s.ID
					ORDER BY s.Reg;",
					mysqli_real_escape_string($link,$ID));
$query_run = mysqli_query($link,$query);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Enrollment Information</title>
		<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
	</head>
	<body>
	
		<a href="teacher_core.php">Home</a><br><br><br>
		<?php
			if(!$query){
		?>
			<h1>Error!</h1>
		<?php
			}
			else{
				$query_num_rows = mysqli_num_rows($query_run);
				
				if($query_num_rows==0){
		?>
				<h1>Nobody enrolled in this assignment!</h1>
		<?php
				}
				else{
		?>
				<table>
					<thead>
						<tr>
							<th>Registration no.</th>
							<th>Name</th>
							<th>Set no.</th>
							<th>Submitted Ans.</th>
							<th>Correct Ans.</th>
							<th>Submission Time</th>
						</tr>
					</thead>
					<tbody>
						<?php
							while($row = mysqli_fetch_array($query_run))
							{
						?>
						<tr>
							<td><?php echo $row[0]?></td>
							<td><?php echo $row[1]?></td>
							<td><?php echo $row[2]?></td>
							<td><?php if($row[3]=='') echo 'Not Answered Yet'; else echo $row[3]; ?></td>
							<td><?php echo $row[4]?></td>
							<td><?php if($row[5]=='') echo '-'; else echo $row[5]; ?></td>
						</tr>
						<?php
							}
						?>
					<tbody>
				</table>
		<?php
				}
			}
		?>
	</body>
</html>