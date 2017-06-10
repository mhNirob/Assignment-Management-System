<?php
require 'core.php';
require 'connect.php';

$query = sprintf("SELECT * FROM student WHERE ID = '%d';",mysqli_real_escape_string($link,$_SESSION['user_id']));
$query_run = mysqli_query($link,$query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
	<a href="student_core.php">Home</a>
	<h1>Profile: </h1>
<?php
if(!$query_run){
?>
	<h2>Error! Please try again later.</h2>
<?php
}
else{
$result = mysqli_fetch_row($query_run);
?>
	<table>
		<tbody>
			<tr>
				<td>Name: </td><td><?php echo $result[1];?></td>
			</tr>
			<tr>
				<td>Username: </td><td><?php echo $result[2];?></td>
			</tr>
			<tr>
				<td>Registration no.: </td><td><?php echo $result[3];?></td>
			</tr>
			<tr>
				<td>Email: </td><td><?php echo $result[5];?></td>
			</tr>
			<tr>
				<td>Department: </td><td><?php echo $result[6];?></td>
			</tr>
		</tbody>
	</table>
<?php	
}
?>
</body>
</html>