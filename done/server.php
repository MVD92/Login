<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'crud2');

	// initialize variables
	$stdname = "";
	$address = "";
	$email="";
	$gender="";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$stdname = $_POST['stdname'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];

		mysqli_query($db, "INSERT INTO info (stdname, address, email, gender) VALUES ('$stdname', '$address', '$email','$gender')"); 
		 $_SESSION['message'] = "Data saved";
		header('location: info.php');
	}


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$stdname = $_POST['stdname'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		mysqli_query($db, "UPDATE info SET stdname='$stdname', address='$address', email='$email', gender='$gender'  WHERE id=$id");
		$_SESSION['message'] = "Data updated!";  
		header('location: info.php');
	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM info WHERE id=$id");
	$_SESSION['message'] = "Data deleted!";
	header('location: info.php');
}


	$results = mysqli_query($db, "SELECT * FROM info");


?>