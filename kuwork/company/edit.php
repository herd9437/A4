<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$comp_name = mysqli_real_escape_string($mysqli, $_POST['comp_name']);
	
	$description = mysqli_real_escape_string($mysqli, $_POST['description']);
	$address_id = mysqli_real_escape_string($mysqli, $_POST['address_id']);
	
	// checking empty fields
	if(empty($name) || empty($age) || empty($email)) {	
			
		if(empty($comp_name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE company SET description='$description',address_id='$address_id', WHERE address_id=$address_id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting company_name from url
$comp_name = $_GET['comp_name'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM company WHERE comp_name=$comp_name");

while($res = mysqli_fetch_array($result))
{
	$description = $res['description'];
	$address_id = $res['address_id'];
}
?>