<?php
//getting id from url
$rep_id = $_GET['rep_id'];

//selecting data associated with this particular id


$result = mysqli_query($mysqli, "SELECT c.make, c.model, c.color, c.licence_number, c.vin, c.mileage, c.condition, c.location FROM car AS c JOIN reservation AS r WHERE date_rented date_returned");

while($res = mysqli_fetch_array($result))
{
	$first_name = $res['first_name'];
	$last_name = $res['last_name'];
	$phone_number = $res['phone_number'];
}
?>
<html>
<head>
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<form name="form1" method="post" action="rep_edit.php">
		<table border="0">
			<tr>
				<td>First Name</td>
				<td><input type="text" name="first_name" value="<?php echo $first_name ?>"></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input type="text" name="last_name" value="<?php echo $last_name ?>"></td>
			</tr>
			<tr>
				<td>Phone Number</td>
				<td><input type="text" name="phone_number" value="<?php echo $phone_number ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="rep_id" value=<?php echo $_GET['rep_id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
