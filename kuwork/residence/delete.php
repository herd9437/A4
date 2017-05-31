<?php
//including the database connection file
include("config.php");

//getting residence_id of the data from url
$residence_id = $_GET['residence_id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM residence WHERE residence_id=$residence_id");

echo "{'status':'success','message':'Activity deleted successfully'}";
?>
