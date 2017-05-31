<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$activity_id = $_GET['activity_id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM activity WHERE activity_id=$activity_id");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

