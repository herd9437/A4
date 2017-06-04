<?php
//getting id from url
$rep_id = $_GET['rep_id'];

//selecting data associated with this particular id
SELECT cu.first_name, cu.last_name, cu.street_address, cu.city, cu.state, cu.zip, cu.phone_number,
r.credit_card_type, r.credit_card_number, cp.name, cp.account_number, ca.make, ca.model, r.mileage_plan, r.insurance_plan, r.rate_period, r.rate,
r.discount, r.estimated_rental_duration
customer AS cu JOIN reservation AS r JOIN corporation AS cp JOIN car AS ca

$result = mysqli_query($mysqli, "SELECT * FROM representative WHERE rep_id=$rep_id");

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
