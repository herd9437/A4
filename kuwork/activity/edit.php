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
	if(empty($coordinator_email) || empty($address_id)) {

		if(empty($coordinator_email)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

		if(empty($address_id)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}

	} else {
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE activity SET coordinator_email='$coordinator_email',description='$description',start_time='$start_time',start_date='$start_date',end_time='$end_time',end_date='$end_date',address_id='$address_id' WHERE activity_id=$activity_id");
		echo "{'status':'success','message':'Activity updated successfully'}";

	}
}
?>
<?php
//getting activity_id from url
$activity_id = $_GET['activity_id'];

//selecting data associated with this particular activity_id
$result = mysqli_query($mysqli, "SELECT * FROM activity WHERE activity_id=$activity_id");

while($res = mysqli_fetch_array($result))
{
	$coordinator_email = $res['coordinator_email'];
	$description = $res['description'];
	$start_time = $res['start_time'];
	$start_date = $res['start_date'];
	$end_time = $res['end_time'];
	$end_date = $res['end_date'];
	$address_id = $res['address_id'];
}
?>