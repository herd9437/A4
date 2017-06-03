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
