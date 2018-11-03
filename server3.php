<?php 


DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'razadb');


	session_start();
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	// initialize variable
	$spID = "";
	$name= "";
    $contactN = "";
	$customer_assigned = "";
	
	$update = false;

	if (isset($_POST['save'])) {

		$spID = $_POST['spID'];
		$name= $_POST['name'];
		$contactN = $_POST['contactN'];
        $customer_assigned = $_POST['customer_assigned'];




		mysqli_query($db, "INSERT INTO salesperson_13021 VALUES ('$spID', '$name', '$contactN', '$customer_assigned')"); 
        $_SESSION['message'] = "SAVED!"; 
		header('location: salesperson13021.php');
	}

	if (isset($_POST['update'])) {
		$spID = $_POST['spID'];
		$name = $_POST['name'];
		$contactN = $_POST['contactN'];
        $customer_assigned = $_POST['customer_assigned'];
		
		mysqli_query($db, "UPDATE salesperson_13021 SET spID = '$spID', name = '$name', contactN = '$contactN', customer_assigned = '$customer_assigned' WHERE spID='$spID'");
		$_SESSION['message'] = "UPDATED"; 
		header('location: salesperson13021.php');
	}

if (isset($_GET['del'])) {
	$spID = $_GET['del'];
	mysqli_query($db, "DELETE FROM salesperson_13021 WHERE spID='$spID'");
	$_SESSION['message'] = "DELETED!"; 
	header('location: salesperson13021.php');
}


	$results = mysqli_query($db, "SELECT * FROM salesperson_13021");


?>