<?php
  include_once 'dbconfig.php';
  
  if (isset($_GET['delete_artists_id']))
  {
    $sql_query = "DELETE FROM artists WHERE id = ".$_GET['delete_artists_id'];
    mysql_query($sql_query);
    header("Location: $_SERVER[PHP_SELF]");
  }
  if (isset($_GET['delete_events_id']))
  {
    $sql_query = "DELETE FROM events WHERE id = ".$_GET['delete_events_id'];
    mysql_query($sql_query);
    header("Location: $_SERVER[PHP_SELF]");
  }
  if (isset($_GET['delete_merch_id']))
  {
    $sql_query = "DELETE FROM merch WHERE id = ".$_GET['delete_merch_id'];
    mysql_query($sql_query);
    header("Location: $_SERVER[PHP_SELF]");
  }
  if (isset($_GET['delete_sponsors_id']))
  {
    $sql_query = "DELETE FROM sponsors WHERE id = ".$_GET['delete_sponsors_id'];
    mysql_query($sql_query);
    header("Location: $_SERVER[PHP_SELF]");
  }
  if (isset($_GET['delete_copy_id']))
  {
    $sql_query = "DELETE FROM copy WHERE id = ".$_GET['delete_copy_id'];
    mysql_query($sql_query);
    header("Location: $_SERVER[PHP_SELF]");
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>CardsFest Data Entry</title>
  <style>
    body {
      text-align: center;
    }
    h1 {
      margin-top: 1.5em;
    }
    table {
      width: 80%;
      margin: 1rem auto;
      text-align: center;
      border-collapse: collapse;
    }
  </style>
  <script>
    function edta_id(id) {
      window.location.href = 'add-artists-data.php?edit_id='+id;
    }
    function deletea_id(id) {
      if (confirm('Are you sure you want to delete this artist?')) {
        window.location.href = 'index.php?delete_artists_id='+id;
      }
    }
    
    function edte_id(id) {
      window.location.href = 'add-events-data.php?edit_id='+id;
    }
    function deletee_id(id) {
      if (confirm('Are you sure you want to delete this event?')) {
        window.location.href = 'index.php?delete_events_id='+id;
      }
    }
    
    function edtm_id(id) {
      window.location.href = 'add-merch-data.php?edit_id='+id;
    }
    function deletem_id(id) {
      if (confirm('Are you sure you want to delete this merch item?')) {
        window.location.href = 'index.php?delete_merch_id='+id;
      }
    }
    
    function edts_id(id) {
      window.location.href = 'add-sponsors-data.php?edit_id='+id;
    }
    function deletes_id(id) {
      if (confirm('Are you sure you want to delete this sponsor?')) {
        window.location.href = 'index.php?delete_sponsors_id='+id;
      }
    }
    
    function edtc_id(id) {
      window.location.href = 'add-copy-data.php?edit_id='+id;
    }
    function deletec_id(id) {
      if (confirm('Are you sure you want to delete this sponsor?')) {
        window.location.href = 'index.php?delete_copy_id='+id;
      }
    }
  </script>
</head>
<body>
	<h1>Artists</h1>
    <a href="add-artists-data.php">Add new record(s)</a>
  	<table border="1">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Title</th>
			<th>Description</th>
			<th>Soundcloud URL</th>
      <th>Actions</th>
		</tr>
    <?php
      $sql_query = "SELECT * FROM artists";
      $result_set = mysql_query($sql_query);
      while ($row = mysql_fetch_row($result_set))
      {
    ?>
  		<tr>
  			<td><?php echo $row[0]; ?></td>
  			<td><?php echo $row[1]; ?></td>
  			<td><?php echo $row[2]; ?></td>
  			<td><?php echo $row[3]; ?></td>
  			<td><?php echo $row[4]; ?></td>
        <td><a href="javascript:edta_id('<?php echo $row[0]; ?>')">Edit</a> | <a href="javascript:deletea_id('<?php echo $row[0]; ?>')">Delete</a></td>
  		</tr>
    <?php
      }
    ?>
  	</table>
	<h1>Events</h1>
    <a href="add-events-data.php">Add new record(s)</a>
  	<table border="1">
		<tr>
			<th>ID</th>
			<th>Event Name</th>
			<th>Location</th>
			<th>Description</th>
			<th>Start Time</th>
      <th>End Time</th>
      <th>Actions</th>
		</tr>
    <?php
      $sql_query = "SELECT * FROM events";
      $result_set = mysql_query($sql_query);
      while ($row = mysql_fetch_row($result_set))
      {
    ?>
  		<tr>
  			<td><?php echo $row[0]; ?></td>
  			<td><?php echo $row[1]; ?></td>
  			<td><?php echo $row[2]; ?></td>
  			<td><?php echo $row[3]; ?></td>
  			<td><?php echo $row[4]; ?></td>
  			<td><?php echo $row[5]; ?></td>
        <td><a href="javascript:edte_id('<?php echo $row[0]; ?>')">Edit</a> | <a href="javascript:deletee_id('<?php echo $row[0]; ?>')">Delete</a></td>
  		</tr>
    <?php
      }
    ?>
  	</table>
	<h1>Merch</h1>
    <a href="add-merch-data.php">Add new record(s)</a>
  	<table border="1">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Image Link</th>
			<th>Product Link</th>
      <th>Actions</th>
		</tr>
    <?php
      $sql_query = "SELECT * FROM merch";
      $result_set = mysql_query($sql_query);
      while ($row = mysql_fetch_row($result_set))
      {
    ?>
  		<tr>
  			<td><?php echo $row[0]; ?></td>
  			<td><?php echo $row[1]; ?></td>
  			<td><?php echo $row[2]; ?></td>
  			<td><?php echo $row[3]; ?></td>
        <td><a href="javascript:edtm_id('<?php echo $row[0]; ?>')">Edit</a> | <a href="javascript:deletem_id('<?php echo $row[0]; ?>')">Delete</a></td>
  		</tr>
    <?php
      }
    ?>
  	</table>
	<h1>Sponsors</h1>
    <a href="add-sponsors-data.php">Add new record(s)</a>
  	<table border="1">
		<tr>
			<th>ID</th>
			<th>Sponsor Logo URL</th>
      <th>Actions</th>
		</tr>
    <?php
      $sql_query = "SELECT * FROM sponsors";
      $result_set = mysql_query($sql_query);
      while ($row = mysql_fetch_row($result_set))
      {
    ?>
  		<tr>
  			<td><?php echo $row[0]; ?></td>
  			<td><?php echo $row[1]; ?></td>
        <td><a href="javascript:edts_id('<?php echo $row[0]; ?>')">Edit</a> | <a href="javascript:deletes_id('<?php echo $row[0]; ?>')">Delete</a></td>
  		</tr>
    <?php
      }
    ?>
  	</table>
	<h1>Sections + Copy</h1>
    <a href="add-copy-data.php">Add new record(s)</a>
  	<table border="1">
		<tr>
			<th>ID</th>
			<th>Section Name</th>
			<th>Copy Text</th>
      <th>Actions</th>
		</tr>
    <?php
      $sql_query = "SELECT * FROM copy";
      $result_set = mysql_query($sql_query);
      while ($row = mysql_fetch_row($result_set))
      {
    ?>
  		<tr>
  			<td><?php echo $row[0]; ?></td>
  			<td><?php echo $row[1]; ?></td>
  			<td><?php echo $row[2]; ?></td>
        <td><a href="javascript:edtc_id('<?php echo $row[0]; ?>')">Edit</a> | <a href="javascript:deletec_id('<?php echo $row[0]; ?>')">Delete</a></td>
  		</tr>
    <?php
      }
    ?>
  	</table>
</body>
</html>