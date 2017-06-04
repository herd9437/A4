<?php
//getting id from url
$rep_id = $_GET['rep_id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT cu.first_name, cu.last_name, cu.street_address, cu.city, cu.state, cu.zip, cu.phone_number, co.name, co.street_address, co.city, co.state, co.zip, co.account_number, cu.credit_card_type, cu.credit_card_number, ca.license_number, ca.make, ca.model, r.mileage_plan, r.insurance_plan, r.rate_period, r.rate, r.date_rented, r.time_rented, r.date_returned, r.time_returned, r.start_miles, r.end_miles, r.gas_level, r.base_charge, r.mileage_charge, r.insurance_charge, r.gas_charge, r.tax, r.final_charge");

while($res = mysqli_fetch_array($result))
{
	$first_name = $res['first_name'];
	$last_name = $res['last_name'];
	$phone_number = $res['phone_number'];
}
?>
<html>
<head>
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<form name="form1" method="post" action="rep_edit.php">
		<table border="0">
			<tr>
				<td>First Name</td>
				<td><input type="text" name="first_name" value="<?php echo $first_name ?>"></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input type="text" name="last_name" value="<?php echo $last_name ?>"></td>
			</tr>
			<tr>
				<td>Phone Number</td>
				<td><input type="text" name="phone_number" value="<?php echo $phone_number ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="rep_id" value=<?php echo $_GET['rep_id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php
$result = mysqli_query($mysqli, "SELECT * FROM representative WHERE rep_id=$rep_id");
echo "<select>"
while($res = mysqli_fetch_array($result))
{
	echo "<option></option>"
}
echo "</select>"
?>
