 <?php
require 'core.php';
require 'connect.php';

if(isset($_POST['submit'])){
	$ID = $_POST['submit_ID'];
	$_SESSION['submit_ID'] = $ID;
	header('Location: assignment_info_teacher.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Assignments</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
	<a href="teacher_core.php">Home</a><br><br><br>
	<table>
		<thead>
			<tr>
				<th>Assignment ID</th>
				<th>Title</th>
				<th>Enrollment Password</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
				$query = sprintf("SELECT DISTINCT Assignment_ID, Name, Password FROM assignment
								WHERE Teacher_ID = '%d';",
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
							<td><strong><?php echo $vrow[1]?></strong></td>
							<td><?php echo $vrow[2]?></td>
							<td>
								<form method="post" action="assignment_state.php">
									<input type="hidden" name="submit_ID" value="<?php echo $vrow[0]; ?>">
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
