<?php  
$email = $_REQUEST['email'];

require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db); 
 if ($conn->connect_error) 
     die($conn->connect_error); 

$query = "SELECT g_email FROM fuser_profile WHERE g_email ='".$email."'";
$result = $conn->query($query);

if (!$result) die ("Database access failed: " . $conn->error);
$rows = $result->num_rows;
if ($rows ==1)
echo $email." is aready been used.";
?>
