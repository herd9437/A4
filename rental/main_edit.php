<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update'])){
$street_address = mysqli_real_escape_string($mysqli, $_POST['street_address']);
$city = mysqli_real_escape_string($mysqli, $_POST['city']);
$zip = mysqli_real_escape_string($mysqli, $_POST['zip']);
$cost = mysqli_real_escape_string($mysqli, $_POST['cost']);

// checking empty fields
if(empty($street_address) || empty($city) || empty($zip) || empty($cost)) {

	if(empty($street_address)) {
		echo "<font color='red'>Street Address field is empty.</font><br/>";
	}

	if(empty($city)) {
		echo "<font color='red'>City field is empty.</font><br/>";
	}

	if(empty($zip)) {
		echo "<font color='red'>Zip field is empty.</font><br/>";
	}

	if(empty($cost)) {
		echo "<font color='red'>Cost field is empty.</font><br/>";
	}

	//link to the previous page
	echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
} else {
	// if all the fields are filled (not empty)

	//insert data to database
	$result = mysqli_query($mysqli, "INSERT INTO maintenance_cost (street_address, city, zip, cost) VALUES ('$street_address','$city','$zip','$cost')");

	//display success message
	echo "<font color='green'>Maintenance added successfully.";
	echo "<br/><a href='main_index.php'>View Result</a>";
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
	$street_address = $res['street_address'];
	$city = $res['city'];
	$zip = $res['zip'];
	$cost = $res['cost'];
}
?>
<html>
<head>
	<title>Edit Maintenance</title>
</head>

<body>
	<a href="main_index.php">Maintenance Home</a>
	<br/><br/>

	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr>
				<td>Street Address</td>
				<td><input type="text" name="street_address" value="<?php echo $street_address ?>"></td>
			</tr>
			<tr>
				<td>City</td>
				<td><input type="text" name="city" value="<?php echo $city ?>"></td>
			</tr>
			<tr>
				<td>Zip</td>
				<td><input type="text" name="zip" value="<?php echo $zip ?>"></td>
			</tr>
			<tr>
				<td>Cost</td>
				<td><input type="text" name="cost" value="<?php echo $cost ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
