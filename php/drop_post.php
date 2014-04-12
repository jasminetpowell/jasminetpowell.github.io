<?php
include 'connection.php';
include 'functions.php';


//ini_set('display_errors', 'On'); ONLY ON WHEN DEBUGGING
//ini_set('allow_url_fopen','true');
$error_string;

$obj = $_POST['data1'];

$lat = $obj['lat'];
$long = $obj['long'];
$name = $obj['name'];
$title = $obj['title'];
$message = $obj['message'];
$category = $obj['category'];
$endTime = $obj['endTime'];
$userId = $obj['userId'];


echo($error_string);


//moves to information into the database 
if(!isset($error_string)) {
  if(true) {
  	$query = "INSERT INTO `content` (`id`, `title`, `name`, `content`, `category`, `startTime`, `endTime`, `lat`, `long`, `userId`) VALUES ('', '".$title."', '".$name."', '".$message."', '".$category."', UTC_TIMESTAMP(), '".$endTime."', '".$lat."', '".$long."', '".$userId."')";
    $query1 = mysql_query($query);
  } else {
    $error_string = "E101"; //already been Trended
  }
} 
unset($_POST['submit']);  
//retuns information back to ajax
if(isset($error_string))
  echo $error_string;
//echo $urlUser;
else
  echo $query;
