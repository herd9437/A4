<html>
<head>
	<title>New Car</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
	$make = mysqli_real_escape_string($mysqli, $_POST['make']);
	$model = mysqli_real_escape_string($mysqli, $_POST['model']);
	$location = mysqli_real_escape_string($mysqli, $_POST['location']);
	$color = mysqli_real_escape_string($mysqli, $_POST['color']);
	$license_number = mysqli_real_escape_string($mysqli, $_POST['license_number']);
	$state = mysqli_real_escape_string($mysqli, $_POST['state']);
	$mileage = mysqli_real_escape_string($mysqli, $_POST['mileage']);
	$vin = mysqli_real_escape_string($mysqli, $_POST['vin']);

	// checking empty fields
	if(empty($make) || empty($model) || empty($location) || empty($color) || empty($license_number) || empty($state) || empty($mileage) || empty($vin)) {

		if(empty($make)) {
			echo "<font color='red'>Make field is empty.</font><br/>";
		}

		if(empty($model)) {
			echo "<font color='red'>Model field is empty.</font><br/>";
		}

		if(empty($location)) {
			echo "<font color='red'>Location field is empty.</font><br/>";
		}

		if(empty($color)) {
			echo "<font color='red'>Color field is empty.</font><br/>";
		}

		if(empty($license_number)) {
			echo "<font color='red'>License Number field is empty.</font><br/>";
		}

		if(empty($state)) {
			echo "<font color='red'>State field is empty.</font><br/>";
		}

		if(empty($mileage)) {
			echo "<font color='red'>Mileage field is empty.</font><br/>";
		}

		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// if all the fields are filled (not empty)

		//insert data to database
		$result = mysqli_query($mysqli, "INSERT INTO car (make, model, location, color, license_number, state, mileage, vin) VALUES ( '$make', '$model', '$location', '$color', '$license_number', '$state', '$mileage', '$vin')");

		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
