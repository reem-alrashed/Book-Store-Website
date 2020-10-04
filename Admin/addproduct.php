
<?php
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "BookStore"; /* Database name */
  $con = new mysqli($host, $user, $password,$dbname);
if (!$con) {
    die("Connection failed: " . connect_error);
}
// Check connection
$id = $_POST["bookid"];
$name=$_POST["bookname"];
$price=$_POST["price"];
$pict=$_POST["pic"];
$sql="insert into Book (id,name,price,pic)values('$id','$name','$price','$pict')";
if($con->query($sql)===TRUE){ ?>
<script type='text/javascript'>
alert("Book is added successfuly");
window.history.back();
</script>
<?php }
else{ ?>
  <script type='text/javascript'>
  alert("Book is already added ");
  window.history.back();
  </script>
<?php }
$con->close();
?>
