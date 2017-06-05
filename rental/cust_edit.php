<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{
	$first_name = mysqli_real_escape_string($mysqli, $_POST['first_name']);
	$last_name = mysqli_real_escape_string($mysqli, $_POST['last_name']);
	$street_address = mysqli_real_escape_string($mysqli, $_POST['street_address']);
	$city = mysqli_real_escape_string($mysqli, $_POST['city']);
	$state = mysqli_real_escape_string($mysqli, $_POST['state']);
	$zip = mysqli_real_escape_string($mysqli, $_POST['zip']);
	$phone_number = mysqli_real_escape_string($mysqli, $_POST['phone_number']);

	// checking empty fields
	if(empty($first_name) || empty($last_name) || empty($street_address) || empty($city) || empty($state) || empty($zip) || empty($phone_number)) {

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

		if(empty($state)) {
			echo "<font color='red'>State field is empty.</font><br/>";
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
		$result = mysqli_query($mysqli, "UPDATE customer SET first_name='$first_namme', last_name='$last_name', street_address='$street_address', city='$city', state='$state', zip='$zip', phone_number='$phone_number' WHERE customer_id='$customer_id'");

		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='cust_index.php'>View Result</a>";
	}
}
?>
<?php
//getting id from url
$customer_id = $_GET['customer_id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM customer WHERE customer_id=$customer_id");
echo $result;

while($res = mysqli_fetch_array($result))
{
	$first_name = $res['first_name'];
	$last_name = $res['last_name'];
	$street_address = $res['street_address'];
	$city = $res['city'];
	$state = $res['state'];
	$zip = $res['zip'];
}
?>
<html>
<head>
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<form name="form1" method="post" action="cust_edit.php">
		<table border="0">
			<tr>
				<td>First Name</td>
				<td><input type="text" name="first_name" value="<?php echo $first_name;?>"></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input type="text" name="last_name" value="<?php echo $last_name;?>"></td>
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
				<td>State</td>
				<td><input type="text" name="state"></td>
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
				<td><input type="hidden" name="customer_id" value=<?php echo $_GET['customer_id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
