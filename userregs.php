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
			<h2>Welcome putka maina </h2><br>
			<a style="color:white;font-size:30px;" href = "home.php">Home</a><br>
			
			<a>You are logged in as:</a><br>
			<?php
				require'config.php';
				session_start();
				echo $_SESSION['uname'] ;
			?>
			<br>
			<a style="color:white;font-size:30px;" href = "logsaverform.php">Save new login</a>
			<?php
				require'config.php';

				$query = "SELECT * FROM savedlogins"; 
				$result = mysql_query($query);
				$count = 0;
				while($row = mysql_fetch_array($result)){   
					if( $_SESSION['uname'] == $row['loggedacc']){
						$count = $count + 1;
						echo "<br>login #$count<br> URL: " . $row['url'] . "<br> Username: " . $row['username'] . "<br> Email:" . $row['email'] . "<br> Password: " . $row['password'] . "<br>";  
					}
				}

				echo "</table>"; 

				mysql_close();
	
			?>
		
	</body>
</html>