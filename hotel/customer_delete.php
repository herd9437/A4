<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$cust_name = $_GET['cust_name'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM customer WHERE cust_name='$cust_name'");

//redirecting to the display page (index.php in our case)
header("Location:customer_index.php");
?>
