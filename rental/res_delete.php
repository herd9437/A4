<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$credit_card_number = $_GET['credit_card_number'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM users WHERE credit_card_number=$credit_card_number");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>