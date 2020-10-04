<?php include('session.php'); include('customernav.html'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book Store</title>
    <link href="../css/style1.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<div style="height: 80px;"></div>
	<div>
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
echo "<h3> Welcome ";
    $sql="select * from User where userid='".$_SESSION['id']."'";
    $result=$con->query($sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            echo $row['username'];
}}
 echo " !</h3>";
		$inc=4;
		$query=mysqli_query($con,"select * from Book");
		while($row=mysqli_fetch_array($query)){
			$inc = ($inc == 4) ? 1 : $inc+1;
			if($inc == 1) echo "<div >";
			?>
				<div class="col-lg-3" align='center'>
				<div>
					<img src="<?php echo $row['pic']; ?>" alt="book image" style="width: 230px; height:230px; padding:auto; margin:auto;">
					<div style="height: 10px;"></div>
					<div style="height:40px; width:230px; margin-left:17px;"><?php echo $row['name']; ?></div>
          <div style="height: 10px;"></div>
          <div style="height:40px; width:230px; margin-left:17px;"><?php echo $row['price']." SAR"; ?></div>
					<div style="height: 10px;"></div>
					<div style="margin-left:17px; margin-right:17px; padding-bottom:20px;">
					<a href="addcart.php<?php echo '?id='.$row['id']; ?>">	<button type="button" > Add to Cart</button> </a>
					</div></div></div>
			<?php
		if($inc == 4) echo "</div><div style='height: 30px;'></div>";	}
		if($inc == 1) echo "<div class='col-lg-3></div><div class='col-lg-3'></div><div class='col-lg-3'></div></div>";
		if($inc == 2) echo "<div class='col-lg-3'></div><div class='col-lg-3'></div></div>";
		if($inc == 3) echo "<div class='col-lg-3'></div></div>";
	?>
</div></body></html>
