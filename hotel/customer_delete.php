<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$vin = $_GET['cust_name'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM car WHERE cust_name='$cust_name'");

//redirecting to the display page (index.php in our case)
header("Location:hotel_index.php");
?>
