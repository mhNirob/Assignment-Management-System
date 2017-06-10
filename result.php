<?php
	$var=$_POST['var'];
	echo $var.'</br>';
	for($i=1; $i<=$var; $i++){
		echo $_POST['var'.$i].' ';
	}
?>