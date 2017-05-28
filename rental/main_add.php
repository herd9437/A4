<html>
<head>
	<title>New Car</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
	$street_address = mysqli_real_escape_string($mysqli, $_POST['street_address']);
	$city = mysqli_real_escape_string($mysqli, $_POST['city']);
	$zip = mysqli_real_escape_string($mysqli, $_POST['zip']);
	$cost = mysqli_real_escape_string($mysqli, $_POST['cost']);

	// checking empty fields
	if(empty($street_address) || empty($city) || empty($zip) || empty($cost)) {

		if(empty($street_address)) {
			echo "<font color='red'>Street Address field is empty.</font><br/>";
		}

		if(empty($city)) {
			echo "<font color='red'>City field is empty.</font><br/>";
		}

		if(empty($zip)) {
			echo "<font color='red'>Zip field is empty.</font><br/>";
		}

		if(empty($cost)) {
			echo "<font color='red'>Cost field is empty.</font><br/>";
		}

		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// if all the fields are filled (not empty)

		//insert data to database
		$result = mysqli_query($mysqli, "INSERT INTO maintenance_cost (street_address, city, zip, cost) VALUES ('$street_address','$city','$zip','$cost')");

		//display success message
		echo "<font color='green'>Maintenance added successfully.";
		echo "<br/><a href='main_index.php'>View Result</a>";
	}
}
?>
</body>
</html>
