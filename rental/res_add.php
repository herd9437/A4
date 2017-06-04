<html>
<head>
	<title>Add Reservation</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
	$rate_period = mysqli_real_escape_string($mysqli, $_POST['rate_period']);
	$rate = mysqli_real_escape_string($mysqli, $_POST['rate']);
	$discount = mysqli_real_escape_string($mysqli, $_POST['discount']);
	$estimated_rental_duration = mysqli_real_escape_string($mysqli, $_POST['estimated_rental_duration']);
	$credit_card_type = mysqli_real_escape_string($mysqli, $_POST['credit_card_type']);
	$credit_card_number = mysqli_real_escape_string($mysqli, $_POST['credit_card_number']);
	$base_charge = mysqli_real_escape_string($mysqli, $_POST['base_charge']);
	$tax = mysqli_real_escape_string($mysqli, $_POST['tax']);
	$gas_level = mysqli_real_escape_string($mysqli, $_POST['gas_level']);
	$gas_charge = mysqli_real_escape_string($mysqli, $_POST['gas_charge']);
	$date_rented = mysqli_real_escape_string($mysqli, $_POST['date_rented']);
	$time_rented = mysqli_real_escape_string($mysqli, $_POST['time_rented']);
	$date_returned = mysqli_real_escape_string($mysqli, $_POST['date_returned']);
	$time_returned = mysqli_real_escape_string($mysqli, $_POST['time_returned']);
	$insurance_charge = mysqli_real_escape_string($mysqli, $_POST['insurance_charge']);
	$mileage_charge = mysqli_real_escape_string($mysqli, $_POST['mileage_charge']);
	$mileage_charge = mysqli_real_escape_string($mysqli, $_POST['mileage_charge']);
	$final_charge = mysqli_real_escape_string($mysqli, $_POST['final_charge']);
	$end_miles = mysqli_real_escape_string($mysqli, $_POST['end_miles']);
	$start_miles = mysqli_real_escape_string($mysqli, $_POST['start_miles']);

	// checking empty fields
	if(empty($final_charge) || empty($gas_charge) || empty($rate) || empty($rate_period) || empty($discount) || empty($estimated_rental_duration) || empty($credit_card_type) || empty($credit_card_number) || empty($base_charge) || empty($tax) || empty($gas_level) || empty($date_rented) || empty($time_rented) || empty($date_returned) || empty($time_returned) || empty($insurance_charge) || empty($mileage_charge) || empty($start_miles) || empty($end_miles) || empty($start_miles)) {

		if(empty($rate)) {
			echo "<font color='red'>Rate field is empty.</font><br/>";
		}

		if(empty($rate_period)) {
			echo "<font color='red'>Rate Period field is empty.</font><br/>";
		}

		if(empty($discount)) {
			echo "<font color='red'>Discount field is empty.</font><br/>";
		}

		if(empty($estimated_rental_duration)) {
			echo "<font color='red'>Estimated Rental Duration field is empty.</font><br/>";
		}
		if(empty($credit_card_type)) {
			echo "<font color='red'>Credit Card Type field is empty.</font><br/>";
		}
		if(empty($credit_card_number)) {
			echo "<font color='red'>Credit Card Number field is empty.</font><br/>";
		}
		if(empty($base_charge)) {
			echo "<font color='red'>Base Charge field is empty.</font><br/>";
		}
		if(empty($tax)) {
			echo "<font color='red'>Tax field is empty.</font><br/>";
		}
		if(empty($gas_level)) {
			echo "<font color='red'>Gas Level field is empty.</font><br/>";
		}
		if(empty($gas_charge)) {
			echo "<font color='red'>Gas Charge field is empty.</font><br/>";
		}
		if(empty($date_rented)) {
			echo "<font color='red'>Date Rented field is empty.</font><br/>";
		}
		if(empty($time_rented)) {
			echo "<font color='red'>Time Rented field is empty.</font><br/>";
		}
		if(empty($date_returned)) {
			echo "<font color='red'>Date Returned field is empty.</font><br/>";
		}
		if(empty($time_returned)) {
			echo "<font color='red'>Time Returned field is empty.</font><br/>";
		}
		if(empty($insurance_charge)) {
			echo "<font color='red'>Insurance Charge field is empty.</font><br/>";
		}
		if(empty($mileage_charge)) {
			echo "<font color='red'>Mileage Charge field is empty.</font><br/>";
		}
		if(empty($final_charge)) {
			echo "<font color='red'>Final Charge field is empty.</font><br/>";
		}
		if(empty($start_miles)) {
			echo "<font color='red'>Start Miles field is empty.</font><br/>";
		}
		if(empty($end_miles)) {
			echo "<font color='red'>End Miles field is empty.</font><br/>";
		}

		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// if all the fields are filled (not empty)

		//insert data to database
		$result = mysqli_query($mysqli, "INSERT INTO reservation (rate, gas_charge, final_charge, rate_period, discount, estimated_rental_duration, credit_card_number, credit_card_type, base_charge, tax, gas_level, date_rented, time_rented, date_returned, time_returned, insurance_charge, mileage_charge, start_miles, end_miles, customer_id, car_id) VALUES ('$rate', '$gas_charge', '$final_charge', '$rate_period','$discount','$estimated_rental_duration','$credit_card_type','$credit_card_number','$base_charge','$tax','$gas_level','$date_rented','$time_rented','$date_returned','$time_returned','$insurance_charge','$mileage_charge','$start_miles','$end_miles','$start_miles')");

		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='res_index.php'>View Result</a>";
	}
}
?>
</body>
</html>
