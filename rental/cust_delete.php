<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$customer_id = $_GET['customer_id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM customer WHERE customer_id=$cusotmer_id");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>
