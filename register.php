<?php
//  da sloja zaduljitelno vuveden minimalen broi simvoli,da rabotq vurhu dizaina na stranicata
//da sloja logoto na saita
//da izpra6ta email sled registrirane na user
require('config.php');
	
if(isset($_POST['submit'])){
		
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		
		if($pass1 == $pass2){
			//all good
			$name = mysql_real_escape_string($_POST['name']);
			$lname = mysql_real_escape_string($_POST['lname']);
			$uname = mysql_real_escape_string($_POST['uname']);
			$email = mysql_real_escape_string($_POST['email']);
			$pass1 = mysql_real_escape_string($pass1);
			$pass2 = mysql_real_escape_string($pass2);
			
			
			$pass1 = md5($pass1);
			
			$sql = mysql_query("SELECT * FROM `users` WHERE `uname` = '$uname' ");
			
			if(mysql_num_rows($sql) > 0){
				echo "Sorry, that user already exists.";
				exit();
			}
			
			mysql_query("INSERT INTO `users` (`id`, `name`, `lname`, `uname`, `email`, `pass`) VALUES (NULL, '$name', '$lname', '$uname', '$email', '$pass1')");
			
			
		}else{
			echo "Sorry, your passwords do not match.<br>";
			exit();
		}
		header('Location:login.php');
} else {
	
$form = <<<EOT
<html>
		<head>
			<title>Registration</title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<link rel="stylesheet" type="text/css" href="register.css">
		</head>
		
		<body>
		
		<div id="form">
			<form align = "center" action = "register.php" method = "POST">
		
				First Name: <input type = "text" name = "name" required/><br>
				Last Name: <input type = "text" name = "lname" required/><br>
				Username: <input style = "margin-left:10px;"  type = "text" name = "uname" required/><br>
				Email: <input style = "margin-left:60px;" type = "email" name = "email" required/><br>
				Password: <input style = "margin-left:15px;"  type = "password" name = "pass1" required/><br>
				Confirm Password: <input style = "margin-right:93px;"  type = "password" name = "pass2" required/><br><br>
				<input type = "submit" value = "Register" name = "submit" />
			</form>	
		</div>
		
		</body>
</html>		
		
	
EOT;

echo $form;	

}
	
	
?>