<?php
//getting id from url
$rep_id = $_GET['rep_id'];

//selecting data associated with this particular id


$result = mysqli_query($mysqli, "SELECT c.make as make, c.model as model, c.color as color, c.licence_number as license_number, c.vin as vin, c.mileage as mileage, c.condition as condition, c.location as location FROM car AS c JOIN reservation AS r WHERE date_rented date_returned");

while($res = mysqli_fetch_array($result))
{
	$make = $res['make'];
	$model = $res['model'];
	$color = $res['color'];
	$license_number = $res['license_number'];
	$vin = $res['vin'];
	$mileage = $res['mileage'];
	$condition = $res['condition'];
	$location = $res['location'];
}
?>
<html>
<head>
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<table border="0">
		<tr>
			<td>Make</td>
			<td><input type="text" name="first_name" value="<?php echo $first_name ?>"></td>
		</tr>
		<tr>
			<td>Model</td>
			<td><input type="text" name="first_name" value="<?php echo $first_name ?>"></td>
		</tr>
		<tr>
			<td>Color</td>
			<td><input type="text" name="first_name" value="<?php echo $first_name ?>"></td>
		</tr>
		<tr>
			<td>License Number</td>
			<td><input type="text" name="first_name" value="<?php echo $first_name ?>"></td>
		</tr>
		<tr>
			<td>Vin</td>
			<td><input type="text" name="first_name" value="<?php echo $first_name ?>"></td>
		</tr>
		<tr>
			<td>Mileage</td>
			<td><input type="text" name="last_name" value="<?php echo $last_name ?>"></td>
		</tr>
		<tr>
			<td>Phone Number</td>
			<td><input type="text" name="phone_number" value="<?php echo $phone_number ?>"></td>
		</tr>
	</table>
</body>
</html>
