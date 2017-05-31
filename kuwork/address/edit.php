<?php
// including the database connection file
include_once("../config.php");

if(isset($_POST['update']))
{

	$address_id = mysqli_real_escape_string($mysqli, $_POST['address_id']);

	$street = mysqli_real_escape_string($mysqli, $_POST['street']);
	$city = mysqli_real_escape_string($mysqli, $_POST['city']);
	$state = mysqli_real_escape_string($mysqli, $_POST['state']);
	$zip_code = mysqli_real_escape_string($mysqli, $_POST['zip_code']);

	// checking empty fields
	if(empty($street) || empty($city) || empty($state) || empty($zip_code)) {
		$errors = array();

		if(empty($street)) {
			array_push($errors,"{'status':'error','message':'Street field is empty.'}");
		}

		if(empty($city)) {
			array_push($errors,"{'status':'error','message':'City field is empty.'}");
		}

		if(empty($state)) {
			array_push($errors,"{'status':'error','message':'State field is empty.'}");
		}

		if(empty($zip_code)) {
			array_push($errors,"{'status':'error','message':'Zip Code field is empty.'}");
		}

		echo '[' . implode(',', $errors) . ']';
	} else {

		$result = mysqli_query($mysqli, "INSERT INTO Address (street,city,state,zip_code) VALUES('$street','$city','$state','$zip_code')");
		echo "{'status':'success','message':'Address successfully created.'}";

	}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$age = $res['age'];
	$email = $res['email'];
}
?>
