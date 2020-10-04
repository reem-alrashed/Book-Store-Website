<?php
include('session.php');
include('customernav.html');
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "BookStore"; /* Database name */
$con = new mysqli($host, $user, $password,$dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . connect_error);
}
$total=$_GET['id'];
$now = new DateTime();
$now->format('Y-m-d H:i:s');
$string = $now->format(DATE_RFC2822);
$sql="insert into Sales(userid,saledate,totalprice)values('".$_SESSION['id']."','$string','$total') ";
if($con->query($sql)===TRUE){
    $sql2="delete from Cart where userid='".$_SESSION['id']."'";
      if($con->query($sql2)===TRUE){
          header("Location:b.html");
    	}}
      else {
        echo "Error in sql";
      }
    ?>
