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

	<script src="../js/validation.js">  </script>
</head>
<body>
  <div id="outter">
	<div id="inner">
  	<form action="main.php" method="post">
     		<img class="mb-4" src="../pictures/logo.png" alt="" width="72" height="72">
     		<h4>Sign in</h4>
     		<label for="inputEmail" class="sr-only">Email address</label>
      		<input type="email" id="inputEmail" class="form-control" placeholder="Email address"  name="email"  required autofocus>

      		<label for="inputPassword" class="sr-only">Password</label>
     		<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password"   onkeyup="showHint()" required>
     		<p style="color:red;"><span id="txtHint"></span></p>

 		<div class="checkbox mb-3">
        	<label>
          	<input type="checkbox" value="remember-me"> Remember me
        	</label>
      		<p>No account? <a href="usercreate.php">Create one!</a></p>
      		</div>
      		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
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
