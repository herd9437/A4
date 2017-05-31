<?php
//including the database connection file
include_once("../config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM company"); // using mysqli_query instead

$data = array();

while($res = mysqli_fetch_array($result)) {
	$entry = "";
	$entry = $entry . "{";
	$entry = $entry . "\"comp_name\":\"".$res['comp_name']."\",";
	$entry = $entry . "\"description\":\"".$res['description']."\",";
	$entry = $entry . "\"address_id\":\"".$res['address_id']."\"";
	$entry = $entry . "}";
	array_push($data, $entry);
}

echo '[' . implode(',', $data) . ']';
?>
