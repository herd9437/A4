<?php
//including the database connection file
include_once("../config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM activity"); // using mysqli_query instead
//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
echo "[";

while($res = mysqli_fetch_array($result)) {
	echo "{";
	echo "\"name\":\"".$res['name']."\",";
	echo "\"coordinator_email\":\"".$res['coordinator_email']."\",";
	echo "\"description\":\"".$res['description']."\",";
	echo "\"start_time\":\"".$res['start_time']."\",";
	echo "\"start_date\":\"".$res['start_date']."\",";
	echo "\"end_time\":\"".$res['end_time']."\",";
	echo "\"end_date\":\"".$res['end_date']."\",";
	echo "\"activity_id\":\"".$res['activity_id']."\",";
	echo "\"address_id\":\"".$res['address_id']."\",";
	echo "}";
}

echo "]";
?>
