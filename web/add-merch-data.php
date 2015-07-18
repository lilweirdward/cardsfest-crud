<?php
	include_once('dbconfig.php');
	if (isset($_POST['btn-save'])) {
		$name = $_POST['name'];
		$img = $_POST['img'];
		$product_url = $_POST['product_url'];
		
		$sql_query = "INSERT INTO merch (name, img_url, product_url) VALUES ('$name', '$img', '$product_url')";
		
		if (mysqli_query($sql_query))
		{
			?>
			<script type="text/javascript">
				alert('Data inserted successfully');
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert('Error: ' + <?php echo mysqli_error() ?>);
			</script>
			<?php
		}
	}
	if (isset($_GET['edit_id']))
	{
		$sql_query = "SELECT * FROM merch WHERE id = ".$_GET['edit_id'];
		$result_set=mysqli_query($sql_query);
		$fetched_row=mysqli_fetch_array($result_set);
	}
	if (isset($_POST['btn-update']))
	{
		$name = $_POST['name'];
		$img = $_POST['img'];
		$product_url = $_POST['product_url'];
		
		$sql_query = "UPDATE merch SET name = '$name', img_url = '$img', product_url = '$product_url' WHERE id = ".$_GET['edit_id'];
		
		if (mysqli_query($sql_query))
		{
			?>
			<script type="text/javascript">
				alert('Data inserted successfully');
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert('Error :( ');
			</script>
			<?php
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
  <title>CardsFest Data Entry</title>
  <style>
	  textarea {
		  width: 600px;
		  height: 250px;
	  }
  </style>
</head>
<body>
	<h1>Add New Merchandise Record</h1>
	<a href="index.php">Go back to home</a>
	<form method="post">
		<table>
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name" value="<?php echo $fetched_row['name']; ?>" required /></td>
			</tr>
			<tr>
				<td>Product Image URL:</td>
				<td><input type="text" name="img" value="<?php echo $fetched_row['img_url']; ?>" required /></td>
			</tr>
			<tr>
				<td>Product Cardshirt Page URL:</td>
				<td><input type="text" name="product_url" value="<?php echo $fetched_row['product_url']; ?>" required /></td>
			</tr>
		</table>
		<?php if (isset($_GET['edit_id'])) { ?>
		<button type="submit" name="btn-update">Update</button>
		<?php } else { ?>
		<button type="submit" name="btn-save">Submit</button>
		<?php } ?>
	</form>
</body>
</html>