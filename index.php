<!DOCTYPE html>
<html>
	<head>
		<title>Log in</title>
		<link rel="stylesheet" href="Css/log_in.css">
    <script src="JavaScripts/login_fun.js"></script>
	</head>
	<body>
		<div id="logDiv">
			<center>
				<?php
					include_once($_SERVER['DOCUMENT_ROOT']."/php/login_fun.php"); 
					DB_init();
				?>
				<p>
					<font size="7">LIFE BEST WEB PAGE
					<font size="3">
				</p>				
				<p>
					<font size="5">ID : <input type="text" id="ID" maxlength="20">
				</p>
				<p>
					<font size="5">PassWord : <input type="password" id="PassWord" maxlength="10">
				</p>
				<p>
						<font size="4">Admin <input type="checkbox" name="check" value="0" >
						<font size="4">Client <input type="checkbox" name="check" value="1" >
					</br>
				</p>
				<p>
					<button onclick="logIn()">Log In</button>
				</p>
			</center>
		</div>
		<div id="life_photo">
			<center>
				<img src="img/life_wtf.jpg" width="400" height="700">
			</center>		
		</div>
	</body>
</html>
