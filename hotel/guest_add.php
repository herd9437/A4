<html>
<head>
	<title>Add Guest</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
	$guest_name = mysqli_real_escape_string($mysqli, $_POST['guest_name']);
	$room_desired = mysqli_real_escape_string($mysqli, $_POST['room_desired']);
	$num_people = mysqli_real_escape_string($mysqli, $_POST['num_people']);
	$arrival_time = mysqli_real_escape_string($mysqli, $_POST['arrival_time']);
	$expected_departure = mysqli_real_escape_string($mysqli, $_POST['expected_departure']);
	$confirmation_num = mysqli_real_escape_string($mysqli, $_POST['confirmation_num']);

	// checking empty fields
	if(empty($guest_name) || empty($room_desired) || empty($confirmation_num)) {

		if(empty($guest_name)) {
			echo "<font color='red'>Guest Name field is empty.</font><br/>";
		}

		if(empty($room_desired)) {
			echo "<font color='red'>Room Desired field is empty.</font><br/>";
		}

		if(empty($confirmation_num)) {
			echo "<font color='red'>Confirmation Number field is empty.</font><br/>";
		}

		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// if all the fields are filled (not empty)

		//insert data to database
		$result = mysqli_query($mysqli, "INSERT INTO guest (guest_name, room_desired, num_people, arrival_time, expected_departure, confirmation_num) VALUES ('$guest_name', '$room_desired', '$num_people', '$arrival_time', '$expected_departure', '$confirmation_num')");

		//display success message
		echo "<font color='green'>Guest added successfully.";
		echo "<br/><a href='guest_index.php'>View Result</a>";
	}
}
?>
</body>
</html>
