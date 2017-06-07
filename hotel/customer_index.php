<ul>
  <li><a href="http://webtech.kettering.edu/~herd9437/A4/hotel/index.php">Home</a></li>
  <li><a href="http://webtech.kettering.edu/~herd9437/A4/hotel/customer_index.php">Customer</a></li>
<!-- 
  <li><a href="http://webtech.kettering.edu/~herd9437/A4/hotel/guest_index.php">Guest</a></li>
 -->
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
	<title>Customer Index</title>
</head>

<body>
<a href="customer_add.html">Add New Customers</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Customer Name</td>
		<td>Address</td>
		<td>Credit Card Type</td>
		<td>Credit Card Number</td>
		<td>Telephone</td>

	</tr>
	<?php
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
	while($res = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$res['cust_name']."</td>";
		echo "<td>".$res['address']."</td>";
		echo "<td>".$res['cc_type']."</td>";
		echo "<td>".$res['cc_num']."</td>";
		echo "<td>".$res['telephone']."</td>";
		echo "<td><a href=\"customer_delete.php?vin=$res[vin]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
	}
	?>
	</table>
</body>
</html>
