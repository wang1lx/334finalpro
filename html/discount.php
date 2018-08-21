<?php  require_once 'login.php';
session_start();
$conn = new mysqli($hn, $un, $pw, $db); 
 if ($conn->connect_error) 
     die($conn->connect_error); 


echo <<<_END
<head>

<style>

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color:#A9CCE3;
   color: white;
   text-align: center;
}

    </style>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="text-center" style="background-color:#FBFCFC;">

      <div style="background:url(../pictures/background.jpg) no-repeat center center;
                  background-size:cover;
                  background-attachment:fixed;
                  background-color:#CCCCCC;
                  height: 200px;"><br><br><h1 class="h3 mb-3 font-weight-normal">Discount</h1></br>
_END;
 if ($_SESSION["g_id"] != ""){

    $query   = 'SELECT fname,lname,usercode FROM `fuser_profile` WHERE guests_id="'.$_SESSION["g_id"].'"';
$result   = $conn->query($query);
       if (!$result) die($conn->error);
       $row = $result->fetch_array(MYSQLI_ASSOC);
       $name=$row['fname']." ".$row['lname'].'<a href="http://wang1lx.myweb.cs.uwindsor.ca/60334/assignments/finalpro/html/usersign.php">,  Log out</a></div>';
       $usercode=$row['usercode'];
       echo $name.'</br></div>';
}

else echo '<a href="http://wang1lx.myweb.cs.uwindsor.ca/60334/assignments/finalpro/html/usersign.php">sign in</a></div>';

echo <<<_END
<div class="container">
<div class="row">
<div class="col-12">
_END;

if($usercode == 2){
  if (isset($_POST['discount'])   &&
      isset($_POST['code']))
  {
    $discount   = get_post($conn, 'discount');
    $code     = get_post($conn, 'code');
    $query    = "INSERT INTO `fdiscount`(`discounttype`, `discountcode`, `discountdis`) VALUES ('1','".$code."','".$discount."')";
    $result   = $conn->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }

  echo <<<_END
  <form action="discount.php" method="post">
     		<label for="discountdis" class="sr-only">Discount dicrption</label>
      		<input type="dis" id="discount" class="form-control" placeholder="Discount dicrption"  name="discount" required autofocus>
                <label for="discode" class="sr-only">Code</label>
     		<input type="text" id="inputCode" class="form-control" placeholder="Discount code" name="code"    required>
      		<button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
  	</pre>
	</form>
</div>
_END;

}

echo "</div>";


echo <<<_END
<div class="container">
<div class="row">
_END;
  $query  = "SELECT * FROM fdiscount";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
echo '<div class="col-4">';
  echo '<img src="../pictures/water.jpg" alt="relax"  height="300" width="300"><br><br/>';

    echo '<p><a class="btn btn-secondary" href="main.php" role="button">Back to Main Page</a></p></div>';
     echo '<div class="col-8"><table class="table"><tbody>';
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    echo '<tr><td>Discription:'.$row['discountdis'].'</td>';
    echo '<div id="inputCode"><td>Code: '.$row['discountcode'].'</td></tr></div>';

   }
    echo'</tbody></table></div>';


echo <<<_END
  <div class="footer">
  <p>Contact us
  <br>email:wang1lx@uwindsor.ca</br>
  <br>phone:2269756611</br>
  <br>address:401 Sunset Ave, Windsor, ON N9B 3P4</p>
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
