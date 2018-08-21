<?php  require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db); 
 if ($conn->connect_error) 
     die($conn->connect_error); 


  if (isset($_POST['mcode'])){
    $mcode    = get_post($conn, 'mcode');
    $query    = "SELECT manager_code FROM `fmanager_profile` WHERE manager_code = '".$mcode."'";
    $result   = $conn->query($query);
    $rows = $result->num_rows;
}  
if (isset($_POST['fname'])   &&
      isset($_POST['lname'])    &&
      isset($_POST['email']) &&
      isset($_POST['password']))
  {
    $fname    = get_post($conn, 'fname');
    $lname    = get_post($conn, 'lname');
    $email    = get_post($conn, 'email');
    $password = get_post($conn, 'password');
    if($rows > 0){
 $query    = "INSERT INTO fuser_profile(fname,lname,usercode,g_email,password) VALUES('$fname', '$lname', 2,'$email', '$password')";
 $result   = $conn->query($query);
 if (!$result) echo "INSERT failed: $query<br>" .
   $conn->error . "<br><br>";}
else{
 $query    = "INSERT INTO fuser_profile(fname,lname,usercode,g_email,password) VALUES('$fname', '$lname', 1,'$email', '$password')";
 $result   = $conn->query($query);
 if (!$result) echo "INSERT failed: $query<br>" .
   $conn->error . "<br><br>";
}
  }




echo <<<_END
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="stylesheet" href="../css/background.css">
	<link rel="stylesheet" href="../css/signin.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
  <div id="outter">
	<div id="inner">
<h1>Creat Successfully!</h1>
  	You have been create account with 
_END;
if($rows > 0){
echo $email." as a manager";
}
else echo $email;

echo <<<_END
, start your journy with <a href="usersign.php">sign in!</a>
	</div>
  </div>
</body>
_END;

  $result->close();
  $conn->close();
  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }

 ?>
