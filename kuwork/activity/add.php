<html>
<head>
	<title>Add Data</title>
</head>

<body>
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
	if(empty($coordinator_email) || empty($address_id)) {

		if(empty($coordinator_email)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

		if(empty($address_id)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}


		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// if all the fields are filled (not empty)

		//insert data to database
		$result = mysqli_query($mysqli, "INSERT INTO activity(coordinator_email,description,start_time,start_date,end_time,end_date,address_id) VALUES('$coordinator_email','$description','$start_time','$start_date','$end_time','$end_date','$address_id')");

		//display success message
//		echo "<font color='green'>Data added successfully.";
//		echo "<br/><a href='index.php'>View Result</a>";
	}
//}
?>
</body>
</html>
