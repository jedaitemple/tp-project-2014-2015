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
						$user =  $_SESSION['uname'];
						echo $user;
					?>
					</form>
				</div>
			
				<ul>
					<li><a href='home.php'><span>Home</span></a></li>
					<li><a href='logsaverform.php'><span>Save new login</span></a></li>
					<li class='active'><span><a href="userregs.php">Show my logins</a></li>
					<li><a href='#'><span>Payment</span></a></li>
					<li><a href='#'><span>About</span></a></li>
				</ul>
				
				
			</div>
			<?php
				require'config.php';
				
				$query = "SELECT * FROM savedlogins"; 
				$result = mysql_query($query);
				$count = 0;
			
				echo"<div class='CSSTableGenerator' align = 'center' ><table>";
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
								<td >
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
									$pass
								</td>
								<td>
									<form method='POST'><input type = 'submit' style = 'background-color:skyblue;' name = 'delete' value = '$id'/></form>
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