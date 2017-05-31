<?php
//including the database connection file
include_once("../config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM vehicle"); // using mysqli_query instead

$data = array();

while($res = mysqli_fetch_array($result)) {
	$entry = "";
	$entry = $entry . "{";
	$entry = $entry . "\"vin_number\":\"".$res['vin_number']."\",";
	$entry = $entry . "\"make\":\"".$res['make']."\",";
	$entry = $entry . "\"model\":\"".$res['model']."\",";
	$entry = $entry . "\"capacity\":\"".$res['capacity']."\",";
	$entry = $entry . "\"owner_email\":\"".$res['owner_email']."\",";
	$entry = $entry . "}";
	array_push($data, $entry);
}

echo '[' . implode(',', $data) . ']';
?>
