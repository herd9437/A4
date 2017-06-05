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
    <td>Garage Name</td>
		<td>Street Address</td>
    <td>City</td>
    <td>State</td>
		<td>Zip</td>
    <td>Estimate</td>
		<td>Cost</td>
    <td>Procedure Name</td>
    <td>Procedure Date</td>
    <td>Authorization Number</td>
	</tr>
	<?php
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
	while($res = mysqli_fetch_array($result)) {
		echo "<tr>";
    echo "<td>".$res['garage_name']."</td>";
		echo "<td>".$res['street_address']."</td>";
		echo "<td>".$res['city']."</td>";
    echo "<td>".$res['state']."</td>";
		echo "<td>".$res['zip']."</td>";
    echo "<td>".$res['estimate']."</td>";
		echo "<td>".$res['cost']."</td>";
    echo "<td>".$res['procedure_name']."</td>";
    echo "<td>".$res['procedure_date']."</td>";
    echo "<td>".$res['authorization_number']."</td>";
		echo "<td><a href=\"main_edit.php?maintenance_id=$res[maintenance_id]\">Edit</a> | <a href=\"main_delete.php?maintenance_id=$res[maintenance_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
	}
	?>
	</table>
</body>
</html>
