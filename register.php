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
		<form action = "login.php" align= "right" >
			<input class="button" style ="width:100px; font-size: 17px;;" type = "submit" name = "submit" value = "Login" />
		</form>
		<div id="form">
			<form align = "center" action = "register.php" method = "POST">
				<img src = "images/logo.png" style="margin-left:200px;"/><br>
				<input type = "text" style = "border: 1px solid black;width:154px;height:40px;margin-right:5px;" placeholder = "First Name" name = "name" required/>
				<input type = "text" style = "margin-top:2px;border: 1px solid black;width:154px;height:40px;" placeholder ="Last Name" name = "lname" required/><br>
				<input placeholder = "Username" style = "margin-top:5px;border: 1px solid black;width:317px;height:40px;" type = "text" name = "uname" required/><br>
				<input placeholder = "Email" style = "margin-top:5px;border: 1px solid black;width:317px;height:40px;" type = "email" name = "email" required/><br>
				<input placeholder = "Password" style = "margin-top:5px;border: 1px solid black;width:317px;height:40px;" type = "password" name = "pass1" required/><br>
				<input placeholder = "Confirm Password" style = "margin-top:5px;border: 1px solid black;width:317px;height:40px;" type = "password" name = "pass2" required/><br><br>
				<input class = "button" type = "submit" value = "Register" name = "submit" />
			</form>	
		</div>
		
		</body>
</html>		
		
	
EOT;

echo $form;	

}
	
	
?>