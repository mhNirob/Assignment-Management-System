
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
<?php
require_once 'core.php';
require 'connect.php';

if(!loggedin()){

	if(isset($_POST['name'])&&
	   isset($_POST['username'])&&
	   isset($_POST['reg'])&&
	   isset($_POST['email'])&&
	   isset($_POST['password'])&&
	   isset($_POST['confirm_password'])&&
	   isset($_POST['department'])){

		$name = $_POST['name'];
	    $username = $_POST['username'];
	    $reg = $_POST['reg'];
	    $email = $_POST['email'];
	    $password = $_POST['password'];
	    $confirm_password = $_POST['confirm_password'];
	    $department = $_POST['department'];
	    if(!empty($name) && !empty($username) && !empty($reg) && !empty($email) && !empty($password) && !empty($confirm_password) && !empty($department) ){
		    if($password!=$confirm_password){
		    	echo "Password's do not match.\n";
		    }
		    else{
		    	$query = sprintf("SELECT Username FROM student 
	  		    WHERE Username='%s'",
	            mysqli_real_escape_string($link,$username));

				$query_run = mysqli_query($link,$query);

				if(mysqli_num_rows($query_run)==1){
					echo "The username already exists.\n";
				}
				else{
					$query = sprintf("INSERT INTO student VALUES('','%s','%s','%s','%s','%s','%s')",
						mysqli_real_escape_string($link,$name),
						mysqli_real_escape_string($link,$username),
						mysqli_real_escape_string($link,$reg),
						mysqli_real_escape_string($link,$password),
						mysqli_real_escape_string($link,$email),
						mysqli_real_escape_string($link,$department));

					$query_run = mysqli_query($link,$query);


					if($query_run){
						header('Location: register_success.php');
					}
					else{
						echo "Sorry, Registration unsuccessfull. Try again later.";
					}
				}
		    }
		}
	}


?>

<form action="student_register.php" method="POST">

Full Name <br> <input type="text" name ="name" placeholder="name" required><br><br>
Username <br> <input type="text" name ="username" placeholder="maximum 32 character" required><br><br>
Reg. No. <br> <input type="text" name="reg" placeholder="reg. no." required><br><br>
Email <br> <input type="text" name="email" placeholder="email" required><br><br>
Password <br> <input type="password" name ="password" placeholder="maximum 32 character" required><br><br>
Confirm Password <br> <input type="password" name ="confirm_password" placeholder="maximum 32 character" required><br><br>
Department Name <br> <input type="text" name ="department" placeholder="department" required><br><br>

<!-- value ="<?php echo $name;?>" -->
<!-- value = "<?php echo $email; ?>" -->
<!-- value = "<?php echo $username; ?>" -->
<!-- value = "<?php echo $department; ?>"  -->

<button type="submit" value="Register">Confirm</button>
</form>


<?php
}
else if(loggedin()){
	echo "You are already registered and logged in.\n";
}

?>
</body>
</html>