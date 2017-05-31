<?php
//including the database connection file
include_once("../config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM student"); // using mysqli_query instead

$data = array();

while($res = mysqli_fetch_array($result)) {
	$entry = "";
	$entry = $entry . "{";
	$entry = $entry . "\"email\":\"".$res['email']."\",";
	$entry = $entry . "\"phone_number\":\"".$res['phone_number']."\",";
	$entry = $entry . "\"name\":\"".$res['name']."\",";
	$entry = $entry . "\"degree\":\"".$res['degree']."\",";
	$entry = $entry . "\"major\":\"".$res['major']."\",";
	$entry = $entry . "\"class_standing\":\"".$res['class_standing']."\",";
	$entry = $entry . "\"company_name\":\"".$res['company_name']."\",";
	$entry = $entry . "\"residence_id\":\"".$res['residence_id']."\"";
	$entry = $entry . "}";
	array_push($data, $entry);
}

echo '[' . implode(',', $data) . ']';
?>
