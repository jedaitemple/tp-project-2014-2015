<html>
	<head>
		<title>Welcome </title>
		<link rel="stylesheet" type="text/css" href="style.css "><!--CHANGE ME--> 
	</head>
	
	<body>
		<div align="right">
			<form action = "login.php" align= "right" >
				<input class="button" type = "submit" name = "submit" value = "Log out" />
			</form>
			</div>
			<h2>Welcome putka maina </h2>
			
			<a>You are logged in as:</a><br>
			<?php
				require'config.php';
				session_start();
				echo $_SESSION['uname'] ;
			?>
			<br>
			<a style="color:white;font-size:30px;" href = "logsaverform.php">Save new login</a>
			<a style="color:white;font-size:30px;" href = "userregs.php">Show my logins</a>
		
	</body>
</html>