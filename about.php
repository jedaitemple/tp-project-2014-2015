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
					<li><span><a href="userregs.php">My logins</a></li>
					<li><a href='logsaverform.php'><span>New login</span></a></li>
					<li><a href='passgen.php'><span>Password Generator</span></a></li>
					<li class='active'><a href='about.php'><span>About</span></a></li>
				</ul>
				
				
			</div>
			
		
	</body>
</html>