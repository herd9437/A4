<html>
<head>
	<title>New Customer</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
	$cust_name = mysqli_real_escape_string($mysqli, $_POST['cust_name']);
	$address = mysqli_real_escape_string($mysqli, $_POST['address']);
	$cc_type = mysqli_real_escape_string($mysqli, $_POST['cc_type']);
	$cc_num = mysqli_real_escape_string($mysqli, $_POST['cc_num']);
	$telephone = mysqli_real_escape_string($mysqli, $_POST['telephone']);

	// checking empty fields
	if(empty($cust_name){

		if(empty($cust_name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// if all the fields are filled (not empty)

		//insert data to database
		$result = mysqli_query($mysqli, "INSERT INTO customer (cust_name, address, cc_type, cc_num, telephone) VALUES ( '$cust_name', '$address', '$cc_type', '$cc_num', '$telephone')");

		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='customer_index.php'>View Result</a>";
	}
}
?>
</body>
</html>
