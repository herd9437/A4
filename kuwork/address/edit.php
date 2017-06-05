<?php
// including the database connection file
include_once("../config.php");

if(isset($_POST['update']))
{

	$address_id = mysqli_real_escape_string($mysqli, $_POST['address_id']);

	$street = mysqli_real_escape_string($mysqli, $_POST['street']);
	$city = mysqli_real_escape_string($mysqli, $_POST['city']);
	$state = mysqli_real_escape_string($mysqli, $_POST['state']);
	$zip_code = mysqli_real_escape_string($mysqli, $_POST['zip_code']);

	// checking empty fields
	if(empty($street) || empty($city) || empty($state) || empty($zip_code)) {
		$errors = array();

		if(empty($street)) {
			array_push($errors,"{'status':'error','message':'Street field is empty.'}");
		}

		if(empty($city)) {
			array_push($errors,"{'status':'error','message':'City field is empty.'}");
		}

		if(empty($state)) {
			array_push($errors,"{'status':'error','message':'State field is empty.'}");
		}

		if(empty($zip_code)) {
			array_push($errors,"{'status':'error','message':'Zip Code field is empty.'}");
		}

		echo '[' . implode(',', $errors) . ']';
	} else {

		$result = mysqli_query($mysqli, "UPDATE address SET street='$street',city='$city',state='$state',zip_code='$zip_code' WHERE address_id=$address_id");
		echo "{'status':'success','message':'Address successfully created.'}";

	}
}
if(isset($_GET['address_id'])){
	//getting id from url
	$address_id = $_GET['address_id'];

	//selecting data associated with this particular id
	$result = mysqli_query($mysqli, "SELECT * FROM address WHERE address_id=$address_id");

	while($res = mysqli_fetch_array($result))
	{
		$street = $res['street'].;
		$city = $res['city'].;
		$state = $res['state'].;
		$zip_code = $res['zip_code'];
	}
}
?>


<html>
<head>
	<title>Add Activity</title>
</head>

<body>
	<a href="http://webtech.kettering.edu/~vecc0396/cs461/kuwork/index.html">Home</a>
	<br/><br/>

	<form action="http://webtech.kettering.edu/~vecc0396/cs461/kuwork/address/edit.php" method="post" name="form1">
		<table>
			<tr>
				<td>Street Address</td>
				<td><input type="text" name="street" value="<?php echo $street ?>"></td>
			</tr>
			<tr>
				<td>City</td>
				<td><input type="text" name="city" value="<?php echo $city ?>"></td>
			</tr>
			<tr>
				<td>State</td>
				<td><input type="text" name="state" value="<?php echo $state ?>"></td>
			</tr>
			<tr>
				<td>Zip Code</td>
				<td><input type="text" name="zip_code" value="<?php echo $zip_code ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="update" name="Update" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>
