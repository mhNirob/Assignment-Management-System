<?php
require 'core.php';
require 'connect.php';

$ID = $_SESSION['submit_ID'];
$_SESSION['delete_id'] = $ID;

$query = sprintf("SELECT DISTINCT Name,Topic,Problem,Resource_Link,Starting_Time,Ending_Time,Sets,Password FROM assignment WHERE Assignment_ID = '%d'",
			mysqli_real_escape_string($link,$ID));
$query_run = mysqli_query($link,$query);
$query_num_rows = mysqli_num_rows($query_run);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Assignment Information</title>
		<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
	</head>
	<body>
	<a href="teacher_core.php">Home</a><br><br>
	<?php
		if(!$query || $query_num_rows==0){
	?>
		<h1>Error! No Information Retrieved!</h1>
	<?php
		}
		else{
			$row = mysqli_fetch_row($query_run);
	?>
		<table>
			<thead>
				<tr>
					<th colspan="2">Assignment Information</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><strong>Title: </strong><?php echo $row[0] ?></td>
					<td><strong>ID: </strong><?php echo $ID ?></td>
				</tr>
				<tr>
					<td colspan="2"><strong>Topic: </strong><?php echo $row[1] ?></td>
				</tr>
				<tr>
					<td colspan="2"><strong>Problem: </strong><?php echo $row[2]?></td>
				</tr>
				<tr>
					<td colspan="2"><strong>Resource/Links: </strong><?php echo $row[3]?></td>
				</tr>
				<tr>
					<td><strong>Starting Time:</strong> <?php echo $row[4]?></td>
					<td><strong>Ending Time: </strong><?php echo $row[5]?></td>
				</tr>
				<tr>
					<td colspan="2"><strong>Number of set(s):</strong> <?php echo $row[6]?></td>
				</tr>
				<tr>
					<td><a href="enroll_info.php">View Enrollment Information</a></td>
				
					<td><a href="assignment_delete.php">Delete Assignment</a></td>
				
				</tr>
			</tbody>
		</table>
	<?php
		}
	?>
	</body>
</html>