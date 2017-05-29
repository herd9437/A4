<?php
//including the database connection file
include_once("../config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM student"); // using mysqli_query instead
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
-->
	<?php
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
	echo "[";

	while($res = mysqli_fetch_array($result)) {
		echo "{";
		echo "\"email\":\"".$res['email']."\",";
		echo "\"phone_number\":\"".$res['phone_number']."\",";
		echo "\"name\":\"".$res['name']."\",";
		echo "\"degree\":\"".$res['degree']."\",";
		echo "\"major\":\"".$res['major']."\",";
		echo "\"class_standing\":\"".$res['class_standing']."\",";
		echo "\"company_name\":\"".$res['company_name']."\",";
		echo "\"residence_id\":\"".$res['residence_id']."\",";
		echo "}";
//		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
	}

	echo "]";
	?>
<!--
	</table>
</body>
</html>
-->
