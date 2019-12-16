<?php
	session_start();
	require_once('dbconfig/config.php');
?>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body background="imgs\2.jpg">
<div id="main-wrapper2">	
	<center><h1><center><font color="#1E88E5" style="font-family: 'Courier New's">Registration</font></center></h1>

	<img src="imgs\avatar.png" class="avatar">
</center>
<form class="myform" action="register.php" method="post">
	<center><br><label><b><font color="white">Username</font></b></label><br>
	<input name="username" type="text" class="inputvalues" placeholder="type your Username" required/>  <br><br>

	<label><b><font color="white">Password</font></b></label>
	<input name="password" type="Password" class="inputvalues" placeholder="type your Password" required/><br><br>
	<label><b><font color="white">Confirm Password</font></b></label><br>
	<input name="cpassword" type="Password" class="inputvalues" placeholder="Confirm your Password" required/><br>
	<br>
	<center>
	<br><input name="register" type="submit" id="signup_bt" value="Sign Up"><br><br>
		<p><a href="index.php"><font color="black">Back to Login</font></a></p>
	</center>
</form>
</center>
<?php
			if(isset($_POST['register']))
			{
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				@$cpassword=$_POST['cpassword'];
			
				
				if($password==$cpassword)
				{
					$query = "SELECT * from userinfotbl WHERE username='$username'";
					//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							$query = "insert into userinfotbl values('$username','$password')";
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
								$_SESSION['username'] = $username;
								$_SESSION['password'] = $password;
								header( "Location: info.php");
							}
							else
							{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
			else
			{
			}
		?>
</div>
</body>
</html>