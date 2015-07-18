<?php
	include_once('dbconfig.php');
	if (isset($_POST['btn-save'])) {
		$img = $_POST['img'];
		
		$sql_query = "INSERT INTO sponsors (img) VALUES ('$img')";
		
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
		$sql_query = "SELECT * FROM sponsors WHERE id = ".$_GET['edit_id'];
		$result_set=mysqli_query($sql_query);
		$fetched_row=mysqli_fetch_array($result_set);
	}
	if (isset($_POST['btn-update']))
	{
		$img = $_POST['img'];
		
		$sql_query = "UPDATE sponsors SET img_url = '$img' WHERE id = ".$_GET['edit_id'];
		
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
	<h1>Add New Sponsor Record</h1>
	<a href="index.php">Go back to home</a>
	<form method="post">
		<table>
			<tr>
				<td>Sponsor Image URL:</td>
				<td><input type="text" name="img" value="<?php echo $fetched_row['img']; ?>" required /></td>
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