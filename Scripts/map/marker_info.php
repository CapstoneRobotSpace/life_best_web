<?php
	header("Content-Type: application/json");
	$mysql_host = 'localhost';
	$mysql_user = 'root';
	$mysql_password = '1234';
	$mysql_db = 'marker';
	$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db);
	if($conn){
		$sql = "select * from info;";
		$result = mysqli_query($conn,$sql);
		$Send_data ='';
			if(mysqli_num_rows($result) > 0){
				while($mysqli_data = mysqli_fetch_array($result)){		
					$Send_data = $Send_data.$mysqli_data['ID']." ".$mysqli_data['N']." ".$mysqli_data['E']." ".$mysqli_data['TIME']." ".$mysqli_data['STATUS']." - ";
				}
				echo(json_encode($Send_data));
			}
			else{
				echo(0);			
			}
	}
	else
		echo(-1);
?>
