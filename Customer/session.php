<?php
	session_start();
	$_SESSION['bookid'];
	$host = "localhost"; /* Host name */
	$user = "root"; /* User */
	$password = ""; /* Password */
	$dbname = "BookStore"; /* Database name */
	$con = new mysqli($host, $user, $password,$dbname);
	// Check connection
	if (!$con) {
			die("Connection failed: " . connect_error);
	}
	if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
	header('location:../index.php');
    exit();
	}
	if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($con,"SELECT * FROM Book WHERE id='$code'"
);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['id'];
$price = $row['price'];
$image = $row['pic'];

$cartArray = array($code=>array('name'=>$name,'id'=>$code,'price'=>$price,'quantity'=>1,
 'pic'=>$image));

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
 $status = "<div class='box' style='color:red;'>
 Product is already added to your cart!</div>";
    } else {
    $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],  $cartArray);
    $status = "<div class='box'>Product is added to your cart!</div>";
 }

 }
}
?>
<?php

	$sql=mysqli_query($con,"select * from User where userid='".$_SESSION['id']."'");
	$srow=mysqli_fetch_array($sql);
	$user=$srow['username'];
?>
