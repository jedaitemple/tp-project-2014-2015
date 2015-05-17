<html>
	<head>
		<title>Welcome </title>
		<link rel="stylesheet" type="text/css" href="style.css "><!--CHANGE ME--> 
	</head>
	
	<body>
		
			<div id="menu">
			
				<div style = "float:right; position:relative; z-index:1;">
					<form action = "login.php"  >
						<input style = "margin:5px;"class="button" type = "submit" name = "submit" value = "Log out" />
						<?php
						require'config.php';
						session_start();
						$user =  $_SESSION['uname'];
						echo $user;
					?>
					</form>
				</div>
			
				<ul>
					<li class='active'><a href='home.php'><span>Home</span></a></li>
					<li><a href='logsaverform.php'><span>Save new login</span></a></li>
					<li><span><a href="userregs.php">Show my logins</a></li>
					<li><a href='#'><span>Payment</span></a></li>
					<li><a href='#'><span>About</span></a></li>
				</ul>
				
				
			</div>

	
		
	</body>
</html>