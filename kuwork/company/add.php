<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("../config.php");

//if(isset($_POST['Submit'])) {
	$comp_name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$description = mysqli_real_escape_string($mysqli, $_POST['age']);
	$address_id = mysqli_real_escape_string($mysqli, $_POST['email']);

	// checking empty fields
	if(empty($comp_name) || empty($description)) {

		if(empty($comp_name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

		if(empty($description)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

	} else {
		// if all the fields are filled (not empty)

		//insert data to database
		$result = mysqli_query($mysqli, "INSERT INTO company(comp_name,description,address_id) VALUES('$comp_name','$description','$address_id')");
		echo "{'status':'success','message':'Company successfully created.'}";

		//display success message
//		echo "<font color='green'>Data added successfully.";
//		echo "<br/><a href='index.php'>View Result</a>";
	}
//}
?>
</body>
</html>
