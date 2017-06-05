<html>
<head>
	<title>Add Activity</title>
</head>

<body>
<?php
//including the database connection file
include_once("../config.php");

if(isset($_POST['Submit'])) {
	$coordinator_email = mysqli_real_escape_string($mysqli, $_POST['coordinator_email']);
	$description = mysqli_real_escape_string($mysqli, $_POST['description']);
	$start_date= mysqli_real_escape_string($mysqli, $_POST['start_date']);
	$start_time = mysqli_real_escape_string($mysqli, $_POST['start_time']);
	$end_date = mysqli_real_escape_string($mysqli, $_POST['end_date']);
	$end_time = mysqli_real_escape_string($mysqli, $_POST['end_time']);

	// checking empty fields
	if(empty($coordinator_email) || empty($description) || empty($start_date) || empty($start_time) || empty($end_date) || empty($end_time)) {

		if(empty($coordinator_email)) {
			echo "<font color='red'>Coordinator Email field is empty.</font><br/>";
		}

		if(empty($description)) {
			echo "<font color='red'>Description field is empty.</font><br/>";
		}

		if(empty($start_date)) {
			echo "<font color='red'>Start Date field is empty.</font><br/>";
		}

		if(empty($start_time)) {
			echo "<font color='red'>Start Time field is empty.</font><br/>";
		}

		if(empty($end_date)) {
			echo "<font color='red'>End Date field is empty.</font><br/>";
		}

		if(empty($end_time)) {
			echo "<font color='red'>End Time field is empty.</font><br/>";
		}

		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// if all the fields are filled (not empty)

		//insert data to database
		;
		$result = mysqli_query($mysqli, "INSERT INTO activity (coordinator_email, description, start_date, start_time, end_date, end_time) VALUES ( '$coordinator_email', '$description', '$start_date', '$start_time', '$end_date', '$end_time')");

		//display success message
		echo "<font color='green'>Corporation added successfully.";
		echo "<br/><a href='http://webtech.kettering.edu/~vecc0396/cs461/kuwork/index.html'>Go Home</a>";
	}
}
?>
</body>
</html>
