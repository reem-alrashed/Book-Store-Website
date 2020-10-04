<?php include('session.php');
include('customernav.html');
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "BookStore"; /* Database name */
$con = new mysqli($host, $user, $password,$dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . connect_error);
}?>
<html>
<head>
<title>Book Store</title>
<link href="../css/tablestyle.css" rel="stylesheet">
<style>
body{
text-align:center;
}
</style>
</head>
<body>
            <h1>Products</h1>
          <table width="50%" align="center" border='3' >
                <thead>  <tr>
              <th>Product Name</th>
              <th>Product Id</th>
                        <th>Price</th>
						<th>Quantity</th>
						<th>Photo</th>

                    </tr>
                </thead>
                <tbody>
				<?php
					$query=mysqli_query($con,"select * from Cart left join Book on Book.id=Cart.bookid where userid='".$_SESSION['id']."'");
		if (mysqli_num_rows($query)==0){
			echo "Your Cart is Empty <br><br>";
		}
		else{
		while($row=mysqli_fetch_array($query)){
			?>
		<tr>
							<td><?php echo $row['name']; ?></td>
              <td><?php echo $row['id']; ?></td>
							<td><?php echo $row['price']; ?></td>
							<td><?php echo $row['qty']; ?></td>
							<td><img src="<?php echo $row['pic'];?>" height="100px" width="100px;"></td>

							</td>

						</tr>
					<?php
		}}
				?>
                </tbody>
            </table>
<br/>
            <a href="checkout.php" style="color:blue;">Check out</a>

</body>
</html>
