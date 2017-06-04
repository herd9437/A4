<html>
<head>
	<title>Add Maintenance</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
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
		$result = mysqli_query($mysqli, "INSERT INTO maintenance_cost (garage_name, street_address, city, state, zip, estimate, cost, procedure_name, procedure_date, authorization_number) VALUES ('$garage_name', '$street_address','$city','$state', '$zip','$estimate', '$cost', '$procedure_name', '$procedure_date', '$authorization_number')");

		//display success message
		echo "<font color='green'>Maintenance added successfully.";
		echo "<br/><a href='main_index.php'>View Result</a>";
	}
}
?>
</body>
</html>
