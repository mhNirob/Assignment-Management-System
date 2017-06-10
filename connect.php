<?php

$connect_error = "Could not connect.";

$mysql_host = "localhost";
$mysql_user = "root";
$mysql_pass = "";
$mysql_db = "user";

$link = @mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);

if(!$link || !@mysqli_select_db($link,$mysql_db)){
	die($connect_error);
}

?>