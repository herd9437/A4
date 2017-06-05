<?php

include_once("config.php");
if(isset($_GET['table'])&&isset($_GET['query'])){
	//getting residence_id from url
  $query = $_GET['query'];
  $table = $_GET['table'];

  if($table == 'activity'){
    //selecting data associated with this particular residence_id
  	$result = mysqli_query($mysqli, "SELECT * FROM activity WHERE name Like \"%$query%\" OR description Like \"%$query%\" OR start_time Like \"%$query%\" OR end_time Like \"%$query%\" ");

    $data = array();

    while($res = mysqli_fetch_array($result)) {
    	$entry = "";
    	$entry = $entry . "{";
    	$entry = $entry . "\"name\":\"".$res['name']."\",";
    	$entry = $entry . "\"coordinator_email\":\"".$res['coordinator_email']."\",";
    	$entry = $entry . "\"description\":\"".$res['description']."\",";
    	$entry = $entry . "\"start_time\":\"".$res['start_time']."\",";
    	$entry = $entry . "\"start_date\":\"".$res['start_date']."\",";
    	$entry = $entry . "\"end_time\":\"".$res['end_time']."\",";
    	$entry = $entry . "\"end_date\":\"".$res['end_date']."\",";
    	$entry = $entry . "\"activity_id\":\"".$res['activity_id']."\",";
    	$entry = $entry . "\"address_id\":\"".$res['address_id']."\"";
    	$entry = $entry . "}";
    	array_push($data, $entry);
    }

    echo '[' . implode(',', $data) . ']';

  }
  else if($table == 'residence'){
    //selecting data associated with this particular residence_id
  	$result = mysqli_query($mysqli, "SELECT * FROM residence WHERE landlord_email Like \"%$query%\" or landlord_phone_num Like \"%$query%\" or rent Like \"%$query%\"");

    $data = array();

    while($res = mysqli_fetch_array($result)) {
    	$entry = "";
    	$entry = $entry . "{";
    	$entry = $entry . "\"residence_id\":\"".$res['residence_id']."\",";
    	$entry = $entry . "\"landlord_email\":\"".$res['landlord_email']."\",";
    	$entry = $entry . "\"landlord_phone_num\":\"".$res['landlord_phone_num']."\",";
    	$entry = $entry . "\"rent\":\"".$res['rent']."\",";
    	$entry = $entry . "\"address_id\":\"".$res['address_id']."\",";
    	$entry = $entry . "\"residence_reviews\":\"".$res['residence_reviews']."\",";
    	$entry = $entry . "\"residence_image\":\"".$res['residence_image']."\"";
    	$entry = $entry . "}";
    	array_push($data, $entry);
    }

    echo '[' . implode(',', $data) . ']';

  }
  else if($table == 'company'){
    //selecting data associated with this particular residence_id
  	$result = mysqli_query($mysqli, "SELECT * FROM company WHERE name Like \"%$query%\" or description Like \"%$query%\"");
    $data = array();

    while($res = mysqli_fetch_array($result)) {
    	$entry = "";
    	$entry = $entry . "{";
    	$entry = $entry . "\"comp_name\":\"".$res['name']."\",";
    	$entry = $entry . "\"description\":\"".$res['description']."\",";
    	$entry = $entry . "\"address_id\":\"".$res['address_id']."\"";
    	$entry = $entry . "}";
    	array_push($data, $entry);
    }

    echo '[' . implode(',', $data) . ']';

  }else if($table == 'student'){
    //selecting data associated with this particular residence_id
  	$result = mysqli_query($mysqli, "SELECT * FROM student WHERE email Like \"$query\" or phone_number Like \"%$query%\" or first_name Like \"%$query%\" or last_name like \"$query\" or degree Like \"%$query%\" or major Like \"%$query%\" or class_standing Like \"%$query%\"");

    $data = array();

    while($res = mysqli_fetch_array($result)) {
    	$entry = "";
    	$entry = $entry . "{";
    	$entry = $entry . "\"email\":\"".$res['email']."\",";
    	$entry = $entry . "\"phone_number\":\"".$res['phone_number']."\",";
    	$entry = $entry . "\"name\":\"".$res['name']."\",";
    	$entry = $entry . "\"degree\":\"".$res['degree']."\",";
    	$entry = $entry . "\"major\":\"".$res['major']."\",";
    	$entry = $entry . "\"class_standing\":\"".$res['class_standing']."\",";
    	$entry = $entry . "\"company_name\":\"".$res['company_name']."\",";
    	$entry = $entry . "\"residence_id\":\"".$res['residence_id']."\"";
    	$entry = $entry . "}";
    	array_push($data, $entry);
    }

    echo '[' . implode(',', $data) . ']';

  }
}

?>
