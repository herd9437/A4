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
		echo "{'status':'success','message':'Address successfully created.'}";

	}
}

if(isset($_GET['comp_name'])){
	//getting company_name from url
	$comp_name = $_GET['comp_name'];

	//selecting data associated with this particular id
	$result = mysqli_query($mysqli, "SELECT * FROM company  WHERE name='$comp_name'");

	while($res = mysqli_fetch_array($result))
	{
		echo "{";
		echo "\"comp_name\":\"".$res['name']."\",";
		echo "\"description\":\"".$res['description']."\"";
		echo "}";
	}
}
?>
