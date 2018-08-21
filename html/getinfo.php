<?php
//receiving email and password from the form
$email = $_REQUEST['email'];
$password = $_REQUEST['pwd'];
//connecting to database to check whether the login combo (username and password //) exists or not.
require('login.php'); 
$conn = new mysqli($hn,$un,$pw,$db);
  if ($conn->connect_error) die($conn->connect_error);
$query = 'SELECT g_email,password FROM `fuser_profile` WHERE g_email = "'.$email.'" and password ="'.$password.'"';
$result = $conn->query($query);
$hint .= "username and password do not match our records or do not exists";
 $result = $conn->query($query);
 if (!$result) die ("Database access failed: " . $conn->error);
$rows = $result->num_rows;
$hint .= "username and password do not match our records or do not exists";
if ($rows ==1)$hint = "";
echo $hint;
?>
