<?php  //Start the Session
include('homepage.php');
session_start();
 require('connect.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['uID']) and isset($_POST['pass'])){
//3.1.1 Assigning posted values to variables.
$uID = $_POST['uID'];
$pass = $_POST['pass'];
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM user_13021 WHERE uID='$uID' and pass='$pass'";
 
$result = mysqli_query($db, $query) or die(mysqli_error($db));
$count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
$_SESSION['uID'] = $uID;
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
$fmsg = "Invalid Login Credentials.";
}
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['uID'])){
$username = $_SESSION['uID'];
header('Location: /homepage.php');
 
}else{
//3.2 When the user visits the page first time, simple login form will be displayed.
?>
<html>
<head>
	<title>User Login Using PHP & MySQL</title>
	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
 
<link rel="stylesheet" href="styles.css" >
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="container">
      <form class="form-signin" method="POST">
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
        <h2 class="form-signin-heading">Please Login</h2>
        <div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">@</span>
	  <input type="text" name="uID" class="form-control" placeholder="uID" required>
	</div>
        <label for="inputpass" class="sr-only">pass</label>
        <input type="password" name="pass" id="inputpass" class="form-control" placeholder="pass" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <a class="btn btn-lg btn-primary btn-block" href="register.php">Register</a>
      </form>
</div>
 
</body>
 
</html>
<?php } ?>