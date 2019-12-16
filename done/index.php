<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body background="imgs\2.jpg">
<center>
<div id="main-wrapper">	
	<center><h1><center><font color="#1E88E5" style="font-family: 'Courier New's">Login</font></center></h1>

	<img src="imgs\avatar.png" class="avatar">
</center>

<form class="myform" action="index.php" method="post">
	<br><label><b><font color="white">Username</font></b></label>
	<input name="username" type="text" class="inputvalues" placeholder="type your Username" required/>  <br><br>

	<label><b><font color="white">Password</font></b></label>
	<input name="password" type="Password" class="inputvalues" placeholder="type your Password" required/><br><br>
	
	<br><input name="Login" type="submit" id="login_bt" value="Login"><br><br>
	<p><a href="register.php"><font color="black">Sign up</font></a></p>
	
	
</form>
		
		<?php
			if(isset($_POST['Login']))
			{
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				$query = "SELECT * FROM userinfotbl WHERE username='$username' AND password='$password' ";
				//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					
					header( "Location: info.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists/ Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>
		
	</div>
</center>
</body>
</html>