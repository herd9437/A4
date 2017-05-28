<html>
<head>
	<title>Add Corporation</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
	$account_number = mysqli_real_escape_string($mysqli, $_POST['account_number']);
	$street_address = mysqli_real_escape_string($mysqli, $_POST['street_address']);
	$city = mysqli_real_escape_string($mysqli, $_POST['city']);
	$zip = mysqli_real_escape_string($mysqli, $_POST['zip']);
	$phone_number = mysqli_real_escape_string($mysqli, $_POST['phone_number']);

	// checking empty fields
	if(empty($account_number) || empty($street_address) || empty($city) || empty($zip) || empty($phone_number)) {

		if(empty($account_number)) {
			echo "<font color='red'>Account Number field is empty.</font><br/>";
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
		;
		$result = mysqli_query($mysqli, "INSERT INTO corporation (account_number, street_address, city, zip, phone_number) VALUES ( '$account_number', '$street_address', '$city', '$zip', '$phone_number')");

		//display success message
		echo "<font color='green'>Corporation added successfully.";
		echo "<br/><a href='corp_index.php'>View Result</a>";
	}
}
?>
</body>
</html>
