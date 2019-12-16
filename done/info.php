<?php 
include('server.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$stdname = $n['stdname'];
			$address = $n['address'];
			$email= $n['email'];
			$gender= $n['gender'];
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
</head>
<center>
<body background="imgs\2.jpg">
	<div id="main">
		
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM info"); ?>
<center><h1><center><font color="#1E88E5" style="font-family: 'Courier New's">Details</font></center></h1>
<img src="imgs\avatar.png" class="avatar">
<table border="2x" width="5px">
	<thead>
		<tr>
			<th><font color="white">Name</font></th>
			<th><font color="white">Address</font></th>
			<th><font color="white">E-mail</font></th>
			<th><font color="white">Gender</font></th>

			<th colspan="2"><font color="white">Action</font></th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><font color="white"><?php echo $row['stdname']; ?></font></td>
			<td><font color="white"><?php echo $row['address']; ?></font></td>
			<td><font color="white"><?php echo $row['email']; ?></font></td>
			<td><font color="white"><?php echo $row['gender']; ?></font></td>
			<td>
				<a href="info.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>	
<form method="post" action="server.php" >

	<input type="hidden" name="id" value="<?php echo $id; ?>">

	<div class="input-group">
		<label><font color="white">Name</font></label>
		<input type="text" name="stdname" value="<?php echo $stdname; ?>">
	</div>
	<div class="input-group">
		<label><font color="white">Address</font></label>
		<input type="text" name="address" value="<?php echo $address; ?>">
	</div>
	<div class="input-group">
		<label><font color="white">Email</font></label>
		<input type="text" name="email" value="<?php echo $email; ?>">
	</div>
	<div class="input-group">
		<label><font color="white">Gender</font></label>
		<input type="text" name="gender" value="<?php echo $gender; ?>">
	</div>
	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button><br>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
	</div>

</div>
</form>
</body>
</center>
</html>