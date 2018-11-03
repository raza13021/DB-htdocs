<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'razadb');



	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$db){
    die("Database Connection Failed" . mysqli_error($db));
}


?>