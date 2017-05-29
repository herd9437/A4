<?php
// including the database connection file
include_once("config.php");

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
			echo "<font color='red'>Email field is empty.</font><br/>";
		}

		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

		if(empty($degree)) {
			echo "<font color='red'>Degree field is empty.</font><br/>";
		}

		if(empty($major)) {
			echo "<font color='red'>Major field is empty.</font><br/>";
		}
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE student SET phone_number='$phone_number',name='$name',degree='$degree',major='$major',class_standing='$class_standing',company_name='$company_name',residence_id='$residence_id' WHERE email=$email");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting email (primary key) from url
$email = $_GET['email'];

//selecting data associated with this particular email
$result = mysqli_query($mysqli, "SELECT * FROM student WHERE email=$email");

while($res = mysqli_fetch_array($result))
{
	$phone_number = $res['phone_number'];
	$name = $res['name'];
	$degree = $res['degree'];
	$major = $res['major'];
	$class_standing = $res['class_standing'];
	$company_name = $res['company_name'];
	$residence_id = $res['residence_id'];
}
?>