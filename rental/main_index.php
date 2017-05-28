<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>
	<title>Maintenance Homepage</title>
</head>

<body>
<a href="main_add.html">Add New Maintenance</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Street Address</td>
		<td>City</td>
		<td>Zip</td>
		<td>Cost</td>
	</tr>
	<?php
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
	while($res = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$res['street_address']."</td>";
		echo "<td>".$res['city']."</td>";
		echo "<td>".$res['zip']."</td>";
		echo "<td>".$res['cost']."</td>";
		echo "<td><a href=\"main_edit.php?id=$res[maintenance_id]\">Edit</a> | <a href=\"main_delete.php?id=$res[maintenance_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
	}
	?>
	</table>
</body>
</html>