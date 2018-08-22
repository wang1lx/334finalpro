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
                  height: 200px;"><br><br><h1 class="h3 mb-3 font-weight-normal">BOOKED</h1></br>
_END;
 if ($_SESSION["g_id"] != ""){

    $query   = 'SELECT fname,lname FROM `fuser_profile` WHERE guests_id="'.$_SESSION["g_id"].'"';
$result   = $conn->query($query);
       if (!$result) die($conn->error);
       $row = $result->fetch_array(MYSQLI_ASSOC);
       $name=$row['fname']." ".$row['lname'].'<a href="http://wang1lx.myweb.cs.uwindsor.ca/60334/assignments/finalpro/html/usersign.php">,  Log out</a></div>';
       $userid=$_SESSION["g_id"];
       echo $name.'</br></div>';
}




if ( isset($_POST['discount']))
  {
    $dis    = get_post($conn, 'discount');
    $query  = "SELECT * FROM fdiscount WHERE discountcode ='".$code."'";
    $result   = $conn->query($query);    
    if (!$result) echo "INSERT failed: $query<br>" .$conn->error . "<br><br>";
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $disid = $row['usercode'];

}

if ( isset($_POST['roomtype']))
  {
    $roomtype    = get_post($conn, 'roomtype');

    $query  = "SELECT * FROM froom WHERE standard='AVAILABLE'and roomtypeid='".$roomtype."'";
    $result   = $conn->query($query);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $roomid = $row['roomid'];
    if($disid!=''){ 
    $query    = "INSERT INTO fbook(`roomid`, `guests_id`, `discountid`) VALUES('".$roomid."', '".$userid."','".$disid."')";
    }else { 
     $query    = "INSERT INTO fbook(`roomid`, `guests_id`) VALUES('".$roomid."', '".$userid."')";
}
    $result   = $conn->query($query);
    $query    = "UPDATE `froom` SET `standard`='BOOKED' WHERE roomid = '".$roomid."'";
    $result   = $conn->query($query);
}



echo <<<_END
<div class="container">
<div class="row">

   <div class="col">

    <h1 style="color : blue;">Enjoy your journy</h1>


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
