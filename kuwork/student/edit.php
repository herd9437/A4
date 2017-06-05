<?php
// including the database connection file
include_once("../config.php");

if(isset($_POST['update']))
{

	$email = mysqli_real_escape_string($mysqli, $_POST['email']);

	$phone_number = mysqli_real_escape_string($mysqli, $_POST['phone_number']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$degree = mysqli_real_escape_string($mysqli, $_POST['degree']);
	$major = mysqli_real_escape_string($mysqli, $_POST['major']);
	$class_standing = mysqli_real_escape_string($mysqli, $_POST['class_standing']);
	$company_name = mysqli_real_escape_string($mysqli, $_POST['company_name']);
	$residence_id = mysqli_real_escape_string($mysqli, $_POST['residence_id']);

	// checking empty fields
	if(empty($email) || empty($name) || empty($degree) || empty($major)) {

		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font>");
		}

		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font>");
		}

		if(empty($degree)) {
			echo "<font color='red'>Degree field is empty.</font>");
		}

		if(empty($major)) {
			echo "<font color='red'>Major field is empty.</font>");
		}

		if(empty($class_standing)) {
			echo "<font color='red'>Class Standing field is empty.</font>");
		}

		if(empty($company_name)) {
			echo "<font color='red'>Company Name field is empty.</font>");
		}

	} else {
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE student SET phone_number='$phone_number',name='$name',degree='$degree',major='$major',class_standing='$class_standing',company_name='$company_name',residence_id='$residence_id' WHERE email=$email");

		//redirectig to the display page. In our case, it is index.php
		echo "{'status':'success','message':'Student updated successfully'}";
	}
}

if(isset($_GET['email'])){
	//getting email (primary key) from url
	$email = $_GET['email'];

	//selecting data associated with this particular email
	$result = mysqli_query($mysqli, "SELECT * FROM student WHERE email=$email");

	while($res = mysqli_fetch_array($result))
	{
		$email = $res['email'];
		$phone_number = $res['phone_number'];
		$name = $res['name'];
		$degree = $res['degree'];
		$major = $res['major'];
		$class_standing = $res['class_standing'];
		$company_name = $res['company_name'];
		$residence_id = $res['residence_id'];
	}
}
?>

<html>
<head>
	<title>Add Activity</title>
</head>

<body>
	<a href="http://webtech.kettering.edu/~vecc0396/cs461/kuwork/index.html">Home</a>
	<br/><br/>

	<form action="http://webtech.kettering.edu/~vecc0396/cs461/kuwork/student/edit.php" method="post" name="form1">
		<table>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email ?>"></td>
			</tr>
			<tr>
				<td>Phone Number</td>
				<td><input type="text" name="phone_number" value="<?php echo $phone_number ?>"></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name?>"></td>
			</tr>
			<tr>
				<td>Degree</td>
				<td><input type="text" name="degree" value="<?php echo $degree ?>"></td>
			</tr>
			<tr>
				<td>Major/td>
				<td><input type="text" name="major" value="<?php echo $major ?>"></td>
			</tr>
			<tr>
				<td>Class Standing</td>
				<td><input type="text" name="class_standing" value="<?php echo $class_standing?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="update" name="Update" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>
