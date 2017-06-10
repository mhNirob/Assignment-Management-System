<?php
require 'core.php';
require 'connect.php';

if(isset($_POST['submit'])){
	$ID = $_POST['ID'];
	$_SESSION['submit_ID'] = $ID;
	
	
	header('Location: assignment_info.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Enrolled Assignments</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
	
	<a href="student_core.php">Home</a>
	<br><br>
	<table>
		<thead>
			<tr>
				<th>Assignment ID</th>
				<th>Assignment Name</th>
				<th>Teacher</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
				
				$query = sprintf("SELECT a.Assignment_ID, a.Name, t.Name FROM assignment as a, teacher as t, enroll as e
					WHERE e.Student_ID = '%d' AND e.Assignment_ID = a.Assignment_ID AND a.Teacher_ID = t.ID AND e.Set_ID = a.Set_ID;",
							mysqli_real_escape_string($link,$_SESSION['user_id']));

				$query_run = mysqli_query($link,$query);
				if($query_run){
					$query_num_rows = mysqli_num_rows($query_run);
					if($query_num_rows==0){
						echo nl2br('<tr><td colspan="4">No Information Retrieved!</td></tr>');
					}
					else{
						while($vrow = mysqli_fetch_array($query_run)){
			?>
							<tr>
							<td><?php echo $vrow[0]?></td>
							<td><?php echo $vrow[1]?></td>
							<td><?php echo $vrow[2]?></td>
							<td>
								<form method="post" action="assignment_details.php">
									<input type="hidden" name="ID" value="<?php echo $vrow[0]; ?>">
									<button type="submit" name="submit">Details</button>
								</form>
							</td>
							</tr>
			<?php
						}
					}
				}
				else{
					echo nl2br("Error!\n");
				}
			?>
		</tbody>
	</table>
</body>
</html>