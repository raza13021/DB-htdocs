<?php 
include('server.php');
include('homepage.php');

	if (isset($_GET['edit'])) {
		$ID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM customer_13021 WHERE id='$id'");

	
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$id = $n['id'];
			$contactN  = $n['contactN']; 
                        $address = $n['address'];
						$cnic = $n['cnic'];
						$payment=$n['payment'];
                 			

		

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP MySQL 13021</title>
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

			<h3> CUSTOMER_13021 INFORMATION </h3>


			<th>name</th>
			<th>id</th>
			<th>contactN</th>
			<th>address</th>
			<th>cnic</th>
			<th>payment</th>
			
			
	<?php $results = mysqli_query($db, "SELECT * FROM customer_13021"); 
	if(!$results){
		echo "raza";
	}
	 while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['name']; ?></td>		
			<td><?php echo $row['contactN']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td><?php echo $row['cnic']; ?></td>
			<td><?php echo $row['payment']; ?></td>
			<td>
				<a href="customer13021.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server.php" >

	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="input-group">

		
		
	<div class="input-group">
		<label>id</label>
		<input type="text" name="id" value="<?php echo $id; ?>">
	</div>
	<div class="input-group">
		<label>name</label>
		<input type="text" name="name" value="<?php echo $name; ?>">
	</div>

	
	<div class="input-group">
		<label>contactN</label>
		<input type="text" name="contactN" value="<?php echo $contactN; ?>">
	</div>
	
	<div class="input-group">
		<label>address</label>
		<input type="text" name="address" value="<?php echo $address; ?>">
	</div>
	
	<div class="input-group">
		<label>cnic</label>
		<input type="text" name="cnic" value="<?php echo $cnic; ?>">
	</div>
	
	<div class="input-group">
		<label>payment</label>
		<input type="text" name="payment" value="<?php echo $payment; ?>">
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