<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update'])){
	$garage_name = mysqli_real_escape_string($mysqli, $_POST['garage_name']);
	$street_address = mysqli_real_escape_string($mysqli, $_POST['street_address']);
	$city = mysqli_real_escape_string($mysqli, $_POST['city']);
	$state = mysqli_real_escape_string($mysqli, $_POST['state']);
	$zip = mysqli_real_escape_string($mysqli, $_POST['zip']);
	$estimate = mysqli_real_escape_string($mysqli, $_POST['estimate']);
	$cost = mysqli_real_escape_string($mysqli, $_POST['cost']);
	$procedure_name = mysqli_real_escape_string($mysqli, $_POST['procedure_name']);
	$procedure_date = mysqli_real_escape_string($mysqli, $_POST['procedure_date']);
	$authorization_number = mysqli_real_escape_string($mysqli, $_POST['authorization_number']);


	// checking empty fields
	if(empty($garage_name) || empty($street_address) || empty($city) || empty($state) || empty($zip) || empty($estimate)) || empty($cost) || empty($procedure_name) || empty($procedure_date) || empty($authorization_number))  {

		if(empty($garage_name)) {
			echo "<font color='red'>Garage Name field is empty.</font><br/>";
		}

		if(empty($street_address)) {
			echo "<font color='red'>Street Address field is empty.</font><br/>";
		}

		if(empty($city)) {
			echo "<font color='red'>City field is empty.</font><br/>";
		}

		if(empty($state)) {
			echo "<font color='red'>State field is empty.</font><br/>";
		}

		if(empty($zip)) {
			echo "<font color='red'>Zip field is empty.</font><br/>";
		}

		if(empty($estimate)) {
			echo "<font color='red'>Estimate field is empty.</font><br/>";
		}

		if(empty($cost)) {
			echo "<font color='red'>Cost field is empty.</font><br/>";
		}

		if(empty($procedure_name)) {
			echo "<font color='red'>Procedure Name field is empty.</font><br/>";
		}

		if(empty($procedure_date)) {
			echo "<font color='red'>Procedure Date field is empty.</font><br/>";
		}

		if(empty($authorization_number)) {
			echo "<font color='red'>Authorization Number field is empty.</font><br/>";
		}

	//link to the previous page
	echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
} else {
	// if all the fields are filled (not empty)

	//insert data to database
	$result = mysqli_query($mysqli, "UPDATE maintenance_cost SET street_address='$street_address', city'$city', zip='$zip', cost='$cost' WHERE maintenance_id='$maintenance_id' ");

	//display success message
	echo "<font color='green'>Maintenance added successfully.";
	echo "<br/><a href='main_index.php'>View Result</a>";
}
}
?>
<?php
//getting id from url
$maintenance_id = $_GET['maintenance_id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM maintenance_cost WHERE maintenance_id=$maintenance_id");

while($res = mysqli_fetch_array($result))
{
	$street_address = $res['street_address'];
	$city = $res['city'];
	$zip = $res['zip'];
	$cost = $res['cost'];
}
?>
<html>
<head>
	<title>Edit Maintenance</title>
</head>

<body>
	<a href="main_index.php">Maintenance Home</a>
	<br/><br/>

	<form name="form1" method="post" action="main_edit.php">
		<table border="0">
			<tr>
				<td>Garage Name</td>
				<td><input type="text" name="garage_name" value="<?php echo $garage_name ?>"></td>
			</tr>
			<tr>
				<td>Street Address</td>
				<td><input type="text" name="street_address" value="<?php echo $street_address ?>"></td>
			</tr>
			<tr>
				<td>City</td>
				<td><input type="text" name="city" value="<?php echo $city ?>"></td>
			</tr>
			<tr>
				<td>State</td>
				<td><input type="text" name="state" value="<?php echo $state ?>"></td>
			</tr>
			<tr>
				<td>Zip</td>
				<td><input type="text" name="zip" value="<?php echo $zip ?>"></td>
			</tr>
			<tr>
				<td>Estimate</td>
				<td><input type="text" name="estimate" value="<?php echo $estimate ?>"></td>
			</tr>
			<tr>
				<td>Cost</td>
				<td><input type="text" name="cost" value="<?php echo $cost ?>"></td>
			</tr>
			<tr>
				<td>Procedure Name</td>
				<td><input type="text" name="procedure_name" value="<?php echo $procedure_name ?>"></td>
			</tr>
			<tr>
				<td>Procedure Date</td>
				<td><input type="text" name="procedure_date" value="<?php echo $procedure_date ?>"></td>
			</tr>
			<tr>
				<td>Authorization Number</td>
				<td><input type="text" name="authorization_number" value="<?php echo $authorization_number ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="maintenance_id" value=<?php echo $_GET['maintenance_id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
