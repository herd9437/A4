<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{

	$activity_id = mysqli_real_escape_string($mysqli, $_POST['activity_id']);

	$coordinator_email = mysqli_real_escape_string($mysqli, $_POST['coordinator_email']);
	$description = mysqli_real_escape_string($mysqli, $_POST['description']);
	$start_time = mysqli_real_escape_string($mysqli, $_POST['start_time']);
	$start_date = mysqli_real_escape_string($mysqli, $_POST['start_date']);
	$end_time = mysqli_real_escape_string($mysqli, $_POST['end_time']);
	$end_date = mysqli_real_escape_string($mysqli, $_POST['end_date']);
	$address_id = mysqli_real_escape_string($mysqli, $_POST['address_id']);

	// checking empty fields
	if(empty($coordinator_email) || empty($description) || empty($start_time) || empty($start_date) || empty($end_time) || empty($end_date)) {

		if(empty($coordinator_email)) {
			echo "<font color='red'>Coordinator Email field is empty.</font>";
		}

		if(empty($description)) {
			echo "<font color='red'>Description field is empty.</font>";
		}

		if(empty($start_date)) {
			echo "<font color='red'>Start Date field is empty.</font>";
		}

		if(empty($start_time)) {
			echo "<font color='red'>Start Time field is empty.</font>";
		}

		if(empty($end_date)) {
			echo "<font color='red'>End Date field is empty.</font>";
		}

		if(empty($end_time)) {
			echo "<font color='red'>End Time field is empty.</font>";
		}

	} else {

		//updating the table
		$result = mysqli_query($mysqli, "UPDATE activity SET coordinator_email='$coordinator_email',description='$description',start_time='$start_time',start_date='$start_date',end_time='$end_time',end_date='$end_date',address_id='$address_id' WHERE activity_id=$activity_id");
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo '<a href="http://webtech.kettering.edu/~vecc0396/cs461/kuwork/index.html">View Result</a>';

	}
}

if(isset($_GET['activity_id'])){
	$activity_id = $_GET['activity_id'];
	//selecting data associated with this particular activity_id
	$result = mysqli_query($mysqli, "SELECT * FROM activity WHERE activity_id=$activity_id");

	while($res = mysqli_fetch_array($result))
	{
		$name = $res['name'];
		$coordinator_email = $res['coordinator_email'];
		$description = $res['description'];
		$start_time = $res['start_time'];
		$start_date = $res['start_date'];
		$end_time = $res['end_time'];
		$end_date = $res['end_date'];
		$activity_id = $res['activity_id'];
		$address_id = $res['address_id'];
	}
}

?>

<html>
<head>
	<title>Add Activity</title>
</head>

<body>
	<a href="http://webtech.kettering.edu/~vecc0396/cs461/kuwork/index.html">Activity Home</a>
	<br/><br/>

	<form action="http://webtech.kettering.edu/~vecc0396/cs461/kuwork/activity/edit.php" method="post" name="form1">
		<table>
			<tr>
				<td>Coordinator Email</td>
				<td><input type="text" name="coordinator_email" value="<?php echo $coordinator_email ?>"></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><input type="text" name="description" value="<?php echo $description ?>"></td>
			</tr>
			<tr>
				<td>Start Date</td>
				<td><input type="text" name="start_date" value="<?php echo $start_date ?>"></td>
			</tr>
			<tr>
				<td>Start Time</td>
				<td><input type="text" name="start_time" value="<?php echo $start_time ?>"></td>
			</tr>
			<tr>
				<td>End Date</td>
				<td><input type="text" name="end_date" value="<?php echo $end_date ?>"></td>
			</tr>
			<tr>
				<td>End Time</td>
				<td><input type="text" name="end_time" value="<?php echo $end_time ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="update" name="Update" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>
