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
					<li class='active' style= "margin-left:220px;"><span><a href="userregs.php">My logins</a></li>
					<li><a href='logsaverform.php'><span>New login</span></a></li>
					<li><a href='passgen.php'><span>Password Generator</span></a></li>
					<li><a href='about.php'><span>About</span></a></li>
				</ul>
				
			</div>
			
			<?php
				require'config.php';
				
				$query = "SELECT * FROM savedlogins"; 
				$result = mysql_query($query);
				$count = 0;
				
				echo "<p align = 'center' style = 'font-size:25px;'>$user 's logins</p>";
				echo"<div class='table' align = 'center' ><table>";
				echo "<br><tr><td>login #</td><td>URL</td><td>Username</td><td>Email</td><td>Password</td><td>Delete</td></tr>";
				while($row = mysql_fetch_array($result)){   
					$username = $row['username'];
					$url = $row['url'];
					$id = $row['id'];
					$email = $row['email'];
					$pass =  $row['password'];
					
					if( $_SESSION['uname'] == $row['loggedacc']){
						$count = $count + 1;
					//	echo"<tr><td>$count</td><td>" . $row['url'] . "</td><td>" . $row['username'] . "</td><td>" . $row['email'] . "</td><td>" . $row['password'] . "</td><td><form method='POST'><input type = 'submit' style = 'background-color:blue;' name = 'delete' value = '$id'/></form></td></tr>" ;
						//echo "<form method='POST'><input type = 'submit' style = 'background-color:blue;' name = 'delete' value = '$id'/></form>";
						
						echo"
						
							<tr>
								<td>
									$count
								</td>
								<td>
									$url
								</td>
								<td>
									$username
								</td>
								<td >
									$email
								</td>
								<td>
										<form>
											<input type = \"password\" id = \"$pass + $count\" readonly = \" readonly \"  value = \"$pass\" style = \"position:relative;height:23px;border:1px solid transparent;border-radius:3px;\">
											<input type = \"checkbox\" onchange=\"document.getElementById('$pass + $count').type = this.checked ? 'text' : 'password'\" style = \";position:relative;\"><a style = \"position:absolute;\">Show password</a>
										</form>
										
								</td>
								<td>
									<form method='POST'><input type = 'submit'' id = 'delbutton' name = 'delete' value = '$id'/> </form>
								</td>
							</tr> ";
						
						if (isset($_POST['delete'])) {	
							$value = $_POST['delete'];
							//echo $value;
							$sql = "DELETE FROM `savedlogins` WHERE `id` = '$value' ";
							mysql_query($sql);
							
							//echo"your login has been deleted!";
							header('Location:userregs.php ');
						}
					}
					
				}
				echo"</table></div>";
				mysql_close();
	
			?>
		
	</body>
</html>