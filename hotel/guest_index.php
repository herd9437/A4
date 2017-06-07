<ul>
  <li><a href="http://webtech.kettering.edu/~herd9437/A4/hotel/index.php">Home</a></li>
  <li><a href="http://webtech.kettering.edu/~herd9437/A4/hotel/customer_index.php">Customer</a></li>
  <li><a href="http://webtech.kettering.edu/~herd9437/A4/hotel/guest_index.php">Guest</a></li>
</ul>
<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM guest"); // using mysqli_query instead
?>

<html>
<head>
	<title>Guest Index</title>
</head>

<body>

	<table width='100%' border=0>

	<tr bgcolor='#DAF7A6 '>
		<td>Guest Name</td>
		<td>Room Desired</td>
		<td>Number People</td>
		<td>Arrival Time</td>
		<td>Expected Departure Date</td>
		<td>Confirmation Number</td>

	</tr>
	<?php
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
	while($res = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$res['guest_name']."</td>";
		echo "<td>".$res['room_desired']."</td>";
		echo "<td>".$res['num_people']."</td>";
		echo "<td>".$res['arrival_time']."</td>";
		echo "<td>".$res['expected_departure']."</td>";
		echo "<td>".$res['confirmation_num']."</td>";
		echo "<td><a href=\"guest_delete.php?confirmation_num=$res[confirmation_num]\" /td>";
	}
	?>
	</table>

<a href="customer_add.html">New Guest</a><br/><br/>


</body>
</html>
