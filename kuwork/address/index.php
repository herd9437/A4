<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM address"); // using mysqli_query instead
?>


<!--
<html>
<head>
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Age</td>
		<td>Email</td>
		<td>Update</td>
	</tr>
	<?php
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
	echo "[";
	while($res = mysqli_fetch_array($result)) {
		echo "{"
		echo "\"street\":\"".$res['street']."\"";
		echo "\"city\":\"".$res['city']."\"";
		echo "\"state\":\"".$res['state']."\"";
		echo "\"zip\":\"".$res['zip']."\"";
		echo "}";
//		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
	}
	echo "]";
	?>
	</table>
</body>
</html>
-->
