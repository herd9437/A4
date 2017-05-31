<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$vin = $_GET['vin'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM vehicle WHERE vin=$vin");

echo "{'status':'success','message':'Activity deleted successfully'}";
?>
