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
$result = mysqli_query($mysqli, "SELECT * FROM customer"); // using mysqli_query instead
?>

<html>
<head>
	<title>Customer Homepage</title>
</head>

<body>
<a href="add.html">Add New Customer</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Street Address</td>
		<td>City</td>
		<td>Zip</td>
		<td>Phone Number</td>
	</tr>
	<?php
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
	while($res = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$res['first_name']."</td>";
		echo "<td>".$res['last_name']."</td>";
		echo "<td>".$res['street_address']."</td>";
		echo "<td>".$res['city']."</td>";
		echo "<td>".$res['zip']."</td>";
		echo "<td>".$res['phone_number']."</td>";
		echo "<td><a href=\"cust_edit.php?customer_id=$res[customer_id]\">Edit</a> | <a href=\"cust_delete.php?customer_id=$res[customer_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
	}
	?>
	</table>
</body>
</html>
