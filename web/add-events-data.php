<?php
	include_once('dbconfig.php');
	if (isset($_POST['btn-save'])) {
		$name = $_POST['name'];
		$location = $_POST['location'];
		$description = $_POST['description'];
		$timestart = $_POST['timestart'];
		$timeend = $_POST['timeend'];
		
		$sql_query = "INSERT INTO events (event_name, location, description, time_start, time_end) VALUES ('$name', '$location', '$description', '$timestart', '$timeend')";
		
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
	if (isset($_GET['edit_id']))
	{
		$sql_query = "SELECT * FROM events WHERE id = ".$_GET['edit_id'];
		$result_set=mysqli_query($sql_query);
		$fetched_row=mysqli_fetch_array($result_set);
	}
	if (isset($_POST['btn-update']))
	{
		$name = $_POST['name'];
		$location = $_POST['location'];
		$description = $_POST['description'];
		$timestart = $_POST['timestart'];
		$timeend = $_POST['timeend'];
		
		$sql_query = "UPDATE events SET event_name = '$name', location = '$location', description = '$description', time_start = '$timestart', time_end = '$timeend' WHERE id = ".$_GET['edit_id'];
		
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
	<h1>Add New Event Record</h1>
	<a href="index.php">Go back to home</a>
	<form method="post">
		<table>
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name" value="<?php echo $fetched_row['name']; ?>" required /></td>
			</tr>
			<tr>
				<td>Location (optional):</td>
				<td><input type="text" name="location" value="<?php echo $fetched_row['location']; ?>" /></td>
			</tr>
			<tr>
				<td>Description (optional):</td>
				<td><textarea name="description"><?php echo $fetched_row['description']; ?></textarea></td>
			</tr>
			<tr>
				<td>Event Start Time (military time):</td>
				<td><input type="text" name="timestart" value="<?php echo $fetched_row['time_start']; ?>" required /></td>
			</tr>
			<tr>
				<td>Event Start Time (military time):</td>
				<td><input type="text" name="timeend" value="<?php echo $fetched_row['time_end']; ?>" required /></td>
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