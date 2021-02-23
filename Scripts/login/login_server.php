<?php
	header("Content-Type: application/json");
	$Permission = $_POST['permission'];
	if($Permission != "-1"){
		$mysql_host = 'localhost';
		$mysql_user = 'root';
		$mysql_password = '1234';
		$mysql_db = 'login';
		$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db);
		if($conn){
			$user = $_POST['user'];
			$password = $_POST['password'];			
			$sql = "select * from IdnPw where ID = "."'".$user."'";
			$result = mysqli_query($conn,$sql);
			if(mysqli_num_rows($result) > 0){
				$mysqli_data = mysqli_fetch_row($result);		
				if($mysqli_data[1] == $password){
					if($mysqli_data[2] == $Permission)		
						echo($Permission +1);
					else
						echo(0);
				}
				else
					echo(0);
			}
			else{
				echo(0);			
			}
		}
		else{
			echo("DB ERROR");	
		}
	} 
	else{
		echo("-1");	
	}
?>
