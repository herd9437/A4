<?php
//including the database connection file
include_once("../config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM student"); // using mysqli_query instead
echo "[";

while($res = mysqli_fetch_array($result)) {
	echo "{";
	echo "\"email\":\"".$res['email']."\",";
	echo "\"phone_number\":\"".$res['phone_number']."\",";
	echo "\"name\":\"".$res['name']."\",";
	echo "\"degree\":\"".$res['degree']."\",";
	echo "\"major\":\"".$res['major']."\",";
	echo "\"class_standing\":\"".$res['class_standing']."\",";
	echo "\"company_name\":\"".$res['company_name']."\",";
	echo "\"residence_id\":\"".$res['residence_id']."\",";
	echo "}";
}

echo "]";
?>
