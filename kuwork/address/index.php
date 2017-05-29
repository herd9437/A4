<?php
//including the database connection file
include_once("../config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM address"); // using mysqli_query instead

echo "[";

while($res = mysqli_fetch_array($result)) {
	echo "{";
	echo "\"street\":\"".$res['street']."\",";
	echo "\"city\":\"".$res['city']."\",";
	echo "\"state\":\"".$res['state']."\",";
	echo "\"zip_code\":\"".$res['zip_code']."\"";
	echo "}";
}

echo "]";
?>
