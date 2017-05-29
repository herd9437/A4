<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{

	$residence_id = mysqli_real_escape_string($mysqli, $_POST['residence_id']);

	$landlord_email = mysqli_real_escape_string($mysqli, $_POST['landlord_email']);
	$landlord_phone_num = mysqli_real_escape_string($mysqli, $_POST['landlord_phone_num']);
	$rent = mysqli_real_escape_string($mysqli, $_POST['rent']);
	$address_id = mysqli_real_escape_string($mysqli, $_POST['address_id']);
	$residence_reviews = mysqli_real_escape_string($mysqli, $_POST['residence_reviews']);
	$residence_image = mysqli_real_escape_string($mysqli, $_POST['residence_image']);

	// checking empty fields
	if(empty($residence_id)) {

		if(empty($residence_id)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

	} else {
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE residence SET landlord_email='$landlord_email',landlord_phone_num='$landlord_phone_num',rent='$rent',address_id='$address_id',residence_reviews='$residence_reviews',residence_image='$residence_image' WHERE residence_id=$residence_id");
		echo "{'status':'success','message':'Residence updated successfully'}";

	}
}
?>
<?php
//getting residence_id from url
$residence_id = $_GET['residence_id'];

//selecting data associated with this particular residence_id
$result = mysqli_query($mysqli, "SELECT * FROM residence WHERE residence_id=$residence_id");

while($res = mysqli_fetch_array($result))
{
	$landlord_email = $res['landlord_email'];
	$landlord_phone_num = $res['landlord_phone_num'];
	$rent = $res['rent'];
	$address_id = $res['address_id'];
	$residence_reviews = $res['residence_reviews'];
	$residence_image = $res['residence_image'];
}
?>