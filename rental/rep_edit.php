<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{

	$rep_id = mysqli_real_escape_string($mysqli, $_POST['rep_id']);

	$first_name = mysqli_real_escape_string($mysqli, $_POST['first_name']);
	$last_name = mysqli_real_escape_string($mysqli, $_POST['last_name']);
	$phone_number = mysqli_real_escape_string($mysqli, $_POST['phone_number']);

	// checking empty fields
	if(empty($first_name) || empty($last_name) || empty($phone_number)) {

		if(empty($first_name)) {
			echo "<font color='red'>First Name field is empty.</font><br/>";
		}

		if(empty($last_name)) {
			echo "<font color='red'>Last Name field is empty.</font><br/>";
		}

		if(empty($phone_number)) {
			echo "<font color='red'>Phone Number field is empty.</font><br/>";
		}

		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// if all the fields are filled (not empty)

		//insert data to database
		$result = mysqli_query($mysqli, "UPDATE representative SET first_name='$first_name', last_name='$last_name', phone_number='$phone_number' WHERE rep_id='$rep_id'");
		echo $result;

		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='res_index.php'>View Result</a>";
	}
}
?>
<?php
//getting id from url
$rep_id = $_GET['rep_id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM representative WHERE rep_id=$rep_id");

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
