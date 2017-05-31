<?php
//including the database connection file
include_once("../config.php");

//if(isset($_POST['Submit'])) {
$coordinator_email = mysqli_real_escape_string($mysqli, $_POST['coordinator_email']);
$description = mysqli_real_escape_string($mysqli, $_POST['description']);
$start_time = mysqli_real_escape_string($mysqli, $_POST['start_time']);
$start_date = mysqli_real_escape_string($mysqli, $_POST['start_date']);
$end_time = mysqli_real_escape_string($mysqli, $_POST['end_time']);
$end_date = mysqli_real_escape_string($mysqli, $_POST['end_date']);
$address_id = mysqli_real_escape_string($mysqli, $_POST['address_id']);

// checking empty fields
if(empty($coordinator_email) || empty($description) || empty($start_time) || empty($start_date) || empty($end_time) || empty($end_date)) {
	$errors = array();

	if(empty($coordinator_email)) {
		array_push($errors,"{'status':'error','message':'Coordinator Email field is empty.'}");
	}

	if(empty($description)) {
		array_push($errors,"{'status':'error','message':'Description field is empty.'}");
	}

	if(empty($start_date)) {
		array_push($errors,"{'status':'error','message':'Start Date field is empty.'}");
	}

	if(empty($start_time)) {
		array_push($errors,"{'status':'error','message':'Start Time field is empty.'}");
	}

	if(empty($end_date)) {
		array_push($errors,"{'status':'error','message':'End Date field is empty.'}");
	}

	if(empty($end_time)) {
		array_push($errors,"{'status':'error','message':'End Time field is empty.'}");
	}

	echo '[' . implode(',', $errors) . ']';

} else {
	// if all the fields are filled (not empty)

	//insert data to database
	$result = mysqli_query($mysqli, "INSERT INTO activity(coordinator_email,description,start_time,start_date,end_time,end_date) VALUES('$coordinator_email','$description','$start_time','$start_date','$end_time','$end_date')");

	echo "{'status':'success','message':'Activity successfully created.'}";

	//display success message
}
?>
