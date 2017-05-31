<?php
//including the database connection file
include_once("../config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM residence"); // using mysqli_query instead
//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
$data = array();

while($res = mysqli_fetch_array($result)) {
	$entry = "";
	$entry = $entry . "{";
	$entry = $entry . "\"residence_id\":\"".$res['residence_id']."\",";
	$entry = $entry . "\"landlord_email\":\"".$res['landlord_email']."\",";
	$entry = $entry . "\"landlord_phone_num\":\"".$res['landlord_phone_num']."\",";
	$entry = $entry . "\"rent\":\"".$res['rent']."\",";
	$entry = $entry . "\"address_id\":\"".$res['address_id']."\",";
	$entry = $entry . "\"residence_reviews\":\"".$res['residence_reviews']."\",";
	$entry = $entry . "\"residence_image\":\"".$res['residence_image']."\",";
	$entry = $entry . "}";
	array_push($data, $entry);
}

echo '[' . implode(',', $data) . ']';
?>
