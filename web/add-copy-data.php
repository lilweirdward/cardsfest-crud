<?php
	include_once('dbconfig.php');
	if (isset($_POST['btn-save'])) {
		$section = $_POST['section'];
		$copy = $_POST['copy'];
		
		$sql_query = "INSERT INTO copy (section, copy) VALUES ('$section', '$copy')";
		
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
		$sql_query = "SELECT * FROM copy WHERE id = ".$_GET['edit_id'];
		$result_set=mysqli_query($sql_query);
		$fetched_row=mysqli_fetch_array($result_set);
	}
	if (isset($_POST['btn-update']))
	{
		$section = $_POST['section'];
		$copy = $_POST['copy'];
		
		$sql_query = "UPDATE copy SET section = '$section', copy = '$copy' WHERE id = ".$_GET['edit_id'];
		
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
	<h1>Add New Copy Record</h1>
	<a href="index.php">Go back to home</a>
	<form method="post">
		<table>
			<tr>
				<td>Section Name:</td>
				<td><input type="text" name="section" value="<?php echo $fetched_row['section']; ?>" required /></td>
			</tr>
			<tr>
				<td>Copy Text:</td>
				<td><textarea name="copy" required><?php echo $fetched_row['copy']; ?></textarea></td>
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