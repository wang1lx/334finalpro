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
                  height: 200px;"><br><br><h1 class="h3 mb-3 font-weight-normal">Check in/out</h1></br>
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
 if (isset($_POST['checkin']))
  {
    $box=$_POST['check'];
      $query  = "UPDATE `froom` SET `standard`='BOOKED' WHERE roomnum = '".$box."'";
      $result=$conn->query($query);

  	if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";

  }

 if (isset($_POST['checkout']))
  {
    $box=$_POST['check'];
      $query  = "UPDATE `froom` SET `standard`='AVAILABLE' WHERE roomnum = '".$box."'";
      $result=$conn->query($query);

  	if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";

  }



  $query  = "SELECT * FROM froom";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  echo '<form action="check.php" method="post"><table class="table"><thead><th scope="col">Room Number</th><th scope="col">Room Type</th><th scope="col">Stantard</th><th scope="col"></th></thead>';

  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
    echo <<<_END
      <td>$row[2]</td>
      <td>$row[1]</td>
      <td>$row[0]</td>
      <td><input type="checkbox" name="check" value="$row[2]"></td>
  </tr>
_END;
  }
  echo '<input type="submit" name="checkin" value="check in"  class="btn btn-primary"><input type="submit" name="checkout" value="check out"  class="btn btn-primary"></form></table>';
  $result->close();
  $conn->close();

echo '<br><a class="btn btn-secondary" href="main.php" role="button">Back to Main Page</a></br>';
echo <<<_END
 </div>
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
