<html>
<head>
	<title>Add Customer</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
	$first_name = mysqli_real_escape_string($mysqli, $_POST['first_name']);
	$last_name = mysqli_real_escape_string($mysqli, $_POST['last_name']);
	$street_address = mysqli_real_escape_string($mysqli, $_POST['street_address']);
	$city = mysqli_real_escape_string($mysqli, $_POST['city']);
	$zip = mysqli_real_escape_string($mysqli, $_POST['zip']);
	$phone_number = mysqli_real_escape_string($mysqli, $_POST['phone_number']);

	// checking empty fields
	if(empty($first_name) || empty($last_name) || empty($street_address) || empty($city) || empty($zip) || empty($phone_number)) {

		if(empty($first_name)) {
			echo "<font color='red'>First Name field is empty.</font><br/>";
		}

		if(empty($last_name)) {
			echo "<font color='red'>Last Name field is empty.</font><br/>";
		}

		if(empty($street_address)) {
			echo "<font color='red'>Street Address field is empty.</font><br/>";
		}

		if(empty($city)) {
			echo "<font color='red'>City field is empty.</font><br/>";
		}

		if(empty($zip)) {
			echo "<font color='red'>Zip field is empty.</font><br/>";
		}

 		if(empty($phone_number)) {
			echo "<font color='red'>Phone Number field is empty.</font><br/>";
		}

		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// if all the fields are filled (not empty)

		//insert data to database
		$result = mysqli_query($mysqli, "INSERT INTO users(name,age,email) VALUES('$name','$age','$email')");

		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='cust_index.php'>View Result</a>";
	}
}
?>
</body>
</html>
