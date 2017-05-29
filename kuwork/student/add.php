<html>
<head>
	<title>Add Data</title>
</head>

<body>
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

		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}

		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

		if(empty($degree)) {
			echo "<font color='red'>Degree field is empty.</font><br/>";
		}

		if(empty($major)) {
			echo "<font color='red'>Major field is empty.</font><br/>";
		}

		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// if all the fields are filled (not empty)

		//insert data to database
		$result = mysqli_query($mysqli, "INSERT INTO student(email,phone_number,name,degree,major,class_standing,company_name,residence_id) VALUES('$email','$phone_number','$name','$degree','$major','$class_standing','$company_name','$residence_id')");

		//display success message
//		echo "<font color='green'>Data added successfully.";
//		echo "<br/><a href='index.php'>View Result</a>";
	}
//}
?>
</body>
</html>
