<html>
	<head>
		<title>Welcome </title>
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
					<li class='active'><a href='passgen.php'><span>Password Generator</span></a></li>
					<li><a href='about.php'><span>About</span></a></li>
				</ul>
				
				
			</div>
			
		<?php 
			$alpha = "abcdefghijklmnopqrstuvwxyz";
			$alpha_upper = strtoupper($alpha);
			$numeric = "0123456789";
			$special = ".-+=_,!@$#*%<>[]{}";
			$chars = "";
 
			if (isset($_POST['length'])){
				// if you want a form like above
				if (isset($_POST['alpha']) && $_POST['alpha'] == 'on')
					$chars .= $alpha;
				 
				if (isset($_POST['alpha_upper']) && $_POST['alpha_upper'] == 'on')
					$chars .= $alpha_upper;
				 
				if (isset($_POST['numeric']) && $_POST['numeric'] == 'on')
					$chars .= $numeric;
				 
				if (isset($_POST['special']) && $_POST['special'] == 'on')
					$chars .= $special;
				 
				$length = $_POST['length'];
			}else{
				// default [a-zA-Z0-9]{9}
				$chars = $alpha . $alpha_upper . $numeric;
				$length = 9;
			}
 
			$len = strlen($chars);
			$pw = '';
			 if($length>50){
				
			 }
			 
			for ($i=0;$i<$length;$i++)
					$pw .= substr($chars, rand(0, $len-1), 1);
			 
			// the finished password
			$pw = str_shuffle($pw);
			
		?>
			
			<div id ='passgen' align = 'center'>
				<p>Select Characters:</p>
				<form method = 'POST'>
					<table style = "border-bottom:1px solid skyblue;border-top:1px solid skyblue;">
						<tr>
							<td align = "left" style = "margin-left:100px;">
								<input type = 'checkbox' name = 'alpha' /><a style = "font-size:25px;">Lowercase (a-z)</a><br>
								<input type = 'checkbox' name = 'alpha_upper'/><a style = "font-size:25px;">Uppercase (A-Z)</a><br>
								<input type = 'checkbox' name = 'numeric' /><a style = "font-size:25px;">Numbers (0-9)</a><br>
								<input type = 'checkbox' name = 'special' style = ""/><a style = "font-size:25px;">Special Characters(.-+=_,!@$#*%<>[]{})</a><br>
								<a style = "font-size:25px;">Password length</a>
								<input type = 'number' name = 'length' min = "0" max = "35" style =  "width:45px;height:27px;margin-left:5px;margin-bottom:3px;"/><br>
							</td>
						</tr>
							</table>
					<p>Your password:</p>
					<?php echo $pw; ?><br><br>
					
					<input type = 'submit' name = 'gen' value = 'Generate' class = 'button' style = 'position:static;margin-right:275px;' />
						
				</form>
				
					
			</div>
			
			
			

	
		
	</body>
</html>