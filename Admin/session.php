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

	$sql=mysqli_query($con,"select * from User where userid='".$_SESSION['id']."'");
	$srow=mysqli_fetch_array($sql);
	$user=$srow['username'];
?>
