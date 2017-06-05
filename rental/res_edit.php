<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
	$rate = mysqli_real_escape_string($mysqli, $_POST['rate']);
	$rate_period = mysqli_real_escape_string($mysqli, $_POST['rate_period']);
	$discount = mysqli_real_escape_string($mysqli, $_POST['discount']);
	$estimated_rental_duration = mysqli_real_escape_string($mysqli, $_POST['estimated_rental_duration']);
	$credit_card_type = mysqli_real_escape_string($mysqli, $_POST['credit_card_type']);
	$credit_card_number = mysqli_real_escape_string($mysqli, $_POST['credit_card_number']);
	$base_charge = mysqli_real_escape_string($mysqli, $_POST['base_charge']);
	$gas_charge = mysqli_real_escape_string($mysqli, $_POST['gas_charge']);
	$tax = mysqli_real_escape_string($mysqli, $_POST['tax']);
	$gas_level = mysqli_real_escape_string($mysqli, $_POST['gas_level']);
	$date_rented = mysqli_real_escape_string($mysqli, $_POST['date_rented']);
	$time_rented = mysqli_real_escape_string($mysqli, $_POST['time_rented']);
	$date_returned = mysqli_real_escape_string($mysqli, $_POST['date_returned']);
	$time_returned = mysqli_real_escape_string($mysqli, $_POST['time_returned']);
	$insurance_charge = mysqli_real_escape_string($mysqli, $_POST['insurance_charge']);
	$mileage_charge = mysqli_real_escape_string($mysqli, $_POST['mileage_charge']);
	$final_charge = mysqli_real_escape_string($mysqli, $_POST['final_charge']);
	$start_miles = mysqli_real_escape_string($mysqli, $_POST['start_miles']);
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
		$result = mysqli_query($mysqli, "UPDATE reservation SET rate='$rate', gas_charge='$gas_charge', final_charge='$final_charge', rate_period='$rate_period', discount='$discount' WHERE credit_card_number='$credit_card_number'");
		$result = mysqli_query($mysqli, "UPDATE reservation SET estimated_rental_duration='$estimated_rental_duration', credit_card_number='$credit_card_type', credit_card_type='$credit_card_number' WHERE credit_card_number='$credit_card_number'");
		$result = mysqli_query($mysqli, "UPDATE reservation SET base_charge='$base_charge', tax='$tax', gas_level='$gas_level', date_rented='$date_rented', time_rented='$time_rented', date_returned='$date_returned' WHERE credit_card_number='$credit_card_number'");
		$result = mysqli_query($mysqli, "UPDATE reservation SET time_returned='$time_returned', insurance_charge='$insurance_charge', mileage_charge='$mileage_charge', start_miles='$start_miles', end_miles='$end_miles' WHERE credit_card_number='$credit_card_number'");

		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='res_index.php'>View Result</a>";
	}
}

//getting id from url
$credit_card_number = $_GET['credit_card_number'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM reservation WHERE credit_card_number=$credit_card_number");

while($res = mysqli_fetch_array($result))
{
	$rate = $res['rate'];
	$rate_period = $res['rate_period'];
	$discount = $res['discount'];
	$estimated_rental_duration = $res['estimated_rental_duration'];
	$credit_card_number = $res['ncredit_card_number];
	$credit_card_type = $res['credit_card_type'];
	$base_charge = $res['base_charge'];
	$tax = $res['tax'];
	$gas_level = $res['gas_level'];
	$gas_charge = $res['gas_charge'];
	$date_rented = $res['date_rented'];
	$time_rented = $res['time_rented'];
	$date_returned = $res['date_returned'];
	$time_returned = $res['time_returned'];
	$insurance_charge = $res['insurance_charge'];
	$mileage_charge = $res['mileage_charge'];
	$final_charge = $res['final_charge'];
	$start_miles = $res['start_miles'];
	$end_miles = $res['end_miles'];
}
?>
<html>
<head>
	<title>Edit Data</title>
</head>

<body>
	<a href="res_index.php">Home</a>
	<br/><br/>

	<form name="form1" method="post" action="res_edit.php">
		<table border="0">

		<tr>
			<td>Rate</td>
			<td><input type="text" name="rate" value="<?php echo $rate ?>"></td>
		</tr>
		<tr>
			<td>Rate Period</td>
			<td><input type="text" name="rate_period" value="<?php echo $rate_period ?>"></td>
		</tr>
		<tr>
			<td>Discount</td>
			<td><input type="text" name="discount" value="<?php echo $discount ?>"></td>
		</tr>
		<tr>
			<td>Estimated Rental Duration</td>
			<td><input type="text" name="estimated_rental_duration" value="<?php echo $estimated_rental_duration ?>"></td>
		</tr>
		<tr>
			<td>Credit Card Number</td>
			<td><input type="text" name="credit_card_number" value="<?php echo $credit_card_number ?>"></td>
		</tr>
		<tr>
			<td>Credit Card Type</td>
			<td><input type="text" name="credit_card_type" value="<?php echo $credit_card_type ?>"></td>
		</tr>
		<tr>
			<td>Base Charge</td>
			<td><input type="text" name="base_charge" value="<?php echo $base_charge ?>"></td>
		</tr>
		<tr>
			<td>Tax</td>
			<td><input type="text" name="tax" value="<?php echo $tax ?>"></td>
		</tr>
		<tr>
			<td>Gas Level</td>
			<td><input type="text" name="gas_level" value="<?php echo $gas_level ?>"></td>
		</tr>
		<tr>
			<td>Gas Charge</td>
			<td><input type="text" name="gas_charge" value="<?php echo $gas_charge ?>"></td>
		</tr>
		<tr>
			<td>Date Rented</td>
			<td><input type="text" name="date_rented" value="<?php echo $date_rented ?>"></td>
		</tr>
		<tr>
			<td>Time Rented</td>
			<td><input type="text" name="time_rented" value="<?php echo $time_rented ?>"></td>
		</tr>
		<tr>
			<td>Date Returned</td>
			<td><input type="text" name="date_returned" value="<?php echo $date_returned ?>"></td>
		</tr>
		<tr>
			<td>Time Returned</td>
			<td><input type="text" name="time_returned" value="<?php echo $time_returned ?>"></td>
		</tr>
		<tr>
			<td>Insurance Charge</td>
			<td><input type="text" name="insurance_charge" value="<?php echo $insurance_charge ?>"></td>
		</tr>
		<tr>
			<td>Mileage Charge</td>
			<td><input type="text" name="mileage_charge" value="<?php echo $mileage_charge ?>"></td>
		</tr>
		<tr>
			<td>Final Charge</td>
			<td><input type="text" name="final_charge" value="<?php echo $final_charge ?>"></td>
		</tr>
		<tr>
			<td>Start Miles</td>
			<td><input type="text" name="start_miles" value="<?php echo $start_miles ?>"></td>
		</tr>
		<tr>
			<td>End Miles</td>
			<td><input type="text" name="end_miles" value="<?php echo $end_miles ?>"></td>
		</tr>
		<tr>
		<tr>
			<td><input type="hidden" name="credit_card_number" value=<?php echo $_GET['credit_card_number'];?>></td>
			<td><input type="submit" name="update" value="Update"></td>
		</tr>
		</table>
	</form>
</body>
</html>
