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
						$loggedacc =  $_SESSION['uname'];
						echo $loggedacc;
					?>
					</form>
				</div>
			
				<ul>
					<li><a href='home.php'><span>Home</span></a></li>
					<li class='active'><a href='logsaverform.php'><span>Save new login</span></a></li>
					<li><span><a href="userregs.php">Show my logins</a></li>
					<li><a href='#'><span>Payment</span></a></li>
					<li><a href='#'><span>About</span></a></li>
				</ul>
				
				
			</div>
			
			<br><br>
			<form action = "logsaverform.php" method = "POST" align = "center">
					<input type = "text"  style = "border: 1px solid black;width:290px;height:45px;margin-right:5px;margin-bottom:3px;" placeholder = "URL" name = "url" required/><br>
					<input type = "text"  style = "border: 1px solid black;width:290px;height:45px;margin-right:5px;margin-bottom:3px;" placeholder = "Username" name = "username" required/><br>
					<input type = "email"  style = "border: 1px solid black;width:290px;height:45px;margin-right:5px;margin-bottom:3px;" placeholder = "Email" name = "email" required/><br>
					<input type = "password"  style = "border: 1px solid black;width:290px;height:45px;margin-right:5px;margin-bottom:3px;" placeholder = "Password" name = "password1" required/><br>
					<input type = "password"  style = "border: 1px solid black;width:290px;height:45px;margin-right:5px;" placeholder = "Confirm Password" name = "password2" required/><br><br>
					<input type = "submit" class="button" style = "width:290px;height:45px;float:center;margin-right:5px;" value = "Save" name = "submit" />
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
						echo "Your login is saved!";
					} else {
						echo "The passwords do not match";
					}
					
				}
			?>
			
		
	</body>
</html>