<?php
include 'connection.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

//$tableName = mysql_real_escape_string($_POST['tableName']);  
$query ="SELECT * FROM `content` WHERE UTC_TIMESTAMP() BETWEEN `startTime` AND `endTime` ORDER BY `id` DESC";
$result = mysql_query($query);
if(mysql_num_rows($result) >0) {
  $array = array();
  while($row=mysql_fetch_assoc($result)) {
    //$row['name']=stripslashes($row['name']);
    //$row['description']=stripslashes($row['description']);

    array_push($array, $row);
  }
  header('Content-Type: application/json');
  echo json_encode($array);
} else {
  header('Content-Type: application/json');
  echo json_encode(0);
}