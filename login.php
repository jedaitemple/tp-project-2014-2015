<?php
	//tova 6te e na4alnata stranica
	//da dobavq "forgot password?"
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
			header('Location:userregs.php');
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
		
		<div align = "center">
			<img src = "images/c-l.png" style="width:300px;height:300px;"/>
			<img src = "images/t-l.png" style=""/>
			
		</div>
		<div id="form" align="center">
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