<?php
	include('session.php');
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "BookStore"; /* Database name */
$con = new mysqli($host, $user, $password,$dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . connect_error);
}
    $id=$_GET['id'];
		 $query=mysqli_query($con,"select * from cart where bookid='$id' and userid='".$_SESSION['id']."'");
 		if (mysqli_num_rows($query)>0){?>
 		<script>
 			window.alert('Product already on your cart!');
 			window.history.back();
 		</script><?php
 		}else{
			$row=mysqli_query($con,"insert into Cart (userid, bookid, qty) values ('".$_SESSION['id']."', '$id', 1)");

			if ($row){?>
			<script>
			window.alert('Product add to cart successfully!');
			window.history.back();
		</script><?php
	}}
			$con->close();
		?>
