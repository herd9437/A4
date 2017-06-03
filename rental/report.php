<?php
// Available Cars
$result = mysqli_query($mysqli, "SELECT * FROM car WHERE vin=$vin AND");
// Maintenance Report
$result = mysqli_query($mysqli, "SELECT * FROM car WHERE vin=$vin");
// Repairs Report
?>
