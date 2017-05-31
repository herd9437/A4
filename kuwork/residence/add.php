<html>
<head>
	<title>Add Data</title>
</head>

<body>
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
	if(empty($residence_id)) {

		if(empty($residence_id)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

		echo '[' . implode(',', $errors) . ']';
	} else {
		// if all the fields are filled (not empty)

		//insert data to database
		$result = mysqli_query($mysqli, "INSERT INTO residence(residence_id,landlord_email,landlord_phone_num,rent,address_id,residence_reviews,residence_image) VALUES('$residence_id','$landlord_email','$landlord_phone_num','$rent','$address_id','$residence_reviews','$residence_image')");
		echo "{'status':'success','message':'Residence successfully created.'}";

		//display success message
//		echo "<font color='green'>Data added successfully.";
//		echo "<br/><a href='index.php'>View Result</a>";
	}
//}
?>
</body>
</html>
