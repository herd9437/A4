<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{

	$make = mysqli_real_escape_string($mysqli, $_POST['make']);
	$model = mysqli_real_escape_string($mysqli, $_POST['model']);
	$location = mysqli_real_escape_string($mysqli, $_POST['location']);
	$color = mysqli_real_escape_string($mysqli, $_POST['color']);
	$license_number = mysqli_real_escape_string($mysqli, $_POST['license_number']);
	$car_condition = mysqli_real_escape_string($mysqli, $_POST['car_condition']);
	$state = mysqli_real_escape_string($mysqli, $_POST['state']);
	$mileage = mysqli_real_escape_string($mysqli, $_POST['mileage']);
	$vin = mysqli_real_escape_string($mysqli, $_POST['vin']);

	// checking empty fields
	if(empty($make) || empty($model) || empty($location) || empty($color) || empty($license_number) || empty($state) || empty($mileage) || empty($vin)) {

		if(empty($make)) {
			echo "<font color='red'>Make field is empty.</font><br/>";
		}

		if(empty($model)) {
			echo "<font color='red'>Model field is empty.</font><br/>";
		}

		if(empty($location)) {
			echo "<font color='red'>Location field is empty.</font><br/>";
		}

		if(empty($color)) {
			echo "<font color='red'>Color field is empty.</font><br/>";
		}

		if(empty($license_number)) {
			echo "<font color='red'>License Number field is empty.</font><br/>";
		}

		if(empty($car_condition)) {
			echo "<font color='red'>Car Condition field is empty.</font><br/>";
		}

		if(empty($state)) {
			echo "<font color='red'>State field is empty.</font><br/>";
		}

		if(empty($mileage)) {
			echo "<font color='red'>Mileage field is empty.</font><br/>";
		}

		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// if all the fields are filled (not empty)

		//insert data to database
		$result = mysqli_query($mysqli, "UPDATE car SET make='$make', model='$model', location='$location', color='$color', license_number='$license_number', state='$state', mileage='$mileage', vin='$vin', car_condition='$car_condition'  WHERE vin='$vin'");

		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='car_index.php'>View Result</a>";
	}
}
?>
<?php
//getting id from url
$vin = $_GET['vin'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM car WHERE vin=$vin");

while($res = mysqli_fetch_array($result))
{
	$make = $res['make'];
	$model = $res['model'];
	$location = $res['location'];
	$color = $res['color'];
	$license_number = $res['license_number'];
	$car_condition = $res['car_condition'];
	$state = $res['state'];
	$mileage = $res['mileage'];
	$vin = $res['vin'];
}
?>
<html>
<head>
	<title>Edit Car</title>
</head>

<body>
	<a href="car_index.php">Car Home</a>
	<br/><br/>

	<form name="form1" method="post" action="car_edit.php">
		<table>
			<tr>
				<td>Make</td>
				<td><input type="text" name="make" value="<?php echo $make;?>"></td>
			</tr>
			<tr>
				<td>Model</td>
				<td><input type="text" name="model" value="<?php echo $model;?>"></td>
			</tr>
			<tr>
				<td>Location</td>
				<td><input type="text" name="location" value="<?php echo $location;?>"></td>
			</tr>
			<tr>
				<td>Color</td>
				<td><input type="text" name="color" value="<?php echo $color;?>"></td>
			</tr>
			<tr>
				<td>License Number</td>
				<td><input type="text" name="license_number" value="<?php echo $license_number;?>"></td>
			</tr>
			<tr>
				<td>Car Condition</td>
				<td><input type="text" name="state" value="<?php echo $car_condition;?>"></td>
			</tr>
			<tr>
				<td>State</td>
				<td><input type="text" name="state" value="<?php echo $state;?>"></td>
			</tr>
			<tr>
				<td>Mileage</td>
				<td><input type="text" name="mileage" value="<?php echo $mileage;?>"></td>
			</tr>
			<tr>
				<td>Vin</td>
				<td><input type="text" name="vin" value="<?php echo $vin;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="vin" value=<?php echo $_GET['vin'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
