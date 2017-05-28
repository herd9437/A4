<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$maintenance_id = $_GET['maintenance_id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM maintenance WHERE maintenance_id=$maintenance_id");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>
