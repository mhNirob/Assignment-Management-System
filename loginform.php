<?php
	require_once 'core.php';


	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		if(!empty($username) && !empty($username)){
			$query = "SELECT `ID` FROM `teacher` WHERE `Name` = '$username' AND `Password` = '$password'";  
			
			if($query_run = mysql_query($query)){
				$query_num_rows = mysql_num_rows($query_run);
				if($query_num_rows==0){
					echo "Invalid username or password. Try again.\n";
				}
				else{
					echo "Log In Successfull!";
					echo " Hello, ".$username."!\n";
					$user_id = mysql_result($query_run,0,'ID');
					$_SESSION['user_id']=$user_id;
					header('Location: index.php');
				}
			}

		}
		else{
			echo "You must give a username and password.\n";
		}
	}
?>

<form action="" method="POST">

<br><strong>Log In as teacher</strong><br><br>

Username: <input type="text" name="username">
<br><br>

Password: <input type="password" name="password">

<input type = "submit" value="Log In">

</form>