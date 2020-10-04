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
		?>
		<html>
		<head><title>Book Store</title>
			<link href="../css/tablestyle.css" rel="stylesheet">
			<style>
			body{
				text-align: center;
			}
			</style>

		</head>
		<body>
			<h1> Your bill information:</h1>
		<table width="50%" border='3' align='center'>
			<br/>	<br/>
			<tr>
			<thead>
				<th>Product Name</th>
				<th>Product Price</th>
				<th>Purchase Qty</th>
				<th>SubTotal</th>
			</thead>
				</tr>
			<tbody>
			<form method="POST" action="">
			<?php
				$total=0;
				$query=mysqli_query($con,"select * from Cart left join Book on Book.id=Cart.bookid where userid='".$_SESSION['id']."'");
				while($row=mysqli_fetch_array($query)){
					?>
					<tr>
						<td><?php echo $row['name']; ?></td>
						<td align="right"><?php echo number_format($row['price'],2); ?></td>
						<td>	<?php echo $row['qty'];?>
						</td>
						<td align="right"><strong>
							<?php
								$subtotal=$row['qty']*$row['price'];
								echo number_format($subtotal,2);
								$total+=$subtotal;
							?>
						</strong></td>
					</tr>
					<?php
				}
			?>
			<tr>
				<td colspan="3"><strong>Grand Total</strong></span></td>
				<td align="right"><strong><span id="total"><?php echo number_format($total,2); ?></span><strong></td>
			</tr>

			</form>
			</tbody>
		</table>
		<br/><br/>
		<table width="50%" border='3' align='center'>
		<tr>
			<th>Payment method:</th><td>Cash on delivery</td><td> Free</td>
		</tr>
	</table>
		<br/><br/>
		<hr/>	<br/><br/>
		<a href="confirmOrder.php<?php echo '?id='.number_format($total,2); ?>" style="color:blue;">Confirm Order</a>
		<?php
		$sql="insert into Sales(saleid,userid,,cartid,saledate,totalprice)values()";
 $bill ="[total price: ". number_format($total,2)."</br>"."Order will be delivered to your address Have a good day , let's see you tomorrow]";

 ?>
	</body>

	</html>
		<?php
$con->close();//
?>
