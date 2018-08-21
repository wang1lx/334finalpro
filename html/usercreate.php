<?php  require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db); 
 if ($conn->connect_error) 
     die($conn->connect_error); 

echo <<<_END
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="stylesheet" href="../css/background.css">
	<link rel="stylesheet" href="../css/signin.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>$(document).ready(function(){
    
        $("#inputCode").hide();
    });
$(document).ready(function(){
    $(".check").click(function(){
        $("#inputCode").show();
    });
    });
</script>
	<script src="../js/validemail.js"></script>
</head>
<body>
  <div id="outter">
	<div id="inner">
  	<form action="successfuly.php" method="post">
     		<img class="mb-4" src="../pictures/logo.png" alt="" width="72" height="72">
     		<h4>Sign in</h4>
     		<label for="inputEmail" class="sr-only">Email address</label>
      		<input type="email" id="inputEmail" class="form-control" placeholder="Email address"  name="email"   onkeyup="eshowHint()" required autofocus>
     		<p style="color:red;"><span id="repeat"></span></p>
                <label for="Lastname" class="sr-only">Last Name</label>
     		<input type="text" id="inputLname" class="form-control" placeholder="Last Name" name="lname"    required>
                <label for="Firstname" class="sr-only">Password</label>
     		<input type="text" id="inputFname" class="form-control" placeholder="First Name" name="fname"    required>
      		<label for="inputPassword" class="sr-only">Password</label>
     		<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password"    required>
                <input type="checkbox" class="check"> As Manager
                <label for="Managercode" class="sr-only">Manager Code</label>
     		<input type="text" id="inputCode" class="form-control" placeholder="Managercode" name="mcode">
      		<button class="btn btn-lg btn-primary btn-block" type="submit">Creat</button>
  	</pre>
	</form>
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
