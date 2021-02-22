<?php
	function DB_init(){
			$mysql_host = 'localhost';
			$mysql_user = 'root';
			$mysql_password = '1234';
			$mysql_db = 'login';
			$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db);
			if($conn)
				echo "<script> alert('DB load SUCCESS'); </script>";
			else
				echo "<script> alert('DB load ERROR') </script>";
	}
	function Get_ID()	{
		$sql = "select * from IdnPw";
		$result = mysqli_query($conn,$sql);	
		while($row = mysqli_fetch_assoc($result)){
					echo "<br>ID : " . $row["ID"]. " PW : " . $row["PW"]. "<br>";
		}
	}
?>
