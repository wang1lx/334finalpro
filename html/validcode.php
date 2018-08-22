<?php  
$code = $_REQUEST['code'];

require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db); 
 if ($conn->connect_error) 
     die($conn->connect_error); 

$query = "SELECT * FROM fdiscount WHERE discountcode ='".$code."'";
$result = $conn->query($query);

if (!$result) die ("Database access failed: " . $conn->error);
$rows = $result->num_rows;
if ($rows ==0)
echo $code." is unavailible.";
?>
