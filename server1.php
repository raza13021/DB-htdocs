<?php 


DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'razadb');


	session_start();
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	// initialize variable
	$code = "";
	$brand = "";
    $type = "";
	$shade = "";
	$size = "";
	$price = "";	
	
	$update = false;

	if (isset($_POST['save'])) {

		$code = $_POST['code'];
		$brand = $_POST['brand'];
		$type = $_POST['type'];
        $shade = $_POST['shade'];
		$size = $_POST['size'];
		$price = $_POST['price'];




		mysqli_query($db, "INSERT INTO product_13021 VALUES ('$code', '$brand', '$type', '$shade','$size','$price')"); 
        $_SESSION['message'] = "SAVED!"; 
		header('location: product13021.php');
	}

	if (isset($_POST['update'])) {
		
		$code = $_POST['code'];
		$brand = $_POST['brand'];
		$type = $_POST['type'];
        $shade = $_POST['shade'];
		$size= $_POST['size'];
		$price = $_POST['price'];
		
		mysqli_query($db, "UPDATE product_13021 SET code = '$code', brand = '$brand', type = '$type', shade = '$shade', size = '$size', price = '$price' WHERE code='$code'");
		$_SESSION['message'] = "UPDATED"; 
		header('location: product13021.php');
	}

if (isset($_GET['del'])) {
	$code = $_GET['del'];
	mysqli_query($db, "DELETE FROM product_13021 WHERE code='$code'");
	$_SESSION['message'] = "DELETED!"; 
	header('location: product13021.php');
}


	$results = mysqli_query($db, "SELECT * FROM product_13021");


?>