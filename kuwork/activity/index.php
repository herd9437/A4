<?php
//including the database connection file
include_once("../config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM activity"); // using mysqli_query instead
//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
$data = array();

while($res = mysqli_fetch_array($result)) {
	$entry = "";
	$entry = $entry . "{";
	$entry = $entry . "\"name\":\"".$res['name']."\",";
	$entry = $entry . "\"coordinator_email\":\"".$res['coordinator_email']."\",";
	$entry = $entry . "\"description\":\"".$res['description']."\",";
	$entry = $entry . "\"start_time\":\"".$res['start_time']."\",";
	$entry = $entry . "\"start_date\":\"".$res['start_date']."\",";
	$entry = $entry . "\"end_time\":\"".$res['end_time']."\",";
	$entry = $entry . "\"end_date\":\"".$res['end_date']."\",";
	$entry = $entry . "\"activity_id\":\"".$res['activity_id']."\",";
	$entry = $entry . "\"address_id\":\"".$res['address_id']."\"";
	$entry = $entry . "}";
	array_push($data, $entry);
}

echo '[' . implode(',', $data) . ']';
?>
