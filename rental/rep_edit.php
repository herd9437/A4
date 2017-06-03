<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);

	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);

	// checking empty fields
	if(empty($name) || empty($age) || empty($email)) {

		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}

		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
	} else {
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");

		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$age = $res['age'];
	$email = $res['email'];
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
		</table>
	</form>
</body>
</html>
