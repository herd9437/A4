<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{

	$activity_id = mysqli_real_escape_string($mysqli, $_POST['activity_id']);

	$coordinator_email = mysqli_real_escape_string($mysqli, $_POST['coordinator_email']);
	$description = mysqli_real_escape_string($mysqli, $_POST['description']);
	$start_time = mysqli_real_escape_string($mysqli, $_POST['start_time']);
	$start_date = mysqli_real_escape_string($mysqli, $_POST['start_date']);
	$end_time = mysqli_real_escape_string($mysqli, $_POST['end_time']);
	$end_date = mysqli_real_escape_string($mysqli, $_POST['end_date']);
	$address_id = mysqli_real_escape_string($mysqli, $_POST['address_id']);

	// checking empty fields
	if(empty($coordinator_email) || empty($description) || empty($start_time) || empty($start_date) || empty($end_time) || empty($end_date)) {

		if(empty($coordinator_email)) {
			echo "<font color='red'>Coordinator Email field is empty.</font>";
		}

		if(empty($description)) {
			echo "<font color='red'>Description field is empty.</font>";
		}

		if(empty($start_date)) {
			echo "<font color='red'>Start Date field is empty.</font>";
		}

		if(empty($start_time)) {
			echo "<font color='red'>Start Time field is empty.</font>";
		}

		if(empty($end_date)) {
			echo "<font color='red'>End Date field is empty.</font>";
		}

		if(empty($end_time)) {
			echo "<font color='red'>End Time field is empty.</font>";
		}

	} else {

		//updating the table
		$result = mysqli_query($mysqli, "UPDATE activity SET coordinator_email='$coordinator_email',description='$description',start_time='$start_time',start_date='$start_date',end_time='$end_time',end_date='$end_date',address_id='$address_id' WHERE activity_id=$activity_id");
		echo "{'status':'success','message':'Activity updated successfully'}";

	}
}

if(isset($_GET['activity_id'])){
	$activity_id = $_GET['activity_id'];
	//selecting data associated with this particular activity_id
	$result = mysqli_query($mysqli, "SELECT * FROM activity WHERE activity_id=$activity_id");

	while($res = mysqli_fetch_array($result))
	{
		echo "{";
		echo "\"name\":\"".$res['name']."\",";
		echo "\"coordinator_email\":\"".$res['coordinator_email']."\",";
		echo "\"description\":\"".$res['description']."\",";
		echo "\"start_time\":\"".$res['start_time']."\",";
		echo "\"start_date\":\"".$res['start_date']."\",";
		echo "\"end_time\":\"".$res['end_time']."\",";
		echo "\"end_date\":\"".$res['end_date']."\",";
		echo "\"activity_id\":\"".$res['activity_id']."\",";
		echo "\"address_id\":\"".$res['address_id']."\",";
		echo "}";
	}
}

?>




<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{

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
<?php
//getting id from url
$account_number = $_GET['account_number'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$account_number = $res['account_number'];
	$street_address = $res['street_address'];
	$city = $res['city'];
	$zip = $res['zip'];
	$age = $res['age'];
	$phone_number = $res['phone_number'];
}
?>
<html>
<head>
	<title>Edit Corporation</title>
</head>

<body>
	<a href="corp_index.php">Corporation Home</a>
	<br/><br/>

	<form name="form1" method="post" action="corp_edit.php">
		<table border="0">
			<tr>
				<td>Account Number</td>
				<td><input type="text" name="account_number" value="<?php echo $account_number;?>"></td>
			</tr>
			<tr>
				<td>Street Address</td>
				<td><input type="text" name="street_address" value="<?php echo $street_address;?>"></td>
			</tr>
			<tr>
				<td>City</td>
				<td><input type="text" name="city" value="<?php echo $city;?>"></td>
			</tr>
			<tr>
				<td>Zip</td>
				<td><input type="text" name="zip" value="<?php echo $zip;?>"></td>
			</tr>
			<tr>
				<td>Phone Number</td>
				<td><input type="text" name="phone_number" value="<?php echo $phone_number;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="account_number" value=<?php echo $_GET['account_number'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
