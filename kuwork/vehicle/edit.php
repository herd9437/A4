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
		$errors = array();

		if(empty($vin_number)) {
			array_push($errors,"{'status':'error','message':'Vin Number field is empty.'}");
		}

		if(empty($make)) {
			array_push($errors,"{'status':'error','message':'Make field is empty.'}");
		}

		if(empty($model)) {
			array_push($errors,"{'status':'error','message':'Model field is empty.'}");
		}

		if(empty($capacity)) {
			array_push($errors,"{'status':'error','message':'Capacity field is empty.'}");
		}

		if(empty($owner_email)) {
			array_push($errors,"{'status':'error','message':'Owner Email field is empty.'}");
		}

		echo '[' . implode(',', $errors) . ']';
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
