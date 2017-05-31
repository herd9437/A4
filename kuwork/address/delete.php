<?php
//including the database connection file
include("../config.php");

//getting id of the data from url
$address_id = $_GET['address_id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM address WHERE address_id=$address_id");

echo "{'status':'success','message':'Activity deleted successfully'}";
?>
