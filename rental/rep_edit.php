<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);

	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);

	// checking empty fields
	if(empty($name) || empty($age) || empty($email)) {

		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}

		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
	} else {
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");

		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$age = $res['age'];
	$email = $res['email'];
}
?>
<html>
<head>
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<form name="form1" method="post" action="edit.php">
		<table border="0">
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
				<td>Start Miles</td>
				<td><input type="text" name="start_miles" value="<?php echo $start_miles ?>"></td>
			</tr>
			<tr>
				<td>End Miles</td>
				<td><input type="text" name="end_miles" value="<?php echo $end_miles ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="credit_card_number" value=<?php echo $_GET['credit_card_number'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
