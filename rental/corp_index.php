<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM corporation"); // using mysqli_query instead
?>

<html>
<head>
	<title>Corporation Homepage</title>
</head>

<body>
<a href="corp_add.html">Add New Corporation</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Account Number</td>
		<td>Street Address</td>
		<td>City</td>
		<td>Zip</td>
		<td>Phone Number</td>
	</tr>
	<?php
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
	while($res = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$res['account_number']."</td>";
		echo "<td>".$res['street_address']."</td>";
		echo "<td>".$res['city']."</td>";
		echo "<td>".$res['zip']."</td>";
		echo "<td>".$res['phone_number']."</td>";
		echo "<td><a href=\"corp_edit.php?id=$res[id]\">Edit</a> | <a href=\"corp_delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
	}
	?>
	</table>
</body>
</html>
