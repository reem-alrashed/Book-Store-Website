<?php include('session.php');
    $host = "localhost"; /* Host name */
    $user = "root"; /* User */
    $password = ""; /* Password */
    $dbname = "BookStore"; /* Database name */
    $con = new mysqli($host, $user, $password,$dbname);
    // Check connection
    if (!$con) {
        die("Connection failed: " . connect_error);
    }
    $sql="select * from Customer where userid='".$_SESSION['id']."'";
    $result=$con->query($sql);
    if($result->num_rows==1){
      header("Location:mycart.php");
      } else{
        ?>
        <script type='text/javascript'>
       alert("Please add you information");
        </script>
        <?php
 header("Location:customeraddinfo.php");
  }
$con->close();
      ?>
