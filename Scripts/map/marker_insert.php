<?php
	header("Content-Type: application/json");
	$mysql_host = 'localhost';
	$mysql_user = 'root';
	$mysql_password = '1234';
	$mysql_db = 'marker';
	$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db);
	if($conn){
		$ID = $_POST['robot_id'];
		$GPS_N = $_POST['gps_n'];
		$GPS_E = $_POST['gps_e'];
		$STATUS = $_POST['status'];
		$DATE = $_POST['date'];
		$sql = "replace into info values(".$ID.",".$GPS_N.",".$GPS_E.",'".$DATE."',".$STATUS.");";
		mysqli_query($conn,$sql);
		echo(0);
	}
	else
		echo(-1);
	
?>
