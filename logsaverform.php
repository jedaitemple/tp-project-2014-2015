<html>
	<head>
		<title>LoginSaver - New login</title>
		<link rel="stylesheet" type="text/css" href="style.css "><!--CHANGE ME--> 
	</head>
	
	<body>
	<div id="menu">
			
				<div style = "float:right; position:relative; z-index:1;">
					<form action = "login.php"  >
						<?php
						require'config.php';
						session_start();
						$loggedacc =  $_SESSION['uname'];
						echo "<p style = 'position:relative;float:left;margin-top:14px;margin-right:10px;'>$loggedacc</p>";
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
					<li class='active'><a href='logsaverform.php'><span>New login</span></a></li>
					<li><a href='passgen.php'><span>Password generator</span></a></li>
					<li><a href='about.php'><span>About</span></a></li>
				</ul>
				
				
			</div>
			
			<br><br>
			<p align = "center" style = "font-size:30px;">Save new login</p>
			<form action = "logsaverform.php" method = "POST" align = "center">
					<input type = "text"  style = "border: 1px solid black;width:290px;height:45px;margin-right:5px;margin-bottom:3px;" placeholder = "URL" name = "url" required/><br>
					<input type = "text"  style = "border: 1px solid black;width:290px;height:45px;margin-right:5px;margin-bottom:3px;" placeholder = "Username" name = "username" required/><br>
					<input type = "email"  style = "border: 1px solid black;width:290px;height:45px;margin-right:5px;margin-bottom:3px;" placeholder = "Email" name = "email" required/><br>
					<input type = "password"  style = "border: 1px solid black;width:290px;height:45px;margin-right:5px;margin-bottom:3px;" placeholder = "Password" name = "password1" required/><br>
					<input type = "password"  style = "border: 1px solid black;width:290px;height:45px;margin-right:5px;" placeholder = "Confirm Password" name = "password2" required/><br><br>
					<input type = "submit" class="lbutton" style = "width:290px;height:45px;float:center;margin-right:5px;" value = "Save" name = "submit" />
			</form>
			
			<?php
				//tda se izpolzva md5 za parolite
				
				if(isset($_POST['submit'])){
				
					$url = mysql_real_escape_string($_POST['url']);
					$username = mysql_real_escape_string($_POST['username']);
					$email = mysql_real_escape_string($_POST['email']);
					$password1 = mysql_real_escape_string($_POST['password1']);
					$password2 = mysql_real_escape_string($_POST['password2']);
					
					
					if($password1 == $password2){
						mysql_query("INSERT INTO `savedlogins` (`id`, `url`, `username`, `email`, `password`, `loggedacc`) VALUES (NULL, '$url', '$username', '$email','$password1', '$loggedacc')");
						echo "<p align = \"center\">Your login is saved!</p>";
					} else {
						echo "The passwords do not match";
					}
					
				}
			?>
			
		
	</body>
</html>