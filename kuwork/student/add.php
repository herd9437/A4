<?php
//including the database connection file
include_once("../config.php");

//if(isset($_POST['Submit'])) {
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$phone_number = mysqli_real_escape_string($mysqli, $_POST['phone_number']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$degree = mysqli_real_escape_string($mysqli, $_POST['degree']);
	$major = mysqli_real_escape_string($mysqli, $_POST['major']);
	$class_standing = mysqli_real_escape_string($mysqli, $_POST['class_standing']);
	$company_name = mysqli_real_escape_string($mysqli, $_POST['company_name']);
	$residence_id = mysqli_real_escape_string($mysqli, $_POST['residence_id']);

	// checking empty fields
	if(empty($email) || empty($name) || empty($degree) || empty($major)) {
		$errors = array();

		if(empty($email)) {
			array_push($errors,"{'status':'error','message':'Email field is empty.'}");
		}

		if(empty($name)) {
			array_push($errors,"{'status':'error','message':'Name field is empty.'}");
		}

		if(empty($degree)) {
			array_push($errors,"{'status':'error','message':'Degree field is empty.'}");
		}

		if(empty($major)) {
			array_push($errors,"{'status':'error','message':'Major field is empty.'}");
		}

		if(empty($class_standing)) {
			array_push($errors,"{'status':'error','message':'Class Standing field is empty.'}");
		}

		if(empty($company_name)) {
			array_push($errors,"{'status':'error','message':'Company Name field is empty.'}");
		}

		echo '[' . implode(',', $errors) . ']';
	} else {
		// if all the fields are filled (not empty)

		//insert data to database
		$result = mysqli_query($mysqli, "INSERT INTO student(email,phone_number,name,degree,major,class_standing,company_name,residence_id) VALUES('$email','$phone_number','$name','$degree','$major','$class_standing','$company_name','$residence_id')");
		echo "{'status':'success','message':'Student successfully created.'}";

	}
//}
?>
