<?php
$host="box911.bluehost.com:3306"; // Host name - update all those fields
$username="annaselo_test"; // Mysql username
$password="Bluefish22!"; // Mysql password
$db_name="annaselo_groupwalk"; // Database name

//Connect to server and select databse.
mysql_connect("$host", "$username", "$password") or die("cannot connect to server");
mysql_select_db("$db_name") or die("cannot select DB");
   
session_set_cookie_params(2*7*24*60*60);
// Making the cookie live for 2 weeks
session_start();
