<?php
//including the database connection file
include_once("../config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM residence"); // using mysqli_query instead
//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
echo "[";

while($res = mysqli_fetch_array($result)) {
	echo "{";
	echo "\"residence_id\":\"".$res['residence_id']."\",";
	echo "\"landlord_email\":\"".$res['landlord_email']."\",";
	echo "\"landlord_phone_num\":\"".$res['landlord_phone_num']."\",";
	echo "\"rent\":\"".$res['rent']."\",";
	echo "\"address_id\":\"".$res['address_id']."\",";
	echo "\"residence_reviews\":\"".$res['residence_reviews']."\",";
	echo "\"residence_image\":\"".$res['residence_image']."\",";
	echo "}";

}

echo "]";
?>
