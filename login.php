<?php
	//tova 6te e na4alnata stranica
	//da dobavime forgot password? -link za vuzstanovqvane na parolata...
	require('config.php');
	
if(isset($_POST['submit'])){
	$uname = mysql_real_escape_string($_POST['uname']);
	$pass = mysql_real_escape_string($_POST['pass']);
	$pass = md5($pass);
	
	session_start();
	$_SESSION['uname'] = $uname;
	

	
	$sql = mysql_query("SELECT * FROM `users` WHERE `uname` = '$uname' AND `pass` = '$pass' ");
	
	if(mysql_num_rows($sql) > 0) {
		if(isset($_POST['uname']) && isset($_POST['pass'])){
			header('Location:home.php');
/*
$form1 = <<<EOT
<html>
	<head>
		<title>Welcome </title>
		<link rel="stylesheet" type="text/css" href="style.css "><!--CHANGE ME--> 
	</head>
	
	<body>
		<div align="right">
				<form action = "login.php">
					<input type = "submit" value = "Log out">
				</form>
			</div>
			<h2>You are logged as: </h2>
			<a>$uname</a>
		
	</body>
</html>
EOT;


echo $form1;
*/
			//echo"You are logged in as: <br>"
			//echo $uname;
			//tuk trqva da iima edna i su6ta stranica za vsi4ki useri no s razli4ni danni za vseki edin (v zavisimost ot usera )exm: header('Location:home.php ');, logout button
		}
	}else{
		header('Location:fail.php ');
	}
}else{
	
$form = <<<EOT
<html>

	<head>
		<title>LoginSaver - Home</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<link rel="stylesheet" type="text/css" href="loginStyle.css">
	</head>
	
	<body>
		
		<form action = "register.php" align= "right" >
			<input class="button" style ="width:100px; font-size: 17px;;" type = "submit" name = "submit" value = "Sing up" />
		</form>
		<div id="form" align="center">
			<img src = "images/logo.png" style="margin-left:200px;"/>
			<form action = "login.php" method = "POST">
				<input type = "text" placeholder = "Username"style = "border: 1px solid blue;width:250px;height:40px;" name = "uname" /><br>
				<input type = "password" placeholder = "Password" style = "margin-top:5px;border: 1px solid blue;width:250px;height:40px;" name = "pass" /><br><br>
			
			<input class="button" type = "submit" name = "submit" value = "Log in" />
		</form>
		</div>


	</body>
	
</html>

EOT;



echo $form;

}
?>