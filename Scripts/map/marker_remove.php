<?php
	header("Content-Type: application/json");
	$mysql_host = 'localhost';
	$mysql_user = 'root';
	$mysql_password = '1234';
	$mysql_db = 'marker';
	$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db);
	if($conn){
		$sql = "delete from info;";
		$result = mysqli_query($conn,$sql);
		echo(0);
	}
	else
		echo(-1);
	
?>
