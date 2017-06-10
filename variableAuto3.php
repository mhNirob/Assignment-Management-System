<?php
require 'core.php';
require 'connect.php';

$tset = 1;

for(;$tset<=$_SESSION['assign_set'];$tset++){
	$variable = "";
	for($tvar=1;$tvar<=$_SESSION['assign_nVariable'];$tvar++){
		$range = rand(1,$_SESSION['assign_variable_bound'.$tvar]);
		//echo $range." ";
		$value = rand($_SESSION['variable_bound'.$tvar.$range.'1'],$_SESSION['variable_bound'.$tvar.$range.'2']);
		
		$variable =$variable."variable".$tvar." = ".$value." ";

	}
	echo nl2br("Variable for set ".$tset." : ".$variable."\n");
	$_SESSION['assign_variable'.$tset] = $variable;

}

echo nl2br("\n".'Or, To get another set of values : <a href="variableAuto3.php">Refresh</a>'."\n");


if(isset($_POST['submit'])){
	
	for($tset=1;$tset<=$_SESSION['assign_set'];$tset++){
		$_SESSION['assign_ans'.$tset] = $_POST['ans'.$tset];
	}

	header('Location: assignment_success_auto.php');
}


?>

<html>
<head></head>
<body>
	<form action="variableAuto3.php" method="POST">

	<?php
	for($tset=1;$tset<=$_SESSION['assign_set'];$tset++){
	?>
		Ans of set <?php echo $tset." ";?> <br> <input type="varchar" name ="<?php echo'ans'.$tset ?>" size = "50"
		required><br><br>
	<?php

	}

	?>

	<input type="submit" name="submit" value="Submit"> 

</form>
</body>