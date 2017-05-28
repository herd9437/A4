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
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
