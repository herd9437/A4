<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$account_number = $_GET['account_number'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM corporation WHERE account_number=$account_number");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>
