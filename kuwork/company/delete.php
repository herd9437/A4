<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$comp_name = $_GET['comp_name'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM company WHERE comp_name=$comp_name");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

