<?php
//including the database connection file
include_once("../config.php");

//if(isset($_POST['Submit'])) {
	$street = mysqli_real_escape_string($mysqli, $_POST['street']);
	$city = mysqli_real_escape_string($mysqli, $_POST['city']);
	$state = mysqli_real_escape_string($mysqli, $_POST['state']);
	$zip_code = mysqli_real_escape_string($mysqli, $_POST['zip_code']);

	// checking empty fields
	if(empty($street) || empty($city) || empty($state) || empty($zip_code)) {

		if(empty($street)) {
			echo "<font color='red'> Street field is empty.</font>";
		}

		if(empty($city)) {
			echo "<font color='red'> City field is empty.</font>";
		}

		if(empty($state)) {
			echo "<font color='red'> State field is empty.</font>";
		}

		if(empty($zip_code)) {
			echo "<font color='red'> Zip Code field is empty.</font>";
		}

	} else {

		$result = mysqli_query($mysqli, "INSERT INTO Address (street,city,state,zip_code) VALUES('$street','$city','$state','$zip_code')");
		//display success message
		echo "<font color='green'>Address added successfully.";
		echo "<br/><a href='http://webtech.kettering.edu/~vecc0396/cs461/kuwork/index.html'>Go Home</a>";

	}
?>
