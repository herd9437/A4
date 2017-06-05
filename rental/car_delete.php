<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$vin = $_GET['vin'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM car WHERE vin='$vin'");

//redirecting to the display page (index.php in our case)
header("Location:car_index.php");
?>
