<?php
//include 'connection.php';
include 'functions.php';


//ini_set('display_errors', 'On'); ONLY ON WHEN DEBUGGING
//ini_set('allow_url_fopen','true');
$error_string;

$obj = $_POST['annaselo_groupwalk'];

$userName = $obj['name'];
$lat = $obj['lat'];
$long = $obj['long'];

echo($error_string);


//moves to information into the database 
if(!isset($error_string)) {
	consol.log("good");
  if(true) {
  	$query = "INSERT INTO `users` (`name`, `lat`, `long`) VALUES ('".$userName"', '".$lat."', '".$long."')";
    $query1 = mysql_query($query);
  } else {
    $error_string = "E101"; //already been Trended
  }
} 
unset($_POST['submit']);  
//retuns information back to ajax
if(isset($error_string))
  {echo $error_string;}
//echo $urlUser;
else {echo $query;}


?>