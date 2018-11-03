<?php 
include('server3.php');
include('homepage.php');

	if (isset($_GET['edit'])) {
		$ID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM salesperson_13021 WHERE spID='$spID'");

	
			$n = mysqli_fetch_array($record);
			$spID = $n['spID'];
			$name = $n['name'];
            $contactN = $n['contactN'];
			$customer_assigned  = $n['customer_assigned']; 

		

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

			<h3> salesperson_13021 INFORMATION </h3>


			<th>spID</th>
			<th>name</th>
			<th>contactN</th>
			<th>customer_assigned</th>
			
	<?php $results = mysqli_query($db, "SELECT * FROM salesperson_13021"); 
	if(!$results){
		echo "raza";
	}
	 while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['spID']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['contactN']; ?></td>
			<td><?php echo $row['customer_assigned']; ?></td>
			
			<td>
			 <?php $row['spID']; ?>
			<script>$(#custlist).click(function(){
				location.href = "list.php?spID="+$(this).attr('value');
			})
				</script>
</td>
			<td>
				<a href="salesperson13021.php?edit=<?php echo $row['spID']; ?>" class="edit_btn" >Edit</a>
			
				<a href="server3.php?del=<?php echo $row['spID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server3.php" >

	<input type="hidden" name="spID" value="<?php echo $spID; ?>">
	<div class="input-group">

		
	
	<div class="input-group">
		<label>spID</label>
		<input type="text" name="spID" value="<?php echo $spID; ?>">
	</div>	
	<div class="input-group">
		<label>name</label>
		<input type="text" name="name" value="<?php echo $name ?>">
	</div>

	<div class="input-group">
		<label>contactN</label>
		<input type="text" name="contactN" value="<?php echo $contactN; ?>">
	</div>

	<div class="input-group">
		<label>customer_assigned</label>
		<input type="text" name="customer_assigned" value="<?php echo $customer_assigned; ?>">
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