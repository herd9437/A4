<?php
// including the database connection file
include_once("../config.php");

if(isset($_POST['update']))
{

	$comp_name = mysqli_real_escape_string($mysqli, $_POST['comp_name']);
	$description = mysqli_real_escape_string($mysqli, $_POST['description']);

	// checking empty fields
	if(empty($name) || empty($age) || empty($email)) {

		if(empty($comp_name)) {
			echo "<font color='red'>Company Name field is empty.</font>");
		}

		if(empty($description)) {
			echo "<font color='red'>Description field is empty.</font>");
		}

	} else {
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE company SET comp_name='$comp_name',description='$description', WHERE address_id=$address_id");
		echo "<font color='green'>Data added successfully.";
		echo '<a href="http://webtech.kettering.edu/~vecc0396/cs461/kuwork/index.html">View Result</a>';

	}
}

if(isset($_GET['comp_name'])){
	//getting company_name from url
	$comp_name = $_GET['comp_name'];

	//selecting data associated with this particular id
	$result = mysqli_query($mysqli, "SELECT * FROM company  WHERE name='$comp_name'");

	while($res = mysqli_fetch_array($result))
	{
		$comp_name = $res['name'];
		$description = $res['description';
		$address_id = $res['address_id';
	}
}
?>
<html>
<head>
	<title>Add Company</title>
</head>

<body>
	<a href="http://webtech.kettering.edu/~vecc0396/cs461/kuwork/index.html">Home</a>
	<br/><br/>

	<form action="http://webtech.kettering.edu/~vecc0396/cs461/kuwork/company/edit.php" method="post" name="form1">
		<table>
			<tr>
				<td>Company Name</td>
				<td><input type="text" name="comp_name" value="<?php echo $comp_name ?>"></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><input type="text" name="description" value="<?php echo $description ?>"></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type="text" name="address_id" value="<?php echo $address_id ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="Update" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>
