<?php
require 'core.php';
require 'connect.php';
//include_once 'create_assignment.php';

if(!isset($_POST['submit']))
	$var = $_GET['set'];

if(isset($_POST['submit'])){
	$var=$_POST['var'];
	
	for($tset=1;$tset<=$var;$tset++){
		$_SESSION['assign_variable'.$tset] = $_POST['variable'.$tset];
		$_SESSION['assign_ans'.$tset] = $_POST['ans'.$tset];
	}

	header('Location: assignment_success.php');
}
?>

<form action="variable.php" method="POST">

<?php
for($tset=1;$tset<=$var;$tset++){
?>
	Variable <?php echo $tset?> <br> <input type="varchar" name ="<?php echo'variable'.$tset ?>" size = "50"
	required><br>
	Ans <?php echo $tset?> <br> <input type="varchar" name ="<?php echo'ans'.$tset ?>" size = "50"
	required><br><br>  

<?php

}

?>

<input type="hidden" name="var" value="<?php echo $var?>">
<input type="submit" name="submit" value="Submit Variable Value"> 

</form>