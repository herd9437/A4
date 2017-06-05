<?php
// including the database connection file
include_once("../config.php");

if(isset($_POST['update']))
{

	$vin_number = mysqli_real_escape_string($mysqli, $_POST['vin_number']);
	$make = mysqli_real_escape_string($mysqli, $_POST['make']);
	$model = mysqli_real_escape_string($mysqli, $_POST['model']);
	$capacity = mysqli_real_escape_string($mysqli, $_POST['capacity']);
	$owner_email = mysqli_real_escape_string($mysqli, $_POST['owner_email']);

	// checking empty fields
	if(empty($vin_number) || empty($make) || empty($model) || empty($capacity) || empty($owner_email)) {

		if(empty($vin_number)) {
			echo "<font color='red'>Vin Number field is empty.</font>");
		}

		if(empty($make)) {
			echo "<font color='red'>Make field is empty.</font>");
		}

		if(empty($model)) {
			echo "<font color='red'>Model field is empty.</font>");
		}

		if(empty($capacity)) {
			echo "<font color='red'>Capacity field is empty.</font>");
		}

		if(empty($owner_email)) {
			echo "<font color='red'>Owner Email field is empty.</font>");
		}

	} else {

		$result = mysqli_query($mysqli, "UPDATE vehicle SET vin_number='$vin_number',make='$make',model='$model',capacity='$capacity',owner_email='$owner_email' WHERE vin_number=$vin_number");
		echo "{'status':'success','message':'Vehicle updated successfully.'}";

	}
?>
<?php
if(isset($_GET['vin_number'])){
	//getting id from url
	$vin_number = $_GET['vin_number'];

	//selecting data associated with this particular id
	$result = mysqli_query($mysqli, "SELECT * FROM vehicle WHERE vin_number=$vin_number");

	while($res = mysqli_fetch_array($result))
	{
		$vin_number = $res['vin_number'];
		$make = $res['make'];
		$model = $res['model'];
		$capacity = $res['capacity'];
		$owner_email = $res['owner_email'];
	}
}
?>

<html>
<head>
	<title>Add Activity</title>
</head>

<body>
	<a href="http://webtech.kettering.edu/~vecc0396/cs461/kuwork/index.html">Activity Home</a>
	<br/><br/>

	<form action="http://webtech.kettering.edu/~vecc0396/cs461/kuwork/vehicle/edit.php" method="post" name="form1">
		<table>
			<tr>
				<td>Vin</td>
				<td><input type="text" name="vin_number" value="<?php echo $vin_number ?>"></td>
			</tr>
			<tr>
				<td>Make</td>
				<td><input type="text" name="make" value="<?php echo $make ?>"></td>
			</tr>
			<tr>
				<td>Model</td>
				<td><input type="text" name="model" value="<?php echo $model ?>"></td>
			</tr>
			<tr>
				<td>Capacity</td>
				<td><input type="text" name="capacity" value="<?php echo $capacity ?>"></td>
			</tr>
			<tr>
				<td>Owner Email</td>
				<td><input type="text" name="owner_email" value="<?php echo $owner_email ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="update" name="Update" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>
