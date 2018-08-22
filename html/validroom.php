<?php  
$item = $_REQUEST['item'];

require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db); 
 if ($conn->connect_error) 
     die($conn->connect_error); 

$query = "SELECT * FROM froom WHERE standard='AVAILABLE'and roomtypeid='".$item."'";
$result = $conn->query($query);

if (!$result) die ("Database access failed: " . $conn->error);
$rows = $result->num_rows;
if ($rows ==0)
echo $item." have been all booked";
?>
