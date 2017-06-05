<?php

include_once("../config.php");

//if(isset($_POST['Submit'])) {
	$vin_number = mysqli_real_escape_string($mysqli, $_POST['vin_number']);
	$make = mysqli_real_escape_string($mysqli, $_POST['make']);
	$model = mysqli_real_escape_string($mysqli, $_POST['model']);
	$capacity = mysqli_real_escape_string($mysqli, $_POST['capacity']);
	$owner_email = mysqli_real_escape_string($mysqli, $_POST['owner_email']);

	// checking empty fields
	if(empty($vin_number) || empty($make) || empty($model) || empty($capacity) || empty($owner_email)) {

		if(empty($vin_number)) {
			echo "<font color='red'> Vin Number field is empty.</font>");
		}

		if(empty($make)) {
			echo "<font color='red'> Make field is empty.</font>");
		}

		if(empty($model)) {
			echo "<font color='red'> Model field is empty.</font>");
		}

		if(empty($capacity)) {
			echo "<font color='red'> Capacity field is empty.</font>");
		}

		if(empty($owner_email)) {
			echo "<font color='red'> Owner Email field is empty.</font>");
		}

	} else {

		$result = mysqli_query($mysqli, "INSERT INTO vehicle(vin_number,make,model,capacity,owner_email) VALUES('$vin_number','$make','$model','$capacity','$owner_email')");
		//display success message
		echo "<font color='green'>Vehicle added successfully.";
		echo "<br/><a href='http://webtech.kettering.edu/~vecc0396/cs461/kuwork/index.html'>Go Home</a>";

	}
?>
