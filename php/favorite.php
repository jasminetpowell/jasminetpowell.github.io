<?php
include 'connection.php';
include 'functions.php';


//ini_set('display_errors', 'On'); ONLY ON WHEN DEBUGGING
//ini_set('allow_url_fopen','true');
$error_string;

$obj = $_POST['data5'];

$userId = $obj['userId'];
$noteId = $obj['noteId'];

echo($error_string);


//moves to information into the database 
if(!isset($error_string)) {
  if(true) {
  	$query = "UPDATE `content` SET `rep` = `rep` + 1 WHERE `id` = '".$noteId."'";
  	$query2 = "UPDATE `users` SET `userRep` = `userRep` + 1 WHERE `id` = '".$userId."'";
    $query1 = mysql_query($query);
    $query3 = mysql_query($query2);
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