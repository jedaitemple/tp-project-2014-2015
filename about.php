<html>
	<head>
		<title>LoginSaver - About</title>
		<link rel="stylesheet" type="text/css" href="style.css "><!--CHANGE ME--> 
	</head>
	
	<body>

			<div id="menu">
			
				<div style = "float:right; position:relative; z-index:1;">
					
					<form action = "login.php"  >
						<?php
						require'config.php';
						session_start();
						$user =  $_SESSION['uname'];
						echo "<p style = 'position:relative;float:left;margin-top:14px;margin-right:10px;'>$user</p>";
						?>
						<input style = "margin:5px;"class="button" type = "submit" name = "submit" value = "Log out" />
					</form>
				</div>
				
				<ul>
					<li><div style = "position:absolute;margin-right:5px;margin-left:5px;padding-top:5px;">
						<img src = "images/c-l.png" style="width:40px;height:40px;"/>
						<img src = "images/t-l.png" style="width:170px;height:40px;"/>
					</div></li>
					<li style= "margin-left:220px;"><span><a href="userregs.php">My logins</a></li>
					<li><a href='logsaverform.php'><span>New login</span></a></li>
					<li><a href='passgen.php'><span>Password generator</span></a></li>
					<li class='active'><a href='about.php'><span>About</span></a></li>
				</ul>
				
				
			</div>
			
			<div align = "center">
				<img src = "images/c-l.png" style="width:200px;height:200px;"/>
				<img src = "images/t-l.png"/><br><br>
				<h1>Login Saver helps you  save your registrations in case that you forget them!</h1>
				<h3>Stop worrying about your passwords!</h3>
				
				<h3>Login Saver is the best way to save your mail, facebook and wifi passwords.</h3>
				<h3>Just make a free account and join  us!</h3>
			
				<h3>The owners of the website are Martin Grigorov and Konstantin Kostov<h3><br><br>
				<h3>Contacts:<h3>
				<h3>login.saver@gmail.com<h3>
			</div>
	</body>
</html>