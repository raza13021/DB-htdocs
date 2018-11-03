<?php 


DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'razadb');


	session_start();
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	// initialize variable
	$name = "";
	$id = "";
	$contactN = "";
    $address = "";
	$cnic = "";
	$payment = "";
	$update = false;

	if (isset($_POST['save'])) {

		$id = $_POST['id'];
		$name = $_POST['name'];
		$contactN = $_POST['contactN'];
		$address = $_POST['address'];
		$cnic = $_POST['cnic'];
		$payment = $_POST['payment'];


		mysqli_query($db, "INSERT INTO customer_13021 VALUES ( '$id','$name', '$contactN', '$address', '$cnic', '$payment')"); 
        $_SESSION['message'] = "SAVED!"; 
		header('location:customer13021.php');
	}

	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$contactN = $_POST['contactN'];
		$address = $_POST['address'];
		$cnic = $_POST['cnic'];
		$payment = $_POST['payment'];
		
		mysqli_query($db, "UPDATE customer_13021 SET id = '$id', name = '$name', contactN = '$contactN', address = '$address', cnic='$cnic' ,payment= '$payment' WHERE id='$id'");
		$_SESSION['message'] = "UPDATED"; 
		header('location: customer13021.php');
	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM customer_13021 WHERE id='$id'");
	$_SESSION['message'] = "DELETED!"; 
	header('location: customer13021.php');
}


	$results = mysqli_query($db, "SELECT * FROM customer_13021");


?>