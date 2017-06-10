<?php
require 'core.php';
require 'connect.php';
//include_once 'create_assignment.php';


if(isset($_POST['submit'])){
	for($tset=1;$tset<=$_SESSION['assign_nVariable'];$tset++){
		$_SESSION['assign_variable_bound'.$tset] = $_POST['variable'.$tset];
		echo $_SESSION['assign_variable_bound'.$tset];
		//$_SESSION['assign_ans'.$tset] = $_POST['ans'.$tset];
	}

	header('Location: variableAuto2.php');
}
?>

<form action="variableAuto1.php" method="POST">

<?php
for($tset=1;$tset<=$_SESSION['assign_nVariable'];$tset++){
?>
	How Many Range You Want To Input for Variable <?php echo $tset?> <br> <input type="int" name ="<?php echo'variable'.$tset ?>" size = "50"
	required><br> 

<?php

}

?>

<input type="submit" name="submit" value="Submit"> 

</form>