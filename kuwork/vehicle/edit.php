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

		$result = mysqli_query($mysqli, "INSERT INTO vehicle(vin_number,make,model,capacity,owner_email) VALUES('$vin_number','$make','$model','$capacity','$owner_email')");
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
		echo "{";
		echo "\"vin_number\":\"".$res['vin_number']."\",";
		echo "\"make\":\"".$res['make']."\",";
		echo "\"model\":\"".$res['model']."\",";
		echo "\"capacity\":\"".$res['capacity']."\",";
		echo "\"owner_email\":\"".$res['owner_email']."\",";
		echo "}";
	}
}
?>
