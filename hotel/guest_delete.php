<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$confirmation_num = $_GET['confirmation_num'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM guest WHERE confirmation_num=$confirmation_num");

//redirecting to the display page (index.php in our case)
header("Location:guest_index.php");
?>
