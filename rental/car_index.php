<ul>
  <li><a href="http://webtech.kettering.edu/~vecc0396/cs461/rental/index.php">Home</a></li>
  <li><a href="http://webtech.kettering.edu/~vecc0396/cs461/rental/car_index.php">Cars</a></li>
  <li><a href="http://webtech.kettering.edu/~vecc0396/cs461/rental/corp_index.php">Corporations</a></li>
  <li><a href="http://webtech.kettering.edu/~vecc0396/cs461/rental/cust_index.php">Customers</a></li>
  <li><a href="http://webtech.kettering.edu/~vecc0396/cs461/rental/main_index.php">Maintenance</a></li>
  <li><a href="http://webtech.kettering.edu/~vecc0396/cs461/rental/rep_index.php">Representatives</a></li>
  <li><a href="http://webtech.kettering.edu/~vecc0396/cs461/rental/res_index.php">Reservations</a></li>
</ul>
<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM car"); // using mysqli_query instead
?>

<html>
<head>
	<title>Car Index</title>
</head>

<body>
<a href="car_add.html">Add New Cars</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Make</td>
		<td>Model</td>
		<td>Location</td>
		<td>Color</td>
		<td>License Number</td>
		<td>State</td>
		<td>Mileage</td>
		<td>Vin</td>
	</tr>
	<?php
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
	while($res = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$res['make']."</td>";
		echo "<td>".$res['model']."</td>";
		echo "<td>".$res['location']."</td>";
		echo "<td>".$res['color']."</td>";
		echo "<td>".$res['license_number']."</td>";
		echo "<td>".$res['state']."</td>";
		echo "<td>".$res['mileage']."</td>";
		echo "<td>".$res['vin']."</td>";
		echo "<td><a href=\"car_edit.php?id=$res[id]\">Edit</a> | <a href=\"car_delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
	}
	?>
	</table>
</body>
</html>
