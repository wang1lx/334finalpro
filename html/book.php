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
                  height: 200px;"><br><br><h1 class="h3 mb-3 font-weight-normal">Booking</h1></br>
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

   <div class="col-4">
   <img src="../pictures/balcony.jpg" alt="bedroom"  height="300" width="300"></div>
   <div class="col">
   <table class="table">
   <tbody>
    <tr>
      <td>single bed room</td>
      <td>Comfortable room with a single bed</td>
      <td><a href="bookroom.php"><button class="btn btn-primary btn-block" id="check">book now</button></a></td>
    </tr>
    <tr>
      <td>double bed room</td>
      <td>Delight room with two beds</td>
      <td><a href="bookroom.php"><button class="btn btn-primary btn-block" id="check">book now</button></a></td>
    </tr>
</table>
<br><a class="btn btn-secondary" href="main.php" role="button">Back to Main Page</a></br>
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
