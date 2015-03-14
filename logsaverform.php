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
			<h2>Welcome</h2>
			<a style="color:white;font-size:30px;" href = "home.php">Home</a><br>
			
			<a>You are logged in as:</a><br>
			<?php
				require'config.php';
				session_start();
				$loggedacc = $_SESSION['uname'] ;
				echo $loggedacc;
			?>
			<br><br>
			<form action = "logsaverform.php" method = "POST">
					URL: <input type = "text" name = "url" required/><br>
					Username: <input type = "text" name = "username" required/><br>
					Email: <input type = "email" name = "email" required/><br>
					Password: <input type = "password" name = "password1" required/><br>
					Confirm Password: <input type = "password" name = "password2" required/><br>
					<input type = "submit" value = "Save" name = "submit" />
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