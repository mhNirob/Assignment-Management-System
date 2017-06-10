
<?php
	echo '<a href="teacher_core.php">Home</a>';
?>

<?php
require 'core.php';
require 'connect.php';

if(isset($_POST['name'])&&
	   isset($_POST['topic'])&&
	   isset($_POST['problem'])&&
	   isset($_POST['resource'])&&
	   isset($_POST['starting_time'])&&
	   isset($_POST['ending_time'])&&
	   isset($_POST['set'])&&
	   isset($_POST['password'])){

		$_SESSION['assign_name'] = $_POST['name'];
	    $_SESSION['assign_topic'] = $_POST['topic'];
	    $_SESSION['assign_problem'] = $_POST['problem'];
	    $_SESSION['assign_resource'] = $_POST['resource'];
	    $_SESSION['assign_starting_time'] = $_POST['starting_time'];
	    $_SESSION['assign_ending_time'] = $_POST['ending_time'];
	    $_SESSION['assign_nVariable'] = $_POST['nVariable'];
	    $_SESSION['assign_set'] = $_POST['set'];
	    $_SESSION['assign_password'] = $_POST['password'];
	    if($_SESSION==1)
	    	header('Location: variable.php?set='.$_SESSION['assign_set']);
	    else
	    	header('Location: variableAuto1.php?set='.$_SESSION['assign_set']);
	}
?>

<SCRIPT>
function LinkUp()
{
	var number = document.DropDown.Optlinks.selectedIndex;
   if(number==1){
      document.getElementById('TEXTBOX').style.height="250px";
      document.getElementById('TEXTBOX').style.width="550px";
      <?php $_SESSION['Flink']=0; ?>
   }
   else{
   	  document.getElementById('TEXTBOX').style.height="30px";
      document.getElementById('TEXTBOX').style.width="480px";
   	  <?php $_SESSION['Flink']=1; ?>
   }

}

function rLinkUp()
{
	var number = document.DropDown.rOptlinks.selectedIndex;
   if(number==1){
      document.getElementById('rTEXTBOX').style.height="250px";
      document.getElementById('rTEXTBOX').style.width="550px";
      <?php $_SESSION['Rlink']=0; ?>
   }
   else{
   	  document.getElementById('rTEXTBOX').style.height="30px";
      document.getElementById('rTEXTBOX').style.width="480px";
   	  <?php $_SESSION['Rlink']=1; ?>
   }

}

function gLinkUp()
{
	var number = document.DropDown.golinks.selectedIndex;
   if(number==1){
      <?php $_SESSION['goto']=0; ?>
   }
   else{
   	  <?php $_SESSION['goto']=1; ?>
   }

}
</SCRIPT>



<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="./jquery.datetimepicker.css"/>
<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
<style type="text/css">

.custom-date-style {
	background-color: red !important;
}

.input{	
}
.input-wide{
	width: 500px;
}

</style>
</head>
<body>
	<div class="center" style="width:50%;">
	<div style:"display:flex; justify-content:center; flex-direction:column;">
	<form NAME="DropDown" action="create_assignment.php" method="POST">

	Name Of Assignment <br> <input type="text" name ="name" size="60" required><br><br>
	Topic Name <br> <input type="text" name ="topic" size="60" required><br><br>
	
	<SELECT NAME="Optlinks">
	<OPTION SELECTED> Choose Problem Type 
	<OPTION VALUE="1"> Descriptive
	<OPTION VALUE="2"> Link
	</SELECT>

	<INPUT TYPE="BUTTON" VALUE="Select" onClick="LinkUp()"> <br><br>
	
	Problem Link / Problem <br> <textarea type="text" rows="1" cols="59" name="problem" id="TEXTBOX" required></textarea><br><br>
	
	<SELECT NAME="rOptlinks">
	<OPTION SELECTED> Choose Resource Type 
	<OPTION VALUE="1"> Descriptive
	<OPTION VALUE="2"> Link
	</SELECT>

	<INPUT TYPE="BUTTON" VALUE="Select" onClick="rLinkUp()"> <br><br>

	Resource Link / Resource <br> <textarea type="text" rows="1" cols="59" name ="resource" id="rTEXTBOX"  required></textarea><br><br>
	
	Starting Time <br> <input type="varchar" name ="starting_time" size = "25" id="datetimepicker" required><br><br>
	Ending Time <br> <input type="varchar" name ="ending_time" size = "25" id="enddatetimepicker" required><br><br>
	How Many Set? <br> <input type="int" name ="set" size = "25" required><br><br>
	How Many Variable? <br> <input type="int" name ="nVariable" size = "25" required><br><br>
	
	<SELECT NAME="golinks">
	<OPTION SELECTED> Problem set generation strategy  
	<OPTION VALUE="1"> Manual
	<OPTION VALUE="2"> Auto(input bound)
	</SELECT>

	<INPUT TYPE="BUTTON" VALUE="Select" onClick="gLinkUp()"> <br><br>

	Password <br> <input type="varchar" name ="password" size = "25" required><br><br>


	<button type="submit" value="Create">Create</button>
	</form>

	</br>
	</div>
</div>
</body>
<script src="./jquery.js"></script>
<script src="build/jquery.datetimepicker.full.js"></script>
<script>

$('#datetimepicker').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
//disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:	'2016/01/01'
});
$('#datetimepicker').datetimepicker({value:'2016/01/01 00:00',step:10});



$('#enddatetimepicker').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
//disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:	'2016/01/01'
});
$('#enddatetimepicker').datetimepicker({value:'2016/01/01 00:00',step:10});

</script>
</html>


