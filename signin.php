<?php
    $host = "localhost"; /* Host name */
    $user = "root"; /* User */
    $password = ""; /* Password */
    $dbname = "BookStore"; /* Database name */
    $con = new mysqli($host, $user, $password,$dbname);
    // Check connection
    if (!$con) {
        die("Connection failed: " . connect_error);
    }
    $username=$_POST["username"];
    $password=$_POST["password"];
    $usertype="Customer";
    $sql="insert into User(username,password,usertype)
    values('$username','$password','$usertype')";
    if($con->query($sql)===TRUE){ ?>
    <script type='text/javascript'>
   alert("Sign is done correctly , you can log in now");
    </script>
    <?php
      header("location:index.html");
  }
  else{?>
  <script type='text/javascript'>
  alert("Sign in have problem , try again");
  </script>
  <?php
  }
  $con->close();
  ?>
