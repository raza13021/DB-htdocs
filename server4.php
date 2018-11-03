<?php 


DEFINE ('DB_USER', 'root');
DEFINE ('DB_pass', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'razadb');


	session_start();
	$db = mysqli_connect(DB_HOST, DB_USER, DB_pass, DB_NAME);

	// initialize variable
	$uID = "";
	$pass= "";
        $status = "";
	$spID = "";
	
	$update = false;

	if (isset($_POST['save'])) {

		$uID = $_POST['uID'];
		$pass= $_POST['pass'];
		$status = $_POST['status'];
        $spID = $_POST['spID'];




		mysqli_query($db, "INSERT INTO user_13021 VALUES ('$uID', '$pass', '$status', '$spID')"); 
                
		$_SESSION['message'] = "SAVED!"; 
		header('location: user13021.php');
	}

	if (isset($_POST['update'])) {
		$uID = $_POST['uID'];
		$pass = $_POST['pass'];
		$status = $_POST['status'];
        $spID = $_POST['spID'];
		
		mysqli_query($db, "UPDATE user_13021 SET uID = '$uID', pass = '$pass', status = '$status', spID = '$spID' WHERE uID='$uID'");
		$_SESSION['message'] = "UPDATED"; 
		header('location: user13021.php');
	}

if (isset($_GET['del'])) {
	$uID = $_GET['del'];
	mysqli_query($db, "DELETE FROM user_13021 WHERE uID='$uID'");
	$_SESSION['message'] = "DELETED!"; 
	header('location: user13021.php');
}


	$results = mysqli_query($db, "SELECT * FROM user_13021");


?>