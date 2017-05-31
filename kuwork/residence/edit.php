<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{

	$residence_id = mysqli_real_escape_string($mysqli, $_POST['residence_id']);

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
}

if(isset($_GET['residence_id'])){
	//getting residence_id from url
	$residence_id = $_GET['residence_id'];

	//selecting data associated with this particular residence_id
	$result = mysqli_query($mysqli, "SELECT * FROM residence WHERE residence_id=$residence_id");

	while($res = mysqli_fetch_array($result))
	{
		echo "{";
		echo "\"residence_id\":\"".$res['residence_id']."\",";
		echo "\"landlord_email\":\"".$res['landlord_email']."\",";
		echo "\"landlord_phone_num\":\"".$res['landlord_phone_num']."\",";
		echo "\"rent\":\"".$res['rent']."\",";
		echo "\"address_id\":\"".$res['address_id']."\",";
		echo "\"residence_reviews\":\"".$res['residence_reviews']."\",";
		echo "\"residence_image\":\"".$res['residence_image']."\",";
		echo "}";
	}
}

?>
