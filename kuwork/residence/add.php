<?php
//including the database connection file
include_once("../config.php");

//if(isset($_POST['Submit'])) {
	$residence_id = mysqli_real_escape_string($mysqli, $_POST['residence_id']);
	$landlord_email = mysqli_real_escape_string($landlord_email, $_POST['age']);
	$landlord_phone_num = mysqli_real_escape_string($landlord_phone_num, $_POST['email']);
	$rent = mysqli_real_escape_string($mysqli, $_POST['rent']);
	$address_id = mysqli_real_escape_string($mysqli, $_POST['address_id']);
	$residence_reviews = mysqli_real_escape_string($mysqli, $_POST['residence_reviews']);
	$residence_image = mysqli_real_escape_string($mysqli, $_POST['residence_image']);

	// checking empty fields
	if(empty($lanlord_email) || empty($landlord_phone_num) || empty($rent) || empty($address_id) || empty($residence_reviews) || empty($residence_image)) {
		$errors = array();

		if(empty($lanlord_email)) {
			array_push($errors,"{'status':'error','message':'Landlord Email field is empty.'}");
		}

		if(empty($landlord_phone_num)) {
			array_push($errors,"{'status':'error','message':'Landlord Phone Number field is empty.'}");
		}

		if(empty($rent)) {
			array_push($errors,"{'status':'error','message':'Rent field is empty.'}");
		}

		if(empty($address_id)) {
			array_push($errors,"{'status':'error','message':'Address Id field is empty.'}");
		}

		if(empty($residence_reviews)) {
			array_push($errors,"{'status':'error','message':'Residence Review field is empty.'}");
		}

		if(empty($residence_image)) {
			array_push($errors,"{'status':'error','message':'Residence Image field is empty.'}");
		}

		echo '[' . implode(',', $errors) . ']';
	} else {

		$result = mysqli_query($mysqli, "INSERT INTO residence(landlord_email,landlord_phone_num,rent,address_id,residence_reviews,residence_image) VALUES($landlord_email','$landlord_phone_num','$rent','$address_id','$residence_reviews','$residence_image')");
		echo "{'status':'success','message':'Residence successfully created.'}";

	}
//}
?>
