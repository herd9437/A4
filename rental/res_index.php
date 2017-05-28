<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM reservation"); // using mysqli_query instead
?>

<html>
<head>
	<title>Reservation Homepage</title>
</head>

<body>
<a href="res_add.html">Add New Reservation</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Rate Period</td>
		<td>Discount</td>
		<td>Estimated Rental Duration</td>
		<td>Credit Card Number</td>
		<td>Credit Card Type</td>
		<td>Base Charge</td>
		<td>Tax</td>
		<td>Gas Level</td>
		<td>Date Rented</td>
		<td>Time Rented</td>
		<td>Date Returned</td>
		<td>Time Rented</td>
		<td>Insurance Charge</td>
		<td>Mileage Charge</td>
		<td>Start Miles</td>
		<td>End Miles</td>
	</tr>
	<?php
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
	while($res = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$res['rate_period']."</td>";
		echo "<td>".$res['discount']."</td>";
		echo "<td>".$res['estimated_rental_duration']."</td>";
		echo "<td>".$res['credit_card_number']."</td>";
		echo "<td>".$res['credit_card_type']."</td>";
		echo "<td>".$res['base_charge']."</td>";
		echo "<td>".$res['tax']."</td>";
		echo "<td>".$res['gas_level']."</td>";
		echo "<td>".$res['date_rented']."</td>";
		echo "<td>".$res['time_rented']."</td>";
		echo "<td>".$res['date_returned']."</td>";
		echo "<td>".$res['time_returned']."</td>";
		echo "<td>".$res['insurance_charge']."</td>";
		echo "<td>".$res['mileage_charge']."</td>";
		echo "<td>".$res['start_miles']."</td>";
		echo "<td>".$res['end_miles']."</td>";
		echo "<td><a href=\"res_edit.php?id=$res[credit_card_number]\">Edit</a> | <a href=\"res_delete.php?id=$res[credit_card_number]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
	}
	?>
	</table>
</body>
</html>
