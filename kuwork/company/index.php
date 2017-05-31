<?php
//including the database connection file
include_once("../config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM company"); // using mysqli_query instead

echo "[";

while($res = mysqli_fetch_array($result)) {
	echo "{";
	echo "\"comp_name\":\"".$res['comp_name']."\",";
	echo "\"description\":\"".$res['description']."\",";
	echo "\"address_id\":\"".$res['address_id']."\",";
	echo "}";
}

echo "]";
?>
