<?php
// including the database connection file
include_once("../config.php");

if(isset($_POST['update']))
{

	$residence_id = mysqli_real_escape_string($mysqli, $_POST['residence_id']);
	$landlord_email = mysqli_real_escape_string($landlord_email, $_POST['age']);
	$landlord_phone_num = mysqli_real_escape_string($landlord_phone_num, $_POST['email']);
	$rent = mysqli_real_escape_string($mysqli, $_POST['rent']);
	$address_id = mysqli_real_escape_string($mysqli, $_POST['address_id']);
	$residence_reviews = mysqli_real_escape_string($mysqli, $_POST['residence_reviews']);
	$residence_image = mysqli_real_escape_string($mysqli, $_POST['residence_image']);

	// checking empty fields
	if(empty($lanlord_email) || empty($landlord_phone_num) || empty($rent) || empty($address_id) || empty($residence_reviews) || empty($residence_image)) {

		if(empty($lanlord_email)) {
			echo "<font color='red'>Landlord Email field is empty</font>");
		}

		if(empty($landlord_phone_num)) {
			echo "<font color='red'>Landlord Phone Number field is empty</font>");
		}

		if(empty($rent)) {
			echo "<font color='red'>Rent field is empty</font>");
		}

		if(empty($address_id)) {
			echo "<font color='red'>Address Id field is empty</font>");
		}

		if(empty($residence_reviews)) {
			echo "<font color='red'>Residence Review field is empty</font>");
		}

		if(empty($residence_image)) {
			echo "<font color='red'>Residence Image field is empty</font>");
		}

	} else {

		$result = mysqli_query($mysqli, "UPDATE residence landlord_email='$landlord_email',landlord_phone_num='$landlord_phone_num',rent='$rent',address_id='$address_id',residence_reviews='$residence_reviews',residence_image='$residence_image'");
		echo "{'status':'success','message':'Residence successfully created.'}";
	}
}

if(isset($_GET['residence_id'])){
	//getting residence_id from url
	$residence_id = $_GET['residence_id'];

	//selecting data associated with this particular residence_id
	$result = mysqli_query($mysqli, "SELECT * FROM residence WHERE residence_id=$residence_id");

	while($res = mysqli_fetch_array($result))
	{
		$residence_id = $res['residence_id'];
		$landlord_email = $res['landlord_email'];
		$landlord_phone_num = $res['landlord_phone_num'];
		$rent = $res['rent'];
		$address_id = $res['address_id'];
		$residence_reviews = $res['residence_reviews'];
		$residence_image = $res['residence_image'];
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

	<form action="http://webtech.kettering.edu/~vecc0396/cs461/kuwork/residence/edit.php" method="post" name="form1">
		<table>
			<tr>
				<td>Landlord Email</td>
				<td><input type="text" name="landlord_email" value="<?php echo $landlord_email ?>"></td>
			</tr>
			<tr>
				<td>Landlord Phone Number</td>
				<td><input type="text" name="landlord_phone_num" value="<?php echo $landlord_phone_num ?>"></td>
			</tr>
			<tr>
				<td>Rent</td>
				<td><input type="text" name="rent" value="<?php echo $rent ?>"></td>
			</tr>
			<tr>
				<td>Address ID</td>
				<td><input type="text" name="address_id" value="<?php echo $address_id ?>"></td>
			</tr>
			<tr>
				<td>Reviews</td>
				<td><input type="text" name="residence_reviews" value="<?php echo $residence_reviews ?>"></td>
			</tr>
			<tr>
				<td>Residence Image</td>
				<td><input type="text" name="residence_image" value="<?php echo $residence_image ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>
