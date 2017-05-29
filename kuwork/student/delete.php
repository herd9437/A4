<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$email = $_GET['email'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM student WHERE email=$email");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

