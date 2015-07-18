<?php
	include_once('dbconfig.php');
	if (isset($_POST['btn-save'])) {
		$name = $_POST['name'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		$soundcloud = $_POST['soundcloud'];
		
		$sql_query = "INSERT INTO artists (name, title, description, soundcloud_url) VALUES ('$name', '$title', '$description', '$soundcloud')";
		
		if (mysql_query($sql_query))
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
	if (isset($_GET['edit_id']))
	{
		$sql_query = "SELECT * FROM artists WHERE id = ".$_GET['edit_id'];
		$result_set=mysql_query($sql_query);
		$fetched_row=mysql_fetch_array($result_set);
	}
	if (isset($_POST['btn-update']))
	{
		$name = $_POST['name'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		$soundcloud = $_POST['soundcloud'];
		
		$sql_query = "UPDATE artists SET name = '$name', title = '$title', description = '$description', soundcloud_url = '$soundcloud' WHERE id = ".$_GET['edit_id'];
		
		if (mysql_query($sql_query))
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
	<h1>Add New Artist Record</h1>
	<a href="index.php">Go back to home</a>
	<form method="post">
	<table>
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name" value="<?php echo $fetched_row['name']; ?>" required /></td>
		</tr>
		<tr>
			<td>Title (optional):</td>
			<td><input type="text" name="title" value="<?php echo $fetched_row['title']; ?>" /></td>
		</tr>
		<tr>
			<td>Description:</td>
			<td><textarea name="description" required><?php echo $fetched_row['description']; ?></textarea></td>
		</tr>
		<tr>
			<td>Soundcloud URL (optional):</td>
			<td><input type="text" name="soundcloud" value="<?php echo $fetched_row['soundcloud_url']; ?>" /></td>
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