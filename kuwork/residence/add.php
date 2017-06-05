<?php
//including the database connection file
include_once("../config.php");

//if(isset($_POST['Submit'])) {
	$residence_id = mysqli_real_escape_string($mysqli, $_POST['residence_id']);
<<<<<<< HEAD
	$landlord_email = mysqli_real_escape_string($mysqli, $_POST['landlord_email']);
	$landlord_phone_num = mysqli_real_escape_string($mysqli, $_POST['landlord_phone_num']);
=======
	$landlord_email = mysqli_real_escape_string($landlord_email, $_POST['landlord_email']);
	$landlord_phone_num = mysqli_real_escape_string($landlord_phone_num, $_POST['landlord_phone_num']);
>>>>>>> 82403784047061a586372aedbba0c6d7f6a2d9fb
	$rent = mysqli_real_escape_string($mysqli, $_POST['rent']);
	$address_id = mysqli_real_escape_string($mysqli, $_POST['address_id']);
	$residence_reviews = mysqli_real_escape_string($mysqli, $_POST['residence_reviews']);
	$residence_image = mysqli_real_escape_string($mysqli, $_POST['residence_image']);

	// checking empty fields
	if(empty($landlord_email) || empty($landlord_phone_num) || empty($rent) || empty($address_id) || empty($residence_reviews) || empty($residence_image)) {

		if(empty($lanlord_email)) {
			echo "<font color='red'>Landlord Email field is empty.</font>";
		}

		if(empty($landlord_phone_num)) {
			echo "<font color='red'>Landlord Phone Number field is empty.</font>";
		}

		if(empty($rent)) {
			echo "<font color='red'>Rent field is empty.</font>";
		}

		if(empty($address_id)) {
			echo "<font color='red'>Address Id field is empty.</font>";
		}

		if(empty($residence_reviews)) {
			echo "<font color='red'>Residence Review field is empty.</font>";
		}

		if(empty($residence_image)) {
			echo "<font color='red'>Residence Image field is empty.</font>";
		}

	} else {

		$result = mysqli_query($mysqli, "INSERT INTO residence(landlord_email,landlord_phone_num,rent,address_id,residence_reviews,residence_image) VALUES('$landlord_email','$landlord_phone_num','$rent','$address_id','$residence_reviews','$residence_image')");
		//display success message
		echo "<font color='green'>Residence added successfully.";
		echo "<br/><a href='http://webtech.kettering.edu/~vecc0396/cs461/kuwork/index.html'>Go Home</a>";

	}
//}
?>
