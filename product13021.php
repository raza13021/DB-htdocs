<?php 
include('server1.php');
include('homepage.php');


	if (isset($_GET['edit'])) {
		$ID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM product_13021 WHERE code='$code'");

	
			$n = mysqli_fetch_array($record);
			$code = $n['code'];
			$brand = $n['brand'];
                        $type = $n['type'];
                 			$shade  = $n['shade']; 
							$size  = $n['size']; 
							$price  = $n['price']; 

		

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

			<h3> PRODUCT_13021 INFORMATION </h3>


			<th>code</th>
			<th>brand</th>
			<th>type</th>
			<th>shade</th>
			<th>size</th>
			<th>price</th>
			
	<?php $results = mysqli_query($db, "SELECT * FROM product_13021"); 
	if(!$results){
		echo "raza";
	}
	 while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['code']; ?></td>
			<td><?php echo $row['brand']; ?></td>
			<td><?php echo $row['type']; ?></td>
			<td><?php echo $row['shade']; ?></td>
			<td><?php echo $row['size']; ?></td>
			<td><?php echo $row['price']; ?></td>
			<td>
				<a href="product13021.php?edit=<?php echo $row['code']; ?>" class="edit_btn" >Edit</a>
			
				<a href="server1.php?del=<?php echo $row['code']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server1.php" >

	<input type="hidden" name="code" value="<?php echo $code; ?>">
	<div class="input-group">

		
	
	<div class="input-group">
		<label>code</label>
		<input type="text" name="code" value="<?php echo $code; ?>">
	</div>	
	<div class="input-group">
		<label>brand</label>
		<input type="text" name="brand" value="<?php echo $brand; ?>">
	</div>

	<div class="input-group">
		<label>type</label>
		<input type="text" name="type" value="<?php echo $type; ?>">
	</div>

	<div class="input-group">
		<label>shade</label>
		<input type="text" name="shade" value="<?php echo $shade; ?>">
	</div>
	<div class="input-group">
		<label>size</label>
		<input type="text" name="size" value="<?php echo $size; ?>">
	</div>
	<div class="input-group">
		<label>price</label>
		<input type="text" name="price" value="<?php echo $price; ?>">
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