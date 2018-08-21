<!DOCTYPE html>
<html>
<?php  require_once 'login.php';
session_start();
$conn = new mysqli($hn, $un, $pw, $db); 
 if ($conn->connect_error) 
     die($conn->connect_error); 


echo <<<_END
<head>
<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 50%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      div{padding:10px}
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
                  height: 200px;"><br><br><h1 class="h3 mb-3 font-weight-normal">Welcome!</h1></br>
_END;
 if (isset($_POST['email'])){
       $email    = get_post($conn, 'email');
       $query   = 'SELECT fname,lname,usercode,guests_id FROM `fuser_profile` WHERE g_email="'.$email.'"';
       $result   = $conn->query($query);
       if (!$result) die($conn->error);
       $row = $result->fetch_array(MYSQLI_ASSOC);
       $name=$row['fname']." ".$row['lname'].'<a href="usersign.php">,  Log out</a></div>';
       $usercode=$row['usercode'];
       echo $name.'</br></div>';
       $_SESSION["g_id"] = $row['guests_id'];
}
else if ($_SESSION["g_id"] != ""){

    $query   = 'SELECT fname,lname,usercode FROM `fuser_profile` WHERE guests_id="'.$_SESSION["g_id"].'"';
$result   = $conn->query($query);
       if (!$result) die($conn->error);
       $row = $result->fetch_array(MYSQLI_ASSOC);
       $name=$row['fname']." ".$row['lname'].'<a href="http://wang1lx.myweb.cs.uwindsor.ca/60334/assignments/finalpro/html/usersign.php">,  Log out</a></div>';
       $usercode=$row['usercode'];
       echo $name.'</br></div>';
}
else echo '<a href="usersign.php">sign in</a></div>';


echo <<<_END
<div class="container">
<div class="row">

<div class="col">
<div style="background-color:#E5E8E8; height: 450px;">
<p><h5>Discount</h5>
Get more with low price<a href="discount.php"><br>CHECK IT OUT</br>
</p>
<img src='../pictures/water.jpg' alt="water"  height="300" width="300"></a>
_END;

echo <<<_END
</div></div>

<div class="col">
<div style="background-color:#E5E8E8; height: 450px;">
<p><h5>Room</h5>
Different type of rooms to fit different group of people,
<a href="book.php">BOOK NOW
</p>
<img src='../pictures/bedreoom.jpg' alt="bedroom"  height="300" width="300"></a>
_END;

if($usercode == 2){
    echo "<a href='check.php'>check in/out</a>";
}
echo <<<_END
</div>
</div>

<div class="col">
<div id="map"></div>
    <script>

      function initMap() {
        var myLatLng = {lat:42.308272, lng: -83.057720};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom:15,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1qIc6vqs6KGLnDyH3wvx815m3evgZrRA
&callback=initMap"async defer></script></div>

</div>
</div>
<div class="footer">
  <p>Contact us
  <br>email:wang1lx@uwindsor.ca</br>
  <br>phone:2269756611</br>
  <br>address:401 Sunset Ave, Windsor, ON N9B 3P4</p>
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
 </html>
