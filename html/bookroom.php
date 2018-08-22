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
<script src="../js/validroom.js"></script>
<script src="../js/validcode.js"></script>
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

    $query   = 'SELECT fname,lname,guests_id FROM `fuser_profile` WHERE guests_id="'.$_SESSION["g_id"].'"';
       $result   = $conn->query($query);
       if (!$result) die($conn->error);
       $row = $result->fetch_array(MYSQLI_ASSOC);
       $name=$row['fname']." ".$row['lname'].'<a href="http://wang1lx.myweb.cs.uwindsor.ca/60334/assignments/finalpro/html/usersign.php">,  Log out</a></div>';
       $g_id=$row['guests_id'];
       echo $name.'</br></div>';
echo <<<_END
<div class="container">
<div class="row">
<div class="col-2"></div>
   <div class="col-8">
<form action="successfully_booked.php" method="post">
     		<select class="form-control" name="roomtype" onchange = "showHint(this.value)">
                <option  value="Default select" >Default select</option>
_END;
               $query  = "SELECT * FROM froomtype";
               $result = $conn->query($query);
               if (!$result) die ("Database access failed: " . $conn->error);
               $rows = $result->num_rows;
               for ($j = 0 ; $j < $rows ; ++$j)
               {
                $result->data_seek($j);
                $row = $result->fetch_array(MYSQLI_NUM);
                echo '<option  value="'.$row[0].'" >'.$row[0].'</option>';
                }
        
echo <<<_END
                </select>
                <p style="color:red;"><span id="txtHint"></span></p>
                <label for="Lastname" class="sr-only">Last Name</label>
     		<input type="text" id="inputLname" class="form-control" placeholder="Last Name" name="lname"    required>
                <label for="Firstname" class="sr-only">First Name</label>
     		<input type="text" id="inputFname" class="form-control" placeholder="First Name" name="fname"    required>
                <label for="discount" class="sr-only">Discount</label>
     		<input type="text" id="inputcode" class="form-control" placeholder="Discount" name="discount" onkeyup="CodeHint()">
                <p style="color:red;"><span id="codeHint"></span></p>
      		<button class="btn btn-lg btn-primary btn-block" type="submit">BOOK</button>
  	</pre>
	</form>
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

}

else{
 echo '<a href="http://wang1lx.myweb.cs.uwindsor.ca/60334/assignments/finalpro/html/usersign.php">sign in</a></div>';
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
</head>
<body>
<h2>Please sign in first</h2>
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
}




 ?>
