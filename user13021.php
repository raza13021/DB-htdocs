<?php 
include('server4.php');
include('homepage.php');

	if (isset($_GET['edit'])) {
		$ID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM user_13021 WHERE uID='$uID'");

	
			$n = mysqli_fetch_array($record);
			$uID = $n['uID'];
			$pass = $n['pass'];
                        $status = $n['status'];
                 			$spID  = $n['spID']; 

		

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP MySQL 13021 </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>



<table>
	
	<thead>
		<tr>

			<h3> user_13021 INFORMATION </h3>


			<th>uID</th>
			<th>pass</th>
			<th>status</th>
			<th>spID</th>
			
	<?php $results = mysqli_query($db, "SELECT * FROM user_13021"); 
	if(!$results){
		echo "maaz";
	}
	 while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['uID']; ?></td>
			<td><?php echo $row['pass']; ?></td>
			<td><?php echo $row['status']; ?></td>
			<td><?php echo $row['spID']; ?></td>
			<td>
				<a href="user13021.php?edit=<?php echo $row['uID']; ?>" class="edit_btn" >Edit</a>
			
				<a href="server4.php?del=<?php echo $row['uID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server4.php" >

	<input type="hidden" name="uID" value="<?php echo $uID; ?>">
	<div class="input-group">

		
	
	<div class="input-group">
		<label>uID</label>
		<input type="text" name="uID" value="<?php echo $uID; ?>">
	</div>	
	<div class="input-group">
		<label>pass</label>
		<input type="text" name="pass" value="<?php echo $pass ?>">
	</div>

	<div class="input-group">
		<label>status</label>
		<input type="text" name="status" value="<?php echo $status; ?>">
	</div>

	<div class="input-group">
		<label>spID</label>
		<input type="text" name="spID" value="<?php echo $spID; ?>">
	</div>

	

	

	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
	</div>
</form>
</body>
</html>