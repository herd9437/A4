<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$rep_id = $_GET['rep_id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM users WHERE rep_id=$rep_id");

//redirecting to the display page (index.php in our case)
header("Location:rep_index.php");
?>
