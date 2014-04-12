<?php
include 'connection.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

$obj = $_POST['rand'];

$currentString = $obj['currentString'];


//$tableName = mysql_real_escape_string($_POST['tableName']);  
$query ="SELECT * FROM `users` WHERE `str` = '".$currentString."'";
$result = mysql_query($query);
if(mysql_num_rows($result) >0) {
  $array = array();
  while($row=mysql_fetch_assoc($result)) {
    //$row['name']=stripslashes($row['name']);
    //$row['description']=stripslashes($row['description']);

    array_push($array, $row);
  }
  $query = "UPDATE `users` SET `welcome` = 0 WHERE users.id = " . $array[0]['id'];
  $query1 = mysql_query($query);
  header('Content-Type: application/json');
  //echo json_encode($array);
  echo json_encode($array);
} else {
  header('Content-Type: application/json');
  echo json_encode(0);
}
